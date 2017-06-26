<?php

namespace Lthaihv\Book2CRUD\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author'];
}
