<?php

namespace App\Http\Controllers;

use App\Exceptions\APIException;
use App\Models\Teacher;
use App\Services\CourseService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Teacher::all()->toArray();
    }

    public function store(Request $request)
    {
        
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:20',
        // ]);

        // if ($validator->fails()) {
        //     //$messages = $validator->errors()->getMessages();
        //     throw new APIException('驗證錯誤' , 422);
        // }
        $storeTeacher = [
            'teacherName' => $request->get('teacherName')
        ];
        $status = Teacher::create($storeTeacher);
        return ['success' => $status];
    }

    public function show($id)
    {
        // try {
        //     $showTeacherID = $this->service->getTeacherById($id);
        // } catch (Exception $e) {
        //     throw new APIException('找不到對應課程', 404);
        // }
        // return $showTeacherID;
        $result = Teacher::find($id);
        return $result;
    }

    public function update(
        Request $request,
        $id
    ) {
        $status = Teacher::find($id);
        //$status->update($request->all());

        $status->update($request->toArray());
        return ['success' => $status];
    }

    public function destroy($id)
    {
        //if (! $course = Course::find($id)) {
        //    throw new APIException('課程找不到', 404);
        //}
        $status = Teacher::find($id)->delete($id);
        return ['success' => $status];
    }
}