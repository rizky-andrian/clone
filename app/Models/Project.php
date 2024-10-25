<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';

    public function customer()
    {
        return $this->hasOne(customer::class, 'id', 'id_customer');
    }
}
