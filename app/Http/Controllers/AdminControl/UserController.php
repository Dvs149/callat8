<?php

namespace App\Http\Controllers\AdminControl;

use Helpers;
use App\User;
use DataTables;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\admin\UserControllerRequest;
use App\Http\Controllers\BreadcrumbPageHeaderthings;

class UserController extends Controller
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
        $BreadCrumbPageHeader=$this->_breadCrumPageHeader->manage_Users();

        $data = $this->_fetch_data->get_users_data();
        // dd($BreadCrumbPageHeader);
        if ($request->ajax()) {
            return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                           $btn = '<div class="text-center">
                           <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit  edit-user">
                                    <img class="edit  edit-user" title="Edit" alt="Edit" style="cursor: pointer;" src="'.asset('assets/images/Edit - 16.png').'" >
                           </a>';
                           if(isset($row->id) && $row->id=='1'){
                            /* Dobt add delete button if it is admin */
                                // $btn = $btn.' <a href="javascript:void(0);" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-lock"></i></a>';
                            }
                            else{
                                $btn = $btn.'<a href="javascript:void(0);" id="delete-user" data-toggle="tooltip" data-original-title="Delete" data-id="'.$row->id.'" class="delete "><img title="Delete" alt="Delete" style="cursor: pointer;" src="'.asset("assets/images/Delete - 16.png").'" ></a>';
                                // $btn = $btn.' <a href="javascript:void(0);" data-target="#deleteModal" id="delete-id" data-id="'.$row->id.'"  class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>';   
                                // $btn=$btn.' <a href="#" data-toggle="modal" data-id="'.$row->id.'"  class="btn btn-danger btn-circle btn-sm delete" data-target="#deleteModal"><i class="fas fa-trash"></i></a>';
                            }
                            return $btn;
                    })
                    ->rawColumns(['action'])

                    ->make(true);

        }
        
		return view(Helpers::file_path("users"),compact('BreadCrumbPageHeader'));
        
    }
    public function addUsers(){
        
        //fetch States name for dropdown 

        $BreadCrumbPageHeader=$this->_breadCrumPageHeader->add_user();

        return view(Helpers::file_path("add_user"),compact('BreadCrumbPageHeader'));
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
    public function store(UserControllerRequest $request)
    {
        // dd($request->toArray());

        $user_id = $request->user_id;

        if ($user_id==null) {
            $user = new User();
            $user->password = $request->get('password');
            $message = config('custom.ADDED_SUCCESFULL');
        }
        else{
            $user=User::FindOrFail($user_id);
            if($request->get('password')!=null){
                $user->password = $request->get('password');
            }
            $message = config('custom.UPDATED_SUCCESFULL');
        }

        $user->status = $request->get('status','');
        $user->name = $request->get('name', '');
        $user->email = $request->get('email','');
        $user->mobile = $request->get('mobile','');
        // $user->whatsapp_mobile = $request->get('whatsapp_mobile','');
        // dd($user->toArray());
        $user->save();
        
        return redirect(Helpers::admin_url('users'))->with('message', $message);

        
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
    public function edit(User $user)
    {
        $data = $user;
        return Response::json($data);
        
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
    public function destroy(User $id)
    {
        $user = $id;
        $user->delete();
    }
}
