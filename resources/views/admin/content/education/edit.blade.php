@extends('admin.layout.app')
@section('title')
    <title>Education</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('admin/ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Education</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('education.index')}}">Education</a></li>
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
                        <form action="{{route('education.update',$education->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <h4 class="card-title">Edit Data</h4>
                        <!-- Create the editor container -->
                            <div class="form-group row">
                                <label for="name"
                                       class="col-sm-3 text-end control-label col-form-label">School Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name"
                                           class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                                           id="name"
                                           placeholder="Your School Name Here (Ex: Del Institute of Technology)"
                                           value="{{$education->name}}"
                                           required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status"
                                       class="col-sm-3 text-end control-label col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <input type="text" name="status"
                                           class="form-control{{ $errors->has('status') ? 'is-invalid':'' }}"
                                           id="status"
                                           placeholder="Status Here (Ex: Collage, Senior High School)"
                                           value="{{$education->status}}"
                                           required>
                                    @if ($errors->has('status'))
                                        <span class="text-danger">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="major"
                                       class="col-sm-3 text-end control-label col-form-label">Major</label>
                                <div class="col-sm-9">
                                    <input type="text" name="major"
                                           class="form-control {{ $errors->has('major') ? 'is-invalid':'' }}"
                                           id="major"
                                           placeholder="Major Here (Ex: Software Engineering Technology) || fill ' - ' if No Major"
                                           value="{{$education->major}}"
                                           required>
                                    @if ($errors->has('major'))
                                        <span class="text-danger">{{ $errors->first('major') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gpa"
                                       class="col-sm-3 text-end control-label col-form-label">GPA</label>
                                <div class="col-sm-9">
                                    <input type="text" name="gpa"
                                           class="form-control {{ $errors->has('gpa') ? 'is-invalid':'' }}" id="gpa"
                                           placeholder="GPA Here (Ex: 3.99)"
                                           value="{{$education->gpa}}"
                                           required>
                                    @if ($errors->has('gpa'))
                                        <span class="text-danger">{{ $errors->first('gpa') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="start_period"
                                       class="col-sm-3 text-end control-label col-form-label">Start Period</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                           id="start_period {{ $errors->has('start_period') ? 'is-invalid':'' }}"
                                           name="start_period"
                                           placeholder="Start Period Here (Ex: 2017)"
                                           value="{{$education->start_period}}"
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
                                           class="form-control {{ $errors->has('end_period') ? 'is-invalid':'' }}"
                                           id="end_period" name="end_period"
                                           value="{{$education->end_period}}"
                                           placeholder="End Period Here (Ex: 2021)" required>
                                    @if ($errors->has('end_period'))
                                        <span class="text-danger">{{ $errors->first('end_period') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-success text-white">Save</button>
                                    <a href="{{route('education.index')}}" class="btn btn-danger text-white">Back</a>
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
{{--    <script src="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js')}}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}
@endsection
