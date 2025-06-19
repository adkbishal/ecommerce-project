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
                            <h4>Update Shipping Rule</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.shipping-rule.update', $shipping->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ $shipping->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Type</label>
                                    <select class="form-control shipping-type" name="type">
                                        <option value="">Select</option>
                                        <option value="flat_cost" {{ $shipping->type == 'flat_cost' ? 'selected' : '' }}>Flat Cost</option>
                                        <option value="min_cost" {{ $shipping->type == 'min_cost' ? 'selected' : '' }}>Minimum Order Amount</option>
                                    </select>
                                </div>

                                <div class="form-group min_cost {{ $shipping->type == 'min_cost' ? '' : 'd-none' }}">
                                    <label for="">Minimum Amount</label>
                                    <input type="text" class="form-control" placeholder="Enter Minimum Amount" name="min_cost" value="{{ $shipping->min_cost }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Cost</label>
                                    <input type="text" class="form-control" placeholder="Enter Cost" name="cost" value="{{ $shipping->cost }}">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1" {{ $shipping->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $shipping->status == 0 ? 'selected' : '' }}>Inactive</option>
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

@push('scripts')
<script>
    $(document).ready(function () {
        function toggleMinCost() {
            let value = $('.shipping-type').val();
            if (value === 'min_cost') {
                $('.min_cost').removeClass('d-none');
            } else {
                $('.min_cost').addClass('d-none');
            }
        }

        toggleMinCost(); // Run on load
        $('body').on('change', '.shipping-type', function () {
            toggleMinCost();
        });
    });
</script>
@endpush
