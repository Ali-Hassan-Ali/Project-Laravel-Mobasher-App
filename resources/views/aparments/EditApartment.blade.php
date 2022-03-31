@extends('layouts.app')
@section('content')

            @if(is_null($data))
                <div class="alert alert-warning">
                    <strong>Sorry!</strong> No Product Found.
                </div>
            @else

            <div class="container " style="padding-top:30px; padding-right:160px; color:antiquewhite ;width:90%;">
                <div class="card" >
                    <div class="card-body" >
                          <h5 class="card-title alert alert-danger" style="display: flex;">تعديل شقه رقم({{$data->id}})  </h5>

                            <form action="{{ route('update') }}" method="post" enctype="multipart/form-data" class="row g-3">
                                @csrf
                                {{ csrf_field() }}
                               {{ method_field('put') }}

                                <div class="container">
                                    <div class="row" style="padding-top:8px;">
                                      <div class="col">
                                        <input type="text"  name="Titel" class="form-control" id="floatingInputValue" placeholder="العنوان"  value="{{$data->Titel}}">

                                        <input type="text"  name="id"  value="{{$data->id}}">

                                      </div>
                                      <div class="col">
                                        <input type="text" class="form-control" id="floatingInputValue" name="type" placeholder="النوع" value="{{$data->type}}"  >

                                      </div>
                                      <div class="col">
                                        <input type="text" class="form-control" id="floatingInputValue"  name="floor"placeholder="الطابق" value="{{$data->floor}} " >
                                      </div>

                                    </div>

                                    <div class="row"style="padding-top:8px;">
                                        <div class="col">
                                            <input type="text" class="form-control" id="floatingInputValue" name="city" placeholder="المدينه"  value="{{$data->city}}" >
                                          </div>

                                        <div class="col">
                                            <input type="text" class="form-control" id="floatingInputValue" name="state" placeholder="الولايه"  value="{{$data->state}}">
                                          </div>
                                          <div class="col">
                                            <input type="number" class="form-control" id="floatingInputValue" name="dimensions" placeholder="المساحه" value="{{$data->dimensions}}" >
                                          </div>
                                    </div>
                                    <div class="row" style="padding-top:8px;">
                                        <div class="col">
                                            <input type="number" class="form-control" id="floatingInputValue" placeholder="الغرف الصغير" name="small_room" value="{{$data->small_room}}">

                                          </div>

                                        <div class="col">
                                            <input type="number" class="form-control" id="floatingInputValue" placeholder="الغرف المتوسطه" name="medium_room" value="{{$data->medium_room}}">
                                          </div>
                                          <div class="col">
                                            <input type="number" class="form-control" id="floatingInputValue" placeholder="الغرف الكبيره"  name="large_room" value="{{$data->large_room}}">
                                          </div>
                                          <div class="col">
                                            <input type="number" class="form-control" id="floatingInputValue" placeholder="الصالات " name="extra_large_room" value="{{$data->extra_large_room}}" >
                                          </div>
                                    </div>

                                    <div class="row" style="padding-top:8px;">
                                      <div class="col-8">
                                        <div class="col">
                                            <input type="text" class="form-control" id="floatingInputValue" placeholder="الشوارع البارزه" name="street" value="{{$data->street}}" >
                                          </div>
                                      </div>
                                      <div class="col-4">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control"name="price" aria-label="Amount (to the nearest dollar)"placeholder="السعر" value="{{$data->price}}">
                                            <span class="input-group-text">$</span>
                                          </div>
                                      </div>


                                      <div class="col-4" style="padding-top:8px;padding-bottom:10px;">

                                            {{-- <input type="text" class="form-control" id="floatingInputValue" placeholder="  التصنيف " name="class"> --}}

                                            <select class="form-select col" aria-label="Default select example"  name="class"">
                                                <option value="{{$data->class}}"selected disabled hidden>الصنيف السابق</option>
                                                <option value="1">غرفه مفروشه</option>
                                                <option value="2">غرفه غير مفروشه</option>
                                                <option value="3">شقه فندقيه</option>
                                              </select>

                                      </div>
                                      <div class="col">
                                        <input type="text" class="form-control" placeholder="lat" name="lat" id="lat" value="{{$data->lat}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="lng" name="lng" id="lng" value="{{$data->lng}}">
                                    </div>
                                        </div>

                                        <div id="map" style="height:200px; width: 900px;" class="my-3"></div>
                                </div>
                                        <script>
                                       let map;
                                    function initMap() {
                                        map = new google.maps.Map(document.getElementById("map"), {
                                            center: { lat: -34.397, lng: 150.644 },
                                            zoom: 8,
                                            scrollwheel: true,
                                        });
                                        const uluru = { lat: -34.397, lng: 150.644 };
                                        let marker = new google.maps.Marker({
                                            position: uluru,
                                            map: map,
                                            draggable: true
                                        });
                                        google.maps.event.addListener(marker,'position_changed',
                                            function (){
                                                let lat = marker.position.lat()
                                                let lng = marker.position.lng()
                                                $('#lat').val(lat)
                                                $('#lng').val(lng)
                                            })
                                        google.maps.event.addListener(map,'click',
                                        function (event){
                                            pos = event.latLng
                                            marker.setPosition(pos)
                                        })
                                    }
                                        </script>
                                        {{-- https://github.com/s1modev/GoogleMaps_youtube/blob/main/resources/views/home.blade.php --}}
                                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsE5KDJqjPpbTHsQFqSjnJHclQuCBw8c4&callback=initMap"
                                            type="text/javascript"></script>

                                    </div>

                                    <div class="form-floating" style="padding-top:8px;padding-bottom:20px;">
                                        <textarea name="Description" class="form-control" placeholder="وصف الشقه" id="floatingTextarea2" style="height:max-parent" value=""> {{$data->Description}}</textarea>

                                      </div>

                                  </div>

                                  <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                    أضافه
                                </button>
            </div></div>
                            </form>




                        </div>
                      </div>

            </div>

             <!-- jQuery -->

             <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            @endif

@endsection
