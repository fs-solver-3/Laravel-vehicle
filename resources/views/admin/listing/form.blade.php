
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	<option value="" style="display: none;" {{ old('user_id', optional($listing)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($listing)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('location_id') ? 'has-error' : '' }}">
    <label for="location_id" class="col-md-2 control-label">Location</label>
    <div class="col-md-10">
        <select class="form-control" id="location_id" name="location_id">
        	    <option value="" style="display: none;" {{ old('location_id', optional($listing)->location_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select location</option>
        	@foreach ($locations as $key => $location)
			    <option value="{{ $key }}" {{ old('location_id', optional($listing)->location_id) == $key ? 'selected' : '' }}>
			    	{{ $location }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('location_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('destination_id') ? 'has-error' : '' }}">
    <label for="destination_id" class="col-md-2 control-label">Destination</label>
    <div class="col-md-10">
        <select class="form-control" id="destination_id" name="destination_id">
        	    <option value="" style="display: none;" {{ old('destination_id', optional($listing)->destination_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select destination</option>
        	@foreach ($destinations as $key => $destination)
			    <option value="{{ $key }}" {{ old('destination_id', optional($listing)->destination_id) == $key ? 'selected' : '' }}>
			    	{{ $destination }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('destination_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('starting_date') ? 'has-error' : '' }}">
    <label for="starting_date" class="col-md-2 control-label">Starting Date</label>
    <div class="col-md-10">
        <input class="form-control" name="starting_date" type="text" id="starting_date" value="{{ old('starting_date', optional($listing)->starting_date) }}" placeholder="Enter starting date here...">
        {!! $errors->first('starting_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('max_occupants') ? 'has-error' : '' }}">
    <label for="max_occupants" class="col-md-2 control-label">Max Occupants</label>
    <div class="col-md-10">
        <input class="form-control" name="max_occupants" type="text" id="max_occupants" value="{{ old('max_occupants', optional($listing)->max_occupants) }}" minlength="1" placeholder="Enter max occupants here...">
        {!! $errors->first('max_occupants', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('additional_info') ? 'has-error' : '' }}">
    <label for="additional_info" class="col-md-2 control-label">Additional Info</label>
    <div class="col-md-10">
        <input class="form-control" name="additional_info" type="text" id="additional_info" value="{{ old('additional_info', optional($listing)->additional_info) }}" minlength="1" placeholder="Enter additional info here...">
        {!! $errors->first('additional_info', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">
    <label for="active" class="col-md-2 control-label">Active</label>
    <div class="col-md-10">
        <input class="form-control" name="active" type="text" id="active" value="{{ old('active', optional($listing)->active) }}" minlength="1" placeholder="Enter active here...">
        {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price_per_seat') ? 'has-error' : '' }}">
    <label for="price_per_seat" class="col-md-2 control-label">Price Per Seat</label>
    <div class="col-md-10">
        <input class="form-control" name="price_per_seat" type="text" id="price_per_seat" value="{{ old('price_per_seat', optional($listing)->price_per_seat) }}" minlength="1" placeholder="Enter price per seat here...">
        {!! $errors->first('price_per_seat', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('car_id') ? 'has-error' : '' }}">
    <label for="car_id" class="col-md-2 control-label">Car</label>
    <div class="col-md-10">
        <select class="form-control" id="car_id" name="car_id">
        	    <option value="" style="display: none;" {{ old('car_id', optional($listing)->car_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select car</option>
        	@foreach ($cars as $key => $car)
			    <option value="{{ $key }}" {{ old('car_id', optional($listing)->car_id) == $key ? 'selected' : '' }}>
			    	{{ $car }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('car_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{-- <div class="form-group {{ $errors->has('truck_id') ? 'has-error' : '' }}">
    <label for="truck_id" class="col-md-2 control-label">Truck</label>
    <div class="col-md-10">
        <select class="form-control" id="truck_id" name="truck_id">
        	    <option value="" style="display: none;" {{ old('truck_id', optional($listing)->truck_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select truck</option>
        	@foreach ($trucks as $key => $truck)
			    <option value="{{ $key }}" {{ old('truck_id', optional($listing)->truck_id) == $key ? 'selected' : '' }}>
			    	{{ $truck }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('truck_id', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}

<div class="form-group {{ $errors->has('covid19_title') ? 'has-error' : '' }}">
    <label for="covid19_title" class="col-md-2 control-label">Covid19 Title</label>
    <div class="col-md-10">
        <input class="form-control" name="covid19_title" type="text" id="covid19_title" value="{{ old('covid19_title', optional($listing)->covid19_title) }}" minlength="1" placeholder="Enter covid19 title here...">
        {!! $errors->first('covid19_title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('covid19_desc') ? 'has-error' : '' }}">
    <label for="covid19_desc" class="col-md-2 control-label">Covid19 Desc</label>
    <div class="col-md-10">
        <input class="form-control" name="covid19_desc" type="text" id="covid19_desc" value="{{ old('covid19_desc', optional($listing)->covid19_desc) }}" minlength="1" placeholder="Enter covid19 desc here...">
        {!! $errors->first('covid19_desc', '<p class="help-block">:message</p>') !!}
    </div>
</div>

