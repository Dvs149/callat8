<?php

namespace App\Http\Controllers\AdminControl;

use Helpers;
use DataTables;
use App\dgmodel\BannerModel;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\BreadcrumbPageHeaderthings;
use App\Http\Requests\admin\BannerControllerRequest;


class BannerController extends Controller
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
        $BreadCrumbPageHeader=$this->_breadCrumPageHeader->banner_management();
        $data = $this->_fetch_data->get_banners_listing_data();
        // dd($data->get());
        if ($request->ajax()) {
            return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){

                           $btn = '<div class="text-center">
                           <a href="javascript:void(0)" data-toggle="tooltip"  data-url="'.url(Helpers::admin_url('banner')).'/'.$row->id.'/edit" data-original-title="Edit" class="edit  edit-user">
                                    <img class="edit  edit-user" title="Edit" alt="Edit" style="cursor: pointer;" src="'.asset('assets/images/Edit - 16.png').'" >
                           </a>';
                           $btn = $btn.'<a href="javascript:void(0);" id="delete-user" data-toggle="tooltip" data-original-title="Delete" data-url="'.url(Helpers::admin_url("banner")).'/delete/'.$row->id.'" class="delete "><img title="Delete" alt="Delete" style="cursor: pointer;" src="'.asset("assets/images/Delete - 16.png").'" ></a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])

                    ->make(true);

        }
        //
        // dd(Helpers::file_path("banner"));
		return view(Helpers::file_path("banner"),compact('BreadCrumbPageHeader'));
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
    public function store(BannerControllerRequest $request)
    {
        // dd(storage_path('app/public'.config('custom.BANNER_IMAGE_PATH')));

        // dd($request->all());
        
        /* $post_data = $request->validate([
            'bnr_title' => "required|max:255",
            'bnr_status'=>"required",
            'type'=>"required",
            'bnr_image' => 'required_if:type,slider|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=720,max_height=1200,min_width=720,min_height=1200|max:1024',
            'bnr_image' => 'required_if:type,banner|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=800,max_height=900,min_width=800,min_height=900|max:1024',
        ]); */

        $banner=new BannerModel;
        $banner_id = $request->banner_id;
        if($banner_id != ''){
            $banner=BannerModel::FindOrFail($banner_id);
        }
        if ($banner_id == null) {
            $message = config('custom.ADDED_SUCCESFULL');
            //dd($request->all());
        }
        else{
            $message = config('custom.UPDATED_SUCCESFULL');
        }
        $banner->bnr_title=$request->bnr_title;
        $banner->type=$request->type;
        $banner->bnr_status=$request->bnr_status;
        $banner->bnr_description=$request->get('bnr_description','');
        $banner->save();
        
        //store the image if requested
        if (request()->hasFile('bnr_image')) {
            
            if(!empty($banner->bnr_image)){
                //check wether image is stored or not, if stored then removed old image
                $file= $banner->bnr_image;
                // dd(config('custom.BANNER_IMAGE_PATH').$file);
                @unlink(config('custom.BANNER_IMAGE_PATH').$file);
            }
            $file = request()->file('bnr_image');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move(config('custom.BANNER_IMAGE_PATH'), $fileName);
            // dd($banner->first());
            $banner->bnr_image=$fileName;
        }
        /* //if user wants to remove image
        else if ($request->delete_img==null) {
            dd($request->all(),$banner->bnr_image);
            
            $file= $banner->bnr_image;
            $filename = config('custom.BANNER_IMAGE_PATH').$file;
            //Banner::delete($filename);
            if(file_exists($filename)){
                @unlink($filename);
            }
            $banner->bnr_image=null;
        } */
        $banner->save();
        return redirect(Helpers::admin_url('banner'))->with('message', $message);
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
    public function edit(Request $request,BannerModel $banner)
    {
        $banner_to_edit  = $banner;
        return Response::json($banner_to_edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BannerModel $id)
    {
        $banner = $id;
        $file= $banner->banner_image;
        $filename = storage_path(config('custom.BANNER_IMAGE_PATH')).$file;
        
        if(file_exists($filename)){
            @unlink($filename);
        }
        $banner->delete();
    }
}
