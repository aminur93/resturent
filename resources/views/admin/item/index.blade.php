@extends('layouts.app')

@section('title')
    Items
@stop

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    @endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('message.alert')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <a href="{{ route('item.create') }}" class="pull-right btn btn-sm btn-primary"><i class="material-icons">add</i>Add New</a>
                            <h4 class="card-title ">Items List</h4>
                            <p class="card-category"> Website All Items Information</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table"  class="table" style="width:100%">
                                    <thead class=" text-primary">
                                    <th width="5%">ID</th>
                                    <th>Image</th>
                                    <th>category Name</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/item/'.$item->image) }}" alt="" width="100px">
                                            </td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ substr($item->description,0,15) }}</td>
                                            <td>Tk {{ $item->price }}</td>
                                            <td class="text-primary">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ route('item.edit',$item->id) }}" class="btn btn-info btn-xs"><i class="material-icons">edit</i></a>
                                                <button type="button" class="btn btn-xs btn-danger"
                                                        onclick="if(confirm('Are your sure want to delete this?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $item->id }}').submit();
                                                        }else {
                                                            event.preventDefault();
                                                        }
                                                "><i class="material-icons">delete</i></button>

                                                <form id="delete-form-{{ $item->id }}" action="{{ route('item.destroy',$item->id) }}" method="post" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
    @endpush