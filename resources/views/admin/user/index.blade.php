@extends('layouts.master')

@section('title')
    Book of Funda
@endsection


@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Book</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

          <form action="/save-book" method="POST">

             {{ csrf_field() }}

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Author Name</label>
              <input type="text" name="author_name" class="form-control" id="recipient-name">
            </div>

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Book Name</label>
                <input type="text" name="book_name" class="form-control" id="recipient-name">
              </div>

        

            <div class="mb-3">
              <label for="message-text" class="col-form-label">Description</label>
              <textarea name="book_description" class="form-control" id="message-text"></textarea>
            </div>

           
            <div class="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>

          </form>

        </div>
      </div>
    </div>
  </div>


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Users Table</h4>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button>

      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>#</th>
              <th>Name</th>
              <th>User Type</th>
              <th>Added</th>
              <th>Options</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->userType}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>
                      <a href="" class="btn btn-sm btn-info">Edit</a>
                      <a href="" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
</div>


@endsection

@section('scripts')
    
@endsection