@extends('admin.layout.app')
@section('title')
    <title>Social Media</title>
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
                <h4 class="page-title">Social Media</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Social Media</li>
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
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Social Media</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th style="width: 30%">Link</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($socialMedia as $idx => $data)
                                    <tr>
                                        <td>{{$idx+1}}</td>
                                        <td><?= $data['name'] ?></td>
                                        <td><span class="<?= $data['icon'] ?>"></span></td>
                                        <td><a href="<?= $data['link'] ?>"><?= $data['link'] ?></a></td>
                                        <td>
                                            <a href="{{route('social-media.edit',$data->id)}}"
                                               class="btn btn-outline-secondary">Edit</a>
                                            <button type="button" class="btn btn-outline-danger mt-2 mt-md-0"
                                                    data-toggle="modal"
                                                    data-target="#delete_{{$data->id}}">Delete
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="delete_{{$data->id}}" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="label_{{$data->id}}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are You Sure To Delete This Data?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close
                                                            </button>
                                                            <form action="{{route('social-media.destroy',$data->id)}}"
                                                                  method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-primary">Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Social Media Data is Empty</td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th style="width: 30%">Type</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                                </tfoot>
                            </table>
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
                            <form action="{{route('social-media.store')}}" method="POST">
                                <h4 class="card-title">Add Data</h4>
                                <!-- Create the editor container -->
                                @csrf
                                {{--                                <label for="description"--}}
                                {{--                                       class="col-sm-3 text-end control-label col-form-label">Description</label>--}}
                                <div class="form-group row">
                                    <label for="name"
                                           class="col-sm-3 text-end control-label col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name"
                                               class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                                               id="name"
                                               placeholder="Skills Name Here (Ex: LinkedIn)"
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
                                               class="form-control {{ $errors->has('icon') ? 'is-invalid':'' }}"
                                               id="icon"
                                               placeholder="Icon Here (Ex: mdi mdi-linkedin-box)" required>
                                        @if ($errors->has('icon'))
                                            <span class="text-danger">{{ $errors->first('icon') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="link"
                                           class="col-sm-3 text-end control-label col-form-label">Link</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="link"
                                               class="form-control {{ $errors->has('link') ? 'is-invalid':'' }}"
                                               id="link"
                                               placeholder="link Here (Ex: https://www.linkedin.com/in/helmuth-simon-tampubolon-18935717a/)" required>
                                        @if ($errors->has('link'))
                                            <span class="text-danger">{{ $errors->first('link') }}</span>
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
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
@endsection
