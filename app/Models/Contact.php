<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ["name", "email", "phone", "text", "service_id"];
    protected $table = "contact";
    use HasFactory;

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
