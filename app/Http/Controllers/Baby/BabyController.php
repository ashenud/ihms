<?php

namespace App\Http\Controllers\Baby;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Baby\Baby;
use App\Models\Baby\Growth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BabyController extends Controller
{

    public function select() {
        
        if(Auth::user()->role_id == 4) {
            Session::put('mother_nic', Auth::user()->user_id);
        }

        $mother_nic=Session::get('mother_nic');

        $data = array();

        $babies = Baby::join('mothers', 'babies.mother_nic', '=', 'babies.mother_nic')
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
        return view('Baby.vaccinations-view');
    }

}
