@extends('auth.layouts.master')

@section('title', 'Employee Registration')

@section('content')

<div class="container">
    <div class="row" style="margin-top: 45px; margin-left: 300px;">
        <div class="col-md-6 col-md-offset-2">
            <h4>Employee Registration</h4><hr>
            <form action="{{ route('employee.registration.submit') }}" method="post">

                @if(Session::get('success'))
                <div class="alert alert-sucess">
                    {{ Session::get('success') }}
                </div>
                @endif

                @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{Sesion::get('fail')}}
                </div>
                @endif

                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{old('name')}}">
                    <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                  </div>

                <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Enter eamil address" value="{{old('email')}}">
                  <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="">Job Title</label>
                    <input type="text" name="job_title" class="form-control" placeholder="Enter job title" value="{{old('job_title')}}">
                    <span class="text-danger">@error('job_title'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name='password' placeholder="Enter password">
                    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                </div>

                <button type="submit" class="btn btn-block btn-primary">Sign in</button>
                <br>
                <a href="{{ route('employee.login') }}">I already have an account, sign in</a>
            </form>
        </div>
    </div>
</div>
    
@endsection