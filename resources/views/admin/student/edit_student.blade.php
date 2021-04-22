@extends('layouts.master')

@section('title')
   Edit Book of Funda
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Student of Funda
                </div>
                <div class="card-body">
                    <form action="{{url('update-student/'.$student->id)}}" method="POST">

                        {{ csrf_field() }}
                        {{method_field('PUT')}}
           
                        <div class="row mb-3 col-md-4">
                            <label for="recipient-name" class="col-form-label">Student ID</label>
                            <input type="text" name="student_id" class="form-control rounded-0" value="{{$student->student_id}}">
                          </div>
              
              
                          <div class="row">
              
                            <div class="mb-3 col-md-4">
                              <label for="recipient-name" class="col-form-label">Last Name</label>
                              <input type="text" name="last_name" class="form-control rounded-0" value="{{$student->last_name}}">
                            </div>
              
                            <div class="mb-3 col-md-4">
                              <label for="recipient-name" class="col-form-label">First Name</label>
                              <input type="text" name="first_name" class="form-control rounded-0" value="{{$student->first_name}}">
                            </div>
              
                            <div class="mb-3 col-md-4">
                              <label for="recipient-name" class="col-form-label">Middle Name</label>
                              <input type="text" name="middle_name" class="form-control rounded-0"  value="{{$student->middle_name}}">
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
                              <input type="text" name="address" class="form-control rounded-0" value="{{$student->address}}">
                            </div>

                            <div class="row">

               
                                <div class="mb-3  col-md-4">
                                  <label for="recipient-name" class="col-form-label ">Section</label>
                                  <input type="text" name="section" class="form-control rounded-0" value="{{$student->section}}">
                                </div>
                  
                  
                                <div class="mb-3  col-md-4">
                                  <label for="recipient-name" class="col-form-label ">Year Level</label>
                                  <input type="text" name="year_level" class="form-control rounded-0" value="{{$student->section}}">
                                </div>
                  
                                </div>
              
                           <div class="row">
                      
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