@extends('layouts.app')

@section('title')
    Category
@stop

@push('css')
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @include('message.alert')

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Add new category</h4>
                            <p class="card-category"> Website New Category Adding</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.store') }}" method="post">
                                @csrf

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <a href="{{ route('category.index') }}" class="btn btn-danger pull-right">Back</a>
                                <button type="submit" class="btn btn-primary pull-right">Add Category</button>
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