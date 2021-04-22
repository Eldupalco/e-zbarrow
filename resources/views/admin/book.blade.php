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
              <input type="text" name="author_name" class="form-control rounded-0" id="recipient-name">
            </div>

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Book Name</label>
                <input type="text" name="book_name" class="form-control rounded-0" id="recipient-name">
              </div>

              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Book Quantity</label>
                <input type="number" name="book_quantity" class="form-control rounded-0" id="recipient-name">
              </div>

            

              <div class="form-group">
                <label>Book status</label>
                <select name="book_status" class="form-control rounded-0">
                    <option value="available">Available</option>
                    <option value="not available">Not available</option>
                </select>
            </div>

        

            <div class="mb-3">
              <label for="message-text" class="col-form-label">Description</label>
              <textarea name="book_description" class="form-control rounded-0" id="message-text"></textarea>
            </div>

           
            <div class="text-right">
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
        <h4 class="card-title"> Books</h4>

       <div class="d-flex d-inline justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i></button>
        <div class="col-md-4">
          <input type="text" name="q" class="form-control rounded-0">

        </div>
       </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" >
            <thead class=" text-primary">
              <tr class="m-0">
                <th style="font-size: 16px !important;">Author Name</th>
                <th style="font-size: 16px !important;">Book Name</th>
                <th style="font-size: 16px !important;" class="text-center">Status</th>
                <th style="font-size: 16px !important;" class="text-center">Stock</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($books as $data )

                <tr>
                    <td style="font-size: 12px !important;" >{{$data->author_name}}</td>
                    <td style="font-size: 12px !important;">{{$data->book_name}}</td>
                    <td style="font-size: 12px !important;" class="text-center">{{$data->book_status}}</td>
                    <td style="font-size: 12px !important;" class="text-center">{{$data->book_quantity}}</td>

                    <td class="">
                        <div class="flex d-flex float-right">
                            <a href="{{url('edit-book/'.$data->id)}}" class="btn btn-success btn-sm"> <i class="fas fa-edit"></i></a>
                      

                        {{-- <a href="/role-delete/{{$data->id}}" class="btn btn-danger"> Delete</a> --}}
    
                        <form action="{{url('delete-book/'.$data->id)}}" method="POST" class=" ml-1">
    
                            {{-- security token purpose --}}
                            {{ csrf_field() }}
                            {{-- method use for updating data --}}
                            {{ method_field('DELETE') }}
    
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
    
                        </form>
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
  
</div>


@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection