<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kra8\Snowflake\HasSnowflakePrimary;

class TimeTrackingEntry extends Model
{
    use SoftDeletes, HasSnowflakePrimary;
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
        return $this->hasOne(User::class);
    }

    /**
     * Get the task record associated with the timeTrackingEntry.
     */
    public function task()
    {
        return $this->hasOne(Task::class);
    }
}
