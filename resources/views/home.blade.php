@extends('layouts.dashboard')

@section('selection')
<div>
    <user-profile-component :data="{{json_encode($user)}}"></user-profile-component>
    {{-- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, delectus ducimus consectetur quas eligendi optio veritatis cupiditate! Earum sapiente iure sunt, quo, assumenda quam fugiat explicabo possimus suscipit aperiam quae. <br>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, delectus ducimus consectetur quas eligendi optio veritatis cupiditate! Earum sapiente iure sunt, quo, assumenda quam fugiat explicabo possimus suscipit aperiam quae. <br>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, delectus ducimus consectetur quas eligendi optio veritatis cupiditate! Earum sapiente iure sunt, quo, assumenda quam fugiat explicabo possimus suscipit aperiam quae. <br>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, delectus ducimus consectetur quas eligendi optio veritatis cupiditate! Earum sapiente iure sunt, quo, assumenda quam fugiat explicabo possimus suscipit aperiam quae. <br>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, delectus ducimus consectetur quas eligendi optio veritatis cupiditate! Earum sapiente iure sunt, quo, assumenda quam fugiat explicabo possimus suscipit aperiam quae. <br>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, delectus ducimus consectetur quas eligendi optio veritatis cupiditate! Earum sapiente iure sunt, quo, assumenda quam fugiat explicabo possimus suscipit aperiam quae. <br>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, delectus ducimus consectetur quas eligendi optio veritatis cupiditate! Earum sapiente iure sunt, quo, assumenda quam fugiat explicabo possimus suscipit aperiam quae. <br>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, delectus ducimus consectetur quas eligendi optio veritatis cupiditate! Earum sapiente iure sunt, quo, assumenda quam fugiat explicabo possimus suscipit aperiam quae. <br>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, delectus ducimus consectetur quas eligendi optio veritatis cupiditate! Earum sapiente iure sunt, quo, assumenda quam fugiat explicabo possimus suscipit aperiam quae. <br>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, delectus ducimus consectetur quas eligendi optio veritatis cupiditate! Earum sapiente iure sunt, quo, assumenda quam fugiat explicabo possimus suscipit aperiam quae. <br>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, delectus ducimus consectetur quas eligendi optio veritatis cupiditate! Earum sapiente iure sunt, quo, assumenda quam fugiat explicabo possimus suscipit aperiam quae. <br>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, delectus ducimus consectetur quas eligendi optio veritatis cupiditate! Earum sapiente iure sunt, quo, assumenda quam fugiat explicabo possimus suscipit aperiam quae. <br>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, delectus ducimus consectetur quas eligendi optio veritatis cupiditate! Earum sapiente iure sunt, quo, assumenda quam fugiat explicabo possimus suscipit aperiam quae. <br>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, delectus ducimus consectetur quas eligendi optio veritatis cupiditate! Earum sapiente iure sunt, quo, assumenda quam fugiat explicabo possimus suscipit aperiam quae. <br>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, delectus ducimus consectetur quas eligendi optio veritatis cupiditate! Earum sapiente iure sunt, quo, assumenda quam fugiat explicabo possimus suscipit aperiam quae. <br>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, delectus ducimus consectetur quas eligendi optio veritatis cupiditate! Earum sapiente iure sunt, quo, assumenda quam fugiat explicabo possimus suscipit aperiam quae. <br>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, delectus ducimus consectetur quas eligendi optio veritatis cupiditate! Earum sapiente iure sunt, quo, assumenda quam fugiat explicabo possimus suscipit aperiam quae. <br> --}}
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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
</div> --}}
@endsection
