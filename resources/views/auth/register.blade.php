@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('accountStudent.store') }}">
                      @csrf
  
  
                        <div class="form-group row">
                          <div class="">
                           <label for="user_id" class="col-form-label">Student ID</label>
                            <input type="text" name="user_id" class="form-control rounded-0" value="{{$student->student_id}}">
                          </div>
                        </div>
  
  
                          <div class="form-group row">
                            <div class="">
                               <label for="name" class="col-form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control rounded-0 @error('name') is-invalid @enderror" name="name" value="{{ $student->last_name }} {{$student->first_name }} {{$student->middle_name}}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
  
  
                        <div class="form-group row">
                            <div class="">
                                <label for="phone" class="col-form-label">{{ __('Phone') }}</label>
                                <input id="phone" type="text" class="form-control rounded-0 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <div class="">
                                <label for="email" class=" col-form-label">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <div class="">
                                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control rounded-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
  
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <div class="">
                                <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control rounded-0" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
  
  
                          <div class="form-group">
                            <label>User Type</label>
                            <select name="userType" class="form-control rounded-0">
                                <option value="admin">admin</option>
                                <option value="faculty">faculty</option>
                                <option value="student">student</option>
                            </select>
                        </div>
  
  
                     <div class="text-right">
                         <a href="{{secure_url('student')}}" class="btn btn-secondary">Cancel</a>
                         <button type="submit" class="btn btn-primary"> Save</button>
                       </div>
  
                   </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
