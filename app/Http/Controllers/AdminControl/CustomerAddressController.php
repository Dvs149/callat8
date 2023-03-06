<?php

namespace App\Http\Controllers\AdminControl;

use Helpers;
use DataTables;
use App\dgmodel\Customer;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use App\dgmodel\AddAddressModel;
use Illuminate\Support\Facades\DB;
use App\dgmodel\CustomerRemarkModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\BreadcrumbPageHeaderthings;

class CustomerAddressController extends Controller
{
    public function __construct(){
        $this->_fetch_data = new DGDatabase();
        $this->_breadCrumPageHeader = new BreadcrumbPageHeaderthings();
    }
    
    public function index(Request $request,$id)
    {
        $data = AddAddressModel::select('id','default_address','address_type','address','landmark',DB::raw("CONCAT('row_', id) as DT_RowId"))->where('user_id', $id)->get();
        $customer_data = Customer::select('*')->where('id',$id)->first();
        // dd($customer_data);
        // dd($data);
        if ($request->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<div class="text-center">
                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit  edit-user">
                <img class="edit  edit-user" title="Edit" alt="Edit" style="cursor: pointer;" src="'.asset('assets/images/Edit - 16.png').'" >
                </a>';
                $btn = $btn.'<a href="javascript:void(0);" id="delete-user" data-toggle="tooltip" data-original-title="Delete" data-id="'.$row->id.'" class="delete "><img title="Delete" alt="Delete" style="cursor: pointer;" src="'.asset("assets/images/Delete - 16.png").'" ></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $BreadCrumbPageHeader=$this->_breadCrumPageHeader->address_list();
        return view('admin.customer.address_list.address_list',compact('BreadCrumbPageHeader','customer_data'));
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
    public function store(Request $request,$id)
    {
        // dd($request->all(),$id);
        $address_id=$request->address_id;

        if($request->get('default_address')=='Y'){
            $address_list_data_update = AddAddressModel::where('user_id',$id)
                                                        ->update(['default_address'=>'N']);
        }


        if ($address_id==null) {
            $message = config('custom.ADDED_SUCCESFULL');
            $address_list_data = new AddAddressModel;
         }
         else{
             $address_list_data = AddAddressModel::select('*')->where('id',$address_id)->first();
             $message = config('custom.UPDATED_SUCCESFULL');
         }

         $address_list_data->default_address=$request->get('default_address',null);
         $address_list_data->address_type=$request->get('address_type',null);
         $address_list_data->address=$request->get('address',null);
         $address_list_data->landmark=$request->get('landmark',null);
         $address_list_data->other_name=$request->get('other_name',null);
         $address_list_data->user_id = $id;
         $address_list_data->save();

         return redirect(Helpers::admin_url('customer').'/'.$id.'/address_list')->with('message', $message);
        
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
    public function edit($id,AddAddressModel $address_list)
    {
        $address_list_to_edit  = $address_list;
        return Response::json($address_list_to_edit);
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
    public function destroy($id,AddAddressModel $address_list)
    {
        // dd($address_list);
        $address = $address_list;
        $address->delete();
    }
    public function customerRemark(Request $request, Customer $id)
    {
        // dd('s');
        $data_reamrk = CustomerRemarkModel::with(['user' => function ($q) {
            $q->select('id', 'name');
        }])->where('customer_id', $request->get('customer_id'))->get()->toArray();
        // dd($data_reamrk);
        return response()->json($data_reamrk);
    }
    public function customerRemarkdata(Request $request, Customer $id)
    {
        $remark_record = CustomerRemarkModel::create(
            [
                'customer_id' => $request->customer_id,
                'user_id' => Auth::user()->id,
                'remark' => $request->remark,
            ]
        );
    }
    
}
