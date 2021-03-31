<?php

namespace Tests\Feature;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;
    /**
     * @throws BindingResolutionException
     */
    public function setUp(): void
    {
        Carbon::setTestNow('2021-03-23 14:00:00');
        parent::setUp();
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSuccess()
    {
        Course::create([
            'id' => '999',
            'name' => '測試課程',
            'description' => 'test',
            'outline' => 'test',
        ]);
        $response = $this->get('/api/courses/999');

        $response->assertStatus(200)
            ->assertExactJson([
                "data" => [
                    'name' => '測試課程',
                    'description' => 'test',
                    'outline' => 'test',
                    'students' => [],
                ],
                "metadata" => Carbon::now(),
            ]);
    }

    public function testDeleteSuccess()
    {
        Course::create([
            'id' => '999',
            'name' => '測試課程',
            'description' => 'test',
            'outline' => 'test',
        ]);
        $response = $this->delete('/api/courses/999');

        $response->assertStatus(200)
            ->assertExactJson([
                "success" => true,
            ]);
        
    }

    public function testCreateSuccess()
    {
        Course::create([
            'id' => '999',
            'name' => '測試課程',
            'description' => 'test',
            'outline' => 'test',
        ]);
        $response = $this->get('/api/courses/999');
    
        $response->assertStatus(200)
        ->assertExactJson([
            "data" => [
                'name' => '測試課程',
                'description' => 'test',
                'outline' => 'test',
                'students' => [],//這兩句沒有會出錯
            ],
            "metadata" => Carbon::now(),//
        ]);
    }

    public function testUpdateSuccess()
    {
        Course::create([
            'id' => '999',
            'name' => '測試課程',
            'description' => 'test',
            'outline' => 'test',
        ]);

        $response = $this->json(
            'PUT',
            '/api/courses/999',
            [
                'name' => 'testtesttest',
            ]
        );

        $response->assertStatus(200)->assertExactJson( ["success" => true] );
    }
    
    public function testFailed()
    {
        $response = $this->get('/api/courses/999');

        $response->assertStatus(404)
            ->assertExactJson([
                "message" => "找不到對應課程",
            ]);
    }

    public function testDeleteFailed()
    {
        $response = $this->delete('/api/courses/999');

        $response->assertStatus(404)
            ->assertExactJson([
                "message" => "課程找不到",
            ]);
    }

    public function testCreateFailed()
    {
        $response = $this->json(
            'POST',
            '/api/courses',
            [
                'testerror' => 'testerror',
            ]
        );

        $response->assertStatus(422)->assertExactJson( ["message" => "驗證錯誤"] );
    }
    
    public function testUpdateFaild()
    {
        $response = $this->json(
            'PUT',
            '/api/courses/999',
            [
                'name' => 'testError'
            ]
        );

        $response->assertStatus(404)->assertExactJson( ["message" => "課程找不到"] );
    }

    /*public function testCreateSuccess()
    {
        $response = $this->json(
            method: 'POST',
            unit: '/api/courses',
            [
                'name' => 'Sally',
                'description' => 'test',
                'outline' => 'outline',
            ]
            );
        $response->assertStatus( status:200)
            ->assertExactJson([
                'success' => [
                    'name' => 'Sally',
                    'description' => 'test',
                    'outline' => 'outline',
                    'update_at' => "2021-03-23 14:00:00",
                    "create_at" => "2021-03-23 14:00:00",
                    "id" => 1,
                ],
            ]);

        
    }*/
}
// 


//增加	Create
//刪除	Delete	
//修改	Update