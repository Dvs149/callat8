<?php

namespace App\Http\Controllers\AdminControl;

use Helpers;
use DataTables;
use App\dgmodel\HowItWorks;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BreadcrumbPageHeaderthings;

class HowItWorksController extends Controller
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

        $BreadCrumbPageHeader = $this->_breadCrumPageHeader->how_it_works();
        $data = $this->_fetch_data->how_it_works();
        // dd($data);
        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="text-center">
                           <a href="'.url(Helpers::admin_url('how_it_works').'/'.$row->id.'/edit').'" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit  edit-user">
                                    <img class="edit  edit-user" title="Edit" alt="Edit" style="cursor: pointer;" src="' . asset('assets/images/Edit - 16.png') . '" >
                           </a>';
                    // $btn = $btn . '<a href="javascript:void(0);" id="delete-user" data-toggle="tooltip" data-original-title="Delete" data-id="' . $row->id . '" class="delete "><img title="Edit" alt="Edit" style="cursor: pointer;" src="' . asset("assets/images/Delete - 16.png") . '" ></a></div>';
                    return $btn;
                })
                ->rawColumns(['action'])

                ->make(true);
        }

        return view(Helpers::file_path("howItwWorks"), compact('BreadCrumbPageHeader'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $BreadCrumbPageHeader = $this->_breadCrumPageHeader->how_it_works_edit();
        // dd($data);
       

        return view('admin.cmsPages.howItWorksAddorEdit', compact('BreadCrumbPageHeader'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $how_it_works_id = $request->how_it_works_id;

        if ($how_it_works_id == null) {
            $message = config('custom.ADDED_SUCCESFULL');
        } else {
            $message = config('custom.UPDATED_SUCCESFULL');
        }
        
        $how_it_works_data = [
            'status' => $request->status,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
        ];

        $HowItWorksResult   =   HowItWorks::updateOrCreate(
            ['id' => $how_it_works_id],
            $how_it_works_data
        );
        return redirect(Helpers::admin_url('how_it_works'))->with('message', $message);
        // view(Helpers::file_path("howItwWorks"));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dgmodel\HowItWorks  $howItWorks
     * @return \Illuminate\Http\Response
     */
    public function show(HowItWorks $howItWorks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dgmodel\HowItWorks  $howItWorks
     * @return \Illuminate\Http\Response
     */
    public function edit($howItWorks)
    {
        $BreadCrumbPageHeader = $this->_breadCrumPageHeader->how_it_works_edit();
        $data = HowItWorks::where('id',$howItWorks)->first();  
        return view('admin.cmsPages.howItWorksAddorEdit', compact('BreadCrumbPageHeader','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dgmodel\HowItWorks  $howItWorks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HowItWorks $howItWorks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dgmodel\HowItWorks  $howItWorks
     * @return \Illuminate\Http\Response
     */
    public function destroy(HowItWorks $howItWorks)
    {
        //
    }
}
