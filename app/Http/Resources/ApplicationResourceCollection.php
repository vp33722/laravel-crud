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
            'id'                            => (string)$this->id,
            'name'                          => (string)$this->name,
            'latestVersion'                 => (string)$this->latest_version,
            
       ];

    }
}
