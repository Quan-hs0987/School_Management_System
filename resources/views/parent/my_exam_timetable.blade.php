@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Exam Timetable <span style="color: blue;">({{ $getStudent->name }}
                                {{ $getStudent->last_name }})</span></h1>
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
                        @foreach ($getRecord as $value)
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $value['name'] }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Subject Name</th>
                                                <th>Day</th>
                                                <th>Exam Date</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Room Number</th>
                                                <th>Full Marks</th>
                                                <th>Passing Marks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($value['exam'] as $valueS)
                                                <td>{{ $valueS['subject_name'] }}</td>
                                                <td>{{ date('1', strtotime($valueS['exam_date'])) }}</td>
                                                <td>{{ date('d-m-Y', strtotime($valueS['exam_date'])) }}</td>
                                                <td>{{ date('h:i:A', strtotime($valueS['start_time'])) }}</td>
                                                <td>{{ date('h:i:A', strtotime($valueS['end_time'])) }}</td>
                                                <td>{{ $valueS['room_number'] }}</td>
                                                <td>{{ $valueS['full_marks'] }}</td>
                                                <td>{{ $valueS['passing_mark'] }}</td>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        @endforeach
                    </div>
                    <!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

{{-- @section('script')
    <script type="text/javascript">
        $('.getClass').change(function() {
            var class_id = $(this).val();
            $.ajax({
                url: "{{ url('admin/class_timetable/get_subject') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    class_id: class_id,
                },
                dataType: "json",
                success: function(response) {
                    $('.getSubject').html(response.html);
                },
            })
        })
    </script>
@endsection --}}
