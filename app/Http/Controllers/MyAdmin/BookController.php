<?php

namespace App\Http\Controllers\MyAdmin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
   public function indexBook(){
       $books = Book::all();
       return view('admin.book')->with('books',$books);
   }

   public function saveBook(Request $request){

    $books =new Book();
    $books->author_name = $request->input('author_name');
    $books->book_name = $request->input('book_name');
    $books->book_quantity = $request->input('book_quantity');
    $books->book_status = $request->input('book_status');
    $books->book_description = $request->input('book_description');

    $books->save();
    return redirect('/book');

   }


   public function editBook($id){

    $book = Book::findOrFail($id);
    return view('admin.books.edit_book')->with('book',$book);

   }

   public function updateBook(Request $request, $id){

    $books = Book::findOrFail($id);
    $books->author_name = $request->input('author_name');
    $books->book_name = $request->input('book_name');
    $books->book_quantity = $request->input('book_quantity');
    $books->book_status = $request->input('book_status');
    $books->book_description = $request->input('book_description');

    $books->update();
    return redirect('book');

   }

   public function deleteBook($id){

    $book = Book::findOrFail($id);
    $book->delete();
 
    return redirect('book');

   }

}
