<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
     protected $fillable = [
         'title',
         'description',
         'status',
         'create_date',
         'due_date'
     ];
     protected $hidden = [
         'created_at',
         'updated_at'
     ];
    protected $casts = [
        'create_date' => 'date',
        'due_date' => 'date',
    ];
}
