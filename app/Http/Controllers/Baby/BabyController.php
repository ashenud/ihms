<?php

namespace App\Http\Controllers\Baby;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Baby\Baby;
use App\Models\Baby\Growth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Vaccine\VaccineDate;

class BabyController extends Controller
{

    public function select() {
        
        if(Auth::user()->role_id == 4) {
            Session::put('mother_nic', Auth::user()->user_id);
        }

        $mother_nic=Session::get('mother_nic');

        $data = array();

        $babies = Baby::join('mothers', 'mothers.mother_nic', '=', 'babies.mother_nic')
                        ->select('babies.baby_id', 'babies.baby_gender', 'babies.baby_first_name', 'mothers.mother_name')
                        ->where('babies.mother_nic',$mother_nic)
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

        if(Auth::user()->role_id == 1) {
            return redirect()->route('vacc-permission');
        }
        elseif(Auth::user()->role_id == 3) {
            return redirect()->route('vacc-mark');
        }
        else {
            return view('Baby.dashboard')->with('data', $data);
        }
        
    }

    public function chartsHeight() {

        $baby_id=Session::get('baby_id');
        $data = array();

        $baby=Baby::where('baby_id',$baby_id)
                    ->where('status',1)
                    ->limit(1)
                    ->get()
                    ->toArray();

        $data['baby_name']=$baby[0]['baby_first_name'].' '.$baby[0]['baby_last_name'];
        $data['baby_gender']=$baby[0]['baby_gender'];

        $months = Growth::where('baby_id', $baby_id)
                            ->orderBy('baby_age_in_months', 'asc')
                            ->get()
                            ->toArray();
        
        $heights = '';
        foreach ($months as $month) {
            $heights = $heights . $month['height'] .',';
        }
        $heights = trim($heights,",");
        $heights = '{"baby_gender":"'.$data['baby_gender'].'", "height_list":['.$heights.']}';

        $data['baby_heights'] = $heights;

        if(Auth::user()->role_id == '1') {
            $chart_generator = "doctor ". Auth::user()->doctor->doctor_name;
        }
        elseif(Auth::user()->role_id == '3') {
            $chart_generator = "sister ". Auth::user()->midwife->midwife_name;
        }
        elseif(Auth::user()->role_id == '4') {
            $chart_generator = "mother ". Auth::user()->mother->mother_name;
        }
        else {
            $chart_generator = 'System User';
        }

        $data['chart_generator'] = $chart_generator;
        $data['chart_baby'] = "baby ".$baby[0]['baby_first_name']." ".$baby[0]['baby_last_name'];

        // dd($data);
        return view('Baby.charts-height')->with('data', $data);
    }

    public function chartsWeight() {

        $baby_id=Session::get('baby_id');
        $data = array();

        $baby=Baby::where('baby_id',$baby_id)
                    ->where('status',1)
                    ->limit(1)
                    ->get()
                    ->toArray();

        $data['baby_name']=$baby[0]['baby_first_name'].' '.$baby[0]['baby_last_name'];
        $data['baby_gender']=$baby[0]['baby_gender'];

        $months = Growth::where('baby_id', $baby_id)
                            ->orderBy('baby_age_in_months', 'asc')
                            ->get()
                            ->toArray();
        
        $weightF24 = '';
        $weightL36 = '';

        foreach ($months as $month) {
            if ($month['baby_age_in_months']<25) {
                $weightF24 = $weightF24 . $month['weight'].',';
            }
            else {
                $weightL36 = $weightL36 . $month['weight'].',';
            }
        }

        $weightF24 = trim($weightF24,",");
        $weightL36 = trim($weightL36,",");

        if ($weightL36 != '') {
            $initial = 'l36m';
        } 
        else {
            $initial = 'f24m';
        }

        $weights = '{"baby_gender":"'.$data['baby_gender'].'","weight_24":['.$weightF24.'],"weight_36":['.$weightL36.'],"initialChart":"'.$initial.'"}';

        $data['baby_weights'] = $weights;

        if(Auth::user()->role_id == '1') {
            $chart_generator = "doctor ". Auth::user()->doctor->doctor_name;
        }
        elseif(Auth::user()->role_id == '3') {
            $chart_generator = "sister ". Auth::user()->midwife->midwife_name;
        }
        elseif(Auth::user()->role_id == '4') {
            $chart_generator = "mother ". Auth::user()->mother->mother_name;
        }
        else {
            $chart_generator = 'System User';
        }

        $data['chart_generator'] = $chart_generator;
        $data['chart_baby'] = "baby ".$baby[0]['baby_first_name']." ".$baby[0]['baby_last_name'];

        // dd($data);
        return view('Baby.charts-weight')->with('data', $data);
    }

    public function chartsBmi() {

        $baby_id=Session::get('baby_id');
        $data = array();

        $baby=Baby::where('baby_id',$baby_id)
                    ->where('status',1)
                    ->limit(1)
                    ->get()
                    ->toArray();

        $data['baby_name']=$baby[0]['baby_first_name'].' '.$baby[0]['baby_last_name'];
        $data['baby_gender']=$baby[0]['baby_gender'];

        $months = Growth::where('baby_id', $baby_id)
                            ->orderBy('baby_age_in_months', 'asc')
                            ->get()
                            ->toArray();

        $weightF24 = '';
        $weightL36 = '';
        $heightF24 = '';
        $heightL36 = '';

        foreach ($months as $month) {
            if ($month['baby_age_in_months']<25) {
                $weightF24 = $weightF24 . $month['weight'].',';
                $heightF24 = $heightF24 . $month['height'].',';
            }
            else {
                $weightL36 = $weightL36 . $month['weight'].',';
                $heightL36 = $heightL36 . $month['height'].',';
            }
        }

        $weightF24 = trim($weightF24,",");
        $weightL36 = trim($weightL36,",");
        $heightF24 = trim($heightF24,",");
        $heightL36 = trim($heightL36,",");

        if ($weightL36 != '') {
            $initial = 'l36m';
        } 
        else {
            $initial = 'f24m';
        }

        $bmi_data = '{"baby_gender":"'.$data['baby_gender'].'","weight_24":['.$weightF24.'],"weight_36":['.$weightL36.'],"height_24":['.$heightF24.'],"height_36":['.$heightL36.'],"initialChart":"'.$initial.'"}';

        $data['baby_bmi_data'] = $bmi_data;

        if(Auth::user()->role_id == '1') {
            $chart_generator = "doctor ". Auth::user()->doctor->doctor_name;
        }
        elseif(Auth::user()->role_id == '3') {
            $chart_generator = "sister ". Auth::user()->midwife->midwife_name;
        }
        elseif(Auth::user()->role_id == '4') {
            $chart_generator = "mother ". Auth::user()->mother->mother_name;
        }
        else {
            $chart_generator = 'System User';
        }

        $data['chart_generator'] = $chart_generator;
        $data['chart_baby'] = "baby ".$baby[0]['baby_first_name']." ".$baby[0]['baby_last_name'];

        // dd($weights);
        return view('Baby.charts-bmi')->with('data', $data);
    }

    public function vaccView() {
        $baby_id=Session::get('baby_id');
        $data = array();

        $baby=Baby::where('baby_id',$baby_id)
                    ->where('status',1)
                    ->limit(1)
                    ->get()
                    ->toArray();

        $data['baby_name']=$baby[0]['baby_first_name'].' '.$baby[0]['baby_last_name'];
        $data['baby_gender']=$baby[0]['baby_gender'];

        $all_vac_id = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
        $vac_name1 = array("1"=>"BCG-1","2"=>"BCG-2","3"=>"Pentavalent 1","4"=>"OPV-1","5"=>"fIPV-1","6"=>"Pentavalent-2","7"=>"OVP-2","8"=>"fIPV-2","9"=>"Pentavalent-3","10"=>"OVP-3","11"=>"MMR-1","12"=>"Live JE","13"=>"DPT","14"=>"OVP-4","15"=>"MMR-2","16"=>"D.T","17"=>"OPV-5","18"=>"HPV-1","19"=>"HPV-2","20"=>"aTd");
        $vac_name = array("1"=>"බී.සී.ජී.\n(B.C.G.)","2"=>"බී.සී.ජී. දෙවන මාත්‍රාව\n(B.C.G. 2nd dose)","3"=>"පංච සං‍යුජ එන්නත 1\n(Pentavalent 1)","4"=>"මුඛ පෝලියෝ 1\n(OPV 1)","5"=>"අජීවී පෝලියෝ 1\n(fIPV 1)","6"=>"පංච සං‍යුජ එන්නත 2\n(Pentavalent 2)","7"=>"මුඛ පෝලියෝ 2\n(OPV 2)","8"=>"අජීවී පෝලියෝ 2\n(fIPV 2)","9"=>"පංච සං‍යුජ එන්නත 3\n(Pentavalent 3)","10"=>"මුඛ පෝලියෝ 3\n(OPV 3)","11"=>"සරම්ප, කම්මුල්ගාය,\nරුබෙල්ලා 1\n(MMR 1)","12"=>"ජපන් නිදිකර්පථප්‍රදාහය\n(Live JE)","13"=>"‍රිත්ව\n(DPT)","14"=>"මුඛ පෝලියෝ 4\n(OPV 4)","15"=>"සරම්ප, කම්මුල්ගාය,\nරුබෙල්ලා 2\n(MMR 2)","16"=>"ද්විත්ව\n(D.T)","17"=>"මුඛ පෝලියෝ 5\n(OPV 5)","18"=>"එච්. පී. වී. එන්නත 1\n(HPV Vaccine 1)","19"=>"එච්. පී. වී. එන්නත 2\n(HPV Vaccine 2)","20"=>"වැඩිහිටි පිටගැස්ම හා\nඩිප්තීරියා (aTd)");
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
                            $vaccine[$k]['scar'] = 0;
                        }
                    }
                    else {
                        $vaccine[$k]['name'] = $vac_name[$k];
                        $vaccine[$k]['giving_status'] = 0;
                        $vaccine[$k]['given_status'] = 0;
                    }
                }
            }
        }
        
        ksort($vaccine);

        $data['vac_data'] = $vaccine;

        // dd($data);
        return view('Baby.vaccinations-view')->with('data', $data);
    }

}
