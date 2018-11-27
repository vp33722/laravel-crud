<?php

namespace App\Http\Resources;

use App\Application;
use Illuminate\Http\Resources\Json\ResourceCollection;
//use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\JsonResponse;
class ApplicationResourceCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    
    

    public function toArray($request)
    {


      return
        [
            'id' => $this->id,
            'name' =>$this->name,
        ];
            

    }
}
