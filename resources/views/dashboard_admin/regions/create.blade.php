@extends('dashboard_admin.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.regions')  .' - '. __('dashboard.add'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.regions')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.admin.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.admin.regions.index') }}"> @lang('dashboard.regions')</a></li>
                <li class="active">@lang('dashboard.add')</li>
            </ol>

        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.add')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    <form action="{{ route('dashboard.admin.regions.store') }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group">
                            <label>@lang('dashboard.regions')</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group d-none">
                            <label>@lang('dashboard.citys')</label>
                            <select class="form-control" required name="parent_id">
                                <option value="">@lang('dashboard.select')</option>
                                @foreach ($citys as $city)
                                    <option value="{{ $city->id }}" 
                                        {{ old('parent_id', $city->id) == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
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
