<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    public $timestamps = false;
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_id', 'doctor_id', 'clink_id'
    ];

    protected $table = "clink_service";


    /**
     * Get the doctors for the Specialty.
     */
    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    /**
     * Get the clinks for the Specialty.
     */
    public function clink()
    {
        return $this->belongsTo('App\Clink');
    }
    /**
     * Get the clinks for the Specialty.
     */
    public function service()
    {
        return $this->belongsTo('App\Service');
    }

}
