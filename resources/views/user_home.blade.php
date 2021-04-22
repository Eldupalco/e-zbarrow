@extends('layouts.unknow_master')

@section('title')
    Dashboard of Funda
@endsection
@section('content')

<div class="row">
  {{-- <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Books</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table  class="table table-striped" >

            <thead class=" text-primary">
              <th>Author Name</th>
              <th>Book Name</th>
              <th>Book Discription</th>
              <th>Stock</th>
            </thead>
            <tbody>
                @foreach ($books as $data )

                <tr>
                    <td>{{$data->author_name}}</td>
                    <td>{{$data->book_name}}</td>
                    <td>{{$data->book_description}}</td>
                    <td>{{$data->book_quantity}}</td>

                    <td class="">
                        <div class="flex d-flex float-right">
                            <a href="{{url('request-book/'.$data->id)}}" class="btn btn-success btn-md m-1"> <i class="fas fa-edit"></i></a>
                        </div>
                      </td>
                    
                  </tr>

                  
                    
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
   --}}


   @foreach ( $books as $data )
   <div class="card col-md-5 m-1">
    
    <div class="card-header">
      {{$data->author_name}}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$data->book_name}}</h5>
      <p class="card-text text-justify">{{$data->book_description}}</p>
      <a href="{{url('request-book/'.$data->id)}}" class="btn btn-primary">Borrow</a>
    </div>
  </div>
   @endforeach
 
</div>
@endsection

@section('scripts')
    
@endsection