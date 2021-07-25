@extends('auth.layouts.master')

@section('title', 'Manger Login')

@section('content')

<div class="container">
    <div class="row" style="margin-top: 45px; margin-left: 300px;">
        <div class="col-md-6 col-md-offset-4">
            <h4>Manger Login</h4><hr>
            <form action="{{ route('manger.login.submit') }}" method="post">

                @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
                @endif
                
                @csrf
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Enter eamil address" value="{{ old('email') }}">
                  <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name='password' placeholder="Enter password">
                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                </div>

                <button type="submit" class="btn btn-block btn-primary">Sign in</button>
                <br>
                <a href="{{ route('manger.registration') }}">I do not have an account, create new</a>
            </form>
        </div>
    </div>
</div>