@extends('admin.layouts.master')

@section('title')
{{$settings->site_name}} ||Shipping Rule
@endsection
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Shipping Rule</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Shipping Rule</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.shipping-rule.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Name" name="name">
                                </div>


                                <div class="form-group">
                                    <label for="">Type</label>
                                    <select class="form-control shipping-type"  name="type">
                                        <option value="">Select</option>
                                        <option value="flat_cost"> Flat Cost</option>
                                        <option value="min_cost"> Minumum Order Amount</option>
                                    </select>
                                </div>

                                <div class="form-group min_cost d-none">
                                    <label for="">Minimum Amount</label>
                                    <input type="text" class="form-control " placeholder="Enter Minimum Amount"
                                        name="min_cost">
                                </div>

                                <div class="form-group">
                                    <label for="">Cost</label>
                                    <input type="text" class="form-control" placeholder="Enter Cost" name="cost">
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

@push('scripts')

<script>
    $(document).ready(function() {
        $('body').on('change','.shipping-type',function() {
            let value= $(this).val();
            if ( value != 'min_cost') {
                $('.min_cost').addClass('d-none')
            }
            else {
                 $('.min_cost').removeClass('d-none')
            }
        })

    })
    </script>

@endpush