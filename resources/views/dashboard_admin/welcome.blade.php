@extends('dashboard_admin.layout.app')

@section('content')

@section('title', __('dashboard.statistics'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.dashboard')</h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                {{-- categories--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $citys_count }}</h3>

                            <p>@lang('dashboard.citys')</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-city"></i>
                        </div>
                        <a href="{{ route('dashboard.admin.citys.index') }}" class="small-box-footer">@lang('dashboard.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{--products--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $orders_count }}</h3>

                            <p>@lang('dashboard.orders')</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-archive"></i>
                        </div>
                        <a href="{{ route('dashboard.admin.orders.index') }}" class="small-box-footer">@lang('dashboard.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{--clients--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $apartments_count }}</h3>

                            <p>@lang('dashboard.apartments')</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-hospital-alt"></i>
                        </div>
                        <a href="{{ route('dashboard.admin.apartments.index') }}" class="small-box-footer">@lang('dashboard.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{--users--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ $admins_count }}</h3>

                            <p>@lang('dashboard.admins')</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <a href="{{ route('dashboard.admin.admins.index') }}" class="small-box-footer">@lang('dashboard.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div><!-- end of row -->

            <div class="box box-solid">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.sales_graph')</h3>
                </div>
                <div class="box-body border-radius-none">
                    <div class="chart" id="line-chart" style="height: 250px;"></div>
                </div>
                <!-- /.box-body -->
            </div>

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection 


@push('scripts')

    <script>
        //line chart
        var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
                @foreach ($sales_data as $data)
                {
                    ym: "{{ $data->year }}-{{ $data->month }}", sum: "{{ $data->sum }}"
                },
                @endforeach
            ],
            xkey: 'ym',
            ykeys: ['sum'],
            labels: ['@lang('dashboard.total')'],
            lineWidth: 2,
            hideHover: 'auto',
            gridStrokeWidth: 0.4,
            pointSize: 4,
            gridTextFamily: 'Open Sans',
            gridTextSize: 10
        });
    </script>

@endpush