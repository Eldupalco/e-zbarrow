<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'tbl_faculty';
    protected $fillable = ['faculty_id','last_name','first_name','middle_name','dapartment'];

}
