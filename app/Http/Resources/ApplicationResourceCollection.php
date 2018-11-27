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
        $query=Application::where('app_platform_id',$this->id)->get()->toArray();

        array_walk_recursive($query, function (&$item,$key) 
        {
           $item =  ($item === null ? "" : $item);
          
         });

       /*foreach($query as $value)
       {

            $value->is_force_update = isset($value->is_force_update)?true:false;    
            $value->is_only_banner = isset($value->is_only_banner)?true:false;    
       }*/
       return $query;
    
    }
}
