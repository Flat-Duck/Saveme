<?php

namespace App;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'picture', 'clink_id'
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
            'description' => 'required|string',
            'picture' => 'nullable|image',
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
     * Get the clink for the Device.
     */
    public function clink()
    {
        return $this->belongsToMany('App\Clink');
    }

    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::with(['clink', 'media'])->paginate(10);
    }
}
