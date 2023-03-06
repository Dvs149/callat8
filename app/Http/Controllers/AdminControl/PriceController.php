<?php

namespace App\Http\Controllers\AdminControl;

use Helpers;
use DataTables;
use App\dgmodel\Price;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\BreadcrumbPageHeaderthings;

class PriceController extends Controller
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
        $BreadCrumbPageHeader=$this->_breadCrumPageHeader->price_Management();
        $data = $this->_fetch_data->get_price_listing_data();
        // dd($BreadCrumbPageHeader);
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
        //
		return view(Helpers::file_path("price"),compact('BreadCrumbPageHeader'));

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
            'start_km' => "required_with:end_km",
            'end_km' => "required_with:start_km|greater_than_field:start_km|max:50",
            'price'=>"required|max:700",
        ]);
        
        // dd($request->all());


        $price_id = $request->price_id;

        if ($price_id==null) {
           $message = config('custom.ADDED_SUCCESFULL');
                //dd($request->all());
        }
        else{
           $message = config('custom.UPDATED_SUCCESFULL');
        }

        $data=[ 
            'start_km' => $request->start_km,
            'end_km' => $request->end_km,
            'price' => $request->price,
        ];

        $user   =   Price::updateOrCreate(['id' => $price_id], $data);
        return redirect(Helpers::admin_url('price'))->with('message', $message);
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
    public function edit(Request $request,Price $price)
    {
        $price_to_edit  = $price;
        // dd($cms_page_to_edit);
        return Response::json($price_to_edit);
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
    public function destroy(Price $id)
    {
        //
        $price = $id;
        $price->delete();
    }
}
