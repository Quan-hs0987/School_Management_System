@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Teacher</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="post" action="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>First Name <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name') }}" required placeholder="First Name">
                                            <div style="color: red">{{ $errors->first('name') }}</div>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Last Name <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="last_name"
                                                value="{{ old('last_name') }}" required placeholder="Last Name">
                                            <div style="color: red">{{ $errors->first('last_name') }}</div>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Gender <span style="color: red">*</span></label>
                                            <select class="form-control" required name="gender">
                                                <option value="">Select Gender</option>
                                                <option {{ old('gender') == 'Male' ? 'selected' : '' }} value="Male">
                                                    Male</option>
                                                <option {{ old('gender') == 'Female' ? 'selected' : '' }} value="Female">
                                                    Female</option>
                                                <option {{ old('gender') == 'Other' ? 'selected' : '' }} value="Other">
                                                    Other
                                                </option>
                                            </select>
                                            <div style="color: red">{{ $errors->first('gender') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of Birth <span style="color: red">*</span></label>
                                            <input type="date" class="form-control" name="date_of_birth"
                                                value="{{ old('date_of_birth') }}" required>
                                            <div style="color: red">{{ $errors->first('date_of_birth') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of Joining <span style="color: red">*</span></label>
                                            <input type="date" class="form-control" name="admission_date"
                                                value="{{ old('admission_date') }}" required>
                                            <div style="color: red">{{ $errors->first('admission_date') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Mobile Number <span style="color: red"></span></label>
                                            <input type="text" class="form-control" name="mobile_number"
                                                value="{{ old('mobile_number') }}" placeholder="Mobile Number">
                                            <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Marital Status<span style="color: red"></span></label>
                                            <input type="text" class="form-control" name="marital_status"
                                                value="{{ old('marital_status') }}" placeholder="Marital Status">
                                            <div style="color: red">{{ $errors->first('marital_status') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Profile Pic <span style="color: red"></span></label>
                                            <input type="file" class="form-control" name="profile_pic">
                                            <div style="color: red">{{ $errors->first('profile_pic') }}</div>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label> Current Address <span style="color: red">*</span></label>
                                            <textarea class="form-control" name="address" required>{{ old('address') }}</textarea>
                                            <div style="color: red">{{ $errors->first('address') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label> Permanent Address <span style="color: red"></span></label>
                                            <textarea class="form-control" name="permanent_address" required>{{ old('permanent_address') }}</textarea>
                                            <div style="color: red">{{ $errors->first('permanent_address') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label> Qualification <span style="color: red"></span></label>
                                            <textarea class="form-control" name="qualification" required>{{ old('qualification') }}</textarea>
                                            <div style="color: red">{{ $errors->first('qualification') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label> Work Experience <span style="color: red"></span></label>
                                            <textarea class="form-control" name="work_experience" required>{{ old('work_experience') }}</textarea>
                                            <div style="color: red">{{ $errors->first('work_experience') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label> Note <span style="color: red"></span></label>
                                            <textarea class="form-control" name="note" required>{{ old('note') }}</textarea>
                                            <div style="color: red">{{ $errors->first('note') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Status <span style="color: red">*</span></label>
                                            <select class="form-control" required name="status">
                                                <option {{ old('status') == '0' ? 'selected' : '' }} value="0">Active
                                                </option>
                                                <option {{ old('status') == '1' ? 'selected' : '' }} value="1">
                                                    Inactive</option>
                                            </select>
                                            <div style="color: red">{{ $errors->first('status') }}</div>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>Email <span style="color: red">*</span></label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" required placeholder="Email">
                                        <div style="color: red">{{ $errors->first('email') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password <span style="color: red">*</span></label>
                                        <input type="password" class="form-control" name="password" required
                                            placeholder="Password">
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
