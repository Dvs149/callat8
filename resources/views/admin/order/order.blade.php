@extends(Helpers::file_path("mainLayout"))
@section('dashboard-left')
    {{-- <div id="dashboard-left" class="span8"> --}}
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

            <div id="driver-msg" class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Driver assign successfully</strong>
            </div>
            
            <div id="delete-msg" class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                <strong id="msg-remark">Deleted Successfully</strong>
            </div>

            <div style="overflow-x:auto;">
                                <input type="text" id="from_date" name="from_date" value="" placeholder="From Date" autocomplete="off" class="">
                                <input type="text" id="to_date" name="to_date" autocomplete="off"   value="" placeholder="To Date" class="">
                                <input type="text" id="keyword" name="keyword" class="" autocomplete="off"  value="" placeholder="Keyword" class="">
                                <select name="status" id="status">
                                  <option value="" >Select Status</option>
                                  <option value="Pending" >Pending</option>
                                  <option value="Confirm" >Confirm</option>
                                  <option value="Out for delivery" >Out for delivery</option>
                                  <option value="Delivered" >Delivered</option>
                                  <option value="Completed" >Completed</option>
                                  <option value="Canceled" >Cancelled</option>
                                  <option value="Return" >Deleted</option>
                                </select>
                                <input type="text" id="mobile" name="Phone number" class="" autocomplete="off"  value="" placeholder="Phone number" class="">
                                  <div class="mx-auto">
                                  <input type="button" id="filter" name="reset_filter" class="btn btn-primary"  id="reset_filter"  value="Submit" class="">
                                  <input type="button" id="clear" name="clear" class="btn btn-primary"  value="Clear Search" class="">
                                  <input type="button" id="reset_filter" name="reset_filter" class="btn btn-primary"  value="Reset" class="">
                                  <a class="btn btn-primary" id="all_order" href="javascript:void(0)">Export</a>
                                </div>
                          
                        </table>
                  <table id="dyntable" class="table table-bordered  responsive data-table" style="width: 100%">
                    <colgroup>
                                 {{-- <col class="con0" width='0%'/> --}}
                      {{-- 0 --}}<col class="con1" width="10%" />
                      {{-- 1 --}}<col class="con0" width="10%" />
                      {{-- 2 --}}<col class="con1" width="15%" />
                      {{-- 3 --}}<col class="con0" width="10%" />
                      {{-- 4 --}}<col class="con1" width="10%" />
                      {{-- 5 --}}<col class="con0" width="10%" />
                      {{-- 6 --}}<col class="con1" width="10%" />
                      {{-- 7 --}}<col class="con0" width="10%" />
                      {{-- 8 --}}<col class="con1" width="10%" />
                      {{-- 7 --}}{{-- <col class="con0" width="10%" /> --}}

                    </colgroup>
                    <thead>
                      <tr>
                                   <th>id</th>
                        {{-- 0 --}}<th>status</th>
                                   <th class="head1">order number</th>
                        {{-- 2 --}}<th class="head1">name</th>
                        {{-- 2 --}}<th class="head1">Mobile</th>
                        {{-- 3 --}}<th class="head0">Order type</th>
                        {{-- 1 --}}<th class="head0">Order date</th>
                        {{-- 4 --}}<th class="head1">Delivery fees</th>
                        {{-- 4 --}}{{-- <th class="head1">Remark</th> --}}
                        {{-- 5 --}}<th class="head0">Driver</th>
                        {{-- 6 --}}<th width="head0">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>

                  <p class="stdformbutton ">
                    
                    <button id="update-drivers" class="btn btn-primary update_btn">Update</button>
                    <img id="update-drivers-loader" src="{{ asset('assets/images/loaders/loader6.gif') }}" alt="">
                  </p>
              </div>
        </div>
    {{-- </div><!--span8--> --}}
    
    
    
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
          <input type="hidden" id="double_google_order_id" name="double_google_order_id" value="">
          <input type="hidden" id="user_for" name="user_for" value="">
          {{-- <input type="hidden" id="remark" name="remark" value=""> --}}
          <textarea id='remark' name="remark" rows="5" class="span16"></textarea>
            <div id="popup_panel">
              <input type="submit" value="&nbsp;OK&nbsp;" id="popup_ok"> 
              <input type="button" data-dismiss="modal" value="&nbsp;Cancel&nbsp;" id="popup_cancel">
            </div>
          </form>
        </div>
      </div>
      {{-- Filter modal ends here --}}
  <div class="modal fade" id="Filter_Modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alert</h4>
        </div>
        <div class="modal-body">
          <p>Select at least one option from the above field</p>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="delete-id" value="">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>
@endsection



@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript">

    jQuery(document).ready( function ($) {
    fill_datatable();
    $('#delete-msg').hide();
    $('#update-drivers-loader').hide();
    $('#driver-msg').hide();
    //on reset change value of update to submit
    $('#add_data').on('click',function(e){
                e.preventDefault();
                window.location.href='order/create';
    });
     jQuery('#from_date').datepicker({
            changeMonth:true,
            changeYear:true,
            dateFormat:'yy-mm-dd',
            onSelect: function (dateText, inst) {
                jQuery( "#to_date" ).datepicker( "option", "minDate", dateText );
            }     
        });
        jQuery('#to_date').datepicker({
            changeMonth:true,
            changeYear:true,
            dateFormat:'yy-mm-dd',
            
            /*onSelect: function (dateText, inst) {
                jQuery( "#from_date" ).datepicker( "option", "maxDate", dateText );
            } */    
        });
        $("#all_order").on("click", function() {
            table.button( '.buttons-csv' ).trigger();
        });
function fill_datatable(keyword='',from_date = '', to_date = '',  status='', mobile='')
    {
     table = $('.data-table').DataTable({
    /*  pageLength: 10,
        
     processing: false,
     serverSide: true, */
    //  ajax: "{{url(Helpers::admin_url('order'))}}",
     ajax:{
        url: "{{ url()->current() }}",
                  // data:{filter_keyword:filter_keyword, filter_category:filter_category, :filter_brand}
                  data:{
                      from_date:from_date,
                      to_date:to_date,
                      keyword:keyword,
                      status:status,
                      mobile:mobile,
                    },
                },
     //------------------------------------------------------
     "columnDefs": [
      {
            "targets": 8,   // choose the correct column
            "render": function ( data, type, full,meta ) {
              // console.log(full);
              var driver_id="";
              if(full.driver_id){
                driver_id = 'data-driver_id="'+full.driver_id+'"';
              } else {
                driver_id = 'data-driver_id="0"';
              }
              driver_option='';
              @foreach ($drivers as $driver_id => $driver_name)
                  if(full.driver_id=='{{$driver_id}}'){
                    selected='selected';
                  }
                  else{
                    selected='';
                  }
                  driver_option=driver_option+'<option value="{{$driver_id}}" '+selected+' >{{$driver_name}}</option>';
              @endforeach
                  
              return '<select style="width: 150px;"id="'+full.id+'" '+driver_id+' name="select" class="uniformselect driver_id_val"><option value="">Select Driver</option>'+driver_option+'</select>';
              }
      },
      {
            "targets": 6,   // choose the correct column
            "render": function ( data, type, full,meta ) {
                  if(data){
                    // console.log(data);
                    var d = new Date(data); 
                    // console.log( d.toLocaleDateString() +',\n'+ d.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true }));
                    return d.toLocaleDateString('en-GB') +', '+ d.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
                  } 
              },
      },
      ],
      
     //----------------------------------------
     columns: [
            { data: 'id', name: 'id', visible:false},
            {data:'order_status', name:'order_status'},
            {data:'order_number', name:'order_number'},
            {data:'sender_name', name:'sender_name'},
            {data:'sender_mobile', name:'sender_mobile'},
            {data:'order_type', name:'order_type'},
            {data:'created_at', name:'created_at'},
            {data:'delivery_fee', name:'delivery_fee'},
            {data:'driver_id', name:'driver_id',  orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
              ],
        "order": [[ 0, "dsc" ]],
        buttons: [
        { 
            extend: 'csvHtml5',
            exportOptions: {
              modifier: {
                page: 'all',
                search: 'none',
                },
              columns: [1,2,3,4,5,6,7,8],
              format: {/* to remove button tag in status */
                        body: function ( data, row, column, node ) {
                            // Strip $ from salary column to make it numeric
                             if (column == 7){
                                if($(data).find("option:selected").text()!='Select Driver')
                                  return $(data).find("option:selected").text();
                                else
                                  return '';
                             }
                             else{
                               return data;
                             }
                      }
                    }
            },
        }
      ],
    });
  }
    //on reset change value of update to submit
    jQuery('#reset').on('click',function(e){
                  e.preventDefault();
                  reset();
    });
     //to load the image after selection
     function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#show_bnr_image').show();
          $('#delete_image').show();
          // $('#bnr_image').hide();

          $('#show_bnr_image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
      $("#bnr_image").change(function() {
      readURL(this);
    });

    //remove image form input file element
    $('#delete_image').on('click', function(e) { 
    //e.preventDefault();
    delete_image();
  });
   
      
       function  delete_image(){
        $('#delete_image').hide();
        $('#bnr_image').val('');
        $('#show_bnr_image').hide();
        $('#bnr_image').show();
        $('#delete_img').attr('value','');
      }

     function reset(){

          $(".message").hide();
          $('#delete-msg').hide();
          $('span.error').hide();
          $( ".form-title" ).text( "Add Order" );
          jQuery('.highlight').removeClass('highlight');


          //it clear all the input field of form
          $('.input-block-level').val('');
          $('#bnr_link').val('');
          $('#bnr_short_description').val('');
          $('#submit').val("Submit");
          $('#submit').attr('name',"submit");
          $('#order_id').val('');
          delete_image();
    }

     //dellete specific order
   /* $('body').on('click', '#delete-user', function (e) {
      e.stopPropagation();

      $(".message").hide();
      
        
        var order_id = $(this).data("id");
          //var permissio_for_deletion=confirm("Are You sure want to delete !");
        var permissio_for_deletion;
        jConfirm('Are You sure want to delete !', 'Delete order',function(r) {
                    if(r)
                    {
                      $.ajax({
                        type: "get",
                        url:'{{url(Helpers::admin_url("order"))}}/delete/' + order_id,
                        success: function (data) {
                          console.log(data);
                          $( "#add_data" ).trigger( "click" );
                          jQuery('#delete-msg').show();
                          console.log('deleted shown');
                          var oTable = $('#dyntable').dataTable(); 
                          oTable.fnDraw(false);
                        },
                        error: function (data) {
                          console.log('Error:', data);
                        }
                      });  
                    }
                    else{
                      // $('#delete-msg').hide();
                    }
                  });
    });  */

    $('#dyntable').on('click', 'tr', function () {
      $(".message").remove();
      $('span.error').hide();

          // $("#160").children("option:selected").val();

          //select current row for edit
           jQuery('.highlight').removeClass('highlight');
           jQuery(this).addClass('highlight');   
      });

    
    $('body').on('change', '.driver_id_val',function () {
      // console.log( this.value );
      // alert( $(this).data('driver_id') );
      if(this.value != $(this).data('driver_id')){
        $(this).addClass('driver_change');
      } else if(this.value == $(this).data('driver_id')){
        // $(this).removeClass('driver_change');
      } else {
        $(this).removeClass('driver_change'); 
      }
    });

    $('body').on('click', '.update_btn',function () {
          $(".message").remove();
          $('span.error').hide();
          var fd = new FormData();
          var token = $('input[name="csrfToken"]').attr('value');
          // fd.append("_token", getCSRFTokenValue());
          var driver_id = [];
          var driver_val = [];
          $(".driver_change > option:selected").each(function(){
              fd.append( 'driver_id['+$(this).parents('select').attr('id')+']', this.value );
          });

                $.ajax({
                    url: '{{url(Helpers::admin_url('driver'))}}/assignment',
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
                        $('#driver-msg').show();
                        $('#update-drivers-loader').hide();
                        $(".driver_change").each(function(){
                                $(this).removeClass('driver_change'); 
                        });
                    },
                    complete: function(){
                        $('#update-drivers').show();
                        $('#driver-msg').show();
                        $('#update-drivers-loader').hide();
                    }
                });


      });
    


     /* $('body').on('click', '.delete', function (e) {
      e.stopPropagation();
        var order_id = $(this).data("id");
        $("#double_google_order_id").val(order_id);
        console.log(order_id);
        $('#myModal').modal('show');
    });  */

    $('body').on('click', '.remark', function (e) {
      e.stopPropagation();
        var order_id = $(this).data("id");
        var remark_old_data = $(this).closest('tr').find('.remark-data').text();
        $("#double_google_order_id").val(order_id);
        $('#model-title').html('Remark Order');
        $('#user_for').val('remark');
        $('#remark').val(remark_old_data);
        $('#myModal ').modal('show');
        
        var fd = new FormData();
        var task = $('#user_for').val();
        var task = $('#user_for').val();
        var token = $('input[name="csrfToken"]').attr('value');
        // var order_id = $('#double_google_order_id').val();
        fd.append(  'double_google_order_id' , order_id );
        $.ajax({
                    url: '{{url(Helpers::admin_url('order'))}}/'+task+'/orderRemarkData/'+order_id,
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
                              var created_at = d.toLocaleDateString() +', '+ d.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true }); 
                              // console.log(created_at+'('+data[key].user.name+')'+' '+ data[key].remark);
                              remark_data_all = remark_data_all+'<p style="margin:0;"><span style="color:#0866c6">'+created_at+'('+data[key].user.name+')</span><span style="margin-left:5px">'+ data[key].remark+'</span></p>';
                      });
                      $('#remark-record').html(remark_data_all);
                    },
                    complete: function(){
                    }
                });

    });

    $('body').on('click', '.delete', function (e) {
      e.stopPropagation();
        var order_id = $(this).data("id");
        $("#double_google_order_id").val(order_id);
        $('#model-title').html('Delete Order');
        $('#user_for').val('delete');
        $('#remark').val('');
        $('#myModal').modal('show');
    });

    // $('body').on('click', '#popup_ok',function () {
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
      var order_id = $('#double_google_order_id').val();
      fd.append(  'double_google_order_id' , order_id );
      fd.append(  'remark',$('#remark').val() );

      $.ajax({
                    url: '{{url(Helpers::admin_url('order'))}}/'+task+'/'+order_id,
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


     $('#remark_form').validate({ // initialize the plugin
        errorElement: "span",
        rules: {
            remark:{
                required: true,
            },
        },
      });

      $('#clear').click(function(){
        $('#from_date').val('');
        $('#to_date').val('');
        $('#keyword').val('');
        $('#status').val('');
        $('#mobile').val('');
        $('#dyntable').DataTable().destroy();
        fill_datatable();
      });
      
      $('#reset_filter').click(function(){
        $('#from_date').val('');
        $('#to_date').val('');
        $('#keyword').val('');
        $('#status').val('');
        $('#mobile').val('');
      });

       // on click on the search filter input
    $('#filter').click(function(){
        
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        var keyword = $('#keyword').val();
        var status = $('#status').val();
        var mobile = $('#mobile').val();

      
        //console.log(from_date);

        if(from_date != '' ||  to_date != '' || mobile != '' || keyword != '' || status != '')
        {
            $('.data-table').DataTable().destroy();
            fill_datatable( keyword, from_date, to_date, status, mobile);
        }
        else
        {
            // jAlert('Select at least on Filter option');
            jQuery("#Filter_Modal").modal('show');

        }
    });

//form validation ends here     
   });

   //form validation starts he

   
   
   </script>
@endsection