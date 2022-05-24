@extends('layouts.app')
@section('header-text')
    Create Shop
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="{{route('shop.index')}}" class="btn btn-success text-right mb-2"><i class="fa fa-list"></i> Shop List</a>
                        </div>
                    </div>
                    <form enctype="multipart/form-data" action="{{route('shop.store')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" >Name</label>
                                <input name="name" type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror"  placeholder="First name"  required>
                                @error('name')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label" >Address</label>
                                <input name="address" type="text" value="{{old('address')}}" class="form-control @error('address') is-invalid @enderror"  placeholder="Address"  required>
                                @error('address')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" >Post code</label>
                                <input name="postcode" type="text" value="{{old('postcode')}}" class="form-control @error('postcode') is-invalid @enderror"  placeholder="Post code"  required>
                                @error('postcode')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label" >Contact name</label>
                                <input name="contact_name" type="text" value="{{old('contact_name')}}" class="form-control @error('contact_name') is-invalid @enderror"  placeholder="Contact Name"  required>
                                @error('contact_name')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" >Contact number</label>
                                <input name="contact_number" type="tel" value="{{old('contact_number')}}" class="form-control @error('contact_number') is-invalid @enderror"  placeholder="Contact number"  required>
                                @error('contact_number')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label" >Contact email</label>
                                <input name="contact_email" type="email" value="{{old('contact_email')}}" class="form-control @error('contact_email') is-invalid @enderror"  placeholder="Contact email"  required>
                                @error('contact_email')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" >QR Code Out/Use</label>
                                <input name="qrcode_out" type="text" value="{{old('qrcode_out')}}" class="form-control @error('qrcode_out') is-invalid @enderror"  placeholder="QR Code Out/Use"  required>
                                @error('qrcode_out')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label" >QR Code In/Return</label>
                                <input name="qrcode_in" type="text" value="{{old('qrcode_in')}}" class="form-control @error('qrcode_in') is-invalid @enderror"  placeholder="QR Code In/Return"  required>
                                @error('qrcode_in')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" >Lat</label>
                                <input name="lat" type="text" value="{{old('lat')}}" class="form-control @error('lat') is-invalid @enderror"  placeholder="Lat"  required>
                                @error('lat')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label" >Long</label>
                                <input name="long" type="text" value="{{old('long')}}" class="form-control @error('long') is-invalid @enderror"  placeholder="Long"  required>
                                @error('long')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label" >Shop Only</label>
                                <select name="shop_only"  class="form-control @error('shop_only') is-invalid @enderror">
                                    <option {{old('shop_only') == 1 ?'selected':'' }} value="1">Yes</option>
                                    <option {{old('shop_only') == 0 ?'selected':'' }} value="0">No</option>
                                </select>
                                @error('shop_only')
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
