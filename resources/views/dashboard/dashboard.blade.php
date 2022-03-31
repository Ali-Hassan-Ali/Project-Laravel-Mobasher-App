@extends('layouts.app')
@section('content')
<div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">

                                    <div>لوحةالتحكم

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">اجمالي الشقق</div>
                                            <div class="widget-subheading"> احصائيات الشقق الموجوده بتظام </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">
                                                <span>{{ \App\Models\apartment::count() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">الشقق المتوفره</div>
                                            <div class="widget-subheading">جميع العقارات المتوفره لايجار </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">
                                                {{-- <span>{{ \App\Models\apartment::where('avilibalty',1)->count() }}</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-grow-early">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">الشقق الغير متوفره</div>
                                            <div class="widget-subheading">الشقق قيد الحجز </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">
                                                {{-- <span>{{ \App\Models\apartment::where('avilibalty',0)->count() }}</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">طلبات الايجار</div>
                                                <div class="widget-subheading">احصائيات الكليه</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-success">{{ \App\Models\Rent::count() }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">الطلبات المعلقه</div>
                                                <div class="widget-subheading"></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning">{{ \App\Models\Rent::where('status',1)->count() }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading"> الطلبات المكتمله</div>
                                                <div class="widget-subheading"></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-danger">{{ \App\Models\Rent::where('status',0)->count() }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>









                        </div>
                        {{-- جدول الحجوزات --}}
                        @include('Rents.RentTable')
                        <div class="row">

                        </div>
                    </div>


@endsection
