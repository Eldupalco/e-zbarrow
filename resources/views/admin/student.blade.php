@extends('layouts.master')

@section('title')
    Student of Funda
@endsection


@section('content')

<div class="modal fade"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

          <form action="/save-student" method="POST">

             {{ csrf_field() }}

            <div class="row mb-3 col-md-4">
              <label for="recipient-name" class="col-form-label">Student ID</label>
              <input type="text" name="student_id" class="form-control rounded-0" id="recipient-name">
            </div>


            <div class="row">

              <div class="mb-3 col-md-4">
                <label for="recipient-name" class="col-form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control rounded-0" id="recipient-name">
              </div>

              <div class="mb-3 col-md-4">
                <label for="recipient-name" class="col-form-label">First Name</label>
                <input type="text" name="first_name" class="form-control rounded-0" id="recipient-name">
              </div>

              <div class="mb-3 col-md-4">
                <label for="recipient-name" class="col-form-label">Middle Name</label>
                <input type="text" name="middle_name" class="form-control rounded-0"  id="recipient-name">
              </div>

            </div>


              <div class="row">

                <div class="form-group col-md-4">
                  <label>Gender</label>
                  <select name="gender" class="form-control rounded-0">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                  </select>
                </div>

                <div class="form-group col-md-4">
                  <label>Department</label>
                  <select name="department" class="form-control rounded-0">
                      <option value="Information Technology">Information Technology</option>
                      <option value="Business Administration">Business Administration</option>
                  </select>

               </div>

              </div>

              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Address</label>
                <input type="text" name="address" class="form-control rounded-0" id="recipient-name">
              </div>

             <div class="row">


              <div class="mb-3  col-md-4">
                <label for="recipient-name" class="col-form-label ">Section</label>
                <input type="text" name="section" class="form-control rounded-0" id="recipient-name">
              </div>


              <div class="mb-3  col-md-4">
                <label for="recipient-name" class="col-form-label ">Year Level</label>
                <input type="text" name="year_level" class="form-control rounded-0" id="recipient-name">
              </div>

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
        <h4 class="card-title"> Student </h4>

        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i></button>

      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table  class="table table-striped" >

            <thead class="text-primary">

              <th>Student ID</th>
              <th>Last Name</th>
              <th>First Name</th>
              <th>Middle Name</th>

            </thead>
            <tbody>
                @foreach ($student as $data )

                <tr>
                  <td>{{$data->student_id}}</td>
                    <td>{{$data->last_name}}</td>
                    <td>{{$data->first_name}}</td>
                    <td>{{$data->middle_name}}</td>


                    <td class="">
                        <div class="flex d-flex float-right">
                            <a href="{{secure_url('create-account/'.$data->id)}}" class="btn btn-muted btn-md m-1"> <i class="fas fa-user-circle"></i></a>
                            <a href="{{secure_url('edit-student/'.$data->id)}}" class="btn btn-success btn-md m-1"> <i class="fas fa-edit"></i></a>


                        {{-- <a href="/role-delete/{{$data->id}}" class="btn btn-danger"> Delete</a> --}}

                        <form action="{{secure_url('delete-student/'.$data->id)}}" method="POST" class=" m-1">

                            {{-- security token purpose --}}
                            {{ csrf_field() }}
                            {{-- method use for updating data --}}
                            {{ method_field('DELETE') }}

                            <input type="hidden" name="id" value="{{$data->id}}">
                            <button type="submit" class="btn btn-danger btn-md"><i class="far fa-trash-alt"></i></button>

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
