@extends('admin.layout.app')
@section('title')
    <title>Interest</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('admin/ckeditor/ckeditor.js')}}"></script>
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Interest</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('interest.index')}}">Interest</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- editor -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('interest.update',$interest->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <h4 class="card-title">Edit Data</h4>
                            <!-- Create the editor container -->

                            <div class="form-group row">
                               <div class="col">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" rows="10" cols="50" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}" required>
                                        {{$interest->description}}
                                    </textarea>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-success text-white">Save</button>
                                    <a href="{{route('interest.index')}}" class="btn btn-danger text-white">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_javascript')
    <!-- this page js -->
    <script src="{{asset('admin/assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script>
        var konten = document.getElementById("description");
        CKEDITOR.replace(konten,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();

        /*datwpicker*/
        jQuery('#start_period').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        jQuery('#end_period').datepicker({
            autoclose: true,
            todayHighlight: true
        });
    </script>
{{--    <script src="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js')}}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}
@endsection
