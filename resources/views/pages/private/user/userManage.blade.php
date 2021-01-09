@extends('layouts.dashboard')

@section('selection')
    <h3>User</h3>
    <user-profile-component link="{{env('APP_URL')}}" :data="{{json_encode($user)}}"></user-profile-component>
@endsection
