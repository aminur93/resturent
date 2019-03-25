@extends('layouts.app')

@section('title')
    Items
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
                            <h4 class="card-title ">Add new Item</h4>
                            <p class="card-category"> Website New Item Adding</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category</label>
                                            <select name="category_id" id="" class="form-control">
                                                <option value="">Chose category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <textarea name="description" class="form-control"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Price</label>
                                            <input type="text" name="price" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <br>

                                <div class="row">

                                    <div class="col-md-12">

                                        <label class="bmd-label-floating">Image</label>
                                        <input type="file" name="image">

                                    </div>

                                </div>

                                <a href="{{ route('item.index') }}" class="btn btn-danger pull-right">Back</a>
                                <button type="submit" class="btn btn-primary pull-right">Add Item</button>
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