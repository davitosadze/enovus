<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ["title", "description", "main_image"];
    use HasFactory;

    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
