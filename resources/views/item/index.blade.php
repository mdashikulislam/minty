@extends('layouts.app')

@section('header-text')
    Master Item
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="{{route('item.create')}}" class="btn btn-danger text-right mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Item</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($items as $key=> $item)
                                <tr>
                                    <td>{{$loop->index +1 }}</td>
                                    <td class="text-center">
                                        <img style="max-width: 50px;max-height: 50px;" src="{{Storage::disk('local')->url($item->image)}}" alt="">
                                    </td>
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>
                                        {{$item->price}}
                                    </td>
                                    <td>
                                        {{\Carbon\Carbon::parse($item->created_at)->isoFormat('Do, MMMM YYYY')}}
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{route('item.edit',['id'=>$item->id])}}" class="btn btn-success btn-sm edit" ><i class="fa fa-edit"></i></a>
                                            <a href="{{route('item.delete',['id'=>$item->id])}}" class="btn btn-danger btn-sm delete" ><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">No record found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{$items->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
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
        })
    </script>
@endpush
