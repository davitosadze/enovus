<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ["image_url", "project_id"];
    use HasFactory;
}
