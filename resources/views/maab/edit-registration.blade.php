@extends('layouts.app')

@section('title', 'Students')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="side-navbar">
            @include('layouts.leftside-menubar')
        </div>
        <div class="col-md-10" id="main-container">
            <div class="panel panel-default">
                <div class="page-panel-title">Register Student</div>
                <div class="panel-body">
                    <form action="/update-user-registration-fee" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Full Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="" value="{{$student->name}}">
                                <input type="hidden" name="rf_id" value="{{$rf->id}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Admission</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="admission_fee" value="{{$rf->admission_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Registration</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="reg_fee" value="{{$rf->reg_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Tuition</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="tuition_fee" value="{{$rf->tuition_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Workbooks</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="workbook_fee" value="{{$rf->workbook_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Notebooks</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="notebook_fee" value="{{$rf->notebook_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Security</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="security_fee" value="{{$rf->security_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Stationary</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="stationary_fee" value="{{$rf->stationary_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Paper Money</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="paper_fee" value="{{$rf->paper_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Summer Fund</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="summer_fee" value="{{$rf->summer_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Anual Fund</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="anual_fee" value="{{$rf->anual_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" name="" class="btn btn-success" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script>
    $(function () {
        $('#dof').datepicker({});
    });
</script>

@endsection
