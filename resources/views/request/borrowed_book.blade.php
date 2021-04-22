@extends('layouts.unknow_master')

@section('title')
    Dashboard of Funda
@endsection
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Borrowed Book</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-sm mb-0">
            <thead class="text-primary">
             
              <th>Book</th>
              <th>Description</th>
              <th>Quantity</th>
              <th>Status</th>
            </thead>
            <tbody>

              @foreach ($bookRequest as $data)
              <tr>
                
                <td> {{ $data->book->author_name }}</td>
                <td> {{ $data->book->book_description}}</td>
                <td> {{ $data->borrow_quantity }}</td>
                <td> {{ $data->borrow_status }}</td>

               
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