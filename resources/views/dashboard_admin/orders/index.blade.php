@extends('dashboard_admin.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.orders') .' - '. __('dashboard.show'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.orders')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.admin.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li class="active">@lang('dashboard.orders')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.orders') <small>{{ $orders->total() }}</small></h3>

                    <form action="{{ route('dashboard.admin.orders.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                                @if (auth()->user()->hasPermission('orders_create'))
                                    <a href="{{ route('dashboard.admin.orders.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($orders->count() > 0)
                    
                        <div class="table-responsive">
                            
                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('dashboard.user_name')</th>
                                    <th>@lang('apartments.full_name')</th>
                                    <th>@lang('apartments.full_name_owner')</th>
                                    <th>@lang('dashboard.status')</th>
                                    <th>@lang('dashboard.created_at')</th>
                                    <th>@lang('dashboard.action')</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                @foreach ($orders as $index=>$order)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $order->user->username ??  }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.admin.apartments.show', $order->apartment->id) }}">
                                                {{ $order->apartment->full_name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('dashboard.admin.apartments.show', $order->apartment->id) }}">
                                                {{ $order->apartment->owner_name }}
                                            </a>
                                        </td>
                                        <td>@lang('orders.'. $order->status)</td>
                                        <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                        <td>
                                            @if (auth()->user()->hasPermission('orders_update'))
                                                <a href="{{ route('dashboard.admin.orders.edit', $order->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>
                                            @else
                                                <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>
                                            @endif
                                            @if (auth()->user()->hasPermission('orders_delete'))
                                                <form action="{{ route('dashboard.admin.orders.destroy', $order->id) }}" method="post" style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                                                </form><!-- end of form -->
                                            @else
                                                <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                                            @endif

                                            <a href="{{ route('dashboard.admin.orders.show', $order->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> @lang('dashboard.status')</a>

                                        </td>
                                    </tr>
                                
                                @endforeach
                                </tbody>

                            </table><!-- end of table -->
                            
                            {{ $orders->appends(request()->query())->links() }}

                        </div><!-- end of table  responsive-->
                        
                    @else
                        
                        <h2>@lang('dashboard.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
