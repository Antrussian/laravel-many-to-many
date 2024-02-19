<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types'; 

    protected $fillable = ['name']; 

    public function projects()
{
    return $this->hasMany(Project::class);
}

}


