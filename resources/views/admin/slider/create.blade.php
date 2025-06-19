
@extends('admin.layouts.master')
@section('title')
{{$settings->site_name}} || Slider
@endsection

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h3>Create Slider</h3>
                        </div>
                        <div class="card-body">

                            <form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Banner</label>
                                    <input type="file" class="form-control" name="banner">
                                </div>

                                <div class="form-group">
                                    <label for="">Type</label>
                                    <input type="text" class="form-control" name="type" value="{{old('type')}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Starting Price</label>
                                    <input type="text" class="form-control" name="starting_price" value="{{old('starting_price')}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Button Url</label>
                                    <input type="text" class="form-control" name="btn_url" value="{{old('btn_url')}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Serial</label>
                                    <input type="text" class="form-control" name="serial" value="{{old('serial')}}">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1"> Active</option>
                                        <option value="0"> Inactive</option>
                                    </select>
                                </div>



                                <button class="btn btn-primary" type="submit">Create</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        </div>
    @endsection
