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
    public function __construct($apps)
    {
        $this->id=$apps;

    }
    

    public function toArray($request)
    {
        $query=Application::where('app_platform_id',$this->id)->first();

       return
       [
            'id'                            => $query->id,
            'name'                          => $query->name,
            'latestVersion'                 => ($query->latest_version) ? $query->latest_version : '',
            'titleOfAd'                     => (string) $query->title_of_ad,
            'messOfAd'                      => (string) $query->messge_of_ad,
            'link'                          => (string) $query->link,
            'contactEmail'                  => (string) $query->contact_email,
            'shareFormat'                   => (string) $query->share_format,
            'contactFormat'                 => (string) $query->contact_format,
            'developerSite'                 => (string) $query->developer_site,
            'developerName'                 => (string) $query->developer_name,
            'developerApps'                 => (string) $query->developer_apps,
            'generatedInApp'                => (string) $query->generated_in_app,
            'is_force_update'               => ($query->is_force_update) ? 'YES' : 'No',
            'is_only_banner'                =>($query->is_only_banner) ? 'YES' : 'NO',
       ];

    }
}
