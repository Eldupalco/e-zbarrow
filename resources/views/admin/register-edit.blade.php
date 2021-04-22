@extends('layouts.master')

@section('title')
    Registered Roles of Funda
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    Edit Role for Register Users
                </div>
                <div class="card-body">
                    {{-- get the user id pass in the form --}}
                    <form action="/role-register-update/{{$users->id}}" method="POST">

                    {{-- security token purpose --}}
                        {{ csrf_field() }}
                    {{-- method use for updating data --}}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{$users->name}}" class="form-control"> 
                        </div>

                        <div class="form-group">
                            <label>Give Role</label>
                            <select name="userType" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="student">Student</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="/register-roles" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    
@endsection