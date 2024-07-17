@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Teacher List (Total: {{ $getRecord->total() }})</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/teacher/create') }}" class="btn btn-primary">Add new Teacher</a>
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
                                <h3 class="card-title">Search Teacher</h3>
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
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control" name="mobile_number"
                                                value="{{ Request::get('mobile_number') }}" placeholder="Mobile Number">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Mariral Status</label>
                                            <input type="text" class="form-control" name="marital_status"
                                                value="{{ Request::get('marital_status') }}" placeholder="Marital Status">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Current Address</label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ Request::get('address') }}" placeholder="Current Address">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="">Select Status</option>
                                                <option {{ Request::get('status') == '100' ? 'selected' : '' }}
                                                    value="100">
                                                    Active</option>
                                                <option {{ Request::get('status') == '1' ? 'selected' : '' }}
                                                    value="1">
                                                    Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Date of Joining</label>
                                            <input type="date" class="form-control" name="admission_date"
                                                value="{{ Request::get('admission_date') }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Create Date</label>
                                            <input type="date" class="form-control" name="date"
                                                value="{{ Request::get('date') }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px">Search</button>
                                            <a href="{{ url('admin/teacher/list') }}" class="btn btn-success"
                                                style="margin-top: 30px">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Teacher List </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="overflow: auto;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Profile Pic</th>
                                            <th>Teacher Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Date of Joining</th>
                                            <th>Mobile Number</th>
                                            <th>Marital Status</th>
                                            <th>Current Address</th>
                                            <th>Permanent Address</th>
                                            <th>Qualification</th>
                                            <th>Work Experience</th>
                                            <th>Note</th>
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
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->gender }}</td>
                                                <td>
                                                    @if (!empty($value->date_of_birth))
                                                        {{ date('d-m-Y', strtotime($value->date_of_birth)) }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (!empty($value->admission_date))
                                                        {{ date('d-m-Y', strtotime($value->admission_date)) }}
                                                    @endif
                                                </td>
                                                <td>{{ $item->mobile_number }}</td>
                                                <td>{{ $item->marital_status }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->permanent_address }}</td>
                                                <td>{{ $item->qualification }}</td>
                                                <td>{{ $item->work_experience }}</td>
                                                <td>{{ $item->note }}</td>
                                                <td>{{ $item->status == 0 ? 'Active' : 'Inactive' }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($item->created_at)) }}</td>
                                                <td style="min-width: 250px">
                                                    <a href="{{ url('admin/teacher/edit/' . $item->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="{{ url('admin/teacher/delete/' . $item->id) }}"
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
