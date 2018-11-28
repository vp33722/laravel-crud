<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AppUserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [

            'Plateform'                 => (string)$this->application->plateforms->name,
            'Application'               => (string)$this->application->name,
            'userId'                    => (string)$this->id,
            'device_id'                 => (string)$this->device_id,
            'country'                   => (string)$this->country,
            'device_type'               => (string)$this->device_type,
            'os_version'                => (string)$this->os_version,
            'app_version'               => (string)$this->app_version,
            'is_full_access'            => (boolean)$this->is_full_access,
            'purchase_ads'              => (boolean)$this->purchase_ads,
            'is_purchase_watermark'     => (boolean)$this->is_purchase_watermark,
            'is_purchase_unlimited'     => (boolean)$this->is_purchase_unlimited,
            'is_purchase_subscription'  => (boolean)$this->is_purchase_subscription,
            'last_date_of_subscription' => (string)$this->last_date_of_subscription,

        ];

    }
}
