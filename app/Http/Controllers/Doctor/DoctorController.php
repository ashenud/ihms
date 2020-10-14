<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Baby\Baby;
use App\Models\Doctor\DoctorMessage;
use Illuminate\Support\Facades\Session;

class DoctorController extends Controller
{
    public function index() {

        $user_id = Auth::user()->user_id;
        $data = array();

        $data['doctor_name'] = Auth::user()->doctor->doctor_name;
        $data['babies_count'] = Baby::where('status',1)->count();

        $data['msg_count'] = DoctorMessage::where('read_status',1)->where('status',1)->count();

        // dd($data);
        return view('Doctor.dashboard')->with('data',$data);
    }

    public function babySelect(Request $request) {

        $mother_nic = $request->mother_nic;
        $data = array();

        $babies = Baby::join('mothers', 'babies.mother_nic', '=', 'babies.mother_nic')
                        ->select('babies.baby_id', 'babies.baby_gender', 'babies.baby_first_name', 'mothers.mother_name')
                        ->where('babies.mother_nic',$mother_nic)
                        ->where('babies.status',1)
                        ->where('mothers.status',1)
                        ->get()
                        ->toArray();

        if (!empty($babies)) {
            $data['babies'] = $babies;
            $data['mother_name'] = $babies[0]['mother_name'];

            // dd($data);
            return view('Baby.select')->with('data',$data);
        } 
        else {
            Session::flash('message', 'මවගේ තොරතුරු නොගැලපේ !'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }

    }
}
