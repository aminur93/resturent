@extends('layouts.app')

@section('title')
    DashBoard
@stop

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    @endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">content_copy</i>
                            </div>
                            <p class="card-category">Category / Item</p>
                            <h3 class="card-title">{{ $categoryCount }} / {{ $itemCount }}
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-info">info</i>
                                <a href="{{ route('category.index') }}">Get More Space...</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">slideshow</i>
                            </div>
                            <p class="card-category">Slider Count</p>
                            <h3 class="card-title">{{ $sliderCount }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-info">info</i>
                                <a href="{{ route('slider.index') }}">Get More Space...</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <p class="card-category">Reservation</p>
                            <h3 class="card-title">{{ $reservations->count() }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-info">info</i>
                                <a href="{{ route('reserve.index') }}">Not Confirm Reservation</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fa fa-twitter"></i>
                            </div>
                            <p class="card-category">Contact</p>
                            <h3 class="card-title">{{ $contactCount }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-info">info</i>
                                <a href="{{ route('contact.index') }}">Get more details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($reservations as $key => $reservation)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $reservation->name }}</td>
                                            <td>{{ $reservation->phone }}</td>
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