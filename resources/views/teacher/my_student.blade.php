@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Student List </h1>
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
                                            <th>Created Date</th>
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
                                                <td>{{ date('d-m-Y H:i A', strtotime($item->created_at)) }}</td>
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
