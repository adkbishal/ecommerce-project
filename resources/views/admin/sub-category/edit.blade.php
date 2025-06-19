@extends('admin.layouts.master')
@section('title')
{{$settings->site_name}} || Sub Category
@endsection

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Sub Category</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Sub-Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.sub-category.update', $subCategory->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" name="category">
                                        @foreach ($categories as $category)
                                            <option
                                                {{ $category->category_id == $subCategory->category_id ? 'selected' : '' }}
                                                value="{{ $category->id }}">{{ $category->name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" value="{{ $subCategory->name }}"
                                        name="name">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option {{ $subCategory->status == 1 ? 'selected' : '' }} value="1"> Active
                                        </option>
                                        <option {{ $subCategory->status == 0 ? 'selected' : '' }} value="0"> Inactive
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
