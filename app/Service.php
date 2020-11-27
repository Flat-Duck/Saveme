<?php

namespace App;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'name' => 'required|string',
        ];
    }

    /**
     * Get the clinks for the Service.
     */
    public function clinks()
    {
        return $this->belongsToMany('App\Clink');
    }
        /**
     * Get the clinks for the Service.
     */
    public function doctor()
    {
        return $this->belongsToMany('App\Doctor','clink_service');
    }
    /**
     * Get the services for the Clink.
     */
    public function servers()
    {
        return $this->hasMany('App\Server');//
    }
    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::paginate(10);
    }
}
