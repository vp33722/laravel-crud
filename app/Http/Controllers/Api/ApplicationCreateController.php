<?php

namespace App\Http\Controllers\Api;
use App\Application;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicationResourceCollection;
use App\Http\Requests\Admin\Request\ApplicationCreateRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApplicationCreateController extends Controller
{
    public function getApp(ApplicationCreateRequest $request)
    {
        $apps = Application::where('app_platform_id', $request->get('app_platform_id'))->count();
        
        /*if ($apps>0) {
            return new JsonResponse([
                'success' => true,
                'apps'   => new ApplicationResourceCollection($request->get('app_platform_id')),
            ]);
        }*/
        return response()->json([
            'success' => false,
            'Message' => $apps,
        ]);
    }
}