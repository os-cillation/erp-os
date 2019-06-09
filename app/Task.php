<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kra8\Snowflake\HasSnowflakePrimary;
use OwenIt\Auditing\Contracts\Auditable;

class Task extends Model implements Auditable
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
    protected $fillable = ['name', 'description', 'state', 'planned_amount'];

    /**
     * Get the project record associated with the task.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the user record associated with the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the timeTrackingEntries record associated with the task.
     */
    public function timeTrackingEntries()
    {
        return $this->hasMany(TimeTrackingEntry::class);
    }
}
