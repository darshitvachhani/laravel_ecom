@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    {{ __('Your Profile') }}
                </div>

                <div class="card-body">

                    <div class="row">
                        <label for="firstname" class="col-md-6 col-form-label text-md-right">{{ __('Firstname :') }}</label>
                        <label for="firstname" class="col-md-4 col-form-label text-md-left">{{$profileInfo->firstname}}</label>
                    </div>

                    <div class="row">
                        <label for="firstname" class="col-md-6 col-form-label text-md-right">{{ __('Lastname :') }}</label>
                        <label for="firstname" class="col-md-4 col-form-label text-md-left">{{$profileInfo->lastname}}</label>
                    </div>

                    <div class="row">
                        <label for="firstname" class="col-md-6 col-form-label text-md-right">{{ __('Username :') }}</label>
                        <label for="firstname" class="col-md-4 col-form-label text-md-left">{{$profileInfo->username}}</label>
                    </div>

                    <div class="row">
                        <label for="firstname" class="col-md-6 col-form-label text-md-right">{{ __('Email :') }}</label>
                        <label for="firstname" class="col-md-4 col-form-label text-md-left">{{$profileInfo->email}}</label>
                    </div>

                    <div class="row">
                        <label for="firstname" class="col-md-6 col-form-label text-md-right">{{ __('Phone :') }}</label>
                        <label for="firstname" class="col-md-4 col-form-label text-md-left">{{$profileInfo->phone}}</label>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
