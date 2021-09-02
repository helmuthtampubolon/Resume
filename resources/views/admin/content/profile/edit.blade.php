@extends('admin.layout.app')
@section('title')
    <title>Experience</title>
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
                <h4 class="page-title">Experience</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('experience.index')}}">Experience</a></li>
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
                        <form action="{{route('experience.update',$experience->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <h4 class="card-title">Add Data</h4>
                            <!-- Create the editor container -->
                            {{--                                <label for="description"--}}
                            {{--                                       class="col-sm-3 text-end control-label col-form-label">Description</label>--}}
                            <div class="form-group row">
                                <label for="title"
                                       class="col-sm-3 text-end control-label col-form-label">Work or Project Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title"
                                           class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}"
                                           id="title"
                                           placeholder="Title Here (Ex: Teaching Assistant/Winda Store Ecommerce Project)"
                                           value="{{$experience->title}}"
                                           required>
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="role"
                                       class="col-sm-3 text-end control-label col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <input type="text" name="role"
                                           class="form-control {{ $errors->has('role') ? 'is-invalid':'' }}"
                                           id="role"
                                           value="{{$experience->role}}"
                                           placeholder="Role Here (Ex: Web Development Course/Backend Engineer/Frontend Engineer)" required>
                                    @if ($errors->has('role'))
                                        <span class="text-danger">{{ $errors->first('role') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="start_period"
                                       class="col-sm-3 text-end control-label col-form-label">Start Period</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{ $errors->has('start_period') ? 'is-invalid':'' }}"
                                           id="start_period"
                                           name="start_period"
                                           value="{{$experience->start_period}}"
                                           placeholder="mm/dd/yyyy"
                                           required>
                                    @if ($errors->has('start_period'))
                                        <span class="text-danger">{{ $errors->first('start_period') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="end_period"
                                       class="col-sm-3 text-end control-label col-form-label">End Period</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                           autocapitalize="false"
                                           value="{{$experience->end_period}}"
                                           class="form-control {{ $errors->has('end_period') ? 'is-invalid':'' }}"
                                           id="end_period" name="end_period"
                                           placeholder="mm/dd/yyyy" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text h-100"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    @if ($errors->has('end_period'))
                                        <span class="text-danger">{{ $errors->first('end_period') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {{--                                <label for="description"--}}
                                {{--                                       class="col-sm-3 text-end control-label col-form-label">Description</label>--}}
                                <div class="col">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" rows="10" cols="50" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}" required>
                                        {{$experience->description}}
                                    </textarea>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-success text-white">Save</button>
                                    <a href="{{route('experience.index')}}" class="btn btn-danger text-white">Back</a>
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
