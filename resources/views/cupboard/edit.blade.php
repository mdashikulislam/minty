@extends('layouts.app')
@section('header-text')
    Edit Cupboard
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="{{route('cupboard.index')}}" class="btn btn-success text-right mb-2"><i class="fa fa-list"></i> Cupboard List</a>
                        </div>
                    </div>
                    <form enctype="multipart/form-data" action="{{route('cupboard.update',['id'=>$cupboard->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" >Select User</label>
                                <select name="user_id" id="" class="form-control @error('user_id')  is-invalid @enderror">
                                    <option value="">Select User</option>
                                    @forelse($users as $user)
                                        <option {{$user->id == $cupboard->user_id ? 'selected':''}} value="{{$user->id}}">{{$user->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('user_id')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label" >Select Master Item</label>
                                <select name="master_item_id" id="" class="form-control @error('master_item_id')  is-invalid @enderror">
                                    <option value="">Select Master Item</option>
                                    @forelse($items as $item)
                                        <option {{$item->id == $cupboard->master_item_id ? 'selected':''}} value="{{$item->id}}">{{$item->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('master_item_id')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" >Purchase Total</label>
                                <input name="purchase_total" type="number" step="any" value="{{old('purchase_total') ? :$cupboard->purchase_total}}" class="form-control @error('price') is-invalid @enderror"  placeholder="Purchase Total"  required>
                                @error('purchase_total')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label" >In Use</label>
                                <input name="in_use_count" type="number" step="any" value="{{old('in_use_count') ? :$cupboard->in_use_count}}" class="form-control @error('price') is-invalid @enderror"  placeholder="In Use"  required>
                                @error('in_use_count')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
