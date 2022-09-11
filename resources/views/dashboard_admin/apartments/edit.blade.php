@extends('dashboard_admin.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.apartments')  .' - '. __('dashboard.add'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.apartments')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.admin.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.admin.apartments.index') }}"> @lang('dashboard.apartments')</a></li>
                <li class="active">@lang('dashboard.add')</li>
            </ol>

        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.add')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    <form action="{{ route('dashboard.admin.apartments.update', $apartment->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        @include('partials._errors')

                        <h3>@lang('apartments.building_features')</h3>
                        </br>

                        <div class="row mt-5">

                            <div class="col-12 col-md-4">
                                <input name="corner" type="checkbox" class="minimal" value="1" {{ old('corner', $apartment->corner) == '1' ? 'checked' : '' }}>
                                @lang('apartments.corner')
                            </div>

                            <div class="col-12 col-md-4">
                                <input name="near_the_road" type="checkbox" class="minimal" value="1" {{ old('near_the_road', $apartment->near_the_road) == '1' ? 'checked' : '' }}>
                                @lang('apartments.near_the_road')
                            </div>

                            <div class="col-12 col-md-4">
                                <input name="outstanding_teacher" type="checkbox" class="minimal" value="1" {{ old('outstanding_teacher', $apartment->outstanding_teacher) == '1' ? 'checked' : '' }}>
                                @lang('apartments.outstanding_teacher')
                            </div>

                        </div>

                        <h3>@lang('apartments.service_features')</h3>
                        </br>
    
                        <div class="row mt-5">

                            <div class="col-12 col-md-4">

                                <input name="schools" type="checkbox" class="minimal" value="1" {{ old('schools', $apartment->schools) == '1' ? 'checked' : '' }}>
                                @lang('apartments.schools')
                                
                            </div>

                            <div class="col-12 col-md-4">

                                <input name="markets" type="checkbox" class="minimal" value="1" {{ old('markets', $apartment->markets) == '1' ? 'checked' : '' }}>
                                @lang('apartments.markets')

                            </div>

                            <div class="col-12 col-md-4">
                                <input name="other_services" type="checkbox" class="minimal" value="1" {{ old('other_services', $apartment->other_services) == '1' ? 'checked' : '' }}>
                                @lang('apartments.other_services')
                            </div>

                        </div>

                        <h3>@lang('apartments.inner_shape')</h3>
                        </br>

                        <div class="col-6">
                            <label>@lang('dashboard.apartments')</label>
                            <select class="form-control" required name="category_id">
                                <option value="">@lang('dashboard.select')</option>
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $apartment->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        </br>
                        

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>@lang('apartments.number_rooms')</label>
                                <input type="number" name="number_rooms" class="form-control" value="{{ old('number_rooms', $apartment->number_rooms) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>@lang('apartments.floor_rooms')</label>
                                <input type="number" name="floor_rooms" class="form-control" value="{{ old('floor_rooms', $apartment->floor_rooms) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>@lang('apartments.area_metres')</label>
                                <input type="number" name="area_metres" class="form-control" value="{{ old('area_metres', $apartment->area_metres) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>@lang('apartments.number_bathrooms')</label>
                                <input type="number" name="number_bathrooms" class="form-control" value="{{ old('number_bathrooms', $apartment->number_bathrooms) }}">
                            </div>
                        </div>

                        <div class="row mt-5">

                            <div class="col-12 col-md-3">

                                <input name="generator" type="checkbox" class="minimal" value="1" {{ old('generator', $apartment->generator) == '1' ? 'checked' : '' }}>
                                @lang('apartments.generator')
                                
                            </div>

                            <div class="col-12 col-md-3">
                                <input name="balcony" type="checkbox" class="minimal" value="1" {{ old('balcony', $apartment->balcony) == '1' ? 'checked' : '' }}>
                                    @lang('apartments.balcony')
                                </label>
                            </div>

                            <div class="col-12 col-md-3">
                                <input name="passenger_kitchen" type="checkbox" class="minimal" value="1" {{ old('passenger_kitchen', $apartment->passenger_kitchen) == '1' ? 'checked' : '' }}>
                                    @lang('apartments.passenger_kitchen')
                                </label>
                            </div>

                            <div class="col-12 col-md-3">
                                <input name="elevator" type="checkbox" class="minimal" value="1" {{ old('elevator', $apartment->elevator) == '1' ? 'checked' : '' }}>
                                @lang('apartments.elevator')
                            </div>

                        </div>
                        <br>

                        <div class="row">
                            
                            <div class="form-group col-md-6">
                                <label>@lang('apartments.image')</label>
                                <input type="file" accept="image/*" name="images[]" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>@lang('apartments.video')</label>
                                <input type="file" accept="video/*" name="video" class="form-control" value="{{ old('video') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>@lang('dashboard.categorys')</label>
                                <select class="form-control" required name="region_id">
                                    <option value="">@lang('dashboard.select')</option>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}"
                                            {{ old('region_id', $apartment->region_id) == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>@lang('dashboard.citys')</label>
                                <select class="form-control" name="city_id">
                                    <option value="">@lang('dashboard.select')</option>
                                    @foreach ($citys as $city)
                                        <option value="{{ $city->id }}"
                                            {{ old('city_id', $apartment->city_id) == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>@lang('apartments.price_range')</label>
                                <input type="number" name="price_range" class="form-control" value="{{ old('price_range', $apartment->price_range) }}">
                            </div>

                            @php
                                $RentalDays = ['1', '30'];
                            @endphp

                            <div class="form-group col-md-6">
                                <label>@lang('apartments.number_rental_days')</label>
                                <select class="form-control" required name="number_rental_days">
                                    <option value="">@lang('dashboard.select')</option>
                                    @foreach ($RentalDays as $day)
                                        <option value="{{ $day }}"
                                            {{ old('number_rental_days', $apartment->number_rental_days) == $day ? 'selected' : '' }}>{{ $day }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>

                        <h3>@lang('apartments.owner_information')</h3>

                        <div class="row">

                            <div class="form-group col-md-12">
                                <label>@lang('apartments.full_name')</label>
                                <input type="test" name="full_name" class="form-control" value="{{ old('full_name', $apartment->full_name) }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>@lang('apartments.first_phone')</label>
                                <input type="number" name="first_phone" class="form-control" value="{{ old('first_phone', $apartment->first_phone) }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>@lang('apartments.second_phone')</label>
                                <input type="number" name="second_phone" class="form-control" value="{{ old('second_phone', $apartment->second_phone) }}">
                            </div>

                            <div class="form-group col-md-12">
                                <label>@lang('apartments.contract_terms')</label>
                                <textarea class="form-control" name="contract_terms" rows="6">{{ old('contract_terms', $apartment->contract_terms) }}</textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label>@lang('apartments.owner_name')</label>
                                <input type="test" name="owner_name" class="form-control" value="{{ old('owner_name', $apartment->owner_name) }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>@lang('apartments.owner_phone')</label>
                                <input type="number" name="owner_phone" class="form-control" value="{{ old('owner_phone', $apartment->owner_phone) }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>@lang('apartments.national_card')</label>
                                <input type="file" name="national_card" class="form-control" value="{{ old('national_card', $apartment->national_card) }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>@lang('apartments.ownership')</label>
                                <input type="file" name="ownership" class="form-control" value="{{ old('ownership', $apartment->ownership) }}">
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus"></i> @lang('dashboard.add')
                            </button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
