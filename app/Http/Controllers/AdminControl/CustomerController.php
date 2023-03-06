<?php

namespace App\Http\Controllers\AdminControl;

use Helpers;
use DataTables;
use App\dgmodel\Customer;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\BreadcrumbPageHeaderthings;

class CustomerController extends Controller
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
        $BreadCrumbPageHeader=$this->_breadCrumPageHeader->customer_management();
        $cities = $this->_fetch_data->get_cities_listing_data();
        // $cities=$cities_data->get();

        $data = $this->_fetch_data->get_customer_listing_data();
        // dd($data->get());
        if ($request->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<div class="text-center">
                <a class="remark" data-toggle="tooltip" target="_blank"  data-id="' . $row->id . '" data-original-title="Edit" class="edit  edit-user">
                            <i title="Remarks" class="iconsweets-create" style="margin-top: -9px;cursor: pointer;"></i>
                           </a>
                <a href="'.url(Helpers::admin_url('customer')).'/'.$row->id.'/address_list" data-toggle="tooltip"  data-id="'.$row->id. '" data-original-title="Edit" class="edit  edit-user">
                    <img class="edit  edit-user" title="Address" alt="Address" style="cursor: pointer;width:16px; height:16px" src="'.asset('assets/images/icon-address.svg').'" >
                </a>
                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit  edit-user">
                <img class="edit  edit-user" title="Edit" alt="Edit" style="cursor: pointer;" src="'.asset('assets/images/Edit - 16.png').'" >
                </a>';
                $btn = $btn.'<a href="javascript:void(0);" id="delete-user" data-toggle="tooltip" data-original-title="Delete" data-id="'.$row->id. '" class="delete "><img title="Delete" alt="Delete" style="cursor: pointer;" src="'.asset("assets/images/Delete - 16.png").'" ></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        
		return view(Helpers::file_path("customer"),compact('BreadCrumbPageHeader','cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $post_data = $request->validate([
            'status' => "required",
            'sender_mobile' => "required",
        ]);

        $customer_id=$request->customer_id;
        
        if ($customer_id==null) {
            $message = config('custom.ADDED_SUCCESFULL');
            $customer = new Customer;
            //dd($request->all());
            $customer->created_date = date('Y-m-d H:i:s');
        }
        else{
            $customer = Customer::select('*')->where('id',$customer_id)->first();
            // dd($customer);
            $message = config('custom.UPDATED_SUCCESFULL');
        }

        $customer->status = $request->get('status','');
        $customer->created_on = $request->get('created_on','');
        $customer->sender_name = $request->get('sender_name','');
        $customer->sender_email = $request->get('sender_email','');
        $customer->sender_mobile = $request->get('sender_mobile','');
        $customer->remark = $request->get('remark', '');
        $customer->save();

        return redirect(Helpers::admin_url('customer'))->with('message', $message);
        
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
    public function edit(Request $request,Customer $customer)
    {
        $customer_to_edit  = $customer;
        return Response::json($customer_to_edit);
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
    public function destroy(Customer $id)
    {
        // dd('s');
        $customer = $id;
        $customer->delete();
    }
}
