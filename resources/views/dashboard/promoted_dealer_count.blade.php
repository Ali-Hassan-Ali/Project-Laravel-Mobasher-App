@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.promoted_dealer_count'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.promoted_dealer_count')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li class="active">@lang('dashboard.promoted_dealer_count')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.promoted_dealer_count') <small>{{ $promoted_dealers->count() }}</small></h3>

                    <form action="{{ route('dashboard.promoted_dealer_count') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                                @if (auth()->user()->hasPermission('promoted_dealers_create'))
                                    <a href="{{ route('dashboard.promoted_dealers.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($promoted_dealers->count() > 0)
                    
                        <div class="table-responsive">
                            
                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('dashboard.name')</th>
                                    <th>@lang('dashboard.phone_master')</th>
                                    <th>@lang('dashboard.count_phone')</th>
                                    <th>@lang('dashboard.email')</th>
                                    <th>@lang('dashboard.count_email')</th>
                                    <th>@lang('dashboard.category_dealer')</th>
                                    <th>@lang('dashboard.created_at')</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                @foreach ($promoted_dealers as $index=>$dealers)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $dealers->name }}</td>
                                        <td>{{ $dealers->phone_master }}</td>
                                        <td>{{ $dealers->count_call_phone }}</td>
                                        <td>{{ $dealers->email }}</td>
                                        <td>{{ $dealers->count_call_email }}</td>   
                                        <td>{{ $dealers->category_dealer->name }}</td>
                                        <td>{{ $dealers->created_at }}</td>
                                    </tr>
                                
                                @endforeach
                                </tbody>

                            </table><!-- end of table -->
                            
                            {{-- {{ $promoted_dealers->appends(request()->query())->links() }} --}}

                        </div><!-- end of table  responsive-->
                        
                    @else
                        
                        <h2>@lang('dashboard.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
