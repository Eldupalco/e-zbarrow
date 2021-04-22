@extends('layouts.master')

@section('title')
   Edit Book of Funda
@endsection


@section('content')

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">
                    Edit Faculty of Funda
                </div>
                <div class="card-body">
                    <form action="{{url('update-faculty/'.$faculty->id)}}" method="POST">

                        {{ csrf_field() }}
                        {{method_field('PUT')}}
           
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Faculty ID</label>
                            <input type="text" name="faculty_id" class="form-control rounded-0" value="{{$faculty->faculty_id}}">
                          </div>
              
                          <div class="mb-3">
                              <label for="recipient-name" class="col-form-label r">Last Name</label>
                              <input type="text" name="last_name" class="form-control rounded-0" value="{{$faculty->last_name}}">
                            </div>
              
                            <div class="mb-3">
                              <label for="recipient-name" class="col-form-label">First Name</label>
                              <input type="text" name="first_name" class="form-control rounded-0" value="{{$faculty->first_name}}">
                            </div>
              
                            <div class="mb-3">
                              <label for="recipient-name" class="col-form-label">Middle Name</label>
                              <input type="text" name="middle_name" class="form-control rounded-0" value="{{$faculty->middle_name}}">
                            </div>
                          
              
                            <div class="form-group">
                              <label>Department</label>
                              <select name="department" class="form-control rounded-0">
                                  <option value="Information Technology">Information Technology</option>
                                  <option value="Business Administration">Business Administration</option>
                              </select>
                          </div>
           
                      
                       <div class="text-right">
                           <a href="{{url('faculty')}}" class="btn btn-secondary">Cancel</a>
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