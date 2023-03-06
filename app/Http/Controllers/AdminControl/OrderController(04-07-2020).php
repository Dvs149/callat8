<?php

namespace App\Http\Controllers\AdminControl;

use Helpers;
use DataTables;

use App\dgmodel\Order;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\BreadcrumbPageHeaderthings;

class OrderController extends Controller
{
    public function __construct(){
         $this->_fetch_data = new DGDatabase();
        $this->_breadCrumPageHeader = new BreadcrumbPageHeaderthings();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
// dd('s');
        $BreadCrumbPageHeader=$this->_breadCrumPageHeader->order_management();
        $data = $this->_fetch_data->get_order_listing_data();
        if ($request->ajax()) {
            return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){



                           $btn = '<div class="text-center">
                           <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit  edit-user">
                                    <img class="edit  edit-user" title="Edit" alt="Edit" style="cursor: pointer;" src="'.asset('assets/images/Edit - 16.png').'" >
                           </a>';

                           $btn = $btn.'<a href="javascript:void(0);" id="delete-user" data-toggle="tooltip" data-original-title="Delete" data-id="'.$row->id.'" class="delete "><img title="Edit" alt="Edit" style="cursor: pointer;" src="'.asset("assets/images/Delete - 16.png").'" ></a></div>';

                           return $btn;
                    })
                    ->rawColumns(['action'])

                    ->make(true);

        }
        
		return view(Helpers::file_path("order"),compact('BreadCrumbPageHeader'));
        
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
        /* "order_id" => null
  "bnr_status" => "Y"
  "bnr_title" => "asd"
  "bnr_btn_txt" => "asd"
  "bnr_link" => "asd"
  "bnr_short_description" => "sss"
  "submit" => "Submit" */

        $post_data = $request->validate([
            'parcel_detail'=>"required|max:150",
            'weight'=>"required|numeric|between:0,20.99",
            'weight_type'=>"required",
            'notes'=>"max:150",

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

            'total_distance'=>"required|numeric|between:0,49.99",
            'price'=>"required|numeric|between:0,999.99",
            'order_status'=>"required",

        ]);
        // dd($post_data);

        $order_id = $request->order_id;

        if($order_id != ''){
        // dd($request->all());

            $Order_details=Order::FindOrFail($order_id);
        }
        // dd($Order_details);
                
                if ($order_id==null) {

                    $order_data=[
                            'order_date'=>date("Y-m-d"),
                            'order_status'=>1,
                    ];
                    $message="Registered successfully";
        dd($request->all());
                }
                else{
                // dd($request->all());

                    $order_data=[
                        'order_date'=>$Order_details->order_date,
                        'order_status'=>$Order_details->order_status,
                ];
                    $message="Updated successfully";
                }
                //dd($order_id);
                //$bnr_title=$request->order_title;
                //$bnr_link=$request->bnr_link;
                //$bnr_short_description=$request->bnr_short_description;
                //$bnr_status=$request->bnr_status;
                //$bnr_image=$profileImage;

        $order_data=[   
                'parcel_detail'=>$request->parcel_detail,
                'weight'=>$request->weight,
                'weight_type'=>$request->weight_type,
                'notes'=>$request->notes,

                'sender_name'=>$request->sender_name,
                'sender_email'=>$request->sender_email,
                'sender_mobile'=>$request->sender_mobile,
                'sender_address_1'=>$request->sender_address_1,
                'sender_address_2'=>$request->sender_address_2,
                'sender_address_3'=>$request->sender_address_3,
                'sender_city'=>$request->sender_city,
                'sender_pincode'=>$request->sender_pincode,
                'sender_longitute'=>$request->sender_longitute,
                'sender_latitude'=>$request->sender_latitude,

                'receiver_name'=>$request->receiver_name,
                'receiver_email'=>$request->receiver_email,
                'receiver_mobile'=>$request->receiver_mobile,
                'receiver_address_1'=>$request->receiver_address_1,
                'receiver_address_2'=>$request->receiver_address_2,
                'receiver_address_3'=>$request->receiver_address_3,
                'receiver_city'=>$request->receiver_city,
                'receiver_pincode'=>$request->receiver_pincode,
                'receiver_longitute'=>$request->receiver_longitute,
                'receiver_latitude'=>$request->receiver_latitude,

                'total_distance'=>$request->total_distance,
                'price'=>$request->price,
                'order_status'=>$request->order_status
            ];
            // dd($order_data);

    
    

                $order   =   Order::updateOrCreate(['id' => $order_id],
                            $order_data);

                if($order){
                    // dd($order);
                }            

            return redirect(Helpers::admin_url('order'))->with('message', $message);



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
    public function edit(Request $request,Order $order)
    {
        $order_to_edit  = $order;
        return Response::json($order_to_edit);
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
    public function destroy(Order $id)
    {
        $order_delete = $id;
        
        $order_delete->delete();
    }
}
