@extends('admin.layouts.master')
@section('title')
{{$settings->site_name}} ||Product Variant Item
@endsection

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Product Variant Item</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Variant Item</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product-variant-item.store') }}" method="POST">
                                @csrf


                                <div class="form-group">
                                    <label for="">Variant Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Variant Name"
                                        name="variant_name" value="{{ $variant->name }}" readonly>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="variant_id"
                                        value="{{ $variant->id }}">
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="product_id"
                                        value="{{ $product->id }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Item Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Item Name" name="name"
                                        value="">
                                </div>

                                <div class="form-group">
                                    <label for="">Price <code>(Set 0 for make it free) </code> </label>
                                    <input type="text" class="form-control" placeholder="Enter Price" name="price"
                                        value="">
                                </div>


                                <div class="form-group">
                                    <label for="is-default">Is Default</label>
                                    <select class="form-control" id="is-default" name="is_default">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
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
    </section>
@endsection
