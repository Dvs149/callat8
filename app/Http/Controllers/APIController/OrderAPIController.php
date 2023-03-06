<?php

namespace App\Http\Controllers\APIController;

use Session;
use Validator;
use App\dgmodel\Order;

use App\dgmodel\Customer;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use App\Mail\SendPaswordToCustomer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\API\v1\OrederAPIRequestController;

class OrderAPIController extends Controller
{
    public function __construct(){
        $this->_fetch = new DGDatabase();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  this method will check wether customer exists or not , if exist then fetch user_id and submit the oreder with user_id, if not then create user and submit the order with new user_id. 
    public function index(Request $request)
    {
        
        // dd($request->all());

        // validate all fields
        $validator = Validator::make($request->all(),[
            'parcel_detail'=>'required|max:150',
            'weight'=>'required|max:10',
            'weight_type'=>'required',
            'notes'=>'required|max:150',
            'sender_name'=>'required|max:20',
            'sender_email'=>'required|email|max:75',
            'sender_mobile'=>'required|max:12',
            'sender_address_1'=>'required|max:50',
            'sender_address_2'=>'max:50',
            'sender_address_3'=>'max:50',
            'sender_city'=>'required|max:15',
            'sender_pincode'=>'required|max:6',
            'sender_longitute'=>'required|max:10',
            'sender_latitude'=>'required|max:10',
            'receiver_name'=>'required|max:20',
            'receiver_email'=>'required|email|max:75',
            'receiver_mobile'=>'required|max:12',
            'receiver_address_1'=>'required|max:50',
            'receiver_address_2'=>'max:50',
            'receiver_address_3'=>'max:50',
            'receiver_city'=>'required|max:15',
            'receiver_pincode'=>'required|max:6',
            'receiver_longitute'=>'required|max:10',
            'receiver_latitude'=>'required|max:10',
            'total_distance'=>'required|max:10',
            'price'=>'required',
            
        ]);
        // show error if something is invalid
        if($validator->fails()){
            // dd($validator->errors());
                if($validator->errors())
                {
                    return ['error'=>'Required data found blank'];
           }
        }
        /* if($validator->fails()){
    		return response()->json(
    			['error'=>$validator->errors()],
    			401
    		);
        } */
        $parcel_detail=$request->parcel_detail;
        $weight=$request->weight;
        $weight_type=$request->weight_type;
        $notes=$request->notes;
            
        $sender_name=$request->input('sender_name');
        $sender_email=$request->sender_email;
        $sender_mobile=$request->sender_mobile;
        $sender_address_1=$request->sender_address_1;
        $sender_address_2=$request->sender_address_2;
        $sender_address_3=$request->sender_address_3;
        $sender_city=$request->sender_city;
        $sender_pincode=$request->sender_pincode;
        $sender_longitute=$request->input('sender_longitute');
        $sender_latitude=$request->input('sender_latitude');

        $receiver_name=$request->receiver_name;
        $receiver_email=$request->receiver_email;
        $receiver_mobile=$request->receiver_mobile;
        $receiver_address_1=$request->receiver_address_1;
        $receiver_address_2=$request->receiver_address_2;
        $receiver_address_3=$request->receiver_address_3;
        $receiver_city=$request->receiver_city;
        $receiver_pincode=$request->receiver_pincode;
        $receiver_longitute=$request->receiver_longitute;
        $receiver_latitude=$request->receiver_latitude;
        $total_distance=$request->total_distance;
        
        $price=$request->price;
        
        $customer=$this->_fetch->get_customer($sender_email);

        //if user already exist then assign customer id to user_id of order table
        if($customer->first()){
            // store old user_id by checking email exists or not
            $user_id=$customer->first()->id;
        }
        else{
            $password=str_random(8);

            // store new user
            $customer=new Customer();
            $customer->status='y';
            $customer->password=Hash::make($password);
            $customer->created_on='app';
            $customer->sender_name=$sender_name;
            $customer->sender_email=$sender_email;
            $customer->sender_mobile=$sender_mobile;
            $customer->sender_address_1=$sender_address_1;
            $customer->sender_address_2=$sender_address_2;
            $customer->sender_address_3=$sender_address_3;
            $customer->sender_city=$sender_city;
            $customer->sender_longitute=$sender_longitute;
            $customer->sender_latitude=$sender_latitude;
            $customer->created_date=date("Y-m-d");
            $confirmCustumer=$customer->save();
            // dd($customer->id);
            if(!$confirmCustumer){
                return ['error'=>"Something went wrong, Please try again!"];
            }
            $user_id=$customer->id;
        }
        $order=new Order();
        


        $order->user_id=$user_id;
        $order->parcel_detail=$parcel_detail;
        $order->weight=$weight;
        $order->weight_type=$weight_type;
        $order->notes=$notes;
        $order->sender_name=$sender_name;
        $order->sender_email=$sender_email;
        $order->sender_mobile=$sender_mobile;
        $order->sender_address_1=$sender_address_1;
        $order->sender_address_2=$sender_address_2;
        $order->sender_address_3=$sender_address_3;
        $order->sender_city=$sender_city;
        $order->sender_longitute=$sender_longitute;
        $order->sender_latitude=$sender_latitude;
        $order->sender_pincode=$sender_pincode;
        
        
        $order->receiver_name=$receiver_name;
        $order->receiver_email=$receiver_email;
        $order->receiver_mobile=$receiver_mobile;
        $order->receiver_address_1=$receiver_address_1;
        $order->receiver_address_2=$receiver_address_2;
        $order->receiver_address_3=$receiver_address_3;
        $order->receiver_city=$receiver_city;
        $order->receiver_longitute=$receiver_longitute;
        $order->receiver_latitude=$receiver_latitude;
        $order->receiver_pincode=$receiver_pincode;
        

        $order->total_distance=$total_distance;
        $order->price=$price;

        $order->order_date=date("Y-m-d");
        $order->order_status=1;
        $confirmOrder=$order->save();

        if(!$confirmOrder){
            // return "something went wrong";
            return ['error'=>"Something went wrong, Please try again!"];
        }
        else{
            $data=array("success"=>"Your order has been placed successfully.");
        }

        if(isset($confirmCustumer)){
            $this->send_password($sender_email,$password);
        }
        // dd($customer,$order);
        
        return response()->json($data);


    }

    public function send_password($email,$password)
    {
        $details = [
            'password' => $password,
        ];

        \Mail::to($email)->send(new \App\Mail\SendPaswordToCustomer($details));
        return true;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
