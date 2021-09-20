<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class paymentController extends Controller
{

    public function payment_form(Request $request){
        $status = $request->status;
        return view('payment.payment_form', compact('status'));
    }

    public function payment_confirm(Request $request){

        $input = $request->all();
        $currentDate = date('M d, Y');

        $selectId = DB::table('ktc_order')
        ->select('*')
        ->where('id', '=', $input['id'])
        ->first();


        if(empty($selectId)){
            $order_id = DB::table('ktc_order')
            ->latest()
            ->first();
            $run_order = sprintf("%09d",$order_id->order_id+1);
            DB::table('ktc_order')
            ->insert([
                'id' => $input['id'],
                'order_id' => $run_order,
                'package' => $input['package'],
                'created_at' => date('Y-m-d H:i:s'),
            ]);    
        }else{
            $run_order = sprintf("%09d",$selectId->order_id);
        }
        
        if($input['package'] == 'gold'){
            $discount = 1500.00;
        }else{
            $discount = 3100.00;
        }

        DB::table('users')
        ->where('id', $input['id'])
        ->update([
            'status' => 'wait',
            'username' => $input['username'],
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'address' => $input['address'],
        ]);
        
        $data = [
           'id' =>  $input['id'],
           'orderRef' => $run_order,
           'amount' => $input['orderRef'],
           'currentDate' => $currentDate,
           'package' => $input['package'],
           'address' => $input['address'],
           'discount' => $discount,
           'payMethod' => $input['payMethod'],
        ];

        return view('payment.payment_confirm', compact('data'));
    }

    public function payment_success(Request $request){

        DB::table('ktc_order')
        ->where('order_id', '=', $request->Ref)
        ->update([
            'success_code' => '1',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $ref_id = DB::table('ktc_order')
        ->select('success_code')
        ->where('success_code', '=', '1')
        ->count();

        $order_ref = DB::table('ktc_order')
        ->select('*')
        ->where('order_id', '=', $request->Ref)
        ->where('success_code', '=', '1')
        ->first();

        if($order_ref->success_code == "1"){
            DB::table('ktc_order')
            ->where('order_id', '=', $request->Ref)
            ->update([
                'order_ref' => sprintf("%09d",$ref_id),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            if($order_ref->package == "gold"){
                $expire_date = date("Y-m-d H:i:s", strtotime("+30 day"));
            }else{
                $expire_date = date("Y-m-d H:i:s", strtotime("+44 day"));
            }

            DB::table('users')
            ->where('id', $order_ref->id)
            ->update([
                'status' => 'paid',
                'level' => $order_ref->package,
                'expire_date' => $expire_date,
                'updated_at' => date("Y-m-d H:i:s"),
            ]);

            return redirect('user_home');

        }else{
            return redirect('payment_fail');
        }

        // DB::table('users')->where('id', Auth::id())->update(['remember_token' => $new_sessid]);


        // $data = array(
        //     'subject'=>"User Detail",
        //     'email'=>$request->get('email'),
        //     'password'=>$request->get('password'),
        //     'username'=>$request->get('username'),
        //     'expire_date'=>$request->get('expire_date'),
        //     'package'=>$request->get('level'),
        //     'created_at'=>$request->get('created_at'),
        // );
        // Mail::to($request->get('email'))->send(new SendMail($data));
        // DB::update('update users set expire_date = ? where id = ?', [$request->get('expire_date'),$request->get('id')]);
       
    }

}
