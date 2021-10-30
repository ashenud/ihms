<?php

namespace App\Http\Controllers\Sister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sister\Sister;
use App\Models\Sister\SisterMessage;
use App\Models\Baby\Baby;
use App\Models\Doctor\Doctor;
use App\Models\Doctor\DoctorMessage;
use App\Models\Midwife\Midwife;
use App\Models\Midwife\MidwifeMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SisterController extends Controller
{
    public function index() {

        $user_id = Auth::user()->user_id;
        $data = array();

        $data['sister_name'] = Auth::user()->sister->sister_name;
        $data['babies_count'] = Baby::where('status',1)->count();

        $data['msg_count'] = SisterMessage::where('sister_id', $user_id)->where('read_status',1)->where('status',1)->count();

        // dd($data);
        return view('Sister.dashboard')->with('data',$data);
    }

    public function sendMessages() {

        $user_id = Auth::user()->user_id;
        $data = array();

        $data['sister_name'] = Auth::user()->sister->sister_name;

        $sister = Sister::where('sister_id',$user_id)->limit(1)->get();
        
        $doctors = Doctor::where('moh_division',$sister[0]->moh_division)
                         ->where('status',1)->get();
        
        $midwives = Midwife::where('moh_division',$sister[0]->moh_division)
                           ->where('status',1)->get();
        $data['doctors'] = $doctors;
        $data['midwives'] = $midwives;
        // dd(count($sisters));

        return view('Sister..send-messages')->with('data',$data);
    }

    public function sendMessagesAction(Request $request) {

        $user_id = Auth::user()->user_id;

        if($request->type == 1) {

            try {

                DB::beginTransaction();

                $doctor_msg = new DoctorMessage();
                $doctor_msg->doctor_id = $request->receiver_id;
                $doctor_msg->sender = $user_id;
                $doctor_msg->message = $request->msg_body;
                $doctor_msg->save();    
                
                DB::commit();
                return response()->json([
                    'result' => true,
                    'message' => 'පනිවිඩය යැවීම සාර්ථකයී',
                    'add_class' => 'alert-success',
                ]);

            } catch (\Exception $e) {
                DB::rollback();    
                return response()->json([
                    'result' => false,
                    'message' => 'පනිවිඩය යැවීම අසාර්ථකයී',
                    'add_class' => 'alert-danger',
                ]);
            }

        }
        else if ($request->type == 3) {
            try {

                DB::beginTransaction();

                $midwife_msg = new MidwifeMessage();
                $midwife_msg->midwife_id = $request->receiver_id;
                $midwife_msg->sender = $user_id;
                $midwife_msg->message = $request->msg_body;
                $midwife_msg->save();  
                
                DB::commit();
                return response()->json([
                    'result' => true,
                    'message' => 'පනිවිඩය යැවීම සාර්ථකයී',
                    'add_class' => 'alert-success',
                ]);

            } catch (\Exception $e) {
                DB::rollback();    
                return response()->json([
                    'result' => false,
                    'message' => 'පනිවිඩය යැවීම අසාර්ථකයී',
                    'add_class' => 'alert-danger',
                ]);
            }
        }
        else {
            return response()->json([
                'result' => false,
                'message' => 'පනිවිඩය යැවීම අසාර්ථකයී',
                'add_class' => 'alert-danger',
            ]);
        }
    }

    public function inbox() {

        $user_id = Auth::user()->user_id;
        $data = array();

        $data['sister_name'] = Auth::user()->sister->sister_name;

        $data['recieved_messages'] = SisterMessage::where('sister_id', $user_id)->where('status',1)->get();

        // dd($data);
        return view('Sister.inbox')->with('data',$data);
    }

    public function readMessageAction(Request $request) {

        try {

            DB::beginTransaction();

            $message = SisterMessage::find($request->message_id);
            $message->read_status = 0;
            $message->save();    
            
            DB::commit();
            return response()->json([
                'result' => true,
                'message' => 'පනිවිඩය කියවූ ලෙස සලකුණු කරන ලදී',
                'table_row' => $request->message_tr,
                'add_class' => 'alert-success',
            ]);

        } catch (\Exception $e) {
            DB::rollback();    
            return response()->json([
                'result' => false,
                'message' => 'සලකුණු කිරීම අසාර්ථකයී',
                'table_row' => $request->message_tr,
                'add_class' => 'alert-danger',
            ]);
        }
    }

    public function deleteMessageAction(Request $request) {

        try {

            DB::beginTransaction();

            $message = SisterMessage::find($request->message_id);
            $message->status = 0;
            $message->save();    
            
            DB::commit();
            return response()->json([
                'result' => true,
                'message' => 'පනිවිඩය මැකීම සාර්ථකයී',
                'table_row' => $request->message_tr,
                'add_class' => 'alert-success',
            ]);

        } catch (\Exception $e) {
            DB::rollback();    
            return response()->json([
                'result' => false,
                'message' => 'පනිවිඩය මැකීම අසාර්ථකයී',
                'table_row' => $request->message_tr,
                'add_class' => 'alert-danger',
            ]);
        }
    }

}
