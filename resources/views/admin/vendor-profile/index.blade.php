@extends('admin.layouts.master')
@section('title')
{{$settings->site_name}} || Vendor Profile
@endsection
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Vendor Profile</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h3>Create Vendor</h3>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.vendor-profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="banner">Preview</label>
                                    <br>
                                    <img width="100px" src="{{asset($profile->banner)}}" alt="alt-baner-vendor">
                                </div>

                                <div class="form-group">
                                    <label for="banner">Banner</label>
                                    <input type="file" class="form-control" name="banner">
                                </div>

                                <div class="form-group">
                                    <label for="shop_name">Shop Name</label>
                                    <input type="text" class="form-control" name="shop_name"  value="{{ $profile->shop_name }}">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Enter phone number" value="{{ $profile->phone }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email address" value="{{ $profile->email }}">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address"  value={{ $profile->address }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="summernote" name="description" placeholder="Enter vendor description">{{ $profile->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="fb_link">Facebook Link</label>
                                    <input type="url" class="form-control" name="fb_link" placeholder="Enter Facebook profile link" value="{{ $profile->fb_link }}">
                                </div>

                                <div class="form-group">
                                    <label for="twt_link">Twitter Link</label>
                                    <input type="url" class="form-control" name="twt_link" placeholder="Enter Twitter profile link" value="{{ $profile->twt_link }}">
                                </div>

                                <div class="form-group">
                                    <label for="insta_link">Instagram Link</label>
                                    <input type="url" class="form-control" name="insta_link" placeholder="Enter Instagram profile link" value="{{ $profile->insta_link }}">
                                </div>

                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
