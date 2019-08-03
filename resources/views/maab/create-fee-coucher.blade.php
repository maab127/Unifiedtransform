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
                <div class="page-panel-title">Create Student Fee Voucher</div>
                <div class="panel-body">
                    <form action="/store-fee-voucher" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Full Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="" value="{{$student->name}}">
                                <input type="hidden" name="student_id" value="{{$student->id}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Admission</label>
                            <div class="col-md-6">
                                <input id="admission_fee" type="number" class="form-control" name="admission_fee" value="0">
                            </div>
                            <div class="col-md-2">
                                <input type="number" disabled class="form-control" value="{{$rf->admission_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Registration</label>
                            <div class="col-md-6">
                                <input type="number" id="" class="form-control" name="reg_fee" value="0">
                            </div>
                            <div class="col-md-2">
                                <input type="number" disabled class="form-control" value="{{$rf->reg_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Tuition</label>
                            <div class="col-md-6">
                                <input type="number" id="tuition_fee" class="form-control" name="tuition_fee" value="{{$rf->tuition_fee}}">
                            </div>
                            <div class="col-md-2">
                                <input type="number" disabled class="form-control" value="{{$rf->tuition_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Workbooks</label>
                            <div class="col-md-6">
                                <input type="number" id="workbook_fee" class="form-control" name="workbook_fee" value="0">
                            </div>
                            <div class="col-md-2">
                                <input type="number" disabled class="form-control" value="{{$rf->workbook_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Notebooks</label>
                            <div class="col-md-6">
                                <input type="number" id="notebook_fee" class="form-control" name="notebook_fee" value="0">
                            </div>
                            <div class="col-md-2">
                                <input type="number" disabled class="form-control" value="{{$rf->notebook_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Security</label>
                            <div class="col-md-6">
                                <input type="number" id="security_fee" class="form-control" name="security_fee" value="0">
                            </div>
                            <div class="col-md-2">
                                <input type="number" disabled class="form-control" value="{{$rf->security_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Stationary</label>
                            <div class="col-md-6">
                                <input type="number" id="stationary_fee" class="form-control" name="stationary_fee" value="0">
                            </div>
                            <div class="col-md-2">
                                <input type="number" disabled class="form-control" value="{{$rf->stationary_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Paper Money</label>
                            <div class="col-md-6">
                                <input type="number" id="paper_fee" class="form-control" name="paper_fee" value="0">
                            </div>
                            <div class="col-md-2">
                                <input type="number" disabled class="form-control" value="{{$rf->paper_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Summer Fund</label>
                            <div class="col-md-6">
                                <input type="number" id="summer_fee" class="form-control" name="summer_fee" value="0">
                            </div>
                            <div class="col-md-2">
                                <input type="number" disabled class="form-control" value="{{$rf->summer_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Anual Fund</label>
                            <div class="col-md-6">
                                <input type="number" id="anual_fee" class="form-control" name="anual_fee" value="0">
                            </div>
                            <div class="col-md-2">
                                <input type="number" disabled class="form-control" value="{{$rf->anual_fee}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Fine</label>
                            <div class="col-md-6">
                                <input type="number" id="fine" class="form-control" name="fine" value="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="voucher_month" class="col-md-3 control-label">Voucher Month</label>
                            <div class="col-md-6">
                                <select id="voucher_month" class="form-control" name="voucher_month">
                                   <option value="January">January</option>
                                   <option value="February">February</option>
                                   <option value="March">March</option>
                                   <option value="April">April</option>
                                   <option value="May">May</option>
                                   <option value="June">June</option>
                                   <option value="July">July</option>
                                   <option value="August">August</option>
                                   <option value="September">September</option>
                                   <option value="October">October</option>
                                   <option value="November">November</option>
                                   <option value="Devember">Devember</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Arrear</label>
                            <div class="col-md-6">
                                <input type="number" id="arrear" class="form-control" name="remaning" value="0">
                            </div>
                        </div>
                        {{--<!-- <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Total</label>
                            <div class="col-md-6">
                                <input type="number" id="total" class="form-control" disabled name="total" value="{{$rf->tuition_fee}}">
                            </div>
                        </div> --> --}}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
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
    $( document ).ready(function() {
        console.log( "ready!" );
    });
    $(function () {
        $('#dof').datepicker({});
        
        $("#fine").on("change",function() {
            total(this.value);
            console.log(this.value);
        });
    });
    function total($inp_val){
        var total = $('#total').val();
        var new_total = parseFloat(total)+parseFloat($inp_val);
        $('#total').val(new_total);
    }
</script>

@endsection
