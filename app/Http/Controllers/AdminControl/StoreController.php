<?php

namespace App\Http\Controllers\AdminControl;

use Helpers;
use DataTables;
use App\dgmodel\Store;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\admin\StoreControllerRequest;
use App\Http\Controllers\BreadcrumbPageHeaderthings;

class StoreController extends Controller
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
        $BreadCrumbPageHeader=$this->_breadCrumPageHeader->store_management();
        $data = $this->_fetch_data->get_store_listing_data();
        // dd($data);
        $cities = $this->_fetch_data->get_cities_listing_data();
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
		return view(Helpers::file_path("store"),compact('BreadCrumbPageHeader','cities'));
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
    public function store(StoreControllerRequest $request, Store $store)
    {
        // dd($request->all(),$store);

        $store_id = $request->store_id;
        if ($store_id==null) {
            $message = config('custom.ADDED_SUCCESFULL');
        }
        else{
            $message = config('custom.UPDATED_SUCCESFULL');
        }

        $data=[
            'name' => $request->get('name',''),
            'adddress' => $request->get('adddress',''),
            'city_id' => $request->get('city_id',''),
            'notes' => $request->get('notes',''),
            'type' => $request->get('type',''),
            'close_day' => $request->get('close_day',''),
            'open_time' => date('H:i:s',strtotime($request->get('open_time',''))),
            'close_time' => date('H:i:s',strtotime($request->get('close_time',''))),
            'status' => $request->get('status',''),
        ];
        $Store_data   =   Store::updateOrCreate(['id' => $store_id], $data);

        //store the image if requested
        if (request()->hasFile('logo')) {
            
            if(!empty($Store_data->logo)){
                //check wether image is stored or not, if stored then removed old image
                $file= $Store_data->logo;
                // dd(config('custom.logo_PATH').$file);
                @unlink(config('custom.STORE_IMAGE_PATH').$file);
            }
            $file = request()->file('logo');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move(config('custom.STORE_IMAGE_PATH'), $fileName);   
            // dd($Store_data->first());
            $Store_data->logo=$fileName;
        }
        else if ($request->delete_img==null) {
            // dd($request->all(),$Store_data->logo);
            
            $file= $Store_data->logo;
            $filename = config('custom.STORE_IMAGE_PATH').$file;
            //Banner::delete($filename);
            if(file_exists($filename)){
                @unlink($filename);
            }
            $Store_data->logo=null;
        }
        $Store_data->save();

        return redirect(Helpers::admin_url('store'))->with('message', $message);
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
    public function edit(Request $request, Store $store)
    {
        $store_to_edit  = $store;

        return Response::json($store_to_edit);
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
    public function destroy(Store $id)
    {
        
        $store = $id;
        $file= $store->logo;
        $filename = storage_path(config('custom.STORE_IMAGE_PATH')).$file;
        //banner::delete($filename);
        if(file_exists($filename)){
            @unlink($filename);
        }
        $store->delete();
        
    }
}
