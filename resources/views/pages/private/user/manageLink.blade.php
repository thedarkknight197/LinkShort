@extends('layouts.dashboard')


@section('selection')
    <h3>Manage Links</h3>
    <add-Link-component :data="{{json_encode($user)}}"></add-Link-component>
    <manage-link-component :data="{{json_encode($user)}}"></manage-link-component>
@endsection
