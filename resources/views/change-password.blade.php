@extends('layouts.app')
@section('header-text')
    Change Password
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-body p-4">
                    <div class="page-title-box">
                        <h4 class="header-title">Change Password</h4>
                    </div>
                    <form action="{{route('change.password')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
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
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirm Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password"  name="password_confirmation" id="password" class="form-control " placeholder="Enter your password">
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 text-center">
                            <button class="btn btn-primary" type="submit">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
