@extends('vendor.layouts.master')
@section('title')
{{$settings->site_name}} || Product Variant Item
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
                     {{-- <a class="btn btn-primary mb-4" href="{{route('vendor.product-variant-item.index',['productId'=> $product->id, 'variantId' => $variant->id])}}"> <i class="fas fa-long-arrow-alt-left"></i>  Back</a> --}}
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> Update Variant Item</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                             <form action="{{ route('vendor.product-variant-item.update', $variantItem->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group wsus__input">
                                    <label for="">Variant Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Variant Name"
                                        name="variant_name" value="{{ $variantItem->productVariant->name }}" readonly>
                                </div>


                                <div class="form-group wsus__input">
                                    <label for="">Item Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Item Name" name="name"
                                        value="{{ $variantItem->name }} ">
                                </div>

                                <div class="form-group wsus__input">
                                    <label for="">Price <code>(Set 0 for make it free) </code> </label>
                                    <input type="text" class="form-control" placeholder="Enter Price" name="price"
                                        value="{{ $variantItem->price }}">
                                </div>


                                <div class="form-group wsus__input">
                                    <label for="is-default">Is Default</label>
                                    <select class="form-control" id="is-default" name="is_default">
                                        <option value="">Select</option>
                                        <option {{ $variantItem->is_default == 1 ? 'selected' : '' }} value="1">Yes
                                        </option>
                                        <option {{ $variantItem->is_default == 0 ? 'selected' : '' }} value="0">No
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group wsus__input">
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
        </div>
    </section>
    <!--=============================
                        DASHBOARD START
                      ==============================-->
@endsection

@push('scripts')
  
    
@endpush
