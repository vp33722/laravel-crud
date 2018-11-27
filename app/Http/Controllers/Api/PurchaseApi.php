<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AppUserCollection;
use Symfony\Component\HttpFoundation\JsonResponse;
//use App\Http\Requests\Admin\Request\UserRequest;	
use App\Appuser;		
use Carbon\Carbon;
class PurchaseApi extends Controller
{
    public function updateApp(Request $request)
    {
            $days=Carbon::now()->addDay($request->get('daysToAdd'));
               

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

                    $users[$request->get('nameOfFlag')]  =>1,
                    'last_date_of_subscription'          =>($request->get('daysToAdd') ? $days : '',
                ]


                ); 
        }

        return $users;
        /*return new JsonResponse([
            'success' => false,
            'Message' =>'Sorry Try Again',
        ]);*/

    }
}
