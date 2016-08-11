<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name', 'description', 'status', 'user_id', 'assignee_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function assignee()
    {
    	return $this->belongsTo('App\User','assignee_id');
    }
}
