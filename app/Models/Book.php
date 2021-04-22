<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'tbl_book';
    protected $fillable = ['author_name','book_name','book_quantity','book_description'];

}
