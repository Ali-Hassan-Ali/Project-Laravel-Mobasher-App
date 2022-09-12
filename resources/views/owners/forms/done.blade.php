<!DOCTYPE html>
<html dir="rtl">
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>تطبيق مباشر</title>

	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
	<!-- <link rel="stylesheet" type="text/css" href=".././dashboard_files/css/bootstrap-rtl.min.css"> -->

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">


	<!-- Latest compiled and minified CSS -->
	{{-- <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap.min.css') }}"> --}}


	<link rel="stylesheet" type="text/css" href="{{ asset('mo-form/css/style.css') }}">

</head>
<body>

	<div class="container col-md-6 bg-light my-5 py-5">

        <div class="d-flex justify-content-center">
            <img src="{{ asset('mo-form/images/logo.jfif') }}" alt="rocket_contact" width="50"/>
        </div>
    	<h1 class="text-center text-success mb-5">تطبيق مباشر</h1>

    	<div class="col-12">
    		
	        <div class="row">

	        	<h1 class="text-center">تم الاضافة بنجاح</h1>

	            <div class="form-group mt-4">
                    <a href="{{ route('owner.apartments.index') }}" type="submit" class="btn btn-success col-12">
                        <i class="fa fa-plus"></i> @lang('dashboard.add')
                    </a>
                </div>

	        </div><!-- row -->

        </div>

    </div><!-- container -->

</body>
</html>