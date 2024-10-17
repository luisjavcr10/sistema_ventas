

@extends('layout.layout')

@section('content')

    <div class="container my-4">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <div class="col-lg-8 offset-lg-2 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <div class="col-lg-8 offset-lg-2 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
