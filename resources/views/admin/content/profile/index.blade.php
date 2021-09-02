@extends('admin.layout.app')
@section('title')
    <title>Profile</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('admin/ckeditor/ckeditor.js')}}"></script>
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/assets/images/favicon.png')}}">
    <!-- Custom CSS -->
    <link href="{{asset('admin/assets/libs/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('admin/dist/css/style.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Profile</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
    @endif
    <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row el-element-overlay">

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="el-card-item">
                        <div class="el-card-avatar el-overlay-1"> <img src="{{asset("/assets/img/".$profile->picture)}}"
                                                                       alt="user" />
                            <div class="el-overlay">
                                <ul class="list-style-none el-info">
                                    <li class="el-item"><a
                                            class="btn default btn-outline image-popup-vertical-fit el-link"
                                            href="{{asset("/assets/img/".$profile->picture)}}"><i
                                                class="mdi mdi-magnify-plus"></i></a></li>
                                    <li class="el-item"><a class="btn default btn-outline el-link"
                                                           href="javascript:void(0);"><i class="mdi mdi-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="el-card-content">
                            <h4 class="mb-0">{{$profile->first_name}} {{$profile->last_name}}</h4> <span class="text-muted">{{$profile->email}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">About</h5>
                                <p>
                                    @php
                                      echo $profile->about
                                    @endphp
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Address</h5>
                                <p>
                                    {{$profile->address}}
                                </p><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">District</h5>
                                <p>{{$profile->destrict}}</p><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">City</h5>
                                <p>{{$profile->city}}</p><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Region</h5>
                                <p>{{$profile->region}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- editor -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col">
                            <form action="{{route('profile.update', $profile->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <h4 class="card-title">Edit Data</h4>
                            <!-- Create the editor container -->
                                {{--                                <label for="description"--}}
                                {{--                                       class="col-sm-3 text-end control-label col-form-label">Description</label>--}}
                                <div class="form-group row">
                                    <label for="first_name"
                                           class="col-sm-2 text-end control-label col-form-label">First Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="first_name"
                                               class="form-control {{ $errors->has('first_name') ? 'is-invalid':'' }}"
                                               id="first_name"
                                               placeholder="First Name Here (Ex: Helmuth)"
                                               value="{{$profile->first_name}}"
                                               required>
                                        @if ($errors->has('first_name'))
                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="last_name"
                                           class="col-sm-2 text-end control-label col-form-label">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="last_name"
                                               class="form-control {{ $errors->has('last_name') ? 'is-invalid':'' }}"
                                               id="last_name"
                                               value="{{$profile->last_name}}"
                                               placeholder="Last Name (Ex: Tampubolon)" required>
                                        @if ($errors->has('last_name'))
                                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address"
                                           class="col-sm-2 text-end control-label col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="address"
                                               class="form-control {{ $errors->has('address') ? 'is-invalid':'' }}"
                                               id="address"
                                               value="{{$profile->address}}"
                                               placeholder="Address (Ex: Balige, Toba, Sumatera Utara)" required>
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="picture" class="col-md-2 text-end control-label col-form-label">Picture</label>
                                    <div class="col-md-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control"
                                                   name="picture"
                                                   id="picture"
                                                   >
                                            @if ($errors->has('picture'))
                                                <div class="invalid-feedback">{{ $errors->first('picture') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="destrict"
                                           class="col-sm-2 text-end control-label col-form-label">District</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="destrict"
                                               class="form-control {{ $errors->has('destrict') ? 'is-invalid':'' }}"
                                               id="destrict"
                                               value="{{$profile->destrict}}"
                                               placeholder="District (Ex: Balige)" required>
                                        @if ($errors->has('destrict'))
                                            <span class="text-danger">{{ $errors->first('destrict') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city"
                                           class="col-sm-2 text-end control-label col-form-label">City</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="city"
                                               class="form-control {{ $errors->has('city') ? 'is-invalid':'' }}"
                                               id="city"
                                               value="{{$profile->city}}"
                                               placeholder="City (Ex: Toba)" required>
                                        @if ($errors->has('city'))
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="region"
                                           class="col-sm-2 text-end control-label col-form-label">Region</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="region"
                                               class="form-control {{ $errors->has('region') ? 'is-invalid':'' }}"
                                               id="region"
                                               value="{{$profile->region}}"
                                               placeholder="Region (Ex: North Sumatera)" required>
                                        @if ($errors->has('region'))
                                            <span class="text-danger">{{ $errors->first('region') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email"
                                           class="col-sm-2 text-end control-label col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email"
                                               class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}"
                                               id="email"
                                               value="{{$profile->email}}"
                                               placeholder="example@gmail.com" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{--                                <label for="description"--}}
                                    {{--                                       class="col-sm-3 text-end control-label col-form-label">Description</label>--}}
                                    <label for="about" class="col-sm-2 text-end control-label col-form-label">About</label>
                                    <div class="col-sm-10">
                                        <textarea name="about" id="about" rows="10" cols="50" class="form-control {{ $errors->has('about') ? 'is-invalid':'' }}" required>{{$profile->about}}</textarea>
                                        @if ($errors->has('about'))
                                            <span class="text-danger">{{ $errors->first('about') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success text-white">Save</button>
                            </form>
                        </div>
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
    <script src="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js')}}"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="{{asset('admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- this page js -->
    <script src="{{asset('admin/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/magnific-popup/meg.init.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script>
        var konten = document.getElementById("about");
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
@endsection
