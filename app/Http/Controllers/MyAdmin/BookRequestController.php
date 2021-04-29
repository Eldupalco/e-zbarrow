<?php

namespace App\Http\Controllers\MyAdmin;

use App\Models\Book;
use App\Models\BookRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;

class BookRequestController extends Controller {

    public function requestBook(Request $request){
        // $bookRequest = BookRequest::with(['user', 'book'])->where('borrow_status' ,'=' ,'Pending')->paginate(1);
        $bookRequestApprove = BookRequest::with(['user', 'book'])->where('borrow_status' ,'=' ,$request->input('book_status'))->paginate(1);
        // $bookRequestReturn = BookRequest::with(['user', 'book'])->where('borrow_status' ,'=' ,'Return')->get();
        // dd($bookRequest);
        return view('admin.dashboard')
        ->with('bookRequestApprove', $bookRequestApprove);
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

       public function fetchPendingBooksRequested(Request $request){
          
   
        // $bookRequest = BookRequest::with(['user', 'book'])->where('borrow_status' ,'=' ,'Pending')->paginate(1);
        $bookRequestApprove = BookRequest::with(['user', 'book'])->where('borrow_status' ,'=' ,$request->input['book_status'])->paginate(1);
        dd($bookRequestApprove);
        // $bookRequestReturn = BookRequest::with(['user', 'book'])->where('borrow_status' ,'=' ,'Return')->get();
        return view('admin.dashboard')
        ->with('bookRequestApprove', $bookRequestApprove);
       }

    //    public function fetchApproveBooksRequested(){
    //     $bookRequestApprove = BookRequest::with(['user', 'book'])->where('borrow_status' ,'=' ,'Approve' )->paginate(1);
    //     return view('admin.dashboard')
    //     ->with('bookRequestApprove', $bookRequestApprove);
    //    }

    //    public function fetchReturnBooksRequested(){
    //     // $bookRequest = BookRequest::with(['user', 'book'])->where('borrow_status' ,'=' ,'Pending')->paginate(1);
    //     $bookRequestApprove = BookRequest::with(['user', 'book'])->where('borrow_status' ,'=' ,'Return' )->paginate(1);
    //     return view('admin.dashboard')
    //     ->with('bookRequestApprove', $bookRequestApprove);
    //    }

    //    public function fetchBorrowednBooksRequested(){
    //     // $bookRequest = BookRequest::with(['user', 'book'])->where('borrow_status' ,'=' ,'Pending')->paginate(1);
    //     $bookRequestApprove = BookRequest::with(['user', 'book'])->where('borrow_status' ,'=' ,'Borrowed' )->paginate(1);
    //     return view('admin.dashboard')
    //     ->with('bookRequestApprove', $bookRequestApprove);
    //    }
       
    

}
