@extends('layouts.unknow_master')

@section('title')
   Edit Book of Funda
@endsection


@section('content')

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Request Book
                </div>
                <div class="card-body">
                    <form action="/to-borrowed-book" method="POST">
                        <input type="hidden" name="book_id" value="{{ $id }}">
                        <input type="hidden" name="borrower_id" value="{{ Auth::user()->user_id }}">
                        <input type="hidden" name="borrow_status" value="Pending">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        

                        <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">Author Name</label>
                         <input type="text" name="author_name" class="form-control rounded-0" value="{{$book->author_name}}">
                        </div>
           
                       <div class="mb-3">
                           <label for="recipient-name" class="col-form-label">Book Name</label>
                           <input type="text" name="book_name" class="form-control rounded-0" value="{{$book->book_name}}">
                         </div>
           
                         <div class="mb-3">
                           <label for="recipient-name" class="col-form-label">Book Quantity</label>
                           <input type="number" name="borrow_quantity" class="form-control rounded-0">
                         </div>
           
                       
           
                         <div class="form-group">
                           <label>Book status</label>
                           <select name="book_status" class="form-control rounded-0">
                               <option value="{{$book->book_status}}">{{$book->book_status}}</option>
                           </select>
                       </div>
           
        
                      <div class="form-group">
                        <label>Return date</label>
                        <input type='date' name="return_date" class="form-control rounded-0">
                    </div>
           
                       <div class="mb-3">
                         <label for="message-text" class="col-form-label">Description</label>
                         <textarea name="book_description" class="form-control rounded-0" >{{$book->book_description}}</textarea>
                       </div>
           
                      
                       <div class="text-right">
                           <a href="{{secure_url('user_home')}}" class="btn btn-secondary">Cancel</a>
                           <button type="submit" class="btn btn-primary">Save</button>
                         </div>
           
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    
@endsection