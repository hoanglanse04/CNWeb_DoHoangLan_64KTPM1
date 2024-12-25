@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center font-weight-bold">
                    Edit Profile
                </div>

                <div class="card-body bg-light">
                    @if(session('success'))
                        <div class="alert alert-success text-white">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="form-group mb-3">
                            <label for="name" class="form-label font-weight-bold text-white">Name</label>
                            <input id="name" type="text" style="width: 100%;" 
                                   class="form-control w-100 @error('name') is-invalid @enderror" 
                                   name="name" value="{{ old('name', $user->name) }}" 
                                   required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label font-weight-bold text-white">Email</label>
                            <input id="email" style="width: 100%;" type="email" 
                                   class="form-control w-100 @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email', $user->email) }}" 
                                   required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Bio -->
                        <div class="form-group mb-3">
                            <label for="bio" class="form-label font-weight-bold text-white">Bio</label>
                            <textarea id="bio" style="width: 100%;" class="form-control w-100 @error('bio') is-invalid @enderror" 
                                      name="bio" rows="3">{{ old('bio', $user->bio) }}</textarea>
                            @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Avatar -->
                        <div class="text-center mb-3">
                            <!-- Hiển thị avatar hiện tại -->
                            @if($user->avatar)
                            <img src="{{ asset('storage/'.$user->avatar) }}"  alt="Avatar" 
                                     class="img-thumbnail rounded-circle" 
                                     style="width: 150px; height: 150px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/default-avatar.png') }}" alt="Default Avatar" 
                                     class="img-thumbnail rounded-circle" 
                                     style="width: 150px; height: 150px; object-fit: cover;">
                            @endif
                        </div>
                        
                        <!-- Input để thay đổi avatar -->
                        <div class="form-group mb-3">
                            <label for="avatar" class="form-label font-weight-bold text-white">Update Avatar</label>
                            <input id="avatar" style="width: 100%;" type="file" 
                                   class="form-control w-100 @error('avatar') is-invalid @enderror" 
                                   name="avatar">
                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        

                        <!-- Submit Button -->
                        <div class="form-group mb-0 text-center text-white bg-success">
                            <button type="submit" class="btn btn-primary px-4">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
