@extends('layouts.app')
@section('content')
<div class="container " style="padding-top:30px; padding-right:160px; color:antiquewhite ;width:90%;">
    <div class="card" >
        <div class="card-body" >
              <h5 class="card-title" style="display: flex;">أضافه شقه جديده</h5>

                <form action="{{ route('uploadapartment')}}" method="post" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul style="display:flex;flex-dirction:colum">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="container">
                        <div class="row" style="padding-top:8px;">
                          <div class="col">

                            <input type="text"  name="Titel" class="form-control" id="floatingInputValue" placeholder="العنوان" >

                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="floatingInputValue" name="type" placeholder="النوع" >

                          </div>
                          <div class="col">
                            <input type="text" class="form-control" id="floatingInputValue"  name="floor"placeholder="الطابق" >
                          </div>

                        </div>

                        <div class="row"style="padding-top:8px;">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <label class="input-group-text" for="inputGroupSelect01">المدن المتاحه</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="city" required>
                                      <option selected>أختيار......</option>
                                      <option value="Khartuom">الخرطوم </option>
                                      <option value="Omderman">امدرمان</option>
                                      <option value="Bahri">بحري</option>
                                    </select>
                                  </div>
                                {{-- <input type="text" class="form-control" id="floatingInputValue" name="city" placeholder="المدينه" > --}}
                              </div>

                            <div class="col">
                                <input type="text" class="form-control" id="floatingInputValue" name="state" placeholder="الولايه" >
                              </div>
                              <div class="col">
                                <input type="number" class="form-control" id="floatingInputValue" name="dimensions" placeholder="المساحه" >
                              </div>
                        </div>
                        <div class="row" style="padding-top:8px;">
                            <div class="col">
                                <input type="number" class="form-control" id="floatingInputValue" placeholder="الغرف الصغير" name="small_room">

                              </div>

                            <div class="col">
                                <input type="number" class="form-control" id="floatingInputValue" placeholder="الغرف المتوسطه" name="medium_room">
                              </div>
                              <div class="col">
                                <input type="number" class="form-control" id="floatingInputValue" placeholder="الغرف الكبيره"  name="large_room">
                              </div>
                              <div class="col">
                                <input type="number" class="form-control" id="floatingInputValue" placeholder="الصالات " name="extra_large_room">
                              </div>
                        </div>

                        <div class="row" style="padding-top:8px;">
                          <div class="col-8">
                            <div class="col">
                                <input type="text" class="form-control" id="floatingInputValue" placeholder="الشوارع البارزه" name="street" >
                              </div>
                          </div>
                          <div class="col-4">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control"name="price" aria-label="Amount (to the nearest dollar)"placeholder="السعر">
                                <span class="input-group-text">$</span>
                              </div>
                          </div>


                          <div class="col-4" style="padding-top:8px;padding-bottom:10px;">

                                {{-- <input type="text" class="form-control" id="floatingInputValue" placeholder="  التصنيف " name="class"> --}}

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <label class="input-group-text" for="inputGroupSelect01">تصنيف الشقه</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="class" required>
                                        <option selected>أختيار...</option>
                                        <option value="1">غرفه مفروشه</option>
                                        <option value="2">غرفه غير مفروشه</option>
                                        <option value="3">شقه فندقيه</option>
                                    </select>
                                  </div>
                          </div>

                          <div class="col">
                        <input type="text" class="form-control" placeholder="lat" name="lat" id="lat" >
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="lng" name="lng" id="lng"  >
                    </div>
                        </div>

                        <div id="map" style="height:200px; width: 900px;" class="my-3"></div>

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


                        <div class="form-floating" style="padding-top:8px;padding-bottom:20px;">
                            <textarea name="Description" class="form-control" placeholder="وصف الشقه" id="floatingTextarea2" style="height:max-parent"></textarea>

                          </div>

                      </div>

                    <div class="custom-file" style="padding-top:8px;">
                        <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple">
                        <label class="custom-file-label" for="images">Choose image</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                        أضافه
                    </button>

                    <div class="user-image mb-3 text-center" style="padding-top:8px;">
                        <div class="imgPreview"> </div>
                    </div>
                </form>




            </div>
          </div>

</div>

 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
 <script>
     $(function() {
     // Multiple images preview with JavaScript
     var multiImgPreview = function(input, imgPreviewPlaceholder) {
         if (input.files) {
            if (input.files.length>6){
         alert("You can only upload a maximum of 5 files");
         return false;
        }
             var filesAmount = input.files.length;
             for (i = 0; i < filesAmount; i++) {
                 var reader = new FileReader();
                 reader.onload = function(event) {
                     $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                 }
                 reader.readAsDataURL(input.files[i]);
             }
         }
     };
     $('#images').on('change', function() {
         multiImgPreview(this, 'div.imgPreview');
     });

     });
 </script>
@endsection
