@extends('layouts.master')

@section('title')
    Registered Roles of Funda
@endsection


@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Registered Roles </h4>

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
       @endif

    {{ __('You are logged in!') }}
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>UserType</th>
            
            </thead>
            <tbody>
              @foreach ( $users as $data )    

              <tr>
               
                <td> {{ $data->name }} </td>
                <td>  {{ $data->phone }} </td>
                <td> {{ $data->email }} </td>
                <td> {{ $data->userType }} </td>
                <td >
                    <a href="/role-edit/{{$data->id}}" class="btn btn-success"> edit</a>
                </td>

                <td >

                    {{-- <a href="/role-delete/{{$data->id}}" class="btn btn-danger"> Delete</a> --}}

                    <form action="/role-delete/{{$data->id}}" method="POST">

                        {{-- security token purpose --}}
                        {{ csrf_field() }}
                        {{-- method use for updating data --}}
                        {{ method_field('DELETE') }}

                        <input type="hidden" name="id" value="{{$data->id}}">
                        <button type="submit" class="btn btn-danger">Delete</button>

                    </form>

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