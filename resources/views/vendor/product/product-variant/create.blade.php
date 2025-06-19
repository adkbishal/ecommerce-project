@extends('vendor.layouts.master')
@section('title')
{{$settings->site_name}} || Product Variant
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
                     <a class="btn btn-primary mb-4" href="{{route('vendor.product.index')}}"> <i class="fas fa-long-arrow-alt-left"></i>  Back</a>
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> Create Variant</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                   <form action="{{ route('vendor.product-variant.store') }}" method="POST">
                                @csrf
                               

                                <div class="form-group wsus__input">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Variant" name="name">
                                </div>
                                <div class="form-group wsus__input">
                                    <input type="hidden" class="form-control"  name="product" value="{{request()->product}}">
                                </div>
                                <div class="form-group wsus__input">
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
    </section>
    <!--=============================
                        DASHBOARD START
                      ==============================-->
@endsection

@push('scripts')
  
    {{-- {!! $dataTable->scripts(attributes: ['type' => 'module']) !!} --}}
@endpush
