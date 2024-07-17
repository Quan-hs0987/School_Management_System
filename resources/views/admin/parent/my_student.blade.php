@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Parent Student List ({{ $getParent->name }} {{ $getParent->last_name }})</h1>
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
                                <h3 class="card-title">Search Student</h3>
                            </div>

                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label>Parent ID</label>
                                            <input type="text" class="form-control" name="id"
                                                value="{{ Request::get('id') }}" placeholder="Parent ID">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ Request::get('name') }}" placeholder="Name">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="last_name"
                                                value="{{ Request::get('last_name') }}" placeholder="Last Name">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ Request::get('email') }}" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px">Search</button>
                                            <a href="{{ url('admin/parent/my-student/' . $parent_id) }}"
                                                class="btn btn-success" style="margin-top: 30px">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('_message')

                        @if (!empty($getSearchStudent))
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"> Student List </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Profile Pic</th>
                                                <th>Student Name</th>
                                                <th>Email</th>
                                                <th>Parent Name</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($getSearchStudent as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>
                                                        @if (!empty($item->getProfile()))
                                                            <img src="{{ $item->getProfile() }}"
                                                                style="height: 50px; width: 50px; border-radius: 50px"
                                                                alt="">
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->name }}{{ $item->last_name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->parent_name }}</td>
                                                    <td>{{ date('d-m-Y H:i A', strtotime($item->created_at)) }}</td>
                                                    <td style="min-width: 150px">
                                                        <a href="{{ url('admin/parent/assign_student_parent/' . $item->id . '/' . $parent_id) }}"
                                                            class="btn btn-primary btn-sm">Add Student to Parent</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div style="padding: 10px; float: right;">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        @endif



                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Parent Student List </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Profile Pic</th>
                                            <th>Student Name</th>
                                            <th>Email</th>
                                            <th>Parent Name</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    @if (!empty($item->getProfile()))
                                                        <img src="{{ $item->getProfile() }}"
                                                            style="height: 50px; width: 50px; border-radius: 50px"
                                                            alt="">
                                                    @endif
                                                </td>
                                                <td>{{ $item->name }}{{ $item->last_name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->parent_name }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($item->created_at)) }}</td>
                                                <td style="min-width: 150px">
                                                    <a href="{{ url('admin/parent/assign_student_parent_delete/' . $item->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float: right;">
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
