<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    // Definizione della relazione many-to-many con 'Project'
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
