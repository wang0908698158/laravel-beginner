<?php

namespace App\Http\Controllers;

use App\Exceptions\APIException;
use App\Models\Course;
use App\Services\CourseService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    /**
     * @var CourseService
     */
    private $service;

    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Course::all()->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            //$messages = $validator->errors()->getMessages();
            throw new APIException('驗證錯誤' , 422);
        }

        $courseForm = [
            'name' => $request->get('name'),
            'description' => trim($request->get('description')) ?? '',
            'outline' => $request->get('outline') ?? '',
        ];
        $status = Course::create($courseForm);

        return ['success' => $status];
    }

    /**
     * Display the specified resource.
     *
     * @param int $courseId
     * @return \App\Http\Resources\CourseResource
     * @throws APIException
     */
    public function show($courseId)
    {
        try {
            $courseResource = $this->service->getCourseById($courseId);
        } catch (Exception $e) {
            throw new APIException('找不到對應課程', 404);
        }
        return $courseResource;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $courseId
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        $courseId
    ) {
        try {
            $request->validate([
                'name' => 'required|string|max:20',
            ]);
        } catch (\Exception $e) {
            throw new APIException($e->getMessage() , 422);
        }

        if (! $course = Course::find($courseId)) {
            throw new APIException('課程找不到', 404);
        }
        $status = $course->update($request->toArray());
        return ['success' => $status];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $courseId
     * @return \Illuminate\Http\Response
     */
    public function destroy($courseId)
    {
        if (! $course = Course::find($courseId)) {
            throw new APIException('課程找不到', 404);
        }
        $status = $course->delete();
        return ['success' => $status];
    }
}
