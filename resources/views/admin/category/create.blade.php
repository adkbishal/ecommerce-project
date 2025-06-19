@extends('admin.layouts.master')
@section('title')
{{$settings->site_name}} || Category
@endsection

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Category</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.category.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Icon</label>
                                    <div>
                                        <button class="btn btn-primary" data-selected-class="btn-danger"
                                            data-unselected-class="btn-info" name="icon" role="iconpicker"></button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Category Name" name="name">
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
