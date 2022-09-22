<!DOCTYPE html>
<html dir="rtl">
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>تطبيق مباشر</title>

	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
	<!-- <link rel="stylesheet" type="text/css" href=".././dashboard_files/css/bootstrap-rtl.min.css"> -->

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">


	<!-- Latest compiled and minified CSS -->
	{{-- <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap.min.css') }}"> --}}


	<link rel="stylesheet" type="text/css" href="{{ asset('mo-form/css/style.css') }}">

</head>
<body>

	<div class="container col-md-6 bg-light my-5 py-5">

        <div class="d-flex justify-content-center">
            <img src="{{ asset('mo-form/images/logo.jfif') }}" alt="rocket_contact" width="50"/>
        </div>
    	<h1 class="text-center text-success mb-5">تطبيق مباشر</h1>

    	<div class="col-12">
    		
	        <div class="row">

	            <form action="{{ route('owner.apartments.store') }}" method="post" enctype="multipart/form-data">

                    @csrf

                    @include('partials._errors')

                    <h3>@lang('apartments.building_features')</h3>

                    <div class="row mb-4">

                        <div class="col-12 col-md-4">
                            <input name="corner" type="checkbox" class="minimal" value="1" {{ old('corner') == '1' ? 'checked' : '' }}>
                            @lang('apartments.corner')
                        </div>

                        <div class="col-12 col-md-4">
                            <input name="near_the_road" type="checkbox" class="minimal" value="1" {{ old('near_the_road') == '1' ? 'checked' : '' }}>
                            @lang('apartments.near_the_road')
                        </div>

                        <div class="col-12 col-md-4">
                            <input name="outstanding_teacher" type="checkbox" class="minimal" value="1" {{ old('outstanding_teacher') == '1' ? 'checked' : '' }}>
                            @lang('apartments.outstanding_teacher')
                        </div>

                    </div>

                    <h3>@lang('apartments.service_features')</h3>

                    <div class="row mb-4">

                        <div class="col-12 col-md-4">

                            <input name="schools" type="checkbox" class="minimal" value="1" {{ old('schools') == '1' ? 'checked' : '' }}>
                            @lang('apartments.schools')
                            
                        </div>

                        <div class="col-12 col-md-4">

                            <input name="markets" type="checkbox" class="minimal" value="1" {{ old('markets') == '1' ? 'checked' : '' }}>
                            @lang('apartments.markets')

                        </div>

                        <div class="col-12 col-md-4">
                            <input name="other_services" type="checkbox" class="minimal" value="1" {{ old('other_services') == '1' ? 'checked' : '' }}>
                            @lang('apartments.other_services')
                        </div>

                    </div>

                    <h3>@lang('apartments.inner_shape')</h3>
                    </br>

                    <div class="">
                        <label>@lang('dashboard.apartments')</label>
                        <select class="form-control col-12" required name="category_id">
                            <option value="">@lang('dashboard.select')</option>
                            @foreach ($categorys as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </br>
                    

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>@lang('apartments.number_rooms')</label>
                            <input type="number" name="number_rooms" class="form-control" value="{{ old('number_rooms', 1) }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>@lang('apartments.floor_rooms')</label>
                            <input type="number" name="floor_rooms" class="form-control" value="{{ old('floor_rooms'0) }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>@lang('apartments.area_metres')</label>
                            <input type="number" name="area_metres" class="form-control" value="{{ old('area_metres',1) }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>@lang('apartments.number_bathrooms')</label>
                            <input type="number" name="number_bathrooms" class="form-control" value="{{ old('number_bathrooms',1) }}" required>
                        </div>
                    </div>

                    <div class="row mt-5">

                        <div class="col-12 col-md-3">

                            <input name="generator" type="checkbox" class="minimal" value="1" {{ old('generator') == '1' ? 'checked' : '' }}>
                            @lang('apartments.generator')
                            
                        </div>

                        <div class="col-12 col-md-3">
                            <input name="balcony" type="checkbox" class="minimal" value="1" {{ old('balcony') == '1' ? 'checked' : '' }}>
                                @lang('apartments.balcony')
                            </label>
                        </div>

                        <div class="col-12 col-md-3">
                            <input name="passenger_kitchen" type="checkbox" class="minimal" value="1" {{ old('passenger_kitchen') == '1' ? 'checked' : '' }}>
                                @lang('apartments.passenger_kitchen')
                            </label>
                        </div>

                        <div class="col-12 col-md-3">
                            <input name="elevator" type="checkbox" class="minimal" value="1" {{ old('elevator') == '1' ? 'checked' : '' }}>
                            @lang('apartments.elevator')
                        </div>

                    </div>
                    <br>

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label>@lang('apartments.image')</label>
                            <input type="file" accept="image/*" name="images[]" class="form-control" multiple required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('apartments.video')</label>
                            <input type="file" accept="video/*" name="video" class="form-control" value="{{ old('video') }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('dashboard.citys')</label>
                            <select class="form-control" required name="city_id">
                                <option value="">@lang('dashboard.select')</option>
                                @foreach ($citys as $city)
                                    <option value="{{ $city->id }}"
                                        {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('dashboard.regions')</label>
                            <input type="text" name="region_name" class="form-control" value="{{ old('region_name') }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('apartments.price_range')</label>
                            <input type="number" name="price_range" class="form-control" required value="{{ old('price_range') }}">
                        </div>

                        @php
                            $RentalDays = ['1', '30'];
                        @endphp

                        <div class="form-group col-md-6">
                            <label>@lang('apartments.number_rental_days')</label>
                            <input type="number" name="number_rental_days" class="form-control" value="{{ old('number_rental_days') }}" required>
                        </div>
                        
                    </div>

                    <h3>@lang('apartments.owner_information')</h3>

                    <div class="row">

                        <div class="form-group col-md-12">
                            <label>@lang('apartments.full_name')</label>
                            <input type="test" name="full_name" class="form-control" value="{{ old('full_name') }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('apartments.first_phone')</label>
                            <input type="number" name="first_phone" class="form-control" value="{{ old('first_phone') }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('apartments.second_phone')</label>
                            <input type="number" name="second_phone" class="form-control" value="{{ old('second_phone') }}">
                        </div>

                        <div class="form-group col-md-12">
                            <label>@lang('apartments.contract_terms')</label>
                            <textarea class="form-control" name="contract_terms" rows="6">{{ old('contract_terms') }}</textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('apartments.national_card')</label>
                            <input type="file" name="national_card" class="form-control" value="{{ old('national_card') }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('apartments.ownership')</label>
                            <input type="text" name="ownership" class="form-control" value="{{ old('ownership') }}">
                        </div>
                        
                    </div>

                    <h3>@lang('apartments.admin_information')</h3>

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label>@lang('apartments.owner_name')</label>
                            <input type="test" name="owner_name" class="form-control" value="{{ old('owner_name') }}" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('apartments.owner_phone')</label>
                            <input type="number" name="owner_phone" class="form-control" value="{{ old('owner_phone') }}" required>
                        </div>

                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-success col-12">
                            <i class="fa fa-plus"></i> @lang('dashboard.add')
                        </button>
                    </div>

                </form><!-- end of form -->

	        </div><!-- row -->

        </div>

    </div><!-- container -->

</body>
</html>