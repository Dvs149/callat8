<?php

namespace App\Http\Controllers\AdminControl;

use Helpers;
use DataTables;
use Carbon\Carbon;
use App\dgmodel\Driver;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use App\DoubleGoogleOrderModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\BreadcrumbPageHeaderthings;

class DriverController extends Controller
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
        $BreadCrumbPageHeader=$this->_breadCrumPageHeader->driver_management();
        $data = $this->_fetch_data->get_driver_listing_data();
        $cities = $this->_fetch_data->get_cities_listing_data();
        // $cities= $cities_data->get();
        // dd($cities);
        // dd($BreadCrumbPageHeader);
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
		return view(Helpers::file_path("driver"),compact('BreadCrumbPageHeader','cities'));
    }
    public function driverAssignment(Request $request)
    {   
        $order_ids = [];
        $driver_ids = [];
        $driver_data = $request->driver_id;
        foreach ($driver_data as $order_id => $driver_value){ 
            // dd($request->driver_id);
            $order_assign_to_driver=DoubleGoogleOrderModel::where('id',$order_id)->update(['driver_id'=>$driver_value]);
        }
        
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
        // $dvs='all()';
        // dd($request->all());

        $post_data = $request->validate([

            'name' => 'required',
            'email'=> 'required|email|max:75',
            'phone'=> 'required|max:10',
            'alternate_phone'=> 'max:10',
            'address1'=> 'required|max:50',
            'address2'=> 'max:50',
            'address3'=> 'max:50',
            'city_id'=> 'required',
            'postcode'=> 'required|max:6',
            'aadhar_no'=> 'required|max:16',
            'license_no'=> 'required|max:20',
            'vehicle_no'=> 'required|max:10',
            'status'=> 'required',
            'aadhar_card_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'license_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'passport_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'passport_photo' => "image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=450,max_height=600,min_width=450,min_height=600|max:1024",
        ]);

        $driver= new Driver;
        $current_time = Carbon::now();
        
        // dd($request->driver_id);
        if($request->driver_id){
            $driver=Driver::FindOrFail($request->driver_id);
            $message="Updated successfully";
        }
        else{
            $otp = mt_rand(100000,999999);
            $driver->otp=$otp;
            $driver->otp_expire_time = $current_time->isoFormat('Y-MM-DD HH:mm:ss');
            $message="Registered successfully";
        }
        $driver->name=$request->name;
        $driver->email=$request->email;
        $driver->phone=$request->phone;
        $driver->alternate_phone=$request->alternate_phone;
        $driver->address1=$request->address1;
        $driver->address2=$request->address2;
        $driver->address3=$request->address3;
        $driver->city_id=$request->city_id;
        $driver->postcode=$request->postcode;
        $driver->aadhar_no=$request->aadhar_no;
        $driver->license_no=$request->license_no;
        $driver->vehicle_no=$request->vehicle_no;
        $driver->status=$request->status;
        // dd($driver->aadhar_card_photo,$driver->license_photo);
        // dd($driver);
        $driver->save();
        
        //store the image if requested
        if (request()->hasFile('passport_photo')) {
            //check wether image is stored or not, if stored then removed old image
            if(!empty($driver->passport_photo)){
                $file= $driver->passport_photo;
                @unlink(config('custom.PASSPORT_PATH').$file );
            }
           $file = request()->file('passport_photo');
           $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
           $file->move(config('custom.PASSPORT_PATH'), $fileName);   
           $driver->passport_photo=$fileName;
        }
        //if user wants to remove image
        else if ($request->delete_img_passport_photo==null && $request->passport_photo==null) {
            // dd($request->all(),$driver->passport_photo);

             $file= $driver->passport_photo;
             $filename =config('custom.PASSPORT_PATH').$file;
             //Banner::delete($filename);
             if(file_exists($filename)){
                @unlink($filename);
             }
             $driver->passport_photo=null;
        }
        // dd($driver);

        //store the image if requested
        if (request()->hasFile('aadhar_card_photo')) {
            //check wether image is stored or not, if stored then removed old image
            if(!empty($driver->aadhar_card_photo)){
                $file= $driver->aadhar_card_photo;
                @unlink( config('custom.AADHAR_CARD_PATH').$file );
            }
           $file = request()->file('aadhar_card_photo');
           $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
           $file->move(config('custom.AADHAR_CARD_PATH'), $fileName);   
           $driver->aadhar_card_photo=$fileName;
        }
        //if user wants to remove image
        else if ($request->delete_img_aadhar_card_photo==null && $request->aadhar_card_photo==null) {
            // dd($request->all(),$driver->aadhar_card_photo);

             $file= $driver->aadhar_card_photo;
             $filename = config('custom.AADHAR_CARD_PATH').$file;
             //Banner::delete($filename);
             if(file_exists($filename)){
                @unlink($filename);
             }
             $driver->aadhar_card_photo=null;
        }
        // dd($driver);

        //store the image if requested
        if (request()->hasFile('license_photo')) {
            //check wether image is stored or not, if stored then removed old image
            if(!empty($driver->license_photo)){
                $file= $driver->license_photo;
                @unlink( config('custom.LICENSE_PATH').$file );
            }
           $file = request()->file('license_photo');
           $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
           $file->move(config('custom.LICENSE_PATH'), $fileName);    
           $driver->license_photo=$fileName;
        }
        //if user wants to remove image
        else if ($request->delete_img_license_photo==null && $request->license_photo==null) {
            // dd($request->all(),$driver->license_photo);

             $file= $driver->license_photo;
             $filename = config('custom.LICENSE_PATH').$file;
             //Banner::delete($filename);
             if(file_exists($filename)){
                @unlink($filename);
             }
             $driver->license_photo=null;
        }
        // dd($driver);
        $driver->save();

        return redirect(Helpers::admin_url('driver'))->with('message', $message);


    }
    public function storeImage($file,$driver,$input_name,$path) {

        if( !empty($driver->aadhar_card_photo) ){
                $file= $driver->aadhar_card_photo;
                @unlink( config('custom.AADHAR_CARD_PATH').$file );
        }

        $destinationPath = public_path().$path;
        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $profileImage);
        // $driver->aadhar_card_photo=$profileImage;

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Driver $driver)
    {
        $driver_data  = $driver;
        // dd($cms_page_to_edit);
        return Response::json($driver_data);
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
    public function destroy(Driver $id)
    {
        $driver = $id;
        if($driver){
            $file_aadhar_card_photo= $driver->aadhar_card_photo;
            $filename_aadhar_card_photo = public_path().'/image/aadharcard/'.$file_aadhar_card_photo;
            //Banner::delete($filename);
            if(file_exists($filename_aadhar_card_photo)){
                @unlink($filename_aadhar_card_photo);
            }

            $file_license_photo= $driver->license_photo;

                    $filename_license_photo = public_path().'/image/licensephoto/'.$file_license_photo;
                    //Banner::delete($filename);
            if(file_exists($filename_license_photo)){
                @unlink($filename_license_photo);
            }
        }
        
        $driver->delete();

    }
}
