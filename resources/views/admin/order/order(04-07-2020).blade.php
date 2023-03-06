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
                    </colgroup>
                    <thead>
                      <tr>
                                    <th>id</th>
                        {{-- 0 --}}<th class="head1">sender name</th>
                        {{-- 1 --}}<th class="head0">sender email</th>
                        {{-- 2 --}}<th class="head1">sender mobile</th>
                        {{-- 3 --}}<th class="head0">receiver city</th>
                        {{-- 4 --}}<th class="head1">order date</th>
                        {{-- 5 --}}<th class="head0">total distance</th>
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

          <label class="control-label">Parcel detail:<span style="color:red;">*</span></label>
          <div class="chatsearch">
           <input type="text" id="parcel_detail" name="parcel_detail" class="input-block-level" placeholder="Name" value="{{old('parcel_detail')}}" />
         </div>

         <label class="control-label ">Weight:<span style="color:red;">*</span></label>
          <div class="chatsearch">
           <input type="text" id="weight" name="weight" class="input-block-level" placeholder="Weight" value="{{old('weight')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
         </div>

         <label class="control-label">Weight type:<span style="color:red;">*</span></label>
             <div class="chatsearch">
              <select id="weight_type" class="input-block-level" name="weight_type">
                <option value="">- - - Select Status - - - </option>
                <option value="Kg">Kg</option>
                <option value="gm" >gm</option>
              </select>
            </div>

          <label class="control-label">Notes:</label>
          <div class="chatsearch">
           <input type="text" id="notes" name="notes" class="input-block-level" placeholder="notes" value="{{old('notes')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
         </div>

         <label class="control-label">Sender name:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="sender_name" name="sender_name" class="input-block-level" placeholder="Sender name" value="{{old('sender_name')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">Sender email:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="sender_email" name="sender_email" class="input-block-level" placeholder="Sender email" value="{{old('sender_email')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>
            
        <label class="control-label">Sender mobile:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="sender_mobile" name="sender_mobile" class="input-block-level" placeholder="Sender mobile" value="{{old('sender_mobile')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>    

        <label class="control-label">Sender address 1:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="sender_address_1" name="sender_address_1" class="input-block-level" placeholder="Sender address 1" value="{{old('sender_address_1')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">Sender address 2:</label>
         <div class="chatsearch">
          <input type="text" id="sender_address_2" name="sender_address_2" class="input-block-level" placeholder="Sender address 2" value="{{old('sender_address_2')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">Sender address 3:</label>
         <div class="chatsearch">
          <input type="text" id="sender_address_3" name="sender_address_3" class="input-block-level" placeholder="Sender address 3" value="{{old('sender_address_3')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">Sender city:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="sender_city" name="sender_city" class="input-block-level" placeholder="Sender city" value="{{old('sender_city')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">Sender pincode:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="sender_pincode" name="sender_pincode" class="input-block-level" placeholder="Sender pincode" value="{{old('sender_pincode')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">Sender longitute:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="sender_longitute" name="sender_longitute" class="input-block-level" placeholder="Sender longitute" value="{{old('sender_longitute')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">Sender latitude:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="sender_latitude" name="sender_latitude" class="input-block-level" placeholder="Sender latitude" value="{{old('sender_latitude')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        


        <label class="control-label">Receiver name:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="receiver_name" name="receiver_name" class="input-block-level" placeholder="Receiver name" value="{{old('receiver_name')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">Receiver email:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="receiver_email" name="receiver_email" class="input-block-level" placeholder="Receiver email" value="{{old('receiver_email')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>
            
        <label class="control-label">Receiver mobile:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="receiver_mobile" name="receiver_mobile" class="input-block-level" placeholder="Receiver mobile" value="{{old('receiver_mobile')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>    

        <label class="control-label">Receiver address 1:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="receiver_address_1" name="receiver_address_1" class="input-block-level" placeholder="Receiver address 1" value="{{old('receiver_address_1')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">Receiver address 2:</label>
         <div class="chatsearch">
          <input type="text" id="receiver_address_2" name="receiver_address_2" class="input-block-level" placeholder="Receiver address 2" value="{{old('receiver_address_2')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">Receiver address 3:</label>
         <div class="chatsearch">
          <input type="text" id="receiver_address_3" name="receiver_address_3" class="input-block-level" placeholder="Receiver address 3" value="{{old('receiver_address_3')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">Receiver city:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="receiver_city" name="receiver_city" class="input-block-level" placeholder="Receiver city" value="{{old('receiver_city')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">Receiver pincode:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="receiver_pincode" name="receiver_pincode" class="input-block-level" placeholder="Receiver pincode" value="{{old('receiver_pincode')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">Receiver longitute:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="receiver_longitute" name="receiver_longitute" class="input-block-level" placeholder="Receiver longitute" value="{{old('receiver_longitute')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">Receiver latitude:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="receiver_latitude" name="receiver_latitude" class="input-block-level" placeholder="Receiver latitude" value="{{old('receiver_latitude')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">total_distance:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="total_distance" name="total_distance" class="input-block-level" placeholder="Total distance" value="{{old('total_distance')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>


        <label class="control-label">Price:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="price" name="price" class="input-block-level" placeholder="Price" value="{{old('price')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">order_date:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="order_date" name="order_date" class="input-block-level" placeholder="Order date" value="{{old('order_date')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">order_status:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="order_status" name="order_status" class="input-block-level" placeholder="Order status" value="{{old('order_status')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">driver id:</label>
         <div class="chatsearch">
          <input type="text" id="driver_id" name="driver_id" class="input-block-level" placeholder="Driver id" value="{{old('driver_id')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
        </div>

        <label class="control-label">driver notes:</label>
         <div class="chatsearch">
          <input type="text" id="driver_notes" name="driver_notes" class="input-block-level" placeholder="Driver notes" value="{{old('driver_notes')}}{{-- {{isset($banner->id)?$banner->weight:old('weight')}} --}}" />
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
               { data: 'sender_name', name: 'sender_name', orderable: false,searchable: false},
               { data: 'sender_email', name: 'sender_email'},
               { data: 'sender_mobile', name: 'sender_mobile' },
               { data: 'receiver_city', name: 'receiver_city' },
               { data: 'order_date', name: 'order_date' },
               { data: 'total_distance', name: 'total_distance' },
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
                    if(res){
                      $('#order_id').val(res.id);
                      $('#user_id').val(res.user_id);
                      $('#parcel_detail').val(res.parcel_detail);
                      $('#weight').val(res.weight);
                      $('#weight_type').val(res.weight_type);
                      $('#notes').val(res.notes);
                      $('#sender_name').val(res.sender_name);
                      $('#sender_email').val(res.sender_email);
                      $('#sender_mobile').val(res.sender_mobile);
                      $('#sender_address_1').val(res.sender_address_1);
                      $('#sender_address_2').val(res.sender_address_2);
                      $('#sender_address_3').val(res.sender_address_3);
                      $('#sender_city').val(res.sender_city);
                      $('#sender_pincode').val(res.sender_pincode);
                      $('#sender_longitute').val(res.sender_longitute);
                      $('#sender_latitude').val(res.sender_latitude);
                      $('#receiver_name').val(res.receiver_name);
                      $('#receiver_email').val(res.receiver_email);
                      $('#receiver_mobile').val(res.receiver_mobile);
                      $('#receiver_address_1').val(res.receiver_address_1);
                      $('#receiver_address_2').val(res.receiver_address_2);
                      $('#receiver_address_3').val(res.receiver_address_3);
                      $('#receiver_city').val(res.receiver_city);
                      $('#receiver_pincode').val(res.receiver_pincode);
                      $('#receiver_longitute').val(res.receiver_longitute);
                      $('#receiver_latitude').val(res.receiver_latitude);
                      $('#total_distance').val(res.total_distance);
                      $('#price').val(res.price);
                      $('#order_date').val(res.order_date);
                      $('#order_status').val(res.order_status);
                      $('#driver_id').val(res.driver_id);
                      $('#driver_notes').val(res.driver_notes);
                      
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

           
        },
      });
//form validation ends here     
   });

   //form validation starts he

   
   
   </script>
@endsection