@extends('vendor.layouts.master')
@section('title')
{{$settings->site_name}} || Shop Profile
@endsection
@section('content')
    <!--=============================
                DASHBOARD START
              ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> profile</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <h4>Basic information</h4>
                              <form action="{{route('vendor.shop-profile.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="banner">Preview</label>
                                    <br>
                                    <img width="100px" src="{{asset($profile->banner)}}" alt="">
                                </div>

                                <div class="form-group ">
                                    <label for="banner">Banner</label>
                                    <input type="file" class="form-control" name="banner">
                                </div>

                                <div class="form-group wsus__input">
                                    <label  for="shop_name">Shop Name</label>
                                    <input type="text" class="form-control" name="shop_name" value="{{ $profile->shop_name }}">
                                </div>

                                <div class="form-group wsus__input">
                                    <label  for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $profile->phone }}">
                                </div>

                                <div class="form-group wsus__input">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email"  value="{{ $profile->email }}">
                                </div>

                                <div class="form-group wsus__input">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{$profile->address}}">
                                </div>

                                <div class="form-group wsus__input">
                                    <label for="description summernote">Description</label>
                                    <textarea class="summernote" name="description" placeholder="Enter vendor description">{{ $profile->description }}</textarea>
                                </div>

                                <div class="form-group wsus__input">
                                    <label for="fb_link">Facebook Link</label>
                                    <input type="url" class="form-control" name="fb_link" placeholder="Enter Facebook profile link" value="{{ $profile->fb_link }}">
                                </div>

                                <div class="form-group wsus__input">
                                    <label for="twt_link">Twitter Link</label>
                                    <input type="url" class="form-control" name="twt_link" placeholder="Enter Twitter profile link" value="{{ $profile->twt_link }}">
                                </div>

                                <div class="form-group wsus__input">
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
        </div>
    </section>
    <!--=============================
                DASHBOARD START
              ==============================-->
@endsection
