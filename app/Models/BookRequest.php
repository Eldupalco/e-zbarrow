<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookRequest extends Model
{
    use HasFactory;
    protected $table = 'tbl_book_request';
    protected $fillable = ['book_id','borrower_id','borrow_quantity','borrow_status'];


    public function user() {
        return $this->belongsTo(User::class, 'borrower_id', 'user_id');
    }

    public function book() {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }



    
}
