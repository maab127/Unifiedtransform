<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Resources\AttendanceResource;
use Illuminate\Http\Request;
use Auth;

use App\Services\User\UserService;

class FeeHandlingController extends Controller {
    
    protected $userService;
    protected $user;

    public function __construct(UserService $userService, User $user){
        $this->userService = $userService;
        $this->user = $user;
    }

    public function index(){
    	$students = User::where('role','student')->where('school_id',Auth::user()->school_id)->get();

    	return $this->userService->indexView('maab.registration', $this->userService->getStudents());
    	dd($this->userService->getStudents());
    	return view('maab.registration',[
    		'students' => $students
          //'messageCount'=>$messageCount,
        ]);
    }

    public function AddFeeForm($student_id){
    	dd($student_id);
    }
}
