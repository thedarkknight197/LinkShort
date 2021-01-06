@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Dashboard</h1><hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            @include('includes.dashboard.leftBar')
        </div>
        <div class="col-sm-9">
            @yield('selection')
        </div>
    </div>
</div>
@endsection
