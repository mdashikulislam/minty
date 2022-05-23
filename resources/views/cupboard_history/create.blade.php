@extends('layouts.app')
@section('header-text')
    Create Cupboard History
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="{{route('cupboard.history.index')}}" class="btn btn-success text-right mb-2"><i class="fa fa-list"></i> Cupboard List</a>
                        </div>
                    </div>
                    <form enctype="multipart/form-data" action="{{route('cupboard.history.store')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" >Select User</label>
                                <select name="user_id"  class="form-control @error('user_id')  is-invalid @enderror">
                                    <option value="">Select User</option>
                                    @forelse($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('user_id')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label" >Select Cupboard</label>
                                <select name="cupboard_id" id="" class="form-control @error('cupboard_id')  is-invalid @enderror">
                                    <option value="">Select Master Item</option>
                                    @forelse($cupboards as $cupboard)
                                        <option value="{{$cupboard->id}}">{{$cupboard->id}}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('cupboard_id')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" >Select Shop</label>
                                <select name="shop_id" id="" class="form-control @error('shop_id')  is-invalid @enderror">
                                    <option value="">Select Shop</option>
                                    @forelse($shops as $shop)
                                        <option value="{{$shop->id}}">{{$shop->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('shop_id')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label" >Which Way</label>
                                <select name="which_way" id="" class="form-control @error('which_way')  is-invalid @enderror">
                                    <option value="use">Use</option>
                                    <option value="return">Return</option>
                                </select>
                                @error('which_way')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection