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
                            <h4 class="card-title ">Edit Item</h4>
                            <p class="card-category"> Website Item Editing</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('item.update',$items->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category</label>
                                            <select name="category_id" id="" class="form-control">
                                                <option value="">Chose category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" @if ($category->id == $items->category_id)
                                                        selected
                                                    @endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name</label>
                                            <input type="text" name="name" value="{{ $items->name }}" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <textarea name="description" class="form-control">{{ $items->description }}</textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Price</label>
                                            <input type="text" name="price" value="{{ $items->price }}" class="form-control">
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

                                <div class="row">
                                    <div class="col-md-12">

                                        <img src="{{ asset('uploads/item/'.$items->image) }}" alt="" width="130px"><br>

                                    </div>
                                </div>

                                <a href="{{ route('item.index') }}" class="btn btn-danger pull-right">Back</a>
                                <button type="submit" class="btn btn-primary pull-right">Update Item</button>
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