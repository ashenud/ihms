<?php

namespace App\Http\Controllers;

use App\Models\Baby\Baby;
use App\Models\Mother\Mother;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function BabyIdValidation(Request $request) {

        $result = Baby::where('baby_id',$request->baby_id)->count();

        if($result > 0) {
            return "Baby ID you have entered is already existed";
        }

    }

    public function MotherNicValidation(Request $request) {

        $result = Mother::where('mother_nic',$request->m_nic)->count();

        if($result > 0) {
            return "NIC you have entered is already existed";
        }

    }

    public function MotherTpNbrValidation(Request $request) {

        $result = Mother::where('telephone',$request->tp_no)->count();

        if($result > 0) {
            return "Number you have entered is already existed";
        }

    }

    public function MotherEmailValidation(Request $request) {

        $result = Mother::where('email',$request->email)->count();

        if($result > 0) {
            return "Email you have entered is already existed";
        }

    }
}
