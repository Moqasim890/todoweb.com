<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
        protected $table = 'tasks';
    use HasFactory;
 
    protected $fillable = [
        'title',
        'description',
        'is_done',
    ];
}
