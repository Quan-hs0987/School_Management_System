@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Assign Class Teacher ({{ $getRecord->total() }})</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/assign_class_teacher/create') }}" class="btn btn-primary">Add New Assign Class
                            Teacher</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>



        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Assign Subject Class</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Class Name</label>
                                            <input type="text" class="form-control" name="class_name"
                                                value="{{ Request::get('class_name') }}" placeholder="Class Name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Teacher Name</label>
                                            <input type="text" class="form-control" name="teacher_name"
                                                value="{{ Request::get('teacher_name') }}" placeholder="Teacher Name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="">Select</option>
                                                <option {{ Request::get('status') == 100 ? 'selected' : '' }}
                                                    value="100">Active</option>
                                                <option {{ Request::get('status') == 1 ? 'selected' : '' }} value="1">
                                                    Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Date</label>
                                            <input type="date" class="form-control" name="date"
                                                value="{{ Request::get('date') }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px">Search</button>
                                            <a href="{{ url('admin/assign_class_teacher/list') }}" class="btn btn-success"
                                                style="margin-top: 30px">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Assign Class Teacher List </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Class Name</th>
                                            <th>Teacher Name</th>
                                            <th>Status</th>
                                            <th>Created By</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->class_name }}</td>
                                                <td>{{ $item->teacher_name }}</td>

                                                <td>
                                                    @if ($item->status == 0)
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </td>
                                                <td>{{ $item->created_by_name }}</td>
                                                <td>{{ date('d-m-Y:i A', strtotime($item->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/assign_class_teacher/edit/' . $item->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/assign_class_teacher/edit_single/' . $item->id) }}"
                                                        class="btn btn-danger">Edit Single</a>
                                                    <a href="{{ url('admin/assign_class_teacher/delete/' . $item->id) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float: right;">
                                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
