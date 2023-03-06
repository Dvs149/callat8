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
            <div id="delete-msg" class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                <strong>Deleted Successfully</strong>
            </div>

            <div style="overflow-x:auto;">
                  <table id="dyntable" class="table table-bordered  responsive data-table" style="width: 100%">
                    <colgroup>
                                 {{-- <col class="con0" width='0%'/> --}}
                      {{-- 0 --}}<col class="con1" width="10%" />
                      {{-- 1 --}}<col class="con0" width="15%" />
                      {{-- 2 --}}<col class="con1" width="30%" />
                      {{-- 3 --}}<col class="con0" width="15%" />
                      {{-- 4 --}}<col class="con1" width="15%" />
                      {{-- 5 --}}<col class="con0" width="20%" />
                      {{-- 6 --}}{{-- <col class="con1" width="9%" /> --}}
                      {{-- 5 --}}<col class="con0" width="10%" />

                    </colgroup>
                    <thead>
                      <tr>

                                    <th>id</th>
                                    <th>status</th>
                        {{-- 0 --}}<th class="head1">order number</th>
                        {{-- 2 --}}<th class="head1">sender name</th>
                        {{-- 2 --}}<th class="head1">sender Mobile</th>
                        {{-- 3 --}}<th class="head0">order type</th>
                        {{-- 1 --}}<th class="head0">Order date</th>
                        {{-- 4 --}}{{-- <th class="head1">delivery fee</th> --}}
                        {{-- 5 --}}{{-- <th class="head0">order status</th> --}}
                        {{-- 6 --}}<th width="head1">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
              </div>
        </div>
    {{-- </div><!--span8--> --}}
    
    
@endsection



@section('script')
<script type="text/javascript">

    jQuery(document).ready( function ($) {
    
    $('#delete_image').hide();
    $('#show_bnr_image').hide();
    $('#delete-msg').hide();
    //on reset change value of update to submit
    $('#add_data').on('click',function(e){
                e.preventDefault();
                reset();
    });

     $('.data-table').DataTable({
      "pageLength": 50,
        
     processing: false,
     serverSide: true,
     ajax: "{{url(Helpers::admin_url('order'))}}",
     //------------------------------------------------------
     "columnDefs": [{
            "targets": 1,   // choose the correct column
            /* "render": function ( data, type, full,meta ) {
                if(data=='Y') {
                    return '<span style="text-align:center"><img src="{{asset('assets/images/active-16.png')}}"/></span>';
                }
                return '<span style="text-align:center" ><img src="{{asset('assets/images/inactive-16.png')}}"/></span>';
              } */
      }

      ],
     //----------------------------------------
     columns: [
               { data: 'id', name: 'id' , visible:false},
            // {data:'promo_code', name:'promo_code'},
            {data:'order_status', name:'order_status'},
            // {data:'parcel_value', name:'parcel_value'},
            // {data:'promo_code_value', name:'promo_code_value'},
            {data:'order_number', name:'order_number'},
            {data:'sender_name', name:'sender_name'},
            {data:'sender_mobile', name:'sender_mobile'},
            {data:'order_type', name:'order_type'},
            {data:'created_at', name:'created_at'},
            // {data:'is_delivery_free', name:'is_delivery_free'},
            // {data:'delivery_fee', name:'delivery_fee'},
            // {data:'order_status', name:'order_status'},
            // {data:'order_status_reason', name:'order_status_reason'},
            // {data:'user_id', name:'user_id'},
            // {data:'order_type_id', name:'order_type_id'},
            // {data:'sending_item_id', name:'sending_item_id'},
            // {data:'promo_code_id', name:'promo_code_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
              ],
        "order": [[ 0, "dsc" ]]
    });
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
  $('body').on('click', '#delete-user', function (e) {
      e.stopPropagation();

      $(".message").hide();
      
        
        var order_id = $(this).data("id");
          //var permissio_for_deletion=confirm("Are You sure want to delete !");
        var permissio_for_deletion;
        jConfirm('Are You sure want to delete !', 'Delete Order',function(r) {
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
    });
     $('#form').validate({ // initialize the plugin
        errorElement: "span",
        rules: {
            weight_type:{
                required: true,
            },
            parcel_detail:{
                required: true,
                maxlength:50,
            },
            weight:{
                required: true,
                maxlength:50,
            },

           /* id
 promo_code_value
notify_me_by_sms
notify_recipients_by_sms
payment_type
is_delivery_free
delivery_fee
order_status
order_status_reason
user_id
order_type_id
sending_item_id
promo_code_id */

           
        },
      });
//form validation ends here     
   });

   //form validation starts he

   
   
   </script>
@endsection