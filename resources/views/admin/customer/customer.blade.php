@extends(Helpers::file_path("mainLayout"))
@section('dashboard-left')
<div id="dashboard-left" class="span8">
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
      <a class="btn btn-primary" id="all_customer" href="javascript:void(0)">Export</a>
      <table id="dyntable" class="table table-bordered overflow-auto responsive data-table" style="width: 100%">
        <colgroup>
          {{-- 0 --}}<col class="con1" width="5%" />
          {{-- 1 --}}<col class="con0" width="10%" />
          {{-- 2 --}}<col class="con0" width="25%" />
          {{-- 3 --}}<col class="con1" width="13%" />
          {{-- 3 --}}<col class="con1" width="12%" />
          {{-- 4 --}}<col class="con0" width="12%" />
          {{-- 5 --}}<col class="con1" width="23%" />

        </colgroup>
        <thead>
          <tr>
            {{-- 0 --}}<th class="head0">id</th>
            {{-- 1 --}}<th class="head1">Status</th>
            {{-- 2 --}}<th class="head0">Name</th>
            {{-- 3 --}}<th class="head1">Email</th>
            {{-- 4 --}}<th class="head0">Mobile</th>
            {{-- 4 --}}<th class="head0">Date</th>
            {{-- 4 --}}{{-- <th class="head0">Remark</th> --}}
            {{-- 5 --}}<th width="head1">Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    </div>
</div><!--span8-->
@endsection

@section('dashboard-right')
<div id="dashboard-right" class="span4">
    <div class="widgetbox">                        
      <div class="headtitle">
          <h4 class="widgettitle form-title">Add {{$BreadCrumbPageHeader['breadcrumb']}}</h4>
      </div>
      <div class="widgetcontent" id="from">
          
          <form action="{{url(Helpers::admin_url('customer'))}}" method="post" id="form" enctype="multipart/form-data">
           <!-- // CSRF token for securing form field from hacker-->
           {{ csrf_field() }}
           
             <input type="hidden" name="customer_id" id="customer_id" value="{{old('customer_id')}}">

          <label class="control-label">Status:<span style="color:red;">*</span></label>
          
         <div class="chatsearch">
            <select id="status" class="input-block-level" name="status">
              <option value="">- - - Select Status - - - </option>
              <option value="Y" {{ old('status')=='Y' ? 'selected' : '' }}>Active</option>
                      <option value="N" {{  old('status')=='N' ? 'selected' : '' }}>Inactive</option>
            </select>
          </div>

         <label class="control-label">Created On:<span style="color:red;">*</span></label>
          <div class="chatsearch">
          {{-- <input type="text" id="created_on" name="created_on" class="input-block-level" placeholder="Name" value="{{old("created_on")}}" /> --}}
          <select id="created_on" class="input-block-level" name="created_on">
            <option value="web" {{ old('status')=='web' ? 'selected' : '' }}>Web</option>
                    <option value="app" {{  old('status')=='app' ? 'selected' : '' }}>App</option>
          </select>
           @if ($errors->has('created_on'))
           <span id="created_on-error" class="error">The fiels may not be greater than 25 characters.</span>
            @endif 
         </div>

         <label class="control-label">Name:</label>
          <div class="chatsearch">
          <input type="text" id="sender_name" name="sender_name" class="input-block-level" placeholder="Name" value="{{old("sender_name")}}" />
           @if ($errors->has('sender_name'))
           <span id="sender_name-error" class="error">The fiels may not be greater than 25 characters.</span>
            @endif 
         </div>

         <label class="control-label">Email Address:</label>
          <div class="chatsearch">
          <input type="text" id="sender_email" name="sender_email" class="input-block-level" placeholder="Email" value="{{old("sender_email")}}" />
           @if ($errors->has('sender_email'))
           <span id="sender_email-error" class="error">The fiels may not be greater than 25 characters.</span>
            @endif 
         </div>

          <label class="control-label">Mobile:<span style="color:red;">*</span></label>
          <div class="chatsearch">
          <input type="text" id="sender_mobile" pattern="[0-9]{10}" name="sender_mobile" class="input-block-level" placeholder="Mobile" value="{{old("sender_mobile")}}" />
           @if ($errors->has('sender_mobile'))
           <span id="sender_mobile-error" class="error"></span>
            @endif 
         </div>

         {{-- <label class="control-label">remark:<span style="color:red;">*</span></label>
          <div class="chatsearch">
          <input type="text" id="remark" name="remark" class="input-block-level" placeholder="Sender Mobile" value="{{old("remark")}}" />
           @if ($errors->has('remark'))
           <span id="remark-error" class="error"></span>
            @endif 
         </div> --}}

       <div class="chatsearch" style="margin-top: 10px;" >
        <span class="field">
          <input type="reset" id="reset" class="btn" value="Reset" >
          <input type="submit" id="submit"  name="submit" class="btn btn-primary" value="Submit">
          
        </span>
      </div>
    </form>
</div><!--widgetcontent-->
</div><!--row-fluid-->
</div><!--maincontentinner-->

<!-- Modal content-->
      <div class="widgetbox modal fade" id="myModal">
        <h4 class="widgettitle" id="model-title">
            Delete Order 
        </h4>
        <div class="widgetcontent"   style="margin-bottom: 0">
          <div id="remark-record" ></div>
         <label class="control-label">Remarks:<span style="color:red;">*</span></label>
         <form action="" id="remark_form" method="post">
           {{-- @csrf --}}
          <input type="hidden" id="customer_remark_id" name="customer_remark_id" value="">
          <input type="hidden" id="user_for" name="user_for" value="">
          {{-- <input type="hidden" id="remark" name="remark" value=""> --}}
          <textarea id='remark' name="remark" rows="5" class="span16"></textarea>
            <div id="popup_panel">
              <input type="submit" value="&nbsp;OK&nbsp;" style="color: #0866c6;border: 2px solid #0866c6;padding: 7px 0;background: #fff;"> 
              <input type="button" data-dismiss="modal" value="&nbsp;Cancel&nbsp;" style="color: #0866c6;border: 2px solid #0866c6;padding: 7px 0;background: #fff;" >
            </div>
          </form>
        </div>
      </div>
@endsection

@section('script')
<script type="text/javascript">
   jQuery(document).ready( function ($) {
    $('#delete-msg').hide();
     $("#all_customer").on("click", function() {
        table.button( '.buttons-csv' ).trigger();
      });
    table = $('#dyntable').DataTable({
      // "pageLength": 50,
        
    //  processing: false,
    //  serverSide: true,
     ajax: "{{url(Helpers::admin_url('customer'))}}",
     //------------------------------------------------------
     //----------------------------------------
     columns: [
        { data: 'id', name: 'id' , visible:false},
               { data: 'status', name: 'status'},
               { data: 'sender_name', name: 'sender_name' },
               { data: 'sender_email', name: 'sender_email' },
               { data: 'sender_mobile', name: 'sender_mobile' },
               { data: 'created_date', name: 'created_date' },
              //  { data: 'remark', name: 'remark' },
               {data: 'action', name: 'action', orderable: false, searchable: false},
      ],
      buttons: [
        { 
            extend: 'csvHtml5',
            exportOptions: {
              modifier: {
                page: 'all',
                search: 'none',
                },
              columns: [1,2,3,4,5],
              format: {/* to remove button tag in status */
                        body: function ( data, row, column, node ) {
                            // Strip $ from salary column to make it numeric
                             if (column == 0){
                                if($(data).attr("data-status") == 'active')
                                  return 'active';
                                else
                                  return 'inactive';
                             }
                             else{
                               return data;
                             }
                      }
                    }
            },
        }
      ],
            columnDefs: [{
                "targets": 1,   // choose the correct column
                "render": function ( data, type, full,meta ) {
                          if(data=='Y') {
                              return '<span data-status="active" style="text-align:center" ><img  src="{{asset('assets/images/active-16.png')}}" /></span>';
                          }
                          return '<span data-status="inactive"  style="text-align:center"><img src="{{asset('assets/images/inactive-16.png')}}" /></span>';
                      }
                },
                {
                      "targets": 5,   // choose the correct column
                      "render": function ( data, type, full,meta ) {
                            if(data){
                              var d = new Date(data); 
                              return d.toLocaleDateString() +', '+ d.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
                            } else{
                              return '';
                            } 
                        },
                },
            ],
      
        "order": [[ 0, "dsc" ]]

    });

    //on reset change value of update to submit
    jQuery('#reset').on('click',function(e){
                  e.preventDefault();
                  reset();
    });

    $('#add_data').on('click',function(e){
                e.preventDefault();
                reset();
    });
    function reset(){

        $(".message").hide();
        $('#delete-msg').hide();
        $('span.error').hide();
        jQuery('.highlight').removeClass('highlight');
        $( ".form-title" ).text( "Add {{$BreadCrumbPageHeader['breadcrumb']}}" );


        //it clear all the input field of form
        $('.input-block-level').val('');
        $('#submit').val("Submit");
        $('#submit').attr('name',"submit");
        $('#customer_id').val('');
    }

  $('body').on('click', '.remark', function (e) {
      e.stopPropagation();
        var customer_id = $(this).data("id");
        var remark_old_data = $(this).closest('tr').find('.remark-data').text();
        $("#customer_remark_id").val(customer_id);
        $('#model-title').html('Remark for Customer');
        $('#user_for').val('remark');
        $('#remark').val(remark_old_data);
        $('#myModal ').modal('show');
        
        var fd = new FormData();
        var task = $('#user_for').val();
        var task = $('#user_for').val();
        var token = $('input[name="csrfToken"]').attr('value');
        // var customer_id = $('#customer_id').val();
        fd.append(  'customer_id' , customer_id );
        $.ajax({
                    url: '{{url(Helpers::admin_url('customer'))}}/'+task+'/customerRemark/'+customer_id,
                    headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: fd,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    beforeSend: function(){
                          $('#remark-record').html('<img id="remark-data-loader" src="http://localhost/callat7/assets/images/loaders/loader6.gif" alt="" style="align:center;">');
                    },
                    success: function ( data ) {
                      var remark_data_all = '';
                      Object.keys(data).forEach(function(key) {
                              var d = new Date(data[key].created_at); 
                              var created_at = d.toLocaleDateString('en-GB') +', '+ d.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true }); 
                              // console.log(created_at+'('+data[key].user.name+')'+' '+ data[key].remark);
                              remark_data_all = remark_data_all+'<p style="margin:0;"><span style="color:#0866c6">'+created_at+'('+data[key].user.name+')</span><span style="margin-left:5px">'+ data[key].remark+'</span></p>';
                      });
                      $('#remark-record').html(remark_data_all);
                    },
                    complete: function(){
                    }
                });
        });

     $('#remark_form').on('submit', function(e) {
        e.preventDefault();
      $(".message").remove();
      $('span.error').hide();
      // task depends on remark or delete action button in order management.
      var task = $('#user_for').val();
      if($('#remark').val()==''){
        $("#remark_form").valid()
        return false;
      }
      var fd = new FormData();
      var token = $('input[name="csrfToken"]').attr('value');
      var customer_id = $('#customer_remark_id').val();
      fd.append(  'customer_id' , customer_id );
      fd.append(  'remark',$('#remark').val() );

      $.ajax({
                    url: '{{url(Helpers::admin_url('customer'))}}/'+task+'/'+customer_id,
                    headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: fd,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    beforeSend: function(){
                      /* <img src="images/loaders/loader6.gif" alt=""> */
                        $('#update-drivers').hide();
                        $('#update-drivers-loader').show();
                    },
                    success: function ( data ) {
                      // alert('d')
                      $('#update-drivers').show();
                        if(task == 'remark'){
                          $("#msg-remark").html('Remark submitted successfully');
                        } else {
                          $("#msg-remark").html('Deleted Successfully');
                        }
                        $('#delete-msg').show();
                        $('#update-drivers-loader').hide();
                        $('#remark').val('');
                        $('#myModal').modal('hide');
                        var d_Table = $('#dyntable').dataTable(); 
                                d_Table.api().ajax.reload();

                    },
                    complete: function(){
                        $('#update-drivers').show();
                        $('#delete-msg').show();
                        $('#update-drivers-loader').hide();
                    }
                });
      
      
    });

    $('#dyntable').on('click', 'tr', function () {
      $(".message").remove();
      $('span.error').hide();
      $( ".form-title" ).text( "Edit  {{$BreadCrumbPageHeader['breadcrumb']}}" );

      var id=($(this).closest('tr').attr('id')).slice(4);
      var customer_id =  id;
      // console.log(customer_id);
      //$("#form").append("<span class='update-method'><input type='hidden' name='_method' value='PUT'></span>");
      //var formAction="{{url(Helpers::admin_url('category/'))}}/"+ customer_id;
      //$("#form").attr("action", formAction);
      //it shows @ method('POST') which means in laravel it is used for updation using resource controller so we need to show it
      
            
              if(customer_id){
                $.ajax({
                 type:"GET",
                 url:'{{url(Helpers::admin_url('customer'))}}/' + customer_id +'/edit',
                 dataType: "json",
                 success:function(res){               
                    if(res){
                      $('#customer_id').val(res.id);
                      $('#status').val(res.status);
                      $('#created_on').val(res.created_on);
                      $('#sender_name').val(res.sender_name);
                      $('#sender_email').val(res.sender_email);
                      $('#sender_mobile').val(res.sender_mobile);
                      // $('#remark').val(res.remark);

                      //on reset change value of submit to update
                      $('#submit').val("Update");
                      $("#submit").attr('name','update');
                    };
                  }  
                });
              }

          // // //select current row for edit
           jQuery('.highlight').removeClass('highlight');
           jQuery(this).addClass('highlight');   
      });
    //dellete specific banner
    $('body').on('click', '#delete-user', function (e) {
            e.stopPropagation();
            $(".message").hide();
            
              
              var customer_id = $(this).data("id");
                //var permissio_for_deletion=confirm("Are You sure want to delete !");
              var permissio_for_deletion;
              jConfirm('Are You sure want to delete !', 'Delete Customer',function(r) {
                          if(r)
                          {
                            // alert('ss');
                            $.ajax({
                              type: "get",
                              url:'{{url(Helpers::admin_url("customer"))}}/delete/' + customer_id,
                              success: function (data) {
 
                                $( "#add_data" ).trigger( "click" );
                                $("#msg-remark").html('Deleted Successfully');
                                jQuery('#delete-msg').show();

                                var d_Table = $('#dyntable').dataTable(); 
                                d_Table.api().ajax.reload();
                                /* var oTable = $('#dyntable').dataTable(); 
                                oTable.fnDraw(false); */
                              },
                              error: function (data) {
                                // console.log('Error:', data);
                              }
                            });  
                          }
                          else{
                            // $('#delete-msg').hide();
                          }
                        });
          });

    $('#form').validate({ // initialize the plugin
        errorElement: "span",
        rules: {
          status:{
                required: true,
            },
            // created_on:{
            //     required: true,
            // },
            // sender_name:{
            //     required: true,
            // },
            sender_email:{
                // email:true,
            },
            sender_mobile:{
                required: true,
            },
            // sender_address_1:{
            //     required: true,
            // },
        },
      });
      $('#remark_form').validate({ // initialize the plugin
        errorElement: "span",
        rules: {
            remark:{
                required: true,
            },
        },
      });
      
   });

</script>
@endsection