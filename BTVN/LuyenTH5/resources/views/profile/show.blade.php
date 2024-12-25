@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12 text-white ">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">{{ $user->name }}'s Profile</h4>
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        @if($user->avatar)
                            <img src="{{ Storage::url($user->avatar) }}" 
                                alt="Avatar" 
                                class="img-thumbnail rounded-circle shadow-sm" 
                                style="width: 150px; height: 150px;">
                        @else
                            <div class="d-inline-block bg-light text-muted rounded-circle shadow-sm" 
                                 style="width: 150px; height: 150px; line-height: 150px; font-size: 24px;">
                                <i class="fas fa-user"></i>
                            </div>
                        @endif
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Name:</strong> {{ $user->name }}
                        </li>
                        <li class="list-group-item">
                            <strong>Email:</strong> {{ $user->email }}
                        </li>
                        <li class="list-group-item">
                            <strong>Bio:</strong> {{ $user->bio }}
                        </li>
                    </ul>
                </div>

                <div class="card-footer text-center bg-light">
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
