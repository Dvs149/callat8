<?php

namespace App\Http\Controllers\AdminControl;

use Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BreadcrumbPageHeaderthings;

class Dashboard extends Controller
{
    public function __construct(){

        $this->_breadCrumPageHeader = new BreadcrumbPageHeaderthings();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $BreadCrumbPageHeader=$this->_breadCrumPageHeader->dashboard();
        // dd($BreadCrumbPageHeader);   
		return view(Helpers::file_path("dashboard"),compact('BreadCrumbPageHeader'));

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
        //
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
        //
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
