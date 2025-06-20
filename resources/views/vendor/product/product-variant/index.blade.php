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
                        <h3><i class="far fa-user"></i> Product Variant</h3>
                        <h4>Product: {{$product->name}} </h4>
                        <div class="create_button">
                           <a href="{{route('vendor.product-variant.create',['product'=>$product->id])}}" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Create New</a>
                        </div>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                {{ $dataTable->table() }}
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
    {!! $dataTable->scripts(attributes: ['type' => 'module']) !!}

      <script>
        $(document).ready(function(event) {
            
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ route('vendor.product-variant.change-status') }}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id,
                    },
                    success: function(data) {
                        toastr.success(data.message);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                        
                    }
                })
            })
        })
    </script>
@endpush
