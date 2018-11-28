<?php

namespace App\Http\Resources;

use App\Application;
use App\Appuser;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AppUserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function __construct($users)
    {
        $this->id = $users->id;

    }

    public function toArray($request)
    {

        $query = Appuser::with('application', 'application.plateforms')->where('id', $this->id)->first();

        return [

            'Plateform'                 => $query->application->plateforms->name,
            'Application'               => $query->application->name,
            'userId'                    => $query->id,
            'device_id'                 => $query->device_id,
            'country'                   => $query->country,
            'device_type'               => $query->device_type,
            'os_version'                => $query->os_version,
            'app_version'               => $query->app_version,
            'is_full_access'            => ($query->is_full_access) ? 'yes' : 'no',
            'purchase_ads'              => ($query->purchase_ads) ? 'yes' : 'no',
            'is_purchase_watermark'     => ($query->is_purchase_watermark) ? 'yes' : 'no',
            'is_purchase_unlimited'     => ($query->is_purchase_unlimited) ? 'yes' : 'no',
            'is_purchase_subscription'  => ($query->is_purchase_subscription) ? 'yes' : 'no',
            'last_date_of_subscription' => ($query->last_date_of_subscription) ?
                                           $query->$last_date_of_subscription : '',

        ];

    }
}
