@extends('layouts.dashboard')

@section('selection')
    <h3>User</h3>
    <user-profile-component :data="{{json_encode($user)}}"></user-profile-component>
@endsection
