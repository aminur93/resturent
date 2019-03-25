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
                            <h4 class="card-title ">Edit Category</h4>
                            <p class="card-category"> Website Category Editing</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.update',$category->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name</label>
                                            <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <a href="{{ route('category.index') }}" class="btn btn-danger pull-right">Back</a>
                                <button type="submit" class="btn btn-primary pull-right">Update Category</button>
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