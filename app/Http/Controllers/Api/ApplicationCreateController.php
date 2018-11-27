<?php
namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Http\Resources\AppUserCollection;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Http\Requests\Admin\Request\ApplicationCreateRequest;	
use App\Application;		

class ApplicationCreateController extends Controller
{
    public function getApp(ApplicationCreateRequest $request)
    {
    	$apps=Application::where('app_platform_id',$request->get('app_platform_id')->get());

         return response()->json([
                        'success' => true,
                        'Apps' =>$apps,
                    ]);

    	
    }
}
