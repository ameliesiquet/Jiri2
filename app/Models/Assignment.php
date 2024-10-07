<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;


    public function jiri()
    {
        return $this->belongsTo(Jiri::class);
    }

    public function projects()
    {
        return $this->belongsTo(Project::class);
    }
}
