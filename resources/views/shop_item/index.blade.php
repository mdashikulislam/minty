@extends('layouts.app')
@section('header-text')
    Shop Items
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="{{route('shop.item.create')}}" class="btn btn-danger text-right mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Shop Item</a>
                        </div>
                    </div>
                    <div>
                        <table id="basic-datatable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Shop Name</th>
                                <th>Master Item Name</th>
                                <th>Display Shop</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($items as $key=> $item)
                                <tr>
                                    <td>{{$loop->index +1 }}</td>
                                    <td>
                                        {{@$item->shops->name}}
                                    </td>
                                    <td>
                                        {{@$item->masterItems->name}}
                                    </td>
                                    <td>
                                        {{$item->display_shop ==1 ? 'Yes':'No'}}
                                    </td>
                                    <td>
                                        {{\Carbon\Carbon::parse($item->created_at)->isoFormat('Do, MMMM YYYY')}}
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{route('shop.item.edit',['id'=>$item->id])}}" class="btn btn-success btn-sm edit" ><i class="fa fa-edit"></i></a>
                                            <a href="{{route('shop.item.delete',['id'=>$item->id])}}" class="btn btn-danger btn-sm delete" ><i class="fa fa-trash"></i></a>
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
