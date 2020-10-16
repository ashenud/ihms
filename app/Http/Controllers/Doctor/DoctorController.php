<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Baby\Baby;
use App\Models\Doctor\DoctorMessage;
use App\Models\Vaccine\VaccBirth;
use App\Models\Vaccine\VaccineDate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index() {

        $user_id = Auth::user()->user_id;
        $data = array();

        $data['doctor_name'] = Auth::user()->doctor->doctor_name;
        $data['babies_count'] = Baby::where('status',1)->count();

        $data['msg_count'] = DoctorMessage::where('doctor_id', $user_id)->where('read_status',1)->where('status',1)->count();

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
            
            Session::put('mother_nic', $mother_nic);

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

    public function vaccPermission() {

        $baby_id=Session::get('baby_id');
        $data = array();
        $query = array();
        $query[1] = DB::table('vacc_births');
        $query[2] = DB::table('vacc_births');
        $query[3] = DB::table('vacc2_months');
        $query[4] = DB::table('vacc2_months');
        $query[5] = DB::table('vacc2_months');
        $query[6] = DB::table('vacc4_months');
        $query[7] = DB::table('vacc4_months');
        $query[8] = DB::table('vacc4_months');
        $query[9] = DB::table('vacc6_months');
        $query[10] = DB::table('vacc6_months');
        $query[11] = DB::table('vacc9_months');
        $query[12] = DB::table('vacc12_months');
        $query[13] = DB::table('vacc18_months');
        $query[14] = DB::table('vacc18_months');
        $query[15] = DB::table('vacc5_years');
        $query[16] = DB::table('vacc5_years');
        $query[17] = DB::table('vacc5_years');
        $query[18] = DB::table('vacc10_years');
        $query[19] = DB::table('vacc10_years');
        $query[20] = DB::table('vacc10_years');

        $vac_data = VaccineDate::where('baby_id',$baby_id)->get()->toArray();

        $vaccine = array();
        
        for($j=1; $j<=20; $j++) {
            for($i=0; $i<count($vac_data); $i++) {
                if($vac_data[$i]['vac_id']==$j) {
                    $vaccine[$j]['name'] = $vac_data[$i]['vac_name'];
                    $vaccine[$j]['giving_status'] = 1;
                    $vaccine[$j]['giving_date'] = $vac_data[$i]['giving_date'];
                    if($vac_data[$i]['given_status'] == 1 && $vac_data[$i]['approvel_status'] == 1) {
                        $vaccine[$j]['given_status'] = 1;
                        $details = $query[$j]->where('baby_id',$baby_id)->where('vac_id',$j)->get();
                        $vaccine[$j]['date_given'] = $details['$date_given'];
                        $vaccine[$j]['batch_no'] = $details['$batch_no'];
                        $vaccine[$j]['approved_doctor_id'] = $details[0]->approved_doctor_id;
                        if(!isset($details["side_effects"])) {
                            $vaccine[$j]['side_effects'] = "නැත";
                            }
                            else {
                            $vaccine[$j]['side_effects'] = $details["side_effects"];
                            }
                    }
                    elseif ($vac_data[$i]['given_status'] == 0 && $vac_data[$i]['approvel_status'] == 1) {
                        $vaccine[$j]['given_status'] = 0;
                        $vaccine[$j]['approvel_status'] = 1;
                        $details = $query[$j]->where('baby_id',$baby_id)->where('vac_id',$j)->get();
                        // dd($details);
                        $vaccine[$j]['approved_doctor_id'] = $details[0]->approved_doctor_id;
                    }
                    else {
                        $vaccine[$j]['given_status'] = 0;
                        $vaccine[$j]['approvel_status'] = 0;
                    }
                }
                else {
                    $vaccine[$j]['giving_status'] = 0;
                }
            }
        }

        $data['vac_data'] = $vaccine;

        dd($data);
        return view('Baby.vaccinations-permission');
    }
    
}
