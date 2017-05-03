<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $guarded = [
        'id'
    ];

    public function assignee()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function assigner()
    {
        return $this->belongsTo('App\User', 'assigner_id');
    }
}
