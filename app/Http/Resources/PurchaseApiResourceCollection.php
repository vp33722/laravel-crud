<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\ResourceCollection;
class PurchaseApiResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
   
    public function toArray($request)
    {
        $query=Appuser::where('device_id',$this->device_id)->first()->toArray();

        array_walk_recursive($query, function (&$item,$key) 
        {
           $item =  ($item === null ? "" : $item);
          
         });
        
      return $query;
        
    
    }
}
