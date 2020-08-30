<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'status', 'image'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
