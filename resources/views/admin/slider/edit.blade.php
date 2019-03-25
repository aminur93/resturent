@extends('layouts.app')

@section('title')
    Slider
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
                            <h4 class="card-title ">Edit slider</h4>
                            <p class="card-category"> Website Slider Editing</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('slider.update',$slider->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Title</label>
                                            <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Sub-Title</label>
                                            <input type="text" name="sub_title" value="{{ $slider->sub_title }}" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <br>

                                <div class="row">

                                    <div class="col-md-12">
                                        <label class="control-label">Image</label>
                                        <input type="file" name="image">
                                    </div>

                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">

                                        <img src="{{ asset('uploads/slider/'.$slider->image) }}" alt="" width="130px"><br>

                                    </div>
                                </div>

                                <a href="{{ route('slider.index') }}" class="btn btn-danger pull-right">Back</a>
                                <button type="submit" class="btn btn-primary pull-right">Update Slider</button>
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