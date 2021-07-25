@extends('backend.layouts.master')

@section('title', 'Manger Dashboard')

@section('content')
    
<h1 style="text-align: center">This is Manger Dashboard</h1>
<br>
<a href="{{ route('manger.logout') }}">Logout</a>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manger Dashboard') }}</div>

                <div class="panel-body">
                    @component('components.who')
                        
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div> --}}
    
@endsection