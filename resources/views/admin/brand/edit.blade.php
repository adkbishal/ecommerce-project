
@extends('admin.layouts.master')
@section('title')
{{$settings->site_name}} || Brand
@endsection

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Brand</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h3>Update Brand</h3>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.brand.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Preview</label>
                                    <br>
                                    <img style="width:100px;" src="{{ asset($brand->logo) }}" alt="">
                                </div>

                                <div class="form-group">
                                    <label for="">Logo</label>
                                    <input type="file" class="form-control" name="logo">
                                </div>

                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $brand->name }}">
                                </div>


                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="is_featured">
                                        <option value="">Select</option>
                                        <option {{ $brand->is_featured == 1 ? 'selected' : '' }} value="1">Yes</option>
                                        <option {{ $brand->is_featured == 0 ? 'selected' : '' }} value="0">No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option {{$brand->status == 1 ? 'selected' : ''}} value="1"> Active</option>
                                        <option {{$brand->status == 0 ? 'selected' : ''}} value="0"> Inactive</option>
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
