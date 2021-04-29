@extends('layouts.master')

@section('title')
    Dashboard of Funda
@endsection
@section('content')

 
<div class="row">
  <div class="card">
    <div class="card-header">
       <h5 class="card-title">Book Information Status</h4> 

        <div class="form-group col-md-6" >
          {{ csrf_field() }}

          <label>Filter Book Status</label>
          <select name="book_status" id="my_selection" class="form-control rounded-0">
              <option value="Approve" href="/fetch-pending-requested".$>Approve</option>
              <option value="Borrowed" href="/fetch-pending-requested">Borrowed</option>
              <option value="Pending" href="/fetch-pending-requested">Pending</option>
              <option value="Return" href="/fetch-pending-requested">Return</option>
              
          </select>
      </div>

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-sm mb-0">
          <thead class="text-primary">
            <th style="font-size: 12px !important;">Name</th>
            <th style="font-size: 12px !important;">Book</th>
            <th style="font-size: 12px !important;" class="text-center">N#</th>
            <th style="font-size: 12px !important;" >Return Date</th>
            <th style="font-size: 12px !important;">Status</th>
          </thead>
          <tbody>

            @foreach ( $bookRequestApprove as $data)
            <tr>

              <td style="font-size: 12px !important;"> {{ $data->user->name}}</td>
              <td style="font-size: 12px !important;"> {{ $data->book->author_name }}</td>
              <td style="font-size: 12px !important;" class="text-center"> {{ $data->borrow_quantity }}</td>
              <td style="font-size: 12px !important;"> {{ $data->return_date }}</td>
              <td style="font-size: 12px !important;"> {{ $data->borrow_status }}</td>

              <td class="">
                <div class="flex d-flex justify-content-end">

                  <form action="{{ secure_url('return-books-requested/'.$data->id) }}" method="POST" class=" m-1">

                      {{ csrf_field() }}

                      {{method_field('PUT')}}

                    <input type="hidden" name="id" value="{{$data->id}}">
                    <input type="hidden" name="borrow_status" value="Return">
                    <button type="submit" class="btn btn-primary btn-icon btn-sm"><i class="fa fa-id-card"></i></button>

                  </form>


                    <a href="{{ secure_url('request-books-update/'.$data->id) }}" class="btn btn-success btn-icon btn-sm m-1"> <i class="fas fa-edit"></i></a>


                {{-- <a href="/role-delete/{{$data->id}}" class="btn btn-danger"> Delete</a> --}}

                  <form action="{{secure_url('delete-book/'.$data->id)}}" method="POST" class=" m-1">

                    {{-- security token purpose --}}
                    {{ csrf_field() }}
                    {{-- method use for updating data --}}
                    {{ method_field('DELETE') }}

                    <input type="hidden" name="id" value="{{$data->id}}">
                    <button type="submit" class="btn btn-danger btn-sm btn-icon"><i class="far fa-trash-alt"></i></button>

                  </form>

                </div>
              </td>

            </tr>
            @endforeach

          </tbody>
        </table>
       
      </div>
      {{$bookRequestApprove->links()}}
    </div>
  </div>
</div>


@endsection

@section('scripts')
  <script>
      document.getElementById('my_selection').onchange = function() {
      window.location.href = this.children[this.selectedIndex].getAttribute('href');
    }
  </script>
@endsection
