<?php
namespace App\Http\Controllers\AdminControl;

use Helpers;
use DataTables;
use App\dgmodel\City;
use App\ProductManagement;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\BreadcrumbPageHeaderthings;

class CitiesManagementController extends Controller
{

    public function __construct(){
        $this->_fetch_data = new DGDatabase();
        $this->_breadCrumPageHeader = new BreadcrumbPageHeaderthings();
    }
    /**z
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $BreadCrumbPageHeader=$this->_breadCrumPageHeader->cities_management();
        $data = $this->_fetch_data->get_cities_listing_data();
        // dd($data);
        // dd($categories);
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
		return view(Helpers::file_path("cities"),compact('BreadCrumbPageHeader'));

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
            'city_name' => "required|max:191",
        ]);

        $cities_id=$request->cities_id;
        $city_name=$request->city_name;



            

        if ($cities_id==null) {
           $message = config('custom.ADDED_SUCCESFULL');
                //dd($request->all());
        }
        else{
           $message = config('custom.UPDATED_SUCCESFULL');
        }

        $data=[ 
            'city_name' => $city_name,
        ];

        $user   =   City::updateOrCreate(['id' => $cities_id], $data);
        return redirect(Helpers::admin_url('cities'))->with('message', $message);
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
    public function edit(Request $request,City $city)
    {
        $city_to_edit  = $city;
        // dd($city_to_edit);
        return Response::json($city_to_edit);
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
    public function destroy(City $id)
    {
        $cities = $id;
        // dd($cities);
        $cities->delete();
    }
}
