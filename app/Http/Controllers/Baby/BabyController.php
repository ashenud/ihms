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
        $monthF24 = '';
        $weightL36 = '';
        $monthL36 = '';

        foreach ($months as $month) {
            if ($month['baby_age_in_months']<25) {
                $weightF24 = $weightF24 . $month['weight'].',';
                $monthF24 = $monthF24 . $month['baby_age_in_months'] .',';
            }
            else {
                $weightL36 = $weightL36 . $month['weight'].',';
                $monthL36 = $monthL36 . $month['baby_age_in_months'] .',';
            }
        }

        $weightF24 = trim($weightF24,",");
        $monthF24 = trim($monthF24,",");
        $weightL36 = trim($weightL36,",");
        $monthL36 = trim($monthL36,",");

        $weights = '{"baby_gender":"'.$data['baby_gender'].'","weight_24":['.$weightF24.'],"weight_36":['.$weightL36.'],"month_24":['.$monthF24.'],"month_36":['.$monthL36.'],"initialChart":"f24m"}';

        $data['baby_weights'] = $weights;

        // dd($data);
        return view('Baby.charts-weight')->with('data', $data);
    }
}
