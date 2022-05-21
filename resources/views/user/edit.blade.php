@extends('layouts.app')
@section('header-text')
    Edit User
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <form action="{{route('user.update',['id'=>$user->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                    <div class="form-group mb-3">
                        <label >Name :</label>
                        <input required type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback d-block">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label >Email :</label>
                        <input required type="text" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <div class="invalid-feedback d-block">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password (Leave empty if don't want change)</label>
                        <div class="input-group input-group-merge">
                            <input type="password"  name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                            @error('password')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{route('dashboard')}}" class="btn btn-warning text-white">Back</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
