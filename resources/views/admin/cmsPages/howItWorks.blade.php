@extends(Helpers::file_path("mainLayout"))
@section('dashboard-left')
 <h4 class="widgettitle">{{$BreadCrumbPageHeader['table_name']}}</h4>
        <div class="widgetcontent">


          @if (session('message'))
            <div class="alert alert-success message alert-block">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong> {{ session('message') }}</strong>
            </div>
            @endif

            <div id="delete-msg" class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                <strong id="msg-remark">Deleted Successfully</strong>
            </div>

            <div style="overflow-x:auto;">
                  <table id="dyntable" class="table table-bordered  responsive data-table" style="width: 100%">
                    <colgroup>
                                 {{-- <col class="con0" width='0%'/> --}}
                      {{-- <col class="con1" width="10%" /> --}}
                      {{-- 1 --}}<col class="con0" width="5%" />
                      {{-- 2 --}}<col class="con1" width="10%" />
                      {{-- 8 --}}<col class="con0" width="75%" />
                      {{-- 8 --}}<col class="con1" width="10%" />
                      {{-- 7 --}}{{-- <col class="con0" width="10%" /> --}}

                    </colgroup>
                    <thead>
                      <tr>
                                   <th>id</th>
                        {{-- 5 --}}<th class="head0">Status</th>
                                   <th class="head1">Title</th>
                        {{-- 2 --}}<th class="head0">Description</th>
                        {{-- 6 --}}<th width="head1">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                  
              </div>
        </div>
@endsection
@section('script')
<script type="text/javascript">

    jQuery(document).ready( function ($) {
    
    // $('#delete_image').hide();
    // $('#show_bnr_image').hide();
    $('#delete-msg').hide();
    //on reset change value of update to submit
   
      $('#add_data').click(function(){
        window.location.href='{{url(Helpers::admin_url("how_it_works/create"))}}';
      })


     $('.data-table').DataTable({
      "pageLength": 10,
        
     processing: false,
     serverSide: true,
     ajax: "{{url(Helpers::admin_url('how_it_works'))}}",
     //------------------------------------------------------
     "columnDefs": [
     /*  {
            "targets": 8,   // choose the correct column
            "render": function ( data, type, full,meta ) {
                  if(data){
                    return '<span class="remark-data">'+data+'</span>' ;
                  } else {
                    return '<span></span>' ;
                  } 
              },
      }, */
      {
            "targets": 1,   // choose the correct column
            "render": function ( data, type, full,meta ) {
                if(data=='Y') {
                    return '<span style="text-align:center"><img src="{{asset('assets/images/active-16.png')}}"/></span>';
                }
                return '<span style="text-align:center" ><img src="{{asset('assets/images/inactive-16.png')}}"/></span>';
              }
      },
      ],
     //----------------------------------------
     columns: [
               { data: 'id', name: 'id' , visible:false},
            {data:'status', name:'status'},
            {data:'sub_title', name:'sub_title'},
            {data:'description', name:'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
              ],
        "order": [[ 0, "dsc" ]]
    });
   });

   </script>
@endsection
