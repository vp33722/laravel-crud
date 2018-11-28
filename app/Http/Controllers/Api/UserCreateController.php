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
       $count=Appuser::where('device_id',$request->get('device_id'))->count();
       
       if($count>0)
       {
        $updates=Appuser::where('device_id',$request->get('deviceId'))->update(

                [
                  'country'       =>$request->get('country'),
                  'device_type'   =>$request->get('deviceType'),
                  'os_version'    =>$request->get('osVersion'),
                  'app_version'   =>$request->get('appVersion'),   
                ]

               );

            if($updates>0)
            {
                
              $users=Appuser::with('application', 'application.plateforms')->where('device_id', $request->get('device_id'))->first();  

                return new JsonResponse([
                                        'success' => true,
                                        'users' => new AppUserCollection($users)
                                        ]);

        }

       } 

       else
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
}
