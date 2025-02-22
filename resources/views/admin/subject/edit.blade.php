@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Subject</h1>
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
                            <form method="post" action="">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Subject Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $getRecord->name }}" required placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Subject Type</label>
                                        <select class="form-control" name="type">
                                            <option value="">Select Type</option>
                                            <option {{ $getRecord->type == 'Theory' ? 'selected' : '' }} value="Theory">
                                                Theory
                                            </option>
                                            <option {{ $getRecord->type == 'Practical' ? 'selected' : '' }}
                                                value="Practical">
                                                Practical</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option {{ $getRecord->type == 0 ? 'selected' : '' }} value="0">Active
                                            </option>
                                            <option {{ $getRecord->type == 1 ? 'selected' : '' }} value="1">Inactive
                                            </option>
                                        </select>
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
