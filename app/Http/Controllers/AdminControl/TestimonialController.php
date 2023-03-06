<?php

namespace App\Http\Controllers\AdminControl;

use Helpers;
use DataTables;
use App\dgmodel\Testimonial;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\BreadcrumbPageHeaderthings;

class TestimonialController extends Controller
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
        $BreadCrumbPageHeader = $this->_breadCrumPageHeader->testimonial_Management();
        $data = Testimonial::select('*',DB::raw("CONCAT('row_', id) as DT_RowId"));
        // dd($data);
        // dd($BreadCrumbPageHeader);
        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="text-center">
                           <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit  edit-user">
                                    <img class="edit  edit-user mr-2" title="Edit" alt="Edit" style="cursor: pointer;margin-right: 10px" src="' . asset('assets/images/Edit - 16.png') . '" >
                           </a>';
                    $btn = $btn . '<a href="javascript:void(0);" id="delete-user" data-toggle="tooltip" data-original-title="Delete" data-id="' . $row->id . '" class="delete "><img title="Delete" alt="Delete" style="cursor: pointer;" src="' . asset("assets/images/Delete - 16.png") . '" ></a>';
                    return $btn;
                })
                ->rawColumns(['action'])

                ->make(true);
        }
        //
        return view('admin.testimonial.testimonial', compact('BreadCrumbPageHeader'));
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
        $testimonial_id = $request->testimonial_id;
        if ($testimonial_id==null) {
            $message = config('custom.ADDED_SUCCESFULL');
                //dd($request->all());
        } else{
                $testimoanial = Testimonial::where('id',$testimonial_id)->first();
                // dd($testimoanial->date);
           $message = config('custom.UPDATED_SUCCESFULL');
        }

        $data=[ 
            'status' => $request->status,
            'user_name' => $request->user_name,
            'message' => $request->message,
            'date' => isset($testimoanial->date) ? $testimoanial->date : date('Y-m-d H:i:s'),
        ];
        $testimonial_data   =   Testimonial::updateOrCreate(['id' => $testimonial_id], $data);
        return redirect(Helpers::admin_url('testimonial'))->with('message', $message);
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
        $testimonial_data  = Testimonial::where('id',$id)->first();
        // dd($testimonial_data->mobile);
        return Response::json($testimonial_data);
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
    public function destroy(Testimonial $id)
    {
         $price = $id;
        $price->delete();
    }
}
