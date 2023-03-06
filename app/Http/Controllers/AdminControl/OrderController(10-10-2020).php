<?php

namespace App\Http\Controllers\AdminControl;

use Helpers;
use DataTables;

use App\dgmodel\Order;
use App\dgmodel\Driver;
use App\dgmodel\Remark;
use App\OrderUpdateLog;
use App\dgmodel\Customer;
use App\OrderAddressModel;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use App\DoubleGoogleOrderModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\ConsumesExternalServices;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\BreadcrumbPageHeaderthings;

class OrderController extends Controller
{
    use ConsumesExternalServices;

    public function __construct()
    {
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
        // $data = DoubleGoogleOrderModel::with('orderUpdateLog')->where('id')->first();
        // dd($data->orderUpdateLog->remark);
        // dd('s');
        $BreadCrumbPageHeader = $this->_breadCrumPageHeader->order_management();
        $data = $this->_fetch_data->get_order_listing_data();
        $drivers = Driver::where('status', 'Y')->get()->pluck('name', 'id');
        // dd($drivers);

        // dd($data);
        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<div class="text-center">
                        <a class="remark" data-toggle="tooltip" target="_blank"  data-id="' . $row->id . '" data-original-title="Edit" class="edit  edit-user">
                            <i title="Remarks" class="iconsweets-create" style="margin-top: -9px;cursor: pointer;"></i>
                           </a> 
                           <a href="' . url(Helpers::admin_url('order')) . '/' . $row->id . '/edit" data-toggle="tooltip" target="_blank"  data-id="' . $row->id . '" data-original-title="Edit" class="edit  edit-user">
                                    <img class="edit  edit-user" title="View" alt="View" style="cursor: pointer;" src="' . asset('assets/images/icons/search.png') . '" >
                           </a>';

                    $btn = $btn . '<a data-id="' . $row->id . '" class="delete"><img title="Delete" alt="Delete" style="cursor: pointer;" src="' . asset("assets/images/Delete - 16.png") . '" ></a>';

                    return $btn;
                })
                ->rawColumns(['action'])

                ->make(true);
        }

        return view(Helpers::file_path("order"), compact('BreadCrumbPageHeader', 'drivers'));
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
            'parcel_detail' => "required|max:150",
            'weight' => "required|numeric|between:0,20.99",
            'weight_type' => "required",
            'notes' => "max:150",

            'sender_name' => 'required|max:20',
            'sender_email' => 'required|email|max:75',
            'sender_mobile' => 'required|max:12',
            'sender_address_1' => 'required|max:50',
            'sender_address_2' => 'max:50',
            'sender_address_3' => 'max:50',
            'sender_city' => 'required|max:15',
            'sender_pincode' => 'required|max:6',
            'sender_longitute' => 'required|max:10',
            'sender_latitude' => 'required|max:10',

            'receiver_name' => 'required|max:20',
            'receiver_email' => 'required|email|max:75',
            'receiver_mobile' => 'required|max:12',
            'receiver_address_1' => 'required|max:50',
            'receiver_address_2' => 'max:50',
            'receiver_address_3' => 'max:50',
            'receiver_city' => 'required|max:15',
            'receiver_pincode' => 'required|max:6',
            'receiver_longitute' => 'required|max:10',
            'receiver_latitude' => 'required|max:10',

            'total_distance' => "required|numeric|between:0,49.99",
            'price' => "required|numeric|between:0,999.99",
            'order_status' => "required",

        ]);
        // dd($post_data);

        $order_id = $request->order_id;

        if ($order_id != '') {
            // dd($request->all());

            $Order_details = Order::FindOrFail($order_id);
        }
        // dd($Order_details);

        if ($order_id == null) {

            $order_data = [
                'order_date' => date("Y-m-d"),
                'order_status' => 1,
            ];
            $message = config('custom.ADDED_SUCCESFULL');
            // dd($request->all());
        } else {
            // dd($request->all());

            $order_data = [
                'order_date' => $Order_details->order_date,
                'order_status' => $Order_details->order_status,
            ];
            $message = config('custom.UPDATED_SUCCESFULL');
        }
        //dd($order_id);
        //$bnr_title=$request->order_title;
        //$bnr_link=$request->bnr_link;
        //$bnr_short_description=$request->bnr_short_description;
        //$bnr_status=$request->bnr_status;
        //$bnr_image=$profileImage;

        $order_data = [
            'parcel_detail' => $request->parcel_detail,
            'weight' => $request->weight,
            'weight_type' => $request->weight_type,
            'notes' => $request->notes,

            'sender_name' => $request->sender_name,
            'sender_email' => $request->sender_email,
            'sender_mobile' => $request->sender_mobile,
            'sender_address_1' => $request->sender_address_1,
            'sender_address_2' => $request->sender_address_2,
            'sender_address_3' => $request->sender_address_3,
            'sender_city' => $request->sender_city,
            'sender_pincode' => $request->sender_pincode,
            'sender_longitute' => $request->sender_longitute,
            'sender_latitude' => $request->sender_latitude,

            'receiver_name' => $request->receiver_name,
            'receiver_email' => $request->receiver_email,
            'receiver_mobile' => $request->receiver_mobile,
            'receiver_address_1' => $request->receiver_address_1,
            'receiver_address_2' => $request->receiver_address_2,
            'receiver_address_3' => $request->receiver_address_3,
            'receiver_city' => $request->receiver_city,
            'receiver_pincode' => $request->receiver_pincode,
            'receiver_longitute' => $request->receiver_longitute,
            'receiver_latitude' => $request->receiver_latitude,

            'total_distance' => $request->total_distance,
            'price' => $request->price,
            'order_status' => $request->order_status
        ];
        // dd($order_data);




        $order   =   Order::updateOrCreate(
            ['id' => $order_id],
            $order_data
        );

        if ($order) {
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

    public function remark(Request $request)
    {
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DoubleGoogleOrderModel $order)
    {
        //    dd($request->all());

        $BreadCrumbPageHeader = $this->_breadCrumPageHeader->order_details();
        $order_data  = $order;
        $drivers = Driver::where('status', 'Y')->get()->pluck('name', 'id');
        $order_id = $order_data->id;
        $customer = Customer::where('id', $order_data->user_id)->first();
        $doubleGoogleOrderData = DoubleGoogleOrderModel::with(['customer'])->with(['orderAddress'])->with(['doubleGoogleOrderItems'])->with(['driver'])->with(['store'])->where('id', $order_id)->first()->toArray();
        // dd($doubleGoogleOrderData);
        return view(Helpers::file_path("edit"), compact('BreadCrumbPageHeader', 'order_data', 'doubleGoogleOrderData', 'customer', 'drivers'));
    }

    public function orderAddressId(Request $request, $id)
    {
        $doubleGoogleOrderData = DoubleGoogleOrderModel::with(['orderAddress'])->where('id', $request->order_id)->first();
        if ($request->address_type == 'pickup_address') {

            foreach ($doubleGoogleOrderData->orderAddress as $key => $value) {

                $doubleGoogleOrderData->orderAddress[$key]->pickup_address = $request->address;
            }
        } else if ($request->address_type == 'delivery_address') {
            foreach ($doubleGoogleOrderData->orderAddress as $key => $value) {
                if ($doubleGoogleOrderData->orderAddress[$key]->id == $request->order_address_id) {
                    $doubleGoogleOrderData->orderAddress[$key]->delivery_address = $request->address;
                    break;
                }
            }
        }
        $doubleGoogleOrderData->push();
        // dd($doubleGoogleOrderData);

    }

    public function status_change(Request $request)
    {
        // dd($request->all());
        $orderlist = DoubleGoogleOrderModel::where('id', $request->get('order_id'))->first();
        $orderlist->order_status = $request->get('order_status', '');
        $orderlist->driver_id = $request->get('driver_id', '');
        $orderlist->save();
        // dd($orderlist->driver_id);
        if ($orderlist->driver_id != null) {
            $driver_details = Driver::where('id', $orderlist->driver_id)->first();
            $driver_msg_for_orders = 'Order assign to you is,\n' . $orderlist->order_number . '\nFor more info contact Callat7';
            $message = urlencode($driver_msg_for_orders);
            $output = $this->send_sms($driver_details->phone, $message);
        }
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
    public function destroy(Request $request, DoubleGoogleOrderModel $id)
    {
        // dd($request->all());
        $order_delete = $id;
        $order_delete->order_status = "Deleted";
        $order_delete->save();

        $order_log = new OrderUpdateLog;
        $order_log->remark = $request->remark;
        $order_log->double_google_order_id = $order_delete->id;
        $order_log->user_id = Auth::user()->id;
        $order_log->save();
    }
    public function addRemark(Request $request, DoubleGoogleOrderModel $id)
    {
        $order = $id;
        $user_id = Auth::user()->id;
        $remark_record = Remark::create(
            [
                'double_google_order_id' => $request->double_google_order_id,
                'user_id' => Auth::user()->id,
                'remark' => $request->remark,
            ]
        );
    }
    public function orderRemarkdata(Request $request, DoubleGoogleOrderModel $id)
    {
        
        $data_reamrk = Remark::with(['user' => function($q){
                                            $q->select('id','name');
                                    }])->where('double_google_order_id', $request->get('double_google_order_id'))->get()->toArray();
        // dd($data_reamrk);
        return response()->json($data_reamrk);

    }
    public function deleteOrderFromeAdmin($id)
    {
            $order = DoubleGoogleOrderModel::where('id',$id);
            $order->delete();
            return "delete order id ".$id." done.";
    }
    
}
