@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                    <button onclick="window.location='{{route("user")}}'" type="button">User page</button>
                    @if(Auth::user()->hasRole('admin'))
                    <button onclick="window.location='{{route("admin")}}'" type="button">Admin page</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection