<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AppUserCollection;
use Symfony\Component\HttpFoundation\JsonResponse;
//use App\Http\Requests\Admin\Request\UserRequest;	
use App\Appuser;		

class PurchaseApi extends Controller
{
    public function updateApp(Request $request)
    {
        $users=[
            "isPurchaseAds"=>"purchase_ads",
            "isPurchaseWatermark"=>"is_purchase_watermark",
            "isPurchaseUnlimited"=>"is_purchase_unlimited",
            "isPurchaseSubscription"=>"is_purchase_subscription"
              ];

        if(array_key_exists($request->get('nameOfFlag'), $users))
        { 
        
            $users=Appuser::where('device_id',$request->get('device_id'))

            ->update(

                    [
                        $users[$request->get('nameOfFlag')]    =>1,
                        'last_date_subscription'               =>($request->get('daysToAdd') ? \Carbon\                                    Carbon::now()->addDays
                                                                ($request->get('daysToAdd') : '')
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
