<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use DB;

class ProfileController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View
     */

    public function index(Request $request)
    {
        return view(
            'profile',
            [   
                
                'name' => '課程連結',
                'records' => [
                    [
                        'id' => 'PHP 基礎課程',
                    ],
                    [
                        'id' => 'Laravel 程式設計',
                    ],
                    [
                        'id' => '良好的程式撰寫基礎',
                    ],
                    [
                        'id' => '設計模式基礎',
                    ],
                    [
                        'id' => 'Git 入門篇',
                    ],
                    [
                        'id' => 'Docker 入門篇',
                    ],
                    [
                        'id' => 'CI/CD 基礎概念',
                    ],
                    [
                        'id' => 'AWS雲端基礎概論',
                    ],
                    [
                        'id' => 'AWS Well Architected',
                    ],
                    [
                        'id' => 'AWS持續整合與部署CI/CD',
                    ],
                    [
                        'id' => '資料儲存與資訊檢索',
                    ],
                    [
                        'id' => '認識資料庫 L1 + SQL 語法',
                    ],
                    [
                        'id' => 'Search Engine',
                    ],
                    [
                        'id' => 'Web Application Security',
                    ],
                    [
                        'id' => '密碼學基本原理 + 弱點掃描概論',
                    ],
                ],
            ]
        );
    }

    /**
     * @param Request $request
     */
    public function cache(Request $request)
    {
        if ($cacheTime = Cache::get('profileCacheTime')) {
            return response()->json([
                'time' => $cacheTime,
             ]);
        }

        $now = Carbon::now();
        Cache::set('profileCacheTime', $now, 60);

        return response()->json([
            'time' => $now,
        ]);
    }
}
