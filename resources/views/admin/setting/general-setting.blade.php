<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

    <div class="card">
        <div class="card-body border">
            <form action="{{route('admin.general-setting.update')}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Site Name</label>
                    <input type="text" class="form-control" name="site_name" value="{{$generalSettings->site_name}}">
                </div>

                <div class="form-group">
                    <label for="">Layout</label>
                    <select name="layout" class="form-control">
                        <option {{$generalSettings->layout == 'LTL' ? 'selected' : ''}} value="LTR">LTR</option>
                        <option {{$generalSettings->layout == 'RTL' ? 'selected' : ''}} value="RTL">RTL</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Contact Email</label>
                    <input type="email" class="form-control" name="contact_email" value="{{$generalSettings->contact_email}}">
                </div>

                <div class="form-group">
                    <label>Default Currency Name</label>
                    <select name="currency_name" class="form-control select2">
                        <option value="">Select </option>
                        @foreach (config('settings.currency_list') as $currency)
                            <option {{$generalSettings->currency_name == $currency ? 'selected' :  ''}} value="{{ $currency }}">{{ $currency }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Currency Icon</label>
                    <input type="text" class="form-control" name="currency_icon" value="{{$generalSettings->currency_icon}}">
                </div>

                <div class="form-group">
                    <label for="">Time Zone</label>
                    <select name="time_zone" class="form-control select2">
                        <option value="">Select </option>
                        @foreach (config('settings.time_zone') as $key=> $timeZone)
                            <option {{$generalSettings->time_zone == $key ? 'selected' : ''}} value="{{ $key }}">{{ $key }} </option>
                        @endforeach
                    </select>

                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

</div>
