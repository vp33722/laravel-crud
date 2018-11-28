<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Application;
use App\Plateform;

class Appuser extends Model
{
	use SoftDeletes;
	protected $table='appusers';
	protected $dates = ['deleted_at'];
	protected $fillable=['app_id','device_id','country','device_type','os_version','app_version'];

	//protected $fillable = ['last_date_of_subscription'];
    public function application()
	{
	 	return $this->belongsTo(Application::class, 'app_id', 'id');
	}
	//Mutator For Display And Api Purpsoe//
	public function getIsFullAccessAttribute($value)
    {
        return ($value==0) ? 'false' : 'true';
    }

    public function getPurchaseAdsAttribute($value)
    {
        return ($value==0) ? 'false' : 'true';
    }

    public function getIsPurchaseUnlimitedAttribute($value)
    {
        return ($value==0) ? 'false' : 'true';
    }

    public function getIsPurchaseWatermarkAttribute($value)
    {
        return ($value==0) ? 'false' : 'true';
    }

    public function getIsPurchaseSubscriptionAttribute($value)
    {
        return ($value==0) ? 'false' : 'true';
    }

  
	
	
    
}
