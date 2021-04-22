@extends('layouts.master')

@section('title')
   Edit Book of Funda
@endsection


@section('content')

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Book of Funda
                </div>
                <div class="card-body">
                    <form action="{{url('update-books-requested/'.$bookRequest->id)}}" method="POST">

                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <input type="hidden" name="book_id" value="{{ $bookRequest->book->id }}" />
           
                       <div class="mb-3">
                         <label for="recipient-name" class="col-form-label">Name</label>
                         <input type="text" name="name" class="form-control rounded-0" value="{{ $bookRequest->user->name}}">
                       </div>
           
                       <div class="mb-3">
                           <label for="recipient-name" class="col-form-label">Book</label>
                           <input type="text" name="book_name" class="form-control rounded-0 " value="{{ $bookRequest->book->author_name}}">
                         </div>
            
           
                         <div class="form-group">
                           <label>Borrow status</label>
                           <select name="borrow_status" class="form-control rounded-0">
                               <option value="Pending">Pending</option>
                               <option value="Approve">Approve</option>
                               <option value="Return">Return</option>
                           </select>
                       </div>
           
                       <div class="text-right">
                           <a href="{{url('dashboard')}}" class="btn btn-secondary">Cancel</a>
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