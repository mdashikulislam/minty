@extends('layouts.app')

@section('header-text')
    Shops
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="{{route('shop.create')}}" class="btn btn-danger text-right mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Shop</a>
                        </div>
                    </div>
                    <div>
                        <table id="basic-datatable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Shop Name</th>
                                <th>Address</th>
                                <th>Post Code</th>
                                <th>Contact Name</th>
                                <th>Contact Number</th>
                                <th>Contact Email</th>
                                <th>QR Code Out/Use</th>
                                <th>QR Code In/Return</th>
                                <th>Shop Only</th>
                                <th>Lat</th>
                                <th>Lang</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($shops as $key=> $shop)
                                <tr>
                                    <td>{{$loop->index +1 }}</td>
                                    <td>
                                        {{$shop->name}}
                                    </td>
                                    <td>
                                        {{$shop->address}}
                                    </td>
                                    <td>
                                        {{$shop->postcode}}
                                    </td>
                                    <td>
                                        {{$shop->contact_name}}
                                    </td>
                                    <td>
                                        {{$shop->contact_number}}
                                    </td>
                                    <td>
                                        {{$shop->contact_email}}
                                    </td>
                                    <td>
                                        {{$shop->qrcode_out}}
                                    </td>
                                    <td>
                                        {{$shop->qrcode_in}}
                                    </td>
                                    <td>
                                        {{$shop->shop_only ==1 ? 'Yes':'No'}}
                                    </td>

                                    <td>
                                        {{$shop->lat}}
                                    </td>
                                    <td>
                                        {{$shop->long}}
                                    </td>
                                    <td>
                                        {{\Carbon\Carbon::parse($shop->created_at)->isoFormat('Do, MMMM YYYY')}}
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{route('shop.edit',['id'=>$shop->id])}}" class="btn btn-success btn-sm edit" ><i class="fa fa-edit"></i></a>
                                            <a href="{{route('shop.delete',['id'=>$shop->id])}}" class="btn btn-danger btn-sm delete" ><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link href="{{asset('assets/css/vendor/dataTables.bootstrap5.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/vendor/responsive.bootstrap5.css')}}" rel="stylesheet" type="text/css" />
@endpush
@push('script')
    <script src="{{asset('assets/js/jquery-3.6.0.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/js/vendor/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/responsive.bootstrap5.min.js')}}"></script>

    <script>
        $(document).ready(function (){
            $(document).on('click','.delete',function (e){
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = $(this).attr('href');
                    }
                });
            });
            $('#basic-datatable').dataTable({
                "ordering": false
            });
        })
    </script>
@endpush
