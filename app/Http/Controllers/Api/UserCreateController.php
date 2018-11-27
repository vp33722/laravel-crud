<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AppUserCollection;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Http\Requests\Admin\Request\UserRequest;	
use App\Appuser;		

class UserCreateController extends Controller
{
    public function store(UserRequest $request)
    {
    	$users=Appuser::create([

    		'app_id'		=>$request->get('appId'),
    		'device_id'		=>$request->get('deviceId'),
    		'country'		=>$request->get('country'),
    		'device_type'	=>$request->get('deviceType'),
    		'os_version'	=>$request->get('osVersion'),
    		'app_version'	=>$request->get('appVersion'),


    	]);

    	 return new JsonResponse([
            'success' => true,
            'users' => new AppUserCollection($users)
        ]);

    }
}
