@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                    <h1>THIS IS ADMIN PAGE</h1>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">   
                        <a href="{{ route('admin.symptoms') }}"><button class="btn btn-primary" type="button">Add Patient</button></a>
                    </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
