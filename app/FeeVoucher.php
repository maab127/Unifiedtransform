<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeVoucher extends Model{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'admission_fee', 'reg_fee', 'tuition_fee','workbook_fee','notebook_fee','security_fee','stationary_fee','paper_fee','summer_fee','anual_fee','voucher_month','paid_status','remaning','total','fine','paid_date','due_date'
    ];
}