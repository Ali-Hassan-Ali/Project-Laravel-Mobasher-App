
@extends('dashboard_admin.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.citys')  .' - '. __('dashboard.add'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.citys')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.admin.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.admin.citys.index') }}"> @lang('dashboard.citys')</a></li>
                <li class="active">@lang('dashboard.add')</li>
            </ol>

        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.add')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    <form method="post" action="{{ route('dashboard.admin.settings.store') }}">
	                    @csrf
	                    @method('post')

                        <div class="form-group">
	                        <label class="text-capitalize">phone_master</label>
	                        <input type="text" name="phone_master" class="form-control" value="{{ setting('phone_master') }}">
	                    </div>

	                    {{-- @php
	                        $social_sites = ['phone_master'];
	                    @endphp

	                    @foreach ($social_sites as $social_site)

	                        <div class="form-group">
	                            <label class="text-capitalize">{{ $social_site }} link</label>
	                            <input type="text" name="{{ $social_site }}_link" class="form-control" value="{{ setting($social_site . '_link') }}">
	                        </div>

	                    @endforeach --}}

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