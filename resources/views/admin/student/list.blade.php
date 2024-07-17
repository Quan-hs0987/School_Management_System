@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student List (Total: {{ $getRecord->total() }})</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/student/create') }}" class="btn btn-primary">Add new Student</a>
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
                                            <label>Admission Number</label>
                                            <input type="text" class="form-control" name="admission_number"
                                                value="{{ Request::get('admission_number') }}"
                                                placeholder="Admission Number">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Roll Number</label>
                                            <input type="text" class="form-control" name="roll_number"
                                                value="{{ Request::get('roll_number') }}" placeholder="Roll Number">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Class</label>
                                            <input type="text" class="form-control" name="class"
                                                value="{{ Request::get('class') }}" placeholder="Class">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="">Select Gender</option>
                                                <option {{ Request::get('gender') == 'Male' ? 'selected' : '' }}
                                                    value="Male">
                                                    Male</option>
                                                <option {{ Request::get('gender') == 'Female' ? 'selected' : '' }}
                                                    value="Female">
                                                    Female</option>
                                                <option {{ Request::get('gender') == 'Other' ? 'selected' : '' }}
                                                    value="Other">
                                                    Other
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Caste</label>
                                            <input type="text" class="form-control" name="caste"
                                                value="{{ Request::get('caste') }}" placeholder="Caste">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Religion</label>
                                            <input type="text" class="form-control" name="religion"
                                                value="{{ Request::get('religion') }}" placeholder="Religion">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control" name="mobile_number"
                                                value="{{ Request::get('mobile_number') }}" placeholder="Mobile Number">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Blood Group</label>
                                            <input type="text" class="form-control" name="blood_group"
                                                value="{{ Request::get('blood_group') }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="">Select Status</option>
                                                <option {{ Request::get('status') == 100 ? 'selected' : '' }}
                                                    value="100">
                                                    Active</option>
                                                <option {{ Request::get('status') == 1 ? 'selected' : '' }} value="1">
                                                    Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Admission Date</label>
                                            <input type="date" class="form-control" name="admission_date"
                                                value="{{ Request::get('admission_date') }}">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Create Date</label>
                                            <input type="date" class="form-control" name="date"
                                                value="{{ Request::get('date') }}" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px">Search</button>
                                            <a href="{{ url('admin/student/list') }}" class="btn btn-success"
                                                style="margin-top: 30px">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Student List </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="overflow: auto;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Profile Pic</th>
                                            <th>Student Name</th>
                                            <th>Parent Name</th>
                                            <th>Email</th>
                                            <th>Admission Number</th>
                                            <th>Roll Number</th>
                                            <th>Class</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Caste</th>
                                            <th>Religion</th>
                                            <th>Mobile Number</th>
                                            <th>Admission Date</th>
                                            <th>Blood Group</th>
                                            <th>Height</th>
                                            <th>Weight</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    @if (!empty($item->getProfileDirect()))
                                                        <img src="{{ $item->getProfileDirect() }}"
                                                            style="height: 50px; width: 50px; border-radius: 50px"
                                                            alt="">
                                                    @endif
                                                </td>
                                                <td>{{ $item->name }}{{ $item->last_name }}</td>
                                                <td>{{ $item->parent_name }}{{ $item->parent_last_name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->admission_number }}</td>
                                                <td>{{ $item->roll_number }}</td>
                                                <td>{{ $item->class_name }}</td>
                                                <td>{{ $item->gender }}</td>
                                                <td>
                                                    @if (!empty($item->date_of_birth))
                                                        {{ date('d-m-Y', strtotime($item->date_of_birth)) }}
                                                    @endif
                                                </td>
                                                <td>{{ $item->caste }}</td>
                                                <td>{{ $item->religion }}</td>
                                                <td>{{ $item->mobile_number }}</td>
                                                <td>
                                                    @if (!empty($item->admission_date))
                                                        {{ date('d-m-Y', strtotime($item->admission_date)) }}
                                                    @endif
                                                </td>
                                                <td>{{ $item->blood_group }}</td>
                                                <td>{{ $item->height }}</td>
                                                <td>{{ $item->weight }}</td>
                                                <td>{{ $item->status == 0 ? 'Active' : 'Inactive' }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($item->created_at)) }}</td>
                                                <td style="min-width: 250px">
                                                    <a href="{{ url('admin/student/edit/' . $item->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="{{ url('admin/student/delete/' . $item->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                    <a href="{{ url('chat?receiver_id=' . base64_encode($item->id)) }}"
                                                        class="btn btn-success btn-sm">Send Message</a>
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
