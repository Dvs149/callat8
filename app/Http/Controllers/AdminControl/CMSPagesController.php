<?php

namespace App\Http\Controllers\AdminControl;

use Helpers;
use DataTables;
use App\dgmodel\CmsPages;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BreadcrumbPageHeaderthings;

class CMSPagesController extends Controller
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
        $BreadCrumbPageHeader = $this->_breadCrumPageHeader->cms_pages_data();
        $data = $this->_fetch_data->cms_pages();
        // dd($data->toArray());
        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="text-center">
                           <a href="' . url(Helpers::admin_url('cms_pages') . '/' . $row->id . '/edit') . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit  edit-user">
                                    <img class="edit  edit-user" title="Edit" alt="Edit" style="cursor: pointer;" src="' . asset('assets/images/Edit - 16.png') . '" >
                           </a>';
                    // $btn = $btn . '<a href="javascript:void(0);" id="delete-user" data-toggle="tooltip" data-original-title="Delete" data-id="' . $row->id . '" class="delete "><img title="Edit" alt="Edit" style="cursor: pointer;" src="' . asset("assets/images/Delete - 16.png") . '" ></a></div>';
                    return $btn;
                })
                ->rawColumns(['action'])

                ->make(true);
        }

        return view('admin.cmsPages.cms', compact('BreadCrumbPageHeader'));
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
        $cms_pages_id = $request->cms_pages_id;

        if ($cms_pages_id == null) {
            $message = config('custom.ADDED_SUCCESFULL');
        } else {
            $message = config('custom.UPDATED_SUCCESFULL');
        }

        $cms_page_data = [
            'page_name' => $request->page_name,
            'content_of_page' => $request->content_of_page,
        ];

        $HowItWorksResult   =   CmsPages::updateOrCreate(
            ['id' => $cms_pages_id],
            $cms_page_data
        );
        return redirect(Helpers::admin_url('cms_pages'))->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CmsPages  $cmsPages
     * @return \Illuminate\Http\Response
     */
    public function show(CmsPages $cmsPages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CmsPages  $cmsPages
     * @return \Illuminate\Http\Response
     */
    public function edit($cmsPages)
    {
        $BreadCrumbPageHeader = $this->_breadCrumPageHeader->cms_pages_edit_data();
        $data = CmsPages::where('id',$cmsPages)->first();
        return view('admin.cmsPages.cmsPage_edit_or_create', compact('BreadCrumbPageHeader','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CmsPages  $cmsPages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CmsPages $cmsPages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CmsPages  $cmsPages
     * @return \Illuminate\Http\Response
     */
    public function destroy(CmsPages $cmsPages)
    {
        //
    }
}
