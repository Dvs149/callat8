<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  @include(Helpers::file_path("head"))

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>

<body>

<div id="mainwrapper" class="mainwrapper">
    
  @include(Helpers::file_path("topbar"))
  <!-- leftpanel -->
  @include(Helpers::file_path("sidebar"))
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>{{$BreadCrumbPageHeader['breadcrumb']}}</li>
        </ul>
        
        <div class="pageheader">
            {{-- <form action="results.html" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form> --}}
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">
                <h5>{{$BreadCrumbPageHeader['pageHeaderTagLine']}}</h5>
                <h1>{{$BreadCrumbPageHeader['breadcrumb']}}</h1>
            </div>

            <div class="searchbar">
            @if (isset($BreadCrumbPageHeader['add_btn']) && $BreadCrumbPageHeader['add_btn']!="")

                <div class="pagetitle" style="float: left;">
                    <button id="add_data" class="btn btn-primary">{{$BreadCrumbPageHeader['add_btn']}}</button>
                </div>
            {{-- </div> --}}
            @endif

            @if (isset($BreadCrumbPageHeader['back_btn'])  && $BreadCrumbPageHeader['back_button_link']!="")

            {{-- <div class="searchbar"> --}}
                <div class="pagetitle" style="float: right;margin-left: 20px;">
                    <a id="prev_page" href="{{$BreadCrumbPageHeader['back_button_link']}}" class="btn btn-primary">{{$BreadCrumbPageHeader['back_btn']}}</a>
                </div>
                @endif
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="row-fluid">
                    
                    @yield('dashboard-left')
                    @yield('dashboard-right')
                    

                    @include(Helpers::file_path("footer"))
                
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->
@include(Helpers::file_path("script"))
@yield('script')
</body>
</html>
