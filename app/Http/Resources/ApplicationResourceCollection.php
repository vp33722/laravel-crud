<?php

namespace App\Http\Resources;

use App\Application;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ApplicationResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    
    

    public function toArray($request)
    {
        $query=Application::where('app_platform_id',$this->appid)->first();

       return
       [
            'id'                            => $this->id,
            'name'                          => $this->name,
            'latestVersion'                 => $this->latest_version
            /*'titleOfAd'                     => ($query->title_of_ad) ? $query->title_of_ad : '',
            'messOfAd'                      => ($query->messge_of_ad) ? $query->messge_of_ad : '',
            'link'                          => ($query->link) ? $query->link : '',
            'contactEmail'                  => ($query->contact_email) ? $query->contact_email : '',
            'shareFormat'                   => $query->share_format) ? $query->share_format : '',
            'contactFormat'                 => ($query->contact_format) ? $query->contact_format :'',
            'developerSite'                 => ($query->developer_site) ? $query->developer_site : '',
            'developerName'                 => ($query->developer_name) ? $query->developer_name : ''
            'developerApps'                 => ($query->developer_apps) ? $query->developer_apps : '',
            'generatedInApp'                => ($query->generated_in_app) ? $query->generated_in_app : '',
            'is_force_update'               => ($query->is_force_update) ? 'YES' : 'No',
            'is_only_banner'                =>($query->is_only_banner) ? 'YES' : 'NO',*/
       ];

    }
}
