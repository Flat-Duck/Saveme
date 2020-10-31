<?php

namespace App;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clink extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone_number', 'latitude', 'longitude', 'status', 'visible', 'cover', 'address', 'price'
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
            'phone_number' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'status' => 'boolean',
            'visible' => 'boolean',
            'cover' => 'image',
            'address' => 'string',
            'price' => 'numeric',
            'specialties' => 'array',
            'specialties.*' => 'numeric|exists:specialties,id',
            'tests' => 'array',
            'tests.*' => 'numeric|exists:tests,id',
            'services' => 'array',
            'services.*' => 'numeric|exists:services,id',
        ];
    }

    /**
     * Spatie media library collections
     *
     * @return void
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('cover')->singleFile();
    }

    /**
     * Get the devices for the Clink.
     */
    public function devices()
    {
        return $this->hasMany('App\Device');
    }

    // /**
    //  * Get the doctors for the Clink.
    //  */
    // public function doctors()
    // {
    //     return $this->hasMany('App\Doctor');
    // }
        /**
     * Get the doctors for the Clink.
     */
    public function doctors()
    {
        return $this->belongsToMany('App\Doctor');
    }

    /**
     * Get the emergencies for the Clink.
     */
    public function emergencies()
    {
        return $this->hasMany('App\Emergency');
    }

    /**
     * Get the appointments for the Clink.
     */
    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

    /**
     * Get the specialties for the Clink.
     */
    public function specialties()
    {
        return $this->belongsToMany('App\Specialty');
    }

    /**
     * Get the tests for the Clink.
     */
    public function tests()
    {
        return $this->belongsToMany('App\Test');
    }

    /**
     * Get the services for the Clink.
     */
    public function services()
    {
        return $this->belongsToMany('App\Service');
    }

    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::with(['media'])->paginate(10);
    }
}
