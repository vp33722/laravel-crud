<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Http\Requests\Admin\Request\ApplicationRequest;	
use App\Application;		

class ApplicationController extends Controller
{
    public function getApp(ApplicationRequest $request)
    {
    	$users=Application::where('app_platform_id',$request->get('app_platform_id')->get());

         return response()->json([
                    'success' => true,
                    'Apps' =>$users
                ]);

    }
}
