<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Resources\AttendanceResource;
use Illuminate\Http\Request;
use Auth;
use App\RegistrationFee;
use App\Services\User\UserService;

class FeeHandlingController extends Controller {
    
    protected $userService;
    protected $user;

    public function __construct(UserService $userService, User $user){
        $this->userService = $userService;
        $this->user = $user;
    }

    public function index(){

    	return $this->userService->indexView('maab.registration', $this->userService->getStudents());
    	dd($this->userService->getStudents());
    }

    public function AddFeeForm($student_id){
    	$student = User::where('id',$student_id)->first();
    	return view('maab.add-registration',[
    		'student' => $student
        ]);
    	
    }

    public function StoreFee(Request $request){

		$rf = new RegistrationFee;
		$rf->student_id = $request->student_id;
		$rf->admission_fee = $request->admission_fee;
		$rf->reg_fee = $request->reg_fee;
		$rf->tuition_fee = $request->tuition_fee;
		$rf->workbook_fee = $request->workbook_fee;
		$rf->notebook_fee = $request->notebook_fee;
		$rf->security_fee = $request->security_fee;
		$rf->stationary_fee = $request->stationary_fee;
		$rf->paper_fee = $request->paper_fee;
		$rf->summer_fee = $request->summer_fee;
		$rf->anual_fee = $request->anual_fee;
		$rf->admission_date = date("Y-m-d", strtotime($request->admission_date));
		$rf->save();
		return redirect('/add-registration-fee')->with('status', 'Registration Successfull');
    }
}
