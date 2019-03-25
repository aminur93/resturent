@extends('layouts.app')

@section('title')
    Reservation
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
                            <h4 class="card-title ">Reservation List</h4>
                            <p class="card-category"> Website All Reservation Information</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table"  class="table" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($reservations as $key => $reservation)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $reservation->name }}</td>
                                            <td>{{ $reservation->email }}</td>
                                            <td>{{ $reservation->phone }}</td>
                                            <td class="text-primary">{{ $reservation->date_time }}</td>
                                            <td>
                                                @if ($reservation->status == true)
                                                    <span class="badge badge-success">Confirm</span>
                                                    @else
                                                    <span class="badge badge-danger">Not Confirm Yet</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($reservation->status == false)

                                                    <button type="button" class="btn btn-xs btn-info"
                                                            onclick="if(confirm('Are you verify this request by phone')){
                                                                    event.preventDefault();
                                                                    document.getElementById('status-form-{{ $reservation->id }}').submit();
                                                                    }else {
                                                                    event.preventDefault();
                                                                    }
                                                                    "><i class="material-icons">done</i></button>

                                                    <form id="status-form-{{ $reservation->id }}" action="{{ route('reserve.status',$reservation->id) }}" method="post" style="display: none;">
                                                        @csrf
                                                    </form>

                                                @endif
                                                    <button type="button" class="btn btn-xs btn-danger"
                                                            onclick="if(confirm('Are your sure want to delete this?')){
                                                                    event.preventDefault();
                                                                    document.getElementById('delete-form-{{ $reservation->id }}').submit();
                                                                    }else {
                                                                    event.preventDefault();
                                                                    }
                                                                    "><i class="material-icons">delete</i></button>

                                                    <form id="delete-form-{{ $reservation->id }}" action="{{ route('reserve.destroy',$reservation->id) }}" method="post" style="display: none;">
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