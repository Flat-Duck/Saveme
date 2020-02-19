<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_time', 'finish_time', 'clink_id', 'doctor_id','day'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'start_time' => 'required|date_format:H:i:s',
            'finish_time' => 'required|date_format:H:i:s',
            'clink_id' => 'required|numeric|exists:clinks,id',
            'day' => 'required|string',
            'doctor_id' => 'required|numeric|exists:doctors,id',
        ];
    }

    /**
     * Get the clink for the Appointment.
     */
    public function clink()
    {
        return $this->belongsTo('App\Clink');
    }

    /**
     * Get the doctor for the Appointment.
     */
    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::with(['clink', 'doctor'])->paginate(10);
    }
}
