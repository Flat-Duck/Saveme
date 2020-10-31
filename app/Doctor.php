<?php

namespace App;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'qualification', 'picture', 'clink_id', 'specialty_id'
    ];

    protected $appends = array('specialty_name');
    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'name' => 'required|string',
            'phone' => 'nullable|string',
            'qualification' => 'required|string',
            'picture' => 'required|image',
            'clink_id' => 'required|numeric|exists:clinks,id',
            'specialty_id' => 'required|numeric|exists:specialties,id',
        ];
    }

    /**
     * Spatie media library collections
     *
     * @return void
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('picture')->singleFile();
    }

    /**
     * Get the clink for the Doctor.
     */
    public function clink()
    {
        return $this->belongsTo('App\Clink');
    }

        /**
     * Get the clinks for the Doctor.
     */
    public function clinks()
    {
        return $this->belongsToMany('App\Clink');
    }

    /**
     * Get the specialty for the Doctor.
     */
    public function specialty()
    {
        return $this->belongsTo('App\Specialty');
    }

    public function getSpecialtyNameAttribute()
    {
        return  $this->specialty->name;
    }

    /**
     * Get the appointments for the Doctor.
     */
    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::with(['clink', 'specialty', 'media'])->paginate(10);
    }
}
