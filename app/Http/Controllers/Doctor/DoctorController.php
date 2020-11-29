<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Baby\Baby;
use App\Models\Doctor\DoctorMessage;
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

        $baby=Baby::where('baby_id',$baby_id)
                    ->where('status',1)
                    ->limit(1)
                    ->get()
                    ->toArray();

        $data['baby_id']=$baby[0]['baby_id'];
        $data['baby_name']=$baby[0]['baby_first_name'].' '.$baby[0]['baby_last_name'];
        $data['baby_gender']=$baby[0]['baby_gender'];

        $all_vac_id = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
        $vac_name = array("1"=>"බී.සී.ජී.+(B.C.G.)","2"=>"බී.සී.ජී. දෙවන මාත්‍රාව+(B.C.G. 2nd dose)","3"=>"පංච සං‍යුජ එන්නත 1+(Pentavalent 1)","4"=>"මුඛ පෝලියෝ 1+(OPV 1)","5"=>"අජීවී පෝලියෝ 1+(fIPV 1)","6"=>"පංච සං‍යුජ එන්නත 2+(Pentavalent 2)","7"=>"මුඛ පෝලියෝ 2+(OPV 2)","8"=>"අජීවී පෝලියෝ 2+(fIPV 2)","9"=>"පංච සං‍යුජ එන්නත 3+(Pentavalent 3)","10"=>"මුඛ පෝලියෝ 3+(OPV 3)","11"=>"සරම්ප, කම්මුල්ගාය,+රුබෙල්ලා 1+(MMR 1)","12"=>"ජපන් නිදිකර්පථප්‍රදාහය+(Live JE)","13"=>"‍රිත්ව+(DPT)","14"=>"මුඛ පෝලියෝ 4+(OPV 4)","15"=>"සරම්ප, කම්මුල්ගාය,+රුබෙල්ලා 2+(MMR 2)","16"=>"ද්විත්ව+(D.T)","17"=>"මුඛ පෝලියෝ 5+(OPV 5)","18"=>"එච්. පී. වී. එන්නත 1+(HPV Vaccine 1)","19"=>"එච්. පී. වී. එන්නත 2+(HPV Vaccine 2)","20"=>"වැඩිහිටි පිටගැස්ම හා+ඩිප්තීරියා (aTd)");
        $query = array("1"=>DB::table('vacc_births'),"2"=>DB::table('vacc_births'),"3"=>DB::table('vacc2_months'),"4"=>DB::table('vacc2_months'),"5"=>DB::table('vacc2_months'),"6"=>DB::table('vacc4_months'),"7"=>DB::table('vacc4_months'),"8"=>DB::table('vacc4_months'),"9"=>DB::table('vacc6_months'),"10"=>DB::table('vacc6_months'),"11"=>DB::table('vacc9_months'),"12"=>DB::table('vacc12_months'),"13"=>DB::table('vacc18_months'),"14"=>DB::table('vacc18_months'),"15"=>DB::table('vacc5_years'),"16"=>DB::table('vacc5_years'),"17"=>DB::table('vacc5_years'),"18"=>DB::table('vacc10_years'),"19"=>DB::table('vacc10_years'),"20"=>DB::table('vacc11_years'));
        
        $vac_data = VaccineDate::where('baby_id',$baby_id)->get()->toArray();

        $vaccine = array();
        $vac_id = array();
        
        for($j=1; $j<=20; $j++) {
            for($i=0; $i<count($vac_data); $i++) {
                if($vac_data[$i]['vac_id']==$j) {
                    array_push($vac_id, $j);
                    $vaccine[$j]['name'] = $vac_name[$j];
                    $vaccine[$j]['giving_status'] = 1;
                    $vaccine[$j]['giving_date'] = $vac_data[$i]['giving_date'];
                    if($vac_data[$i]['given_status'] == 1 && $vac_data[$i]['approvel_status'] == 1) {
                        $vaccine[$j]['given_status'] = 1;
                        $vaccine[$j]['approvel_status'] = 1;
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
                            $vaccine[$k]['scar'] = $details[0]->scar;
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
                            $vaccine[$k]['given_status'] = 0;
                            $vaccine[$k]['approvel_status'] = 0;
                            $vaccine[$k]['scar'] = 0;
                        }
                    }
                    else {
                        $vaccine[$k]['name'] = $vac_name[$k];
                        $vaccine[$k]['giving_status'] = 0;
                        $vaccine[$k]['given_status'] = 0;
                        $vaccine[$k]['approvel_status'] = 0;
                    }
                }
            }
        }
        
        ksort($vaccine);

        $data['vac_data'] = $vaccine;
        // dd($data);
        return view('Baby.vaccinations-permission')->with('data', $data);
    }

    public function vaccPermissionAction(Request $request) {

        $vac_id=$request->vaccine;
        $baby_id=$request->baby_id;
        $doctor_id=Auth::user()->user_id;

        $baby = Baby::where('baby_id',$baby_id)->limit(1)->get();
        $midwife_id=$baby[0]->midwife_id;

        $vac_name = array("1"=>"BCG-1","2"=>"BCG-2","3"=>"Pentavalent 1","4"=>"OPV-1","5"=>"fIPV-1","6"=>"Pentavalent-2","7"=>"OVP-2","8"=>"fIPV-2","9"=>"Pentavalent-3","10"=>"OVP-3","11"=>"MMR-1","12"=>"Live JE","13"=>"DPT","14"=>"OVP-4","15"=>"MMR-2","16"=>"D.T","17"=>"OPV-5","18"=>"HPV-1","19"=>"HPV-2","20"=>"aTd");
        $query = array("1"=>DB::table('vacc_births'),"2"=>DB::table('vacc_births'),"3"=>DB::table('vacc2_months'),"4"=>DB::table('vacc2_months'),"5"=>DB::table('vacc2_months'),"6"=>DB::table('vacc4_months'),"7"=>DB::table('vacc4_months'),"8"=>DB::table('vacc4_months'),"9"=>DB::table('vacc6_months'),"10"=>DB::table('vacc6_months'),"11"=>DB::table('vacc9_months'),"12"=>DB::table('vacc12_months'),"13"=>DB::table('vacc18_months'),"14"=>DB::table('vacc18_months'),"15"=>DB::table('vacc5_years'),"16"=>DB::table('vacc5_years'),"17"=>DB::table('vacc5_years'),"18"=>DB::table('vacc10_years'),"19"=>DB::table('vacc10_years'),"20"=>DB::table('vacc11_years'));
        $status = 0;
        $approvel_status = 1;

        // dd($query[$vac_id]);

        if($request->type == 1) {

            try{

                DB::beginTransaction();
                if($vac_id == 2 || $vac_id == 4 || $vac_id == 5 || $vac_id == 7 || $vac_id == 8 || $vac_id == 10 || $vac_id == 12 || $vac_id == 14 || $vac_id == 17 || $vac_id == 19) {
                    $query[$vac_id]->insert(['baby_id'=>$baby_id,'midwife_id'=>$midwife_id,'approved_doctor_id'=>$doctor_id,'vac_id'=>$vac_id,'vac_name'=>$vac_name[$vac_id],'status'=>$status]);
                    $is_set_vac_date = DB::table('vaccine_dates')->where('baby_id',$baby_id)->where('midwife_id',$midwife_id)->where('vac_id',$vac_id)->count();

                    if($is_set_vac_date == 0) {
                        DB::table('vaccine_dates')->insert(['baby_id'=>$baby_id,'midwife_id'=>$midwife_id,'approvel_status'=>$approvel_status,'vac_id'=>$vac_id,'vac_name'=>$vac_name[$vac_id],'given_status'=>$status]);
                    }
                    else {
                        DB::table('vaccine_dates')->where('baby_id',$baby_id)->where('vac_id',$vac_id)
                                                  ->update(['approvel_status'=>$approvel_status]);
                    }

                    DB::commit();
                    Session::flash('message', 'අනුමත කිරීම සාර්ථකයි !'); 
                    Session::flash('alert-class', 'alert-success'); 
                    return redirect()->route('vacc-permission');
                }
                
            } catch(\Exception $e){

                DB::rollBack();
                Session::flash('message', 'අනුමත කිරීම අසාර්ථකයි !'); 
                Session::flash('alert-class', 'alert-danger'); 
                return redirect()->route('vacc-permission');
            } 
            
        }

        dd($midwife_id,$doctor_id);
    }
    
}
