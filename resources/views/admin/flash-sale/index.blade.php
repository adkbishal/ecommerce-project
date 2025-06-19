@extends('admin.layouts.master')
@section('title')
{{$settings->site_name}} ||Flash Sale
@endsection

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Flash Sale</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Flash Sale End Date</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.flash-sale.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="end-date">Sale End Date</label>
                                    <input type="text" class="form-control datepicker" id="end-date" name="end_date"
                                        value="{{ @$flashSaleDate->end_date }}">
                                </div>
                                <button class="btn btn-primary" type="submit">Save</button>

                            </form>

                        </div>

                    </div>
                </div>

            </div>

        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Flash Sale Products</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.flash-sale.add-product') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="end-date">Add Product</label>
                                    <select class="form-control select2" name="product" id="">
                                        <option value="">Select</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Show At Home?</label>
                                            <select class="form-control" name="show_at_home" id="" >
                                                <option value="">Select</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end-date">Status</label>
                                            <select class="form-control" name="status" id="" >
                                                <option value="">Select</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                   
                                </div>
                                <button class="btn btn-primary" type="submit">Save</button>

                            </form>

                        </div>

                    </div>
                </div>

            </div>

        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Flash Sale Product</h4>
                          
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection

@push('scripts')
    {!! $dataTable->scripts(attributes: ['type' => 'module']) !!}

    <script>
        $(document).ready(function(event) {
            //Change the Status
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.flash-sale.change-status') }}",
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
            //Change Show At Home Status
            $('body').on('click', '.change-at-home-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.flash-sale.show-at-home.change-status') }}",
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
