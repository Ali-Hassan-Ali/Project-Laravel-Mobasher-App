@extends('layouts.app')
@section('content')


<div class="container" style="margin-top:20px;margin-rigth:100rem;">
    {{-- https://medium.com/justlaravel/how-to-implement-datatables-in-laravel-de200c8d4467 --}}
    <table class="table table-bordered  mb4" id="table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">العنوان</th>
                <th class="text-center">النوع</th>
                <th class="text-center">الموقع</th>
                <th class="text-center">المساحه </th>
                <th class="text-center" >الشارع </th>
                <th class="text-center"> الاتاحيه</th>
                <th class="text-center"> ($) السعر </th>
                <th class="text-center" >الادوات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr class="item{{$item->id}}">
                <td>{{$item->id}}</td>
                <td>{{$item->Titel}}</td>
                <td>{{$item->type}}</td>
                <td>{{$item->city}} {{$item->state}}</td>
                <td>{{$item->dimensions}} م.م</td>
                <td>{{$item->street}}</td>
                <td>
                    @switch($item->avilibalty)
                        @case(1)
                        <div class="badge badge-success">متاحه</div>
                            @break

                        @case(0)
                        <div class="badge  badge-warning"> غير متاحه </div>
                            @break
                        @default
                        <div class="badge badge-info">غير محدد</div>
                    @endswitch
                </td>
                <td>{{$item->price}}</td>

                <td><a class="edit-modal btn btn-info"
                    href="{{url('EditApartment',[$item->id])}}"
                      onClick="{{url('EditApartment',[$item->id])}}">
                        <span class="glyphicon glyphicon-edit"></span> تعديل
                      </a>
                        <form method="POST" action="{{route('movetoTrash',[$item->id])}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="form-group">
                        <input type="submit" class="btn btn-danger delete-user" value="مسح">
                        </div>
                        </form>
                   </td>

            </tr>
            @endforeach
            </tbody>
    </table>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" type="text/css"
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        $('.delete-user').click(function(e){
            e.preventDefault() // Don't post the form, unless confirmed
            if (confirm('Are you sure?')) {
                // Post the form
                $(e.target).closest('form').submit() // Post the surrounding form
            }
        });
    </script>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
  } );

   </script>

<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
  </script>



@endsection
