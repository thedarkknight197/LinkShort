@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <links-component :data="{{json_encode($user)}}"></links-component>
        </div>
    </div>
</div>
@endsection
