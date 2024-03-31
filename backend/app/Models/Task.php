<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $guarded    = 'id';
    protected $dates      = ['created_at', 'updated_at'];

    public $incrementing = true;
}
