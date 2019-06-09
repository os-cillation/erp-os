<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kra8\Snowflake\HasSnowflakePrimary;
use OwenIt\Auditing\Contracts\Auditable;

class PreviousTask extends Model implements Auditable
{
    use SoftDeletes, HasSnowflakePrimary, \OwenIt\Auditing\Auditable;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Get the task record associated with the previousTask.
     */
    public function task()
    {
        return $this->hasOne(Task::class);
    }

    /**
     * Get the fulfillingTasks record associated with the previousTask.
     */
    public function fulfillingTask()
    {
        return $this->hasMany(Task::class);
    }
}
