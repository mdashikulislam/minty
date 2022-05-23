@extends('layouts.app')
@section('header-text')
    Dashboard
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col-sm-6 col-lg-3">
            <div class="card shadow-none m-0">
                <div class="card-body text-center">
                    <i class="dripicons-briefcase text-muted" style="font-size: 24px;"></i>
                    <h3><span>{{\App\Models\Shop::count()}}</span></h3>
                    <p class="text-muted font-15 mb-0">Total Shop</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card shadow-none m-0 border-start">
                <div class="card-body text-center">
                    <i class="dripicons-checklist text-muted" style="font-size: 24px;"></i>
                    <h3><span>{{\App\Models\ShopItem::count()}}</span></h3>
                    <p class="text-muted font-15 mb-0">Shop Item</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card shadow-none m-0 border-start">
                <div class="card-body text-center">
                    <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                    <h3><span>{{\App\Models\MasterItem::count()}}</span></h3>
                    <p class="text-muted font-15 mb-0">Total Master Item</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card shadow-none m-0 border-start">
                <div class="card-body text-center">
                    <i class="dripicons-graph-line text-muted" style="font-size: 24px;"></i>
                    <h3><span>{{\App\Models\Cupboard::count()}}</span></h3>
                    <p class="text-muted font-15 mb-0">Total Cupboard</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6 col-lg-3">
            <div class="card shadow-none m-0">
                <div class="card-body text-center">
                    <i class="dripicons-briefcase text-muted" style="font-size: 24px;"></i>
                    <h3><span>{{\App\Models\CupboardHistory::count()}}</span></h3>
                    <p class="text-muted font-15 mb-0">Total Cupboard History</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card shadow-none m-0 border-start">
                <div class="card-body text-center">
                    <i class="dripicons-checklist text-muted" style="font-size: 24px;"></i>
                    <h3><span>{{\App\Models\User::count()}}</span></h3>
                    <p class="text-muted font-15 mb-0">Total User</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('script')

    <script>
        $(document).ready(function (){

        })
    </script>
@endpush
