<?php

namespace App\Http\Controllers\AdminControl;

use Helpers;
use App\User;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\BreadcrumbPageHeaderthings;

class EditprofileController extends Controller
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
    public function index()
    {
        $BreadCrumbPageHeader=$this->_breadCrumPageHeader->edit_Users();
        $user= $this->_fetch_data->get_admin_details(Auth::user()->id);
        // dd($user[0]);
		return view(Helpers::file_path("edit_user"),compact('BreadCrumbPageHeader','user'));
        
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
            'name' => "required|max:25",
            'email' => "required|max:75",
            // 'company_name' => "required|max:50",
            // 'address' => "required|max:150",
            // 'mobile'=>"required|max:12",
            // 'whatsapp_mobile'=>"required|max:12",
            // 'pm_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // dd($request->all());

        $user_id = $request->user_id;

        $user=User::FindOrFail($user_id);
        // dd($user);

        $user->name = $request->name;
        $user->email =$request->email;
        // $user->address =$request->address;
        /*  $user->company_name =$request->company_name; */
        $user->facebook =$request->facebook;
        $user->twitter =$request->twitter;
        $user->instagram =$request->instagram;
        /*$user->pin_link =$request->pin_link;
        $user->linked_in_link =$request->linked_in_link;
        $user->youtube_link =$request->youtube_link; */
        // $user->telephone =$request->telephone;
        $user->mobile =$request->mobile;
        $user->whatsapp_mobile =$request->whatsapp_mobile;
        if($request->password!=null){
            $user->password =$request->password;
        }
        $user->save();

        return Redirect::to(Helpers::admin_url("edit_profile"))->with('updated', 'Updated Successfully');


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
        // dd('f');
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
    public function destroy($id)
    {
        //
    }
}
