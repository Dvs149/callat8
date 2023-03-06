<?php

namespace App\Http\Controllers\AdminControl;

use Helpers;
use DataTables;
use App\dgmodel\Driver;
use App\dgmodel\Customer;
use App\dgmodel\Feedback;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\BreadcrumbPageHeaderthings;

class ReviewController extends Controller
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
        $BreadCrumbPageHeader = $this->_breadCrumPageHeader->review_Management();
        $data = Feedback::select('*', DB::raw("CONCAT('row_', id) as DT_RowId"))->with('customer')->with('driver')->with('doubleGoogleOrder')->get();
        // dd($data);
        $user_list = Customer::select('id', 'sender_name')->get();
        $driver_list = Driver::select('id', 'name')->get();
        // dd($BreadCrumbPageHeader);
        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="text-center">
                           <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit  edit-user">
                                    <img class="edit  edit-user" title="Edit" alt="Edit" style="cursor: pointer;" src="' . asset('assets/images/Edit - 16.png') . '" >
                           </a>';
                    $btn = $btn . '<a href="javascript:void(0);" id="delete-user" data-toggle="tooltip" data-original-title="Delete" data-id="' . $row->id . '" class="delete "><img title="Delete" alt="Delete" style="cursor: pointer;" src="' . asset("assets/images/Delete - 16.png") . '" ></a>';
                    return $btn;
                })
                ->rawColumns(['action'])

                ->make(true);
        }
        //
        return view('admin.review.review', compact('BreadCrumbPageHeader','user_list','driver_list'));
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
         $review_id = $request->review_id;
        if ($review_id==null) {
            $message = config('custom.ADDED_SUCCESFULL');
            $data=[ 
                'rate' => $request->rate,
                'status' => $request->status,
                'comments' => $request->comments,
                'double_google_order_id' => $request->double_google_order_id,
                'driver_id' => $request->driver_id,
                'user_id' => $request->user_id,
            ];
                //dd($request->all());
        } else{
                $testimoanial = Feedback::where('id',$review_id)->first();
                // dd($testimoanial->date);
                $data=[ 
                    'rate' => $request->rate,
                    'status' => $request->status,
                    'comments' => $request->comments,
                    'double_google_order_id' => $request->double_google_order_id,
                    'driver_id' => $request->driver_id,
                    'user_id' => $request->user_id,

                ];
           $message = config('custom.UPDATED_SUCCESFULL');
        }

        $Review_data   =   Feedback::updateOrCreate(['id' => $review_id], $data);
        return redirect(Helpers::admin_url('review'))->with('message', $message);
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
        $feedback  = Feedback::with('customer')->with('driver')->with('doubleGoogleOrder')->where('id',$id)->first();
        // dd($feedback->mobile);
        return Response::json($feedback);
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
    public function destroy(Feedback $id)
    {
        $feedback = $id;
        $feedback->delete();
    }
}
