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
                            <h3>Create Product</h3>
                        </div>
                        <div class="card-body">

                            <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image"  name="image" value="{{old('image')}}">
                                </div>

                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select class="form-control main-category" id="category" name="category">
                                                <option value="">Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sub-category">Sub Category</label>
                                            <select class="form-control sub-category" id="sub-category" name="sub_category">
                                                <option value="">Select</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="child-category">Child Category</label>
                                            <select class="form-control child-category" id="child-category"
                                                name="child_category">
                                                <option value="">Select</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <select class="form-control" id="brand" name="brand">
                                        <option value="">Select</option>

                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }} </option>
                                        @endforeach

                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="sku">SKU</label>
                                    <input type="text" class="form-control" id="sku" name="sku"
                                        value="{{ old('sku') }}">
                                </div>

                                <div class="form-group">
                                    <label for="sku">Price</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        value="{{ old('price') }}">
                                </div>

                                <div class="form-group">
                                    <label for="sku">Offer Price</label>
                                    <input type="text" class="form-control" id="offer_price" name="offer_price"
                                        value="{{ old('offer_price') }}">
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sku">Offer Start Date</label>
                                            <input type="text" class="form-control datepicker" id="offer_start_date"
                                                name="offer_start_date" value="{{ old('offer_started_date') }}">
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="sku">Offer End Date</label>
                                            <input type="text" class="form-control datepicker" id="offer_end_date"
                                                name="offer_end_date" value="{{ old('offer_end_date') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Stock Quantity</label>
                                    <input type="number" min="0" class="form-control" name="qty"
                                        value="{{ old('qty') }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Video Link</label>
                                    <input type="text" min="0" class="form-control" name="video_link"
                                        value="{{ old('video_link') }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Short Description</label>
                                     <textarea class="form-control " id="short_description" name="short_description">{{ old('short_description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="long_description">Long Description</label>
                                    <textarea class="form-control summernote" id="long_description" name="long_description">{{ old('long_description') }}</textarea>
                                </div>

                                
                                        <div class="form-group">
                                            <label for="is_top">Product Type</label>
                                            <select class="form-control" id="is_top" name="product_type">
                                                <option value="0">Select</option>
                                                <option value="new_arrival">New Arrival</option>
                                                <option value="featured_product">Featured</option>
                                                <option value="top_product">Top Product</option>
                                                <option value="best_product">Best Product</option>
                                            
                                            </select>
                                        </div>

                                
                                <div class="form-group">
                                    <label for="seo_title">SEO Title</label>
                                    <input type="text" class="form-control" id="seo_title" name="seo_title"
                                        value="{{ old('seo_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="seo_description">SEO Description</label>
                                    <input type="text" class="form-control" id="seo_description" name="seo_description"
                                        value="{{ old('seo_description') }}">
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

    @push('scripts')
        <script>
            $(document).ready(function() {

                // Main Category Change
                $('body').on('change', '.main-category', function(event) {
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
