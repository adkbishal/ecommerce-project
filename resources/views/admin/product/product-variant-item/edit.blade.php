@extends('admin.layouts.master')
@section('title')
{{$settings->site_name}} ||Product Variant Item
@endsection

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Product Variant Items</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Variant Item</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product-variant-item.update', $variantItem->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="">Variant Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Variant Name"
                                        name="variant_name" value="{{ $variantItem->productVariant->name }}" readonly>
                                </div>


                                <div class="form-group">
                                    <label for="">Item Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Item Name" name="name"
                                        value="{{ $variantItem->name }} ">
                                </div>

                                <div class="form-group">
                                    <label for="">Price <code>(Set 0 for make it free) </code> </label>
                                    <input type="text" class="form-control" placeholder="Enter Price" name="price"
                                        value="{{ $variantItem->price }}">
                                </div>


                                <div class="form-group">
                                    <label for="is-default">Is Default</label>
                                    <select class="form-control" id="is-default" name="is_default">
                                        <option value="">Select</option>
                                        <option {{ $variantItem->is_default == 1 ? 'selected' : '' }} value="1">Yes
                                        </option>
                                        <option {{ $variantItem->is_default == 0 ? 'selected' : '' }} value="0">No
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option {{ $variantItem->status == 1 ? 'selcted' : '' }} value="1"> Active
                                        </option>
                                        <option {{ $variantItem->status == 0 ? 'selcted' : '' }} value="0"> Inactive
                                        </option>
                                    </select>
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
