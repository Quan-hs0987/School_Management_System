@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Student</h1>
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
                                <h3 class="card-title">My Student </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="overflow: auto;">
                                <table class="table">
                                    <thead>
                                        <tr>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $item)
                                            <tr>
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
                                                <td>{{ $item->class_id }}</td>
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
                                                <td style="min-width: 500px;">
                                                    <a style="margin-bottom: 10px;" class="btn btn-success btn-sm"
                                                        href="{{ url('parent/my_student/subject/' . $item->id) }}">Subject</a>
                                                    <a style="margin-bottom: 10px;" class="btn btn-primary btn-sm"
                                                        href="{{ url('parent/my_student/exam_timetable/' . $item->id) }}">Exam
                                                        Timetable</a>
                                                    <a style="margin-bottom: 10px;" class="btn btn-primary btn-sm"
                                                        href="{{ url('parent/my_student/exam_result/' . $item->id) }}">Exam
                                                        Result</a>
                                                    <a style="margin-bottom: 10px;" class="btn btn-warning btn-sm"
                                                        href="{{ url('parent/my_student/calendar/' . $item->id) }}">Calendar
                                                        Timetable</a>
                                                    <a style="margin-bottom: 10px;" class="btn btn-warning btn-sm"
                                                        href="{{ url('parent/my_student/attendance/' . $item->id) }}">Attendance</a>
                                                    <a style="margin-bottom: 10px;" class="btn btn-primary btn-sm"
                                                        href="{{ url('parent/my_student/homework/' . $item->id) }}">Homework</a>
                                                    <a style="margin-bottom: 10px;" class="btn btn-primary btn-sm"
                                                        href="{{ url('parent/my_student/submitted_homework/' . $item->id) }}">Submitted</a>
                                                    <a style="margin-bottom: 10px;" class="btn btn-primary btn-sm"
                                                        href="{{ url('parent/my_student/fees_collection/' . $item->id) }}">Fees
                                                        Collection</a>
                                                    <a style="margin-bottom: 10px;"
                                                        href="{{ url('chat?receiver_id=' . base64_encode($item->id)) }}"
                                                        class="btn btn-success btn-sm">Send Message</a>
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
