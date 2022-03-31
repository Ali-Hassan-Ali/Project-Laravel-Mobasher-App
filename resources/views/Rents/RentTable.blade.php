<?php
 $Rents= App\Models\Rent::with('User','apartment')->where('status',0)->get();
?>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header"> طلبات الايجار المعلقه

            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>اسم ورقم العميل </th>
                        <th class="text-center">عنوان الشقه</th>
                        <th class="text-center">الموقع</th>
                        <th class="text-center">الفتره</th>
                        <th class="text-center">الادوات</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($Rents as $rent )
                        <tr>
                            {{-- <td class="text-center text-muted">{{$rent['id']}}</td> --}}
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="widget-content-left">
                                                {{-- <img width="40" class="rounded-circle" src="{{$rent['apartment']['img']}}" alt=""> --}}
                                            </div>
                                        </div>
                                        <div class="widget-content-left flex2">
                                            {{-- <div class="widget-heading">{{$rent['user']['f_name']}} {{$rent['user']['l_name']}}  </div> --}}
                                            {{-- <div class="widget-subheading opacity-7">{{$rent['user']['phone']}}</div> --}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            {{-- <td class="text-center">{{$rent['apartment']['Titel']}} </td> --}}
                            {{-- <td class="text-center">{{$rent['apartment']['city']}} {{$rent['apartment']['state']}} {{$rent['apartment']['street']}} </td> --}}
                            {{-- <td class="text-center">{{$rent['apartment']['price']}} </td> --}}
                            <td class="text-center">
                                    @switch($rent['status'])
                                        @case(0)
                                        <div class="badge badge-warning"> معلقه</div>
                                            @break
                                            @case(1)
                                            <div class="badge badge-success">نجاح</div>
                                            @break
                                              @case(2)
                                              <div class="badge badge-danger">قيد المعالجه</div>
                                            @break
                                        @default

                                    @endswitch

                            </td>
                            <td class="text-center">
                                <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
