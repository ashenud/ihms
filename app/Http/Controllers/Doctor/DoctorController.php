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

        $babies = Baby::join('mothers', 'mothers.mother_nic', '=', 'babies.mother_nic')
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

        $all_vac_id = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
        $vac_name = array("1"=>"BCG-1","2"=>"BCG-2","3"=>"Pentavalent 1","4"=>"OPV-1","5"=>"fIPV-1","6"=>"Pentavalent-2","7"=>"OVP-2","8"=>"fIPV-2","9"=>"Pentavalent-3","10"=>"OVP-3","11"=>"MMR-1","12"=>"Live JE","13"=>"DPT","14"=>"OVP-4","15"=>"MMR-2","16"=>"D.T","17"=>"OPV-5","18"=>"HPV-1","19"=>"HPV-2","20"=>"aTd");
        $query = array("1"=>DB::table('vacc_births'),"2"=>DB::table('vacc_births'),"3"=>DB::table('vacc2_months'),"4"=>DB::table('vacc2_months'),"5"=>DB::table('vacc2_months'),"6"=>DB::table('vacc4_months'),"7"=>DB::table('vacc4_months'),"8"=>DB::table('vacc4_months'),"9"=>DB::table('vacc6_months'),"10"=>DB::table('vacc6_months'),"11"=>DB::table('vacc9_months'),"12"=>DB::table('vacc12_months'),"13"=>DB::table('vacc18_months'),"14"=>DB::table('vacc18_months'),"15"=>DB::table('vacc5_years'),"16"=>DB::table('vacc5_years'),"17"=>DB::table('vacc5_years'),"18"=>DB::table('vacc10_years'),"19"=>DB::table('vacc10_years'),"20"=>DB::table('vacc11_years'));
        
        $vac_data = VaccineDate::where('baby_id',$baby_id)->get()->toArray();

        $vaccine = array();
        $vac_id = array();
        
        for($j=1; $j<=20; $j++) {
            for($i=0; $i<count($vac_data); $i++) {
                if($vac_data[$i]['vac_id']==$j) {
                    array_push($vac_id, $j);
                    $vaccine[$j]['name'] = $vac_data[$i]['vac_name'];
                    $vaccine[$j]['giving_status'] = 1;
                    $vaccine[$j]['giving_date'] = $vac_data[$i]['giving_date'];
                    if($vac_data[$i]['given_status'] == 1 && $vac_data[$i]['approvel_status'] == 1) {
                        $vaccine[$j]['given_status'] = 1;
                        $details = $query[$j]->where('baby_id',$baby_id)->where('vac_id',$j)->get();
                        $vaccine[$j]['date_given'] = $details[0]->date_given;
                        $vaccine[$j]['batch_no'] = $details[0]->batch_no;
                        $vaccine[$j]['approved_doctor_id'] = $details[0]->approved_doctor_id;
                        if(!isset($details[0]->side_effects)) {
                            $vaccine[$j]['side_effects'] = "නැත";
                        }
                        else {
                            $vaccine[$j]['side_effects'] = $details[0]->side_effects;
                        }
                    }
                    elseif ($vac_data[$i]['given_status'] == 0 && $vac_data[$i]['approvel_status'] == 1) {
                        $vaccine[$j]['given_status'] = 0;
                        $vaccine[$j]['approvel_status'] = 1;
                        $details = $query[$j]->where('baby_id',$baby_id)->where('vac_id',$j)->get();
                        $vaccine[$j]['approved_doctor_id'] = $details[0]->approved_doctor_id;
                    }
                    else {
                        $vaccine[$j]['given_status'] = 0;
                        $vaccine[$j]['approvel_status'] = 0;
                    }
                }
            }
        }

        $other_vac_id = array_diff($all_vac_id, $vac_id);

        foreach ($other_vac_id as $key => $value) {
            for($k=1; $k<=20; $k++) { 
                if($value == $k) {
                    if ($k == 1) {
                        $details = $query[$k]->where('baby_id',$baby_id)->where('vac_id',$k)->get();
                        // dd($details);
                        if ($details[0]->status == 1) {
                            $vaccine[$k]['name'] = $vac_name[$k];
                            $vaccine[$k]['given_status'] = 1;
                            $vaccine[$k]['date_given'] = $details[0]->date_given;
                            $vaccine[$k]['batch_no'] = $details[0]->batch_no;
                            $vaccine[$k]['approved_doctor_id'] = "";
                            if(!isset($details[0]->side_effects)) {
                                $vaccine[$k]['side_effects'] = "නැත";
                            }
                            else {
                                $vaccine[$k]['side_effects'] = $details[0]->side_effects;
                            }
                        }
                        else {
                            $vaccine[$k]['name'] = $vac_name[$k];
                            $vaccine[$k]['giving_status'] = 0;
                        }
                    }
                    else {
                        $vaccine[$k]['name'] = $vac_name[$k];
                        $vaccine[$k]['giving_status'] = 0;
                    }
                }
            }
        }
        
        ksort($vaccine);

        $data['vac_data'] = $vaccine;

        dd($data);
        return view('Baby.vaccinations-permission');
    }
    
}
