<?php

namespace App\Http\Controllers\Baby;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Baby\Baby;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BabyController extends Controller
{
    public function select() {
        
        $mother_id=Auth::user()->user_id; 

        $data = array();

        $babies = Baby::join('mothers', 'babies.mother_nic', '=', 'babies.mother_nic')
                        ->select('babies.baby_id', 'babies.baby_gender', 'babies.baby_first_name', 'mothers.mother_name')
                        ->where('babies.mother_nic',$mother_id)
                        ->where('babies.status',1)
                        ->get()
                        ->toArray();
        
        $data['babies'] = $babies;
        $data['mother_name'] = $babies[0]['mother_name'];

        // dd($data);
        return view('Baby.select')->with('data',$data);
    }

    public function change(Request $request) {
        
        $baby_id=$request->baby_id;
        Session::put('baby_id', $baby_id);

        return redirect()->route('baby');
    }

    public function index() {

        $baby_id=Session::get('baby_id');
        $data = array();
        
        $baby=Baby::where('baby_id',$baby_id)
                    ->where('status',1)
                    ->limit(1)
                    ->get()
                    ->toArray();
        
        $data['baby_name']=$baby[0]['baby_first_name'].' '.$baby[0]['baby_last_name'];

        return view('Baby.dashboard')->with('data', $data);
    }

    public function chartsHeight() {

        return view('Baby.charts-height');
    }
}
