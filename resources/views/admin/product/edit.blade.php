@extends('admin.layouts.master')
@section('title')
{{$settings->site_name}} ||Product 
@endsection

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Product</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h3>Update Product</h3>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Preview</label>
                                    <br>
                                    <img src="{{ asset($product->thumb_image) }}" style="width:150px" alt="preview-img">
                                </div>

                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select class="form-control main-category" id="category" name="category">
                                                <option value="">Select</option>
                                                @foreach ($categories as $category)
                                                    <option {{ $category->id == $product->category_id ? 'selected' : '' }}
                                                        value="{{ $category->id }}">{{ $category->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sub-category">Sub Category</label>
                                            <select class="form-control sub-category" id="sub-category" name="sub_category">
                                                <option value="">Select</option>
                                                @foreach ($subCategories as $subCategory)
                                                    <option
                                                        {{ $subCategory->id == $product->sub_category_id ? 'selected' : '' }}
                                                        value="{{ $subCategory->id }}">{{ $subCategory->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="child-category">Child Category</label>
                                            <select class="form-control child-category" id="child-category"
                                                name="child_category">
                                                <option value="">Select</option>
                                                @foreach ($childCategories as $childCategory)
                                                    <option
                                                        {{ $childCategory->id == $product->child_category_id ? 'selected' : '' }}
                                                        value="{{ $childCategory->id }}">{{ $childCategory->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <select class="form-control" id="brand" name="brand">
                                        <option value="">Select</option>

                                        @foreach ($brands as $brand)
                                            <option {{ $brand->id == $product->brand_id ? 'selected' : '' }}
                                                value="{{ $brand->id }}">{{ $brand->name }} </option>
                                        @endforeach

                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="sku">SKU</label>
                                    <input type="text" class="form-control" id="sku" name="sku"
                                        value="{{ $product->sku }}">
                                </div>

                                <div class="form-group">
                                    <label for="sku">Price</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        value="{{ $product->price }}">
                                </div>

                                <div class="form-group">
                                    <label for="sku">Offer Price</label>
                                    <input type="text" class="form-control" id="offer_price" name="offer_price"
                                        value="{{ $product->offer_price }}">
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sku">Offer Start Date</label>
                                            <input type="text" class="form-control datepicker" id="offer_start_date"
                                                name="offer_start_date" value="{{ $product->offer_start_date }}">
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="sku">Offer End Date</label>
                                            <input type="text" class="form-control datepicker" id="offer_end_date"
                                                name="offer_end_date" value="{{ $product->offer_end_date }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Stock Quantity</label>
                                    <input type="number" min="0" class="form-control" name="qty"
                                        value="{{ $product->qty }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Video Link</label>
                                    <input type="text" min="0" class="form-control" name="video_link"
                                        value="{{ $product->video_link }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Short Description</label>
                                    <textarea class="form-control " id="short_description" name="short_description">{!! $product->short_description !!}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="long_description">Long Description</label>
                                    <textarea class="form-control summernote" id="long_description" name="long_description">{!! $product->long_description !!}</textarea>
                                </div>


                                <div class="form-group">
                                    <label for="is_top">Product Type</label>
                                    <select class="form-control" id="is_top" name="product_type">
                                        <option value="0">Select</option>
                                        <option {{ $product->product_type == 'featured_product' ? 'selected' : '' }}
                                            value="featured_product">Featured</option>
                                        <option {{ $product->product_type == 'top_product' ? 'selected' : '' }}
                                            value="top_product">Top Product</option>
                                        <option {{ $product->product_type == 'best_product' ? 'selected' : '' }}
                                            value="best_product">Best Product</option>
                                        <option {{ $product->product_type == 'new_arrival' ? 'selected' : '' }}
                                            value="new_arrival">New Arrival</option>

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="seo_title">SEO Title</label>
                                    <input type="text" class="form-control" id="seo_title" name="seo_title"
                                        value="{{ $product->seo_title }}">
                                </div>

                                <div class="form-group">
                                    <label for="seo_description">SEO Description</label>
                                    <input type="text" class="form-control" id="seo_description"
                                        name="seo_description" value="{{ $product->seo_description }}">
                                </div>


                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option {{$product->status == 1 ? 'selected' : ''}} value="1"> Active</option>
                                        <option {{$product->status == 0 ? 'selected' : ''}} value="0"> Inactive</option>
                                    </select>
                                </div>


                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        </div>
    @endsection

    @push('scripts')
        <script>
            $(document).ready(function() {

                // Main Category Change
                $('body').on('change', '.main-category', function(event) {
                      $('.child-category').html('<option value="">Select</option>');
                    let id = $(this).val();
                    $.ajax({
                        method: 'GET',
                        url: "{{ route('admin.product.get-subcategories') }}",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            console.log(data);
                            $('.sub-category').html('<option value="">Select</option>');
                            $.each(data, function(i, item) {
                                $('.sub-category').append(
                                    `<option value="${item.id}">${item.name}</option>`
                                );
                            });
                        },
                        error(xhr, status, error) {
                            console.log(error);
                        }
                    });
                });

                // Sub Category Change 
                $('body').on('change', '.sub-category', function(event) {
                    let id = $(this).val();
                    $.ajax({
                        method: 'GET',
                        url: "{{ route('admin.product.get-childcategories') }}",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            console.log(data);
                            $('.child-category').html('<option value="">Select</option>');
                            $.each(data, function(i, item) {
                                $('.child-category').append(
                                    `<option value="${item.id}">${item.name}</option>`
                                );
                            });
                        },
                        error(xhr, status, error) {
                            console.log(error);
                        }
                    });
                });

            });
        </script>
    @endpush
