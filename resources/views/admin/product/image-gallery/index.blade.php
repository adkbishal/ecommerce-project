@extends('admin.layouts.master')
@section('title')
{{$settings->site_name}} ||Image Gallery
@endsection

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Product Image Gallery</h1>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="{{route('admin.product.index')}}">Back</a>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product: {{ $product->name }} </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.product-image-gallery.store')}} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Image <code>(Multiple Image supported!)
                                        </code></label>
                                    <input type="file" name="image[]" class="form-control" multiple>
                                    <input type="hidden" name="product" value= {{$product->id}}>
                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row ">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Images</h4>
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>

                    </div>
                </div>
            </div>
    </section>
@endsection

@push('scripts')
    {!! $dataTable->scripts(attributes: ['type' => 'module']) !!}
@endpush
