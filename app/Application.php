<?php

namespace App;

use App\Plateform;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{

    use SoftDeletes;
    protected $table = 'apps';
    protected $dates = ['deleted_at'];

    protected $fillable = ['app_platform_id', 'name', 'contact_email'];

    public function app_users()
    {
        return $this->hasMany(Appuser::class, 'app_id', 'id');
    }

    public function plateforms()
    {
        return $this->belongsTo(Plateform::class, 'app_platform_id', 'id');
    }

    public function getIsForceUpdateAttribute($value)
    {
        return ($value==0) ? 'false' : 'true';
    }

    public function getIsOnlyBannerAttribute($value)
    {
        return ($value==0) ? 'false' : 'true';
    }

    public function setIsForceUpdateAttribute($value)
    {
        return $this->attributes['is_force_update'] = ($value==0) ? 1 : 0;
    }
     public function setIsOnlyBannerAttribute($value)
    {
         return $this->attributes['is_only_banner'] = ($value==0) ? 1 : 0;
    }

}
