@extends('layouts.app')
@section('header-text')
    Edit Shop Item
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="{{route('shop.item.index')}}" class="btn btn-success text-right mb-2"><i class="fa fa-list"></i> Shop Item List</a>
                        </div>
                    </div>
                    <form enctype="multipart/form-data" action="{{route('shop.item.update',['id'=>$shopItem->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" >Select Shop</label>
                            <select name="shop_id" id="" class="form-control @error('shop_id')  is-invalid @enderror">
                                <option value="">Select Shop</option>
                                @forelse($shops as $shop)
                                    <option {{$shopItem->shop_id == $shop->id ? 'selected':''}} value="{{$shop->id}}">{{$shop->name}}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('shop_id')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" >Select Master Item</label>
                            <select name="master_item_id" id="" class="form-control @error('master_item_id')  is-invalid @enderror">
                                <option value="">Select Master Item</option>
                                @forelse($items as $item)
                                    <option {{$shopItem->master_item_id == $item->id ? 'selected':''}} value="{{$item->id}}">{{$item->name}}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('master_item_id')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" >Display Shop</label>
                            <select name="display_shop"  class="form-control @error('display_shop') is-invalid @enderror">
                                <option {{$shopItem->display_shop == 1 ?'selected':'' }} value="1">Yes</option>
                                <option {{$shopItem->display_shop === 0 ?'selected':'' }} value="0">No</option>
                            </select>
                            @error('display_shop')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                            @enderror
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
