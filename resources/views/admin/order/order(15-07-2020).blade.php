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
                <strong>Deleted Successfully</strong>
            </div>

            <div style="overflow-x:auto;">
                  <table id="dyntable" class="table table-bordered  responsive data-table" style="width: 100%">
                    <colgroup>
                                 <col class="con0" width='0%'/>
                      {{-- 0 --}}<col class="con1" width="10%" />
                      {{-- 1 --}}<col class="con0" width="15%" />
                      {{-- 2 --}}<col class="con1" width="15%" />
                      {{-- 3 --}}<col class="con0" width="25%" />
                      {{-- 4 --}}<col class="con1" width="16%" />
                      {{-- 5 --}}<col class="con0" width="10%" />
                      {{-- 6 --}}<col class="con1" width="9%" />
                      {{-- 5 --}}<col class="con0" width="10%" />

                    </colgroup>
                    <thead>
                      <tr>

                                    <th>id</th>
                                    <th>sending item name</th>
                        {{-- 0 --}}<th class="head1">notify me by sms</th>
                        {{-- 1 --}}<th class="head0">notify recipients by sms</th>
                        {{-- 2 --}}<th class="head1">payment type</th>
                        {{-- 3 --}}<th class="head0">is delivery free</th>
                        {{-- 4 --}}<th class="head1">delivery fee</th>
                        {{-- 5 --}}<th class="head0">order status</th>
                        {{-- 6 --}}<th width="head1">Action</th>
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
          
      <form action="{{url(Helpers::admin_url('order'))}}" method="post" id="form" enctype="multipart/form-data">
           <!-- // CSRF token for securing form field from hacker-->
           {{ csrf_field() }}
           
             <input type="hidden" name="order_id" id="order_id" value="{{old('order_id')}}">
             
          <label class="control-label">Promo code:<span style="color:red;">*</span></label>
          <div class="chatsearch">
           <input type="text" id="promo_code" name="promo_code" class="input-block-level" placeholder="Name" value="{{old('promo_code')}}" />
         </div>

         <label class="control-label ">Sending item name:<span style="color:red;">*</span></label>
          <div class="chatsearch">
           <input type="text" id="sending_item_name" name="sending_item_name" class="input-block-level" placeholder="Sending item name" value="{{old('sending_item_name')}}" />
         </div>

         <label class="control-label">Parcel value:<span style="color:red;">*</span></label>
             <div class="chatsearch">
              <select id="parcel_value" class="input-block-level" name="parcel_value">
                <option value="">- - - Select Status - - - </option>
                <option value="Kg">Kg</option>
                <option value="gm" >gm</option>
              </select>
            </div>

          <label class="control-label">Promo code value:</label>
          <div class="chatsearch">
           <input type="text" id="promo_code_value" name="promo_code_value" class="input-block-level" placeholder="Promo code value" value="{{old('promo_code_value')}}" />
         </div>

         <label class="control-label">Notify me by sms:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="notify_me_by_sms" name="notify_me_by_sms" class="input-block-level" placeholder="Notify me by sms" value="{{old('notify_me_by_sms')}}" />
        </div>

        <label class="control-label">Notify recipients by sms:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="notify_recipients_by_sms" name="notify_recipients_by_sms" class="input-block-level" placeholder="Notify recipients by sms" value="{{old('notify_recipients_by_sms')}}" />
        </div>
            
        <label class="control-label">Payment type:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="payment_type" name="payment_type" class="input-block-level" placeholder="Payment type" value="{{old('payment_type')}}" />
        </div>    

        <label class="control-label">Is delivery free:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="is_delivery_free" name="is_delivery_free" class="input-block-level" placeholder="is delivery free" value="{{old('is_delivery_free')}}" />
        </div>

        <label class="control-label">Delivery fee:</label>
         <div class="chatsearch">
          <input type="text" id="delivery_fee" name="delivery_fee" class="input-block-level" placeholder="delivery fee" value="{{old('delivery_fee')}}" />
        </div>

        <label class="control-label">Order status:</label>
         <div class="chatsearch">
          <input type="text" id="order_status" name="order_status" class="input-block-level" placeholder="Order status" value="{{old('order_status')}}" />
        </div>

        <label class="control-label">Order status reason:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="order_status_reason" name="order_status_reason" class="input-block-level" placeholder="Order status reason" value="{{old('order_status_reason')}}" />
        </div>

        <label class="control-label">User_id:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text"  id="user_id" name="user_id" class="input-block-level" placeholder="user_id" value="{{old('user_id')}}" />
        </div>
            
        <label class="control-label">Order_type_id:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="order_type_id" name="order_type_id" class="input-block-level" placeholder="order_type_id" value="{{old('order_type_id')}}" />
        </div>    

        <label class="control-label">Sending_item_id:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="sending_item_id" name="sending_item_id" class="input-block-level" placeholder="sending_item_id" value="{{old('sending_item_id')}}" />
        </div>

        <label class="control-label">Promo_code_id:</label>
         <div class="chatsearch">
          <input type="text" id="promo_code_id" name="promo_code_id" class="input-block-level" placeholder="promo_code_id" value="{{old('promo_code_id')}}" />
        </div>

       <div class="chatsearch" style="margin-top: 10px;" >
        <span class="field">
          <input type="reset" id="reset" class="btn" value="Reset" >
          <input type="submit" id="submit"  name="submit" class="btn btn-primary" value="Submit">
          
        </span>
      </div>
    </form>
</div><!--widgetcontent-->
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
            {data:'sending_item_name', name:'sending_item_name'},
            // {data:'parcel_value', name:'parcel_value'},
            // {data:'promo_code_value', name:'promo_code_value'},
            {data:'notify_me_by_sms', name:'notify_me_by_sms'},
            {data:'notify_recipients_by_sms', name:'notify_recipients_by_sms'},
            {data:'payment_type', name:'payment_type'},
            {data:'is_delivery_free', name:'is_delivery_free'},
            {data:'delivery_fee', name:'delivery_fee'},
            {data:'order_status', name:'order_status'},
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
    });
    
//when user click particular row it will fetch data from server and give to the front end inside form, for editing
$('#dyntable').on('click', 'tr', function () {
      $(".message").remove();
      $('span.error').hide();
      $( ".form-title" ).text( "Edit {{$BreadCrumbPageHeader['breadcrumb']}}" );

      var id=($(this).closest('tr').attr('id')).slice(4);
      var order_id =  id;
      //console.log(id);
      //$("#form").append("<span class='update-method'><input type='hidden' name='_method' value='PUT'></span>");
      //var formAction="{{url(Helpers::admin_url('category/'))}}/"+ order_id;
      //$("#form").attr("action", formAction);
      //it shows @ method('POST') which means in laravel it is used for updation using resource controller so we need to show it
      
            
              if(order_id){
                $.ajax({
                 type:"GET",
                 url:'{{url(Helpers::admin_url('order'))}}/' + order_id +'/edit',
                 dataType: "json",
                 success:function(res){      
                   console.log(res);
                    if(res){
                      $('#order_id').val(res.id);
                      $('#promo_code_value').val(res.promo_code_value);
                      $('#notify_me_by_sms').val(res.notify_me_by_sms);
                      $('#notify_recipients_by_sms').val(res.notify_recipients_by_sms);
                      $('#payment_type').val(res.payment_type);
                      $('#is_delivery_free').val(res.is_delivery_free);
                      $('#delivery_fee').val(res.delivery_fee);
                      $('#order_status').val(res.order_status);
                      $('#order_status_reason').val(res.order_status_reason);
                      $('#user_id').val(res.user_id);
                      $('#order_type_id').val(res.order_type_id);
                      $('#sending_item_id').val(res.sending_item_id);
                      $('#promo_code_id').val(res.promo_code_id);
                      
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