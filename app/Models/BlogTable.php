<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTable extends Model
{
    use HasFactory;

    // Define the table name if it's different from the model name
    protected $table = 'blog';

    // Specify the columns that can be mass-assigned
    protected $fillable = ['id', 'title', 'image'];
}
