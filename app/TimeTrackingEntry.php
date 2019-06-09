<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kra8\Snowflake\HasSnowflakePrimary;
use OwenIt\Auditing\Contracts\Auditable;

class TimeTrackingEntry extends Model implements Auditable
{
    use SoftDeletes, HasSnowflakePrimary, \OwenIt\Auditing\Auditable;
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['text', 'amount', 'state'];

    /**
     * Get the user record associated with the timeTrackingEntry.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the task record associated with the timeTrackingEntry.
     */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
