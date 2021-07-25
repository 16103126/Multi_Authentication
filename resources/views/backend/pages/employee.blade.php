@extends('backend.layouts.master')

@section('title', 'Employee Dashboard')

@section('content')
    
<h1 style="text-align: center">This is Employee Dashboard</h1>
<br>
<a href="{{ route('employee.logout') }}">Logout</a>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employee Dashboard') }}</div>

                <div class="panel-body">
                    @component('components.who')
                        
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div> --}}
    
@endsection