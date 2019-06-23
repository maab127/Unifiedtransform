<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationFee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'admission_fee', 'reg_fee', 'tuition_fee','workbook_fee','notebook_fee','security_fee','stationary_fee','paper_fee','admission_date','summer_fee','anual_fee'
    ];


    /*public function User() {
        return $this->belongsTo('App\User');
    }*/
}