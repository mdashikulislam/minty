@extends('layouts.app')
@section('header-text')
    Create Master Item
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="{{route('item.index')}}" class="btn btn-success text-right mb-2"><i class="fa fa-list"></i> Master Item List</a>
                        </div>
                    </div>
                    <form enctype="multipart/form-data" action="{{route('item.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" >Name</label>
                            <input name="name" type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror"  placeholder="First name"  required>
                            @error('name')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" >Price</label>
                            <input name="price" type="number" step="any" value="{{old('price')}}" class="form-control @error('price') is-invalid @enderror"  placeholder="First name"  required>
                            @error('price')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" >Image</label>
                            <input name="image" type="file" step="any" class="form-control @error('image') is-invalid @enderror"  placeholder="First name"  required>
                            @error('image')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
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
