@extends('admin.layout.app')
@section('title')
    <title>Skills</title>
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
                <h4 class="page-title">Skills</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('skills.index')}}">Skills</a></li>
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
                        <form action="{{route('skills.update',$skill->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <h4 class="card-title">Edit Data</h4>
                            <!-- Create the editor container -->
                            {{--                                <label for="description"--}}
                            {{--                                       class="col-sm-3 text-end control-label col-form-label">Description</label>--}}
                            <div class="form-group row">
                                <label for="name"
                                       class="col-sm-3 text-end control-label col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name"
                                           class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                                           id="name"
                                           placeholder="Skills Name Here (Ex: Node JS)"
                                           value="{{$skill->name}}"
                                           required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="icon"
                                       class="col-sm-3 text-end control-label col-form-label">Icon</label>
                                <div class="col-sm-9">
                                    <input type="text" name="icon"
                                           class="form-control{{ $errors->has('icon') ? 'is-invalid':'' }}"
                                           id="icon"
                                           value="{{$skill->icon}}"
                                           placeholder="Icon Here (Ex: fab fa-node)" required>
                                    @if ($errors->has('icon'))
                                        <span class="text-danger">{{ $errors->first('icon') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type"
                                       class="col-sm-3 text-end control-label col-form-label">Type</label>
                                <div class="col-sm-9">
                                    <input type="text" name="type"
                                           class="form-control{{ $errors->has('type') ? 'is-invalid':'' }}"
                                           id="type"
                                           value="{{$skill->type}}"
                                           placeholder="Type Here (Ex: Programming Language)" required>
                                    @if ($errors->has('type'))
                                        <span class="text-danger">{{ $errors->first('type') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-success text-white">Save</button>
                                    <a href="{{route('skills.index')}}" class="btn btn-danger text-white">Back</a>
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
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
{{--    <script src="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js')}}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}
@endsection
