@extends('dashboard_admin.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.orders')  .' - '. __('dashboard.add'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.orders')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.admin.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.admin.orders.index') }}"> @lang('dashboard.orders')</a></li>
                <li class="active">@lang('dashboard.add')</li>
            </ol>

        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.add')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    <form action="{{ route('dashboard.admin.orders.store') }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group d-none">
                            <label>@lang('dashboard.apartments')</label>
                            <select class="form-control" required name="apartment_id">
                                <option value="">@lang('dashboard.select')</option>
                                @foreach ($apartments as $apartment)
                                    <option value="{{ $apartment->id }}"
                                        {{ old('apartment_id') == $apartment->id ? 'selected' : '' }}>{{ $apartment->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group d-none">
                            <label>@lang('dashboard.users')</label>
                            <select class="form-control" required name="user_id">
                                <option value="">@lang('dashboard.select')</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @php
                            $status = ['waiting','accept','cancel'];
                        @endphp
                        <div class="form-group d-none">
                            <label>@lang('dashboard.users')</label>
                            <select class="form-control" required name="status">
                                <option value="">@lang('dashboard.select')</option>
                                @foreach ($status as $status)
                                    <option value="{{ $status }}">
                                        {{ $status }}
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
