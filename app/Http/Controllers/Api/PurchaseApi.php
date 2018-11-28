<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PurchaseApiResourceCollection;
use Symfony\Component\HttpFoundation\JsonResponse;
//use App\Http\Requests\Admin\Request\UserRequest;	
use App\Appuser;		
use Carbon\Carbon;
class PurchaseApi extends Controller
{
    public function updateApp(Request $request)
    {
        
        if($request->get('daysToAdd'))
        {
              $days=Carbon::now()->addDay($request->get('daysToAdd'));
        }
        else
        {
            $days="";
            return response()->json(array("status"=>"false"));
        }
  
               

        $users=[
            "isPurchaseAds"=>"purchase_ads",
            "isPurchaseWatermark"=>"is_purchase_watermark",
            "isPurchaseUnlimited"=>"is_purchase_unlimited",
            "isPurchaseSubscription"=>"is_purchase_subscription"
              ];

        if(array_key_exists($request->get('nameOfFlag'), $users))
        { 
        
            $users=Appuser::where('device_id',$request->get('device_id'))->update(

                [

                    $users[$request->get('nameOfFlag')]  => 1,
                    'last_date_of_subscription'          =>
                ]


                ); 

            return new JsonResponse([

                   'success'=>true,
                   'device_id'=>new PurchaseApiResourceCollection($request->get('device_id')),    

            ]);
        }

        
        return new JsonResponse([
            'success' => false,
            'Message' =>'Sorry name of flag is incorrect or device id is not available',
        ]);

    }
}
