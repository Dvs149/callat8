<?php

namespace App\Http\Controllers\AdminControl;
use Helpers;
use DataTables;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use App\dgmodel\GuestCustumer;
use App\dgmodel\GuestCustomerRemark;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\BreadcrumbPageHeaderthings;

class PhoneController extends Controller
{
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
        $BreadCrumbPageHeader = $this->_breadCrumPageHeader->phones_data();
        $data = $this->_fetch_data->get_phone_number_data();
        // dd($data);
        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="text-center">
                    <a class="remark" data-toggle="tooltip" target="_blank"  data-id="' . $row->id . '" data-original-title="Edit" class="edit  edit-user">
                            <i title="Remarks" class="iconsweets-create" style="margin-top: -9px;cursor: pointer;"></i>
                           </a>
                         ';
                    $btn = $btn . '<a href="javascript:void(0);" id="delete-user" data-toggle="tooltip" data-original-title="Delete" data-id="' . $row->id . '" class="delete "><img title="Delete" alt="Delete" style="cursor: pointer;" src="' . asset("assets/images/Delete - 16.png") . '" ></a>';
                    return $btn;
                })
                ->rawColumns(['action'])

                ->make(true);
        }

        return view('admin.phone.phones', compact('BreadCrumbPageHeader'));
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
        // dd($request->all());
        $post_data = $request->validate([
            'mobile' => "required|max:10",
        ]);

        // dd($request->all());


        $phones_id = $request->phones_id;

        if ($phones_id == null) {
            $message = config('custom.ADDED_SUCCESFULL');
            //dd($request->all());
        } else {
            $message = config('custom.UPDATED_SUCCESFULL');
        }

        $data = [
            'mobile' => $request->mobile,
        ];

        $user   =   GuestCustumer::updateOrCreate(['id' => $phones_id], $data);
        return redirect(Helpers::admin_url('phones'))->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dgmodel\PhoneModel  $phoneModel
     * @return \Illuminate\Http\Response
     */
    public function show(PhoneModel $phoneModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dgmodel\PhoneModel  $phoneModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $phones_data  = GuestCustumer::where('id',$id)->first();
        // dd($phones_data->mobile);
        return Response::json($phones_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dgmodel\PhoneModel  $phoneModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhoneModel $phoneModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dgmodel\PhoneModel  $phoneModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phones_data  = GuestCustumer::where('id',$id)->first();
        $phones_data->delete();
    }

    public function phonesRemark(Request $request, GuestCustumer $id)
    {
        // dd($request->all());
         $data_reamrk = GuestCustomerRemark::with(['user' => function ($q) {
            $q->select('id', 'name');
        }])->where('guest_customer_id', $request->get('customer_id'))->get()->toArray();
        // dd($data_reamrk);
        return response()->json($data_reamrk);
    }
    
    public function phonesRemarkdata(Request $request,$id)
    {
        //   dd($request->all());
        $order = $id;
        $remark_record = GuestCustomerRemark::create(
            [
                'guest_customer_id' => $request->customer_id,
                'user_id' => Auth::user()->id,
                'remark' => $request->remark,
            ]
        );
    }

}
