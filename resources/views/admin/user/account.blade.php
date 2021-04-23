@extends('layouts.master')

@section('title')
    Book of Funda
@endsection


@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Faculty</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

        <form action="/save-faculty" method="POST">

           {{ csrf_field() }}

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Faculty ID</label>
            <input type="text" name="faculty_id" class="form-control rounded-0" id="recipient-name">
          </div>

          <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Last Name</label>
              <input type="text" name="last_name" class="form-control rounded-0" id="recipient-name">
            </div>

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">First Name</label>
              <input type="text" name="first_name" class="form-control rounded-0" id="recipient-name">
            </div>

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Middle Name</label>
              <input type="text" name="middle_name" class="form-control rounded-0" id="recipient-name">
            </div>
          

            <div class="form-group">
              <label>Department</label>
              <select name="department" class="form-control rounded-0">
                  <option value="Information Technology">Information Technology</option>
                  <option value="Business Administration">Business Administration</option>
              </select>
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
        <h4 class="card-title">Account</h4>

        <button type="button" class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i></button>

      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" >
            <thead class=" text-primary">
              <th style="font-size: 12px;" class="p-1">Name</th>
              <th style="font-size: 12px;" class="p-1">Email</th>
              <th style="font-size: 12px;" class="p-1">User Type</th>
              
            </thead>
            <tbody>
                @foreach ($users as $data )

                <tr>
                  <td style="font-size: 12px;" class="p-1">{{$data->name}}</td>
                  <td style="font-size: 12px;" class="p-1">{{$data->userType}}</td>
                  <td style="font-size: 12px;" class="p-1">{{$data->email}}</td>
                  {{-- <td>{{$data->created_at->diffForHumans()}}</td> --}}

                    <td class="">
                        <div class="flex d-flex float-right">
                            <a href="{{url('edit-book/'.$data->id)}}" class="btn btn-success btn-sm btn-icon m-1"> <i class="fas fa-edit"></i></a>
                      

                        {{-- <a href="/role-delete/{{$data->id}}" class="btn btn-danger"> Delete</a> --}}
    
                        <form action="{{url('delete-book/'.$data->id)}}" method="POST" class=" m-1">
    
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