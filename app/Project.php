<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * Class Project
 * @package App
 */
class Project extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * @return mixed
     * Retrieve tasks that match the project id, and select only the hours_estimate column to sum up the total
     */
    public function calculateTotalHours()
    {
        $hours = DB::table('tasks')->where('project_id', $this->id)->pluck('hours_estimate');
        return $hours->sum();
    }


}
