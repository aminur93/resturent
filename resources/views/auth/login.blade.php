@extends('layouts.app')

@section('title')
    Login
@stop

@push('css')
    <style>
        html{
            overflow: hidden;
        }
    </style>
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-1">

                    @include('message.alert')

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Login</h4>
                            <p class="card-category"> Website Admin Login</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="post">
                                @csrf

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Password</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                    </div>

                                </div>

                                <a href="{{ route('welcome') }}" class="btn btn-danger pull-right">Back</a>
                                <button type="submit" class="btn btn-primary pull-right">Login</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
@endpush