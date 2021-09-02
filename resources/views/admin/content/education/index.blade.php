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
                            <li class="breadcrumb-item active" aria-current="page">Education</li>
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
                        <h5 class="card-title">Education Data</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Major</th>
                                    <th>GPA</th>
                                    <th>Start Period</th>
                                    <th>End Period</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($educations as $idx => $data)
                                    <tr>
                                        <td>{{$idx+1}}</td>
                                        <td><?= $data['name'] ?></td>
                                        <td><?= $data['status'] ?></td>
                                        <td><?= $data['major'] ?></td>
                                        <td><?= (empty($data['gpa']))?'':$data['gpa']; ?></td>
                                        <td><?= $data['start_period'] ?></td>
                                        <td><?= $data['end_period'] ?></td>
                                        <td>
                                            <a href="{{route('education.edit',$data->id)}}"
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
                                                            <form action="{{route('education.destroy',$data->id)}}"
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
                                        <td colspan="3" class="text-center">Education Data is Empty</td>
                                        <td style="display: none"></td>
                                        <td style="display: none"></td>
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
                                    <th>Status</th>
                                    <th>Major</th>
                                    <th>GPA</th>
                                    <th>Start Period</th>
                                    <th>End Period</th>
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
                            <form action="{{route('education.store')}}" method="POST">
                                <h4 class="card-title">Add Data</h4>
                                <!-- Create the editor container -->
                                @csrf
                                {{--                                <label for="description"--}}
                                {{--                                       class="col-sm-3 text-end control-label col-form-label">Description</label>--}}
                                <div class="form-group row">
                                    <label for="name"
                                           class="col-sm-3 text-end control-label col-form-label">School Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name"
                                               class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                                               id="name"
                                               placeholder="Your School Name Here (Ex: Del Institute of Technology)"
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
                                               placeholder="Status Here (Ex: Collage, Senior High School)" required>
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
                                               placeholder="GPA Here (Ex: 3.99)">
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
                                               placeholder="Start Period Here (Ex: 2017)" required>
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
                                               placeholder="End Period Here (Ex: 2021)" required>
                                        @if ($errors->has('end_period'))
                                            <span class="text-danger">{{ $errors->first('end_period') }}</span>
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
