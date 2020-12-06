<?php

namespace App\Http\Controllers\Midwife;

use App\Models\Baby\Baby;
use App\Models\Vaccine\VaccineDate;
use App\Models\Mother\Mother;
use App\Models\Baby\BirthDetail;
use App\Models\Baby\Growth;
use App\Models\Location;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class MidwifeController extends Controller
{
    public function index() {
        return view('Midwife.dashboard');
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

    public function vaccMark() {

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
                    if($vac_data[$i]['given_status'] == 1 && $vac_data[$i]['approvel_status'] == 1) {
                        if(isset($vac_data[$i]['giving_date'])) {
                            $vaccine[$j]['giving_status'] = 1;
                            $vaccine[$j]['giving_date'] = $vac_data[$i]['giving_date'];
                        }
                        else {
                            $vaccine[$j]['giving_status'] = 0;
                        }
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
                        if(isset($vac_data[$i]['giving_date'])) {
                            $vaccine[$j]['giving_status'] = 1;
                            $vaccine[$j]['giving_date'] = $vac_data[$i]['giving_date'];
                        }
                        else {
                            $vaccine[$j]['giving_status'] = 0;
                        }
                        $vaccine[$j]['given_status'] = 0;
                        $vaccine[$j]['approvel_status'] = 1;
                        $details = $query[$j]->where('baby_id',$baby_id)->where('vac_id',$j)->get();
                        $vaccine[$j]['approved_doctor_id'] = $details[0]->approved_doctor_id;
                    }
                    else {
                        if(isset($vac_data[$i]['giving_date'])) {
                            $vaccine[$j]['giving_status'] = 1;
                            $vaccine[$j]['giving_date'] = $vac_data[$i]['giving_date'];
                        }
                        else {
                            $vaccine[$j]['giving_status'] = 0;
                        }
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
        return view('Baby.vaccinations-mark')->with('data', $data);
    }

    public function vaccMarkAction(Request $request) {

        // dd($request);
        $vac_id=$request->vaccine;
        $baby_id=$request->baby_id;
        $batch_no=$request->batch_no;
        $date_given=$request->date_given;
        $midwife_id=Auth::user()->user_id;

        $vac_name = array("1"=>"BCG-1","2"=>"BCG-2","3"=>"Pentavalent 1","4"=>"OPV-1","5"=>"fIPV-1","6"=>"Pentavalent-2","7"=>"OVP-2","8"=>"fIPV-2","9"=>"Pentavalent-3","10"=>"OVP-3","11"=>"MMR-1","12"=>"Live JE","13"=>"DPT","14"=>"OVP-4","15"=>"MMR-2","16"=>"D.T","17"=>"OPV-5","18"=>"HPV-1","19"=>"HPV-2","20"=>"aTd");
        $query = array("1"=>DB::table('vacc_births'),"2"=>DB::table('vacc_births'),"3"=>DB::table('vacc2_months'),"4"=>DB::table('vacc2_months'),"5"=>DB::table('vacc2_months'),"6"=>DB::table('vacc4_months'),"7"=>DB::table('vacc4_months'),"8"=>DB::table('vacc4_months'),"9"=>DB::table('vacc6_months'),"10"=>DB::table('vacc6_months'),"11"=>DB::table('vacc9_months'),"12"=>DB::table('vacc12_months'),"13"=>DB::table('vacc18_months'),"14"=>DB::table('vacc18_months'),"15"=>DB::table('vacc5_years'),"16"=>DB::table('vacc5_years'),"17"=>DB::table('vacc5_years'),"18"=>DB::table('vacc10_years'),"19"=>DB::table('vacc10_years'),"20"=>DB::table('vacc11_years'));
        $status = 1;

        try{

            DB::beginTransaction();
            if($vac_id == 1) {
                $query[$vac_id]->insert(['baby_id'=>$baby_id,'midwife_id'=>$midwife_id,'date_given'=>$date_given,'vac_id'=>$vac_id,'vac_name'=>$vac_name[$vac_id],'status'=>$status]);
                
                DB::commit();
                Session::flash('message', 'එන්නත් ලබාදීම සලකුණු කරන ලදී !'); 
                Session::flash('alert-class', 'alert-success'); 
                return redirect()->route('vacc-mark');
            }
            else {
                $query[$vac_id]->where('baby_id',$baby_id)->where('vac_id',$vac_id)
                                ->update(['date_given'=>$date_given,'batch_no'=>$batch_no,'status'=>$status]);
                $is_set_vac_date = DB::table('vaccine_dates')->where('baby_id',$baby_id)->where('midwife_id',$midwife_id)->where('vac_id',$vac_id)->count();

                if($is_set_vac_date != 0) {
                    DB::table('vaccine_dates')->where('baby_id',$baby_id)->where('vac_id',$vac_id)
                                                ->update(['given_status'=>$status]);
                }

                DB::commit();
                Session::flash('message', 'එන්නත් ලබාදීම සලකුණු කරන ලදී !'); 
                Session::flash('alert-class', 'alert-success'); 
                return redirect()->route('vacc-mark');
            }
            
        } catch(\Exception $e){

            DB::rollBack();
            Session::flash('message', 'එන්නත් ලබාදීම සලකුණු කිරීම අසාර්ථකයි !'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect()->route('vacc-mark');
        } 
            
    }

    public function vaccSetDateAction(Request $request) {

        $vac_id=$request->vaccine;
        $baby_id=$request->baby_id;
        $giving_date=$request->giving_date;
        $midwife_id=Auth::user()->user_id;

        $vac_name = array("1"=>"BCG-1","2"=>"BCG-2","3"=>"Pentavalent 1","4"=>"OPV-1","5"=>"fIPV-1","6"=>"Pentavalent-2","7"=>"OVP-2","8"=>"fIPV-2","9"=>"Pentavalent-3","10"=>"OVP-3","11"=>"MMR-1","12"=>"Live JE","13"=>"DPT","14"=>"OVP-4","15"=>"MMR-2","16"=>"D.T","17"=>"OPV-5","18"=>"HPV-1","19"=>"HPV-2","20"=>"aTd");
        $not_status = 0;

        try{

            DB::beginTransaction();
            
            $is_set_vac_date = DB::table('vaccine_dates')->where('baby_id',$baby_id)->where('midwife_id',$midwife_id)->where('vac_id',$vac_id)->count();

            if($is_set_vac_date == 0) {
                DB::table('vaccine_dates')->insert(['baby_id'=>$baby_id,'midwife_id'=>$midwife_id,'approvel_status'=>$not_status,'giving_date'=>$giving_date,'vac_id'=>$vac_id,'vac_name'=>$vac_name[$vac_id],'given_status'=>$not_status]);
            }
            else {
                DB::table('vaccine_dates')->where('baby_id',$baby_id)->where('vac_id',$vac_id)->where('midwife_id',$midwife_id)
                                          ->update(['giving_date'=>$giving_date]);
            }

            DB::commit();
            Session::flash('message', 'එන්නත ලබාදීමට දිනය නියම කිරීම සාර්ථකයි!'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect()->route('vacc-mark');
            
            
        } catch(\Exception $e){

            DB::rollBack();
            Session::flash('message', 'එන්නත ලබාදීමට දිනය නියම කිරීම අසාර්ථකයි !'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect()->route('vacc-mark');
        } 
            
    }

    public function addBabies() {
        return view('Midwife.add-babies');
    }

    public function babyRegister(Request $request) {

        Session::forget('mother_data');
        $mother_nic = $request->mother_nic;

        $mother = Mother::where('mother_nic',$mother_nic)->limit(1)->get();
        if(count($mother)>0) {
            $mother_data['creating'] = true;
            $mother_data['mName'] = $mother[0]->mother_name;
            $mother_data['mNic'] = $mother[0]->mother_nic;
            $mother_data['addr'] = $mother[0]->address;
            $mother_data['tel'] = $mother[0]->telephone;
            $mother_data['email'] = $mother[0]->email;
            $mother_data['GnDivision'] = $mother[0]->gn_division;
            $mother_data['location'] = true;

            Session::put('mother_data', $mother_data);
            Session::flash('message', 'Continue registration here !'); 
            Session::flash('alert-class', 'alert-success'); 
        }
        else {
            Session::flash('message', 'මවගේ තොරතුරු නොගැලපේ !'); 
            Session::flash('alert-class', 'alert-danger'); 
        }
        
        return view('Midwife.add-babies');
    }

    public function babyRegisterWithMother() {

        Session::forget('mother_data');
        $mother_data['creating'] = true;
        Session::put('mother_data',$mother_data);
        
        Session::flash('message', 'Continue registration here !'); 
        Session::flash('alert-class', 'alert-success'); 
         
        return view('Midwife.add-babies');
    }

    public function babyRegisterAction(Request $request) {

        // dd($request);

        if(Session::has('mother_data.mNic')) {

            $validator = Validator::make($request->all(), [
                'baby_id' => 'unique:babies,baby_id'
            ]);
    
            if ($validator->fails()) {
                Session::flash('message', $validator->errors()->first()); 
                Session::flash('alert-class', 'alert-danger'); 
                return view('Midwife.add-babies');
            }
            else {

                try {

                    DB::beginTransaction();
                    $baby = new Baby;
                    $baby->baby_id = $request->baby_id;
                    $baby->baby_first_name = $request->bfName;
                    $baby->baby_last_name = $request->blName;
                    $baby->baby_dob = $request->dob;
                    $baby->baby_gender = $request->bGen;
                    $baby->register_date = $request->rDate;
                    $baby->midwife_id = $request->midId;
                    $baby->mother_nic = $request->mother_nic;
                    $baby->mother_age = $request->mAge;
                    $baby->status = 1;
                    $baby->save();
                    
                    $birth_details = new BirthDetail;
                    $birth_details->baby_id = $request->baby_id;
                    $birth_details->midwife_id = $request->midId;
                    $birth_details->birth_weight = $request->bWeight;
                    $birth_details->birth_length = $request->bLength;
                    $birth_details->health_states = $request->hStates;
                    $birth_details->apgar1 = $request->apgar1;
                    $birth_details->apgar2 = $request->apgar2;
                    $birth_details->apgar3 = $request->apgar3;
                    $birth_details->circumference_of_head = $request->circumHead;
                    $birth_details->vitamin_K_status = $request->vitaminK;
                    $birth_details->eye_contact = $request->eyeContact;
                    $birth_details->milk_position = $request->mPosition;
                    $birth_details->save();
                    
                    $growth = new Growth();
                    $growth->baby_id = $request->baby_id;
                    $growth->midwife_id = $request->midId;
                    $growth->weight = $request->bWeight;
                    $growth->height = $request->bLength;
                    $growth->baby_age_in_months = 0;
                    $growth->save();

                    DB::commit();
                    Session::forget('mother_data');
                    Session::flash('message', 'Registration Completed !'); 
                    Session::flash('alert-class', 'alert-success'); 
                    return view('Midwife.add-babies');

                } catch (\Exception $e) {
                    DB::rollback();
                    Session::forget('mother_data');
                    Session::flash('message', 'Error While Registration !'); 
                    Session::flash('alert-class', 'alert-danger'); 
                    return view('Midwife.add-babies');
                }

            }

        }
        else {

            $validator = Validator::make($request->all(), [
                'mother_nic' => 'unique:mothers,mother_nic',
                'telephone' => 'unique:mothers,telephone',
                'email' => 'unique:mothers,email',
                'baby_id' => 'unique:babies,baby_id'
            ]);
    
            if ($validator->fails()) {
                Session::flash('message', $validator->errors()->first()); 
                Session::flash('alert-class', 'alert-danger'); 
                return view('Midwife.add-babies');
            }
            else {

                try {

                    DB::beginTransaction();
                    $mother = new Mother;
                    $mother->mother_nic = $request->mother_nic;
                    $mother->midwife_id = $request->mName;
                    $mother->mother_name = $request->midId;
                    $mother->address = $request->address;
                    $mother->telephone = $request->telephone;
                    $mother->email = $request->email;
                    $mother->gn_division = $request->gnDivision;
                    $mother->status = 1;
                    $mother->save();

                    $user = new User;
                    $user->user_id = $request->mother_nic;
                    $user->role = 'mother';
                    $user->role_id = 4;
                    $user->password = Hash::make($request->pwd);
                    $user->email = $request->email;
                    $user->status = 1;
                    $user->save();
                    
                    $baby = new Baby;
                    $baby->baby_id = $request->baby_id;
                    $baby->baby_first_name = $request->bfName;
                    $baby->baby_last_name = $request->blName;
                    $baby->baby_dob = $request->dob;
                    $baby->baby_gender = $request->bGen;
                    $baby->register_date = $request->rDate;
                    $baby->midwife_id = $request->midId;
                    $baby->mother_nic = $request->mother_nic;
                    $baby->mother_age = $request->mAge;
                    $baby->status = 1;
                    $baby->save();
                    
                    $birth_details = new BirthDetail;
                    $birth_details->baby_id = $request->baby_id;
                    $birth_details->midwife_id = $request->midId;
                    $birth_details->birth_weight = $request->bWeight;
                    $birth_details->birth_length = $request->bLength;
                    $birth_details->health_states = $request->hStates;
                    $birth_details->apgar1 = $request->apgar1;
                    $birth_details->apgar2 = $request->apgar2;
                    $birth_details->apgar3 = $request->apgar3;
                    $birth_details->circumference_of_head = $request->circumHead;
                    $birth_details->vitamin_K_status = $request->vitaminK;
                    $birth_details->eye_contact = $request->eyeContact;
                    $birth_details->milk_position = $request->mPosition;
                    $birth_details->save();
                    
                    $growth = new Growth();
                    $growth->baby_id = $request->baby_id;
                    $growth->midwife_id = $request->midId;
                    $growth->weight = $request->bWeight;
                    $growth->height = $request->bLength;
                    $growth->baby_age_in_months = 0;
                    $growth->save();
                    
                    $location = new Location();
                    $location->user_id = $request->mother_nic;
                    $location->midwife_id = $request->midId;
                    $location->address = $request->address;
                    $location->lat = $request->latInput;
                    $location->lng = $request->longInput;
                    $location->save();

                    DB::commit();
                    Session::forget('mother_data');
                    Session::flash('message', 'Registration Completed !'); 
                    Session::flash('alert-class', 'alert-success'); 
                    return view('Midwife.add-babies');

                } catch (\Exception $e) {
                    DB::rollback();
                    Session::forget('mother_data');
                    Session::flash('message', 'Error While Registration !'); 
                    Session::flash('alert-class', 'alert-danger'); 
                    return view('Midwife.add-babies');
                }

            }

        }
        
    }

    public function babyRegistrationReset() {

        Session::forget('mother_data');
        Session::forget('message');
        return view('Midwife.add-babies');
    }

}
