<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emergency extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'qualification', 'clink_id'
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
            'qualification' => 'nullable|string',
            'clink_id' => 'required|numeric|exists:clinks,id',
        ];
    }

    /**
     * Get the clink for the Emergency.
     */
    public function clink()
    {
        return $this->belongsTo('App\Clink');
    }

    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::with(['clink'])->paginate(10);
    }
}
