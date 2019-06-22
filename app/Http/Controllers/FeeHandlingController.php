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

    	return $this->userService->indexView('maab.registration', $this->userService->getStudents());
    	dd($this->userService->getStudents());
    }

    public function AddFeeForm($student_id){
    	$student = User::where('id',$student_id)->first();
    	return view('maab.add-registration',[
    		'student' => $student
        ]);
    	
    }
}
