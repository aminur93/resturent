@extends('layouts.app')

@section('title')
    Contact
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
                            <h4 class="card-title ">Contact List</h4>
                            <p class="card-category"> Website All Contact Information</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table"  class="table" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $key => $contact)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->subject }}</td>
                                            <td class="text-primary">{{ \Carbon\Carbon::parse($contact->created_at)->diffForHumans() }}</td>
                                            <td>

                                                <a href="{{ route('contact.show',$contact->id) }}" class="btn btn-info btn-xs"><i class="material-icons">details</i></a>

                                                <button type="button" class="btn btn-xs btn-danger"
                                                        onclick="if(confirm('Are your sure want to delete this?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $contact->id }}').submit();
                                                        }else {
                                                            event.preventDefault();
                                                        }
                                                "><i class="material-icons">delete</i></button>

                                                <form id="delete-form-{{ $contact->id }}" action="{{ route('contact.destroy',$contact->id) }}" method="post" style="display: none;">
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