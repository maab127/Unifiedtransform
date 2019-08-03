<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Resources\AttendanceResource;
use Illuminate\Http\Request;
use Auth;
use App\RegistrationFee;
use App\FeeVoucher;

use App\Services\User\UserService;
use Carbon\Carbon;
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
		$rf->due_date = date("Y-m-d", strtotime($request->due_date));
		$rf->admission_date = date("Y-m-d", strtotime($request->admission_date));
		$rf->save();
		return redirect('/add-registration-fee')->with('status', 'Registration Successfull');
    }

    public function EditFeeForm($student_id){
    	$student = User::where('id',$student_id)->first();
    	$rf = RegistrationFee::where('student_id',$student_id)->first();
    	return view('maab.edit-registration',[
    		'student' => $student,
    		'rf' => $rf,
        ]);
    	
    }
    
    public function UpdateFee(Request $request){

		$rf = RegistrationFee::find($request->rf_id);
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
		$rf->save();
		return redirect('/add-registration-fee')->with('status', 'Registration Updated Successfull');
    }

    
    public function CreateFeeVoucherForm($student_id){
    	$student = User::where('id',$student_id)->first();
    	$rf = RegistrationFee::where('student_id',$student_id)->first();
    	// calculate remananing 
    	// dd('yo');
    	return view('maab.create-fee-coucher',[
    		'student' => $student,
    		'rf' => $rf,
        ]);
    	
    	//append year with month
    }

    public function StoreFeeVoucherForm(Request $request){
    	$v_m = $request->voucher_month.' - '.Carbon::now()->format('Y');
    	$student_id = $request->student_id;
    	
    	$prev_v_check = FeeVoucher::where('student_id',$student_id)->where('voucher_month',$v_m)->first();
    	if($prev_v_check){
    		return back()->with('status','Voucher already been made for this student.please print that.');
    	} else {
    		$adf  = $request->admission_fee;
			$regf = $request->reg_fee;
			$tf   = $request->tuition_fee;
			$wf   = $request->workbook_fee;
			$nf   = $request->notebook_fee;
			$sef  = $request->security_fee;
			$stf  = $request->stationary_fee;
			$pf   = $request->paper_fee;
			$sf   = $request->summer_fee;
			$af   = $request->anual_fee;
			
			$fine = $request->fine;
			$remaning = $request->remaning;
    		$total = $adf+$regf+$tf+$wf+$nf+$sef+$stf+$pf+$sf+$af+$fine+$remaning;
    		echo $total;
    		// dd($_POST);
    		 
    		$fv = new FeeVoucher();
    		$fv->student_id = $request->student_id;
    		$fv->admission_fee = $request->admission_fee;
			$fv->reg_fee = $request->reg_fee;
			$fv->tuition_fee = $request->tuition_fee;
			$fv->workbook_fee = $request->workbook_fee;
			$fv->notebook_fee = $request->notebook_fee;
			$fv->security_fee = $request->security_fee;
			$fv->stationary_fee = $request->stationary_fee;
			$fv->paper_fee = $request->paper_fee;
			$fv->summer_fee = $request->summer_fee;
			$fv->anual_fee = $request->anual_fee;
			$fv->remaning = $request->remaning;
			$fv->fine = $request->fine;
			$fv->paid_status = 'un-paid';
			$fv->voucher_month = $v_m;
			$fv->total = $total;
			$fv->save();

			return redirect('/view-printed-fee-voucher/'.$fv->id);
			
    	}

    }
    	public function ViewPrintedVoucher($vid){
    		$fv = FeeVoucher::find($vid);
    		
    		return view('maab.fee-voucher',['fv'=>$fv]);
    	}
}
