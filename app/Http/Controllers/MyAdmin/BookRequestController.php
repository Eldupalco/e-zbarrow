<?php

namespace App\Http\Controllers\MyAdmin;

use App\Models\Book;
use App\Models\BookRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookRequestController extends Controller {

    public function requestBook(){
        $bookRequest = BookRequest::with(['user', 'book'])->get();
        // dd($bookRequest);
        return view('admin.dashboard')->with('bookRequest', $bookRequest);
    }

    public function requestBookUpdate($id){
      
        $bookRequest = BookRequest::with(['user', 'book'])->where('id', '=', (int)$id)->first();
        return view('admin.books.request_book_update')->with('bookRequest', $bookRequest);
    }

    public function requestBookUpdated(Request $request, $id){

        $books = BookRequest::findOrFail($id);
        $books->borrow_status = $request->input('borrow_status');
    
        $bs = Book::where('id', '=', $books->book_id)->first();
        
        $bs->book_quantity = $bs->book_quantity - $books->borrow_quantity;
        $bs->update();

        $books->update();
        return redirect('dashboard');
    
       }


       public function requestBookReturn(Request $request, $id){

        $books = BookRequest::findOrFail($id);
        $books->borrow_status = $request->input('borrow_status');
    
        $bs = Book::where('id', '=', $books->book_id)->first();
        
        $bs->book_quantity = $bs->book_quantity + $books->borrow_quantity;
        $bs->update();

        $books->update();
        return redirect('dashboard');
    
       }
    

}
