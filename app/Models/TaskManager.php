<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskManager extends Model
{
    //
    protected $fillable = ['title', 'start_date', 'due_date', 'status', 'description', 'estimated_time', 'percent_done'];
}
