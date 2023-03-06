@extends(Helpers::file_path("mainLayout"))
@section('dashboard-left')

<div id="dashboard-right" class="span12">
    <form  action="{{url(Helpers::admin_url('order/create/adding'))}}"  method="post" id="form" enctype="multipart/form-data">
        {{ csrf_field() }}
            <input type="hidden" name="order_type" id="order_type" value="{{$order_type}}">
    <div class="widgetbox">                        
      <div class="headtitle">
          <h4 class="widgettitle form-title">{{Str::ucfirst($order_type)=='Anything else' ? 'Pick-up Store' : Str::ucfirst($order_type) }} Details</h4>
        </div>
        <div class="widgetcontent" id="from" >
          <div class="row-fluid">
            @if(ucfirst($order_type)!='Anything else')
              <div class="span4">
                  <label class="control-label ">{{Str::ucfirst($order_type)}} list:<span style="color:red;">*</span></label>
                  <div class="chatsearch">
                   <select id="store_id" class="input-block-level chzn-select" name="store_id">
                     {{-- <option value="">- - - Select {{Str::ucfirst($order_type)}} - - - </option> --}}
                     <option value="0">Other</option>
                     @foreach($store_details as $key => $value)
                         <option value="{{$value['id']}}" {{ old('store_id')==$value['id'] ? 'selected' : '' }}>{{$value['name']}} -  {{$value['adddress']}}</option>
                     @endforeach
                   </select>
                 </div>
            </div>
            <div class="span4" id="sender_name_div" >
            @else
            <input type="hidden" name="store_id" value="0">
            {{-- <input type="hidden" name="sender_name" value=""> --}}
            <div class="span4" id="sender_name_div" style="margin-left: 0px;">
            @endif
            <!-- // CSRF token for securing form field from hacker-->
              <label class="control-label">Name:<span style="color:red;">*</span></label>
              <div class="chatsearch">
                <input type="text" id="sender_name" name="sender_name" class="input-block-level  float" placeholder="Name" value="{{old('sender_name')}}" />
              </div>
            </div>
           <div class="span4" id="pickup_address_div">
              <div class="store_details">
                <label class="control-label">Address:<span style="color:red;">*</span></label>
                <div class="chatsearch">
                <textarea type="text" id="pickup_address" name="pickup_address" class="input-block-level  float" placeholder="Address" value="{{old('pickup_address')}}" ></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

     <div class="widgetbox">                        
      <div class="headtitle">
          <h4 class="widgettitle form-title">Receiver Details</h4>
        </div>
        <div class="widgetcontent" id="from">
          <div class="row-fluid">
            <div class="span4">
              <label class="control-label ">Customer List:<span style="color:red;">*</span></label>
              <div class="chatsearch">
                 <select id="user_id" class="input-block-level chzn-select" name="user_id">
                   {{-- <option value="">- - - Select Customer - - - </option> --}}
                   <option value=''>Add new Customer</option>
                   @foreach($user_data as $key => $value)
                       <option value="{{$value['id']}}" {{ old('user_id')==$value['id'] ? 'selected' : '' }}>{{$value['sender_mobile']}} - {{$value['sender_name']}}</option>
                   @endforeach
                 </select>
               </div>
            </div>
            <div class="span4">
              <label class="control-label ">Name:<span style="color:red;">*</span></label>
              <div class="chatsearch">
               <input type="text" id="delivery_receiver_name" name="delivery[0][delivery_receiver_name]" class="input-block-level  float" placeholder="Name" value="{{old('delivery[0][delivery_receiver_name]')}}" />
               </div>
            </div>
            <div class="span4">
              <label class="control-label">Mobile:<span style="color:red;">*</span></label>
              <div class="chatsearch">
                <input type="text" id="delivery_phone" pattern="[1-9]{1}[0-9]{9}" maxlength="10" name="delivery[0][delivery_phone]" class="input-block-level  float" placeholder="Mobile" value="{{old('delivery[0][delivery_phone]')}}" />
              </div>
            </div>
            
          </div>
          
          <div class="row-fluid">
            <div class="span4">
              <label class="control-label">Address:<span style="color:red;">*</span></label>
              <div class="chatsearch">
                  <select id="address_list_id" class="input-block-level chzn-select" name="address_list_id">
                    {{-- <option value="">- - - Select Address - - - </option> --}}
                    <option value="0">Add new address</option>
                  </select>
                  <textarea type="text" id="delivery_address" name="delivery[0][delivery_address]" class="input-block-level  float" placeholder="Address" value="{{old('delivery[0][delivery_address]')}}" ></textarea>
              </div>
            </div>
            <div class="span4">
              <label class="control-label">Comments:</label>
              <div class="chatsearch">
                <textarea type="text" id="delivery_comment" name="delivery[0][delivery_comment]" class="input-block-level  float" placeholder="Comments" value="{{old('delivery[0][delivery_comment]')}}"></textarea>
              </div>
            </div>  
          </div>
          <!-- // CSRF token for securing form field from hacker-->
           






        </div>
    </div>


    <div class="widgetbox">                        
      <div class="headtitle">
          <h4 class="widgettitle form-title">Item details</h4>
      </div>
      <div class="widgetcontent" id="from">
            <input type="hidden" id="sending_item_name" name="sending_item_name" value="" />
            <label>Category</label>
              <div class="chatsearch">	
                <input type="checkbox" class="sending_items span1" name="sending_items" value="Food" {{Str::ucfirst($order_type)=='Restaurant' ? "checked" : ""}}/> <span class="" style="padding-right:25px;">Food</span>
                <input type="checkbox" class="sending_items" name="sending_items" value="Groceries" {{Str::ucfirst($order_type)=='Store' ? "checked" : ""}}/> <span class="" style="padding-right:25px;">Groceries</span>
                <input type="checkbox" class="sending_items" name="sending_items" value="Vegetable" {{Str::ucfirst($order_type)=='Vegetable' ? "checked" : ""}}/> <span class="" style="padding-right:25px;">Vegetable</span>
                <input type="checkbox" class="sending_items" name="sending_items" value="Other" {{Str::ucfirst($order_type)=='Anything else' ? "checked" : ""}}/> <span class="" style="padding-right:25px;">Other</span>
              </div>
              <span for="sending_items" generated="true" class="error" style="display: none;">This field is required.</span><br>
            <br>
            <div id="item-details">
              <label class="control-label">Item name:<span style="color:red;">*</span></label>
              <div class="items-div">
                  <div class="chatsearch">
                    <div class="row-fluid">
                      <div class="span2">
                        <input type="text" id="item[0][item_name]" name="item[0][item_name]" class="input-block-level item_name span12" placeholder="Name" value="" />
                      <br>
                        {{-- <span for="item[0][item_name]" generated="true" class="error hidden">This field is required.</span> --}}
                      </div>
                      <div class="span1">
                        <input type="number" id="item[0][item_quantity]" name="item[0][item_quantity]" class="input-small item_quantity input-spinner span12" placeholder="Qty" value="" max="100" min="1" />
                      <br>
                      {{-- <span for="item[0][item_name]" generated="true" class="error hidden">This field is required.</span> --}}
                      </div>
                      <div class="span1">
                        <div class="setBtns">
                          <a href="javascript:void(0);" class="btn btn-primary btn-circle addItemBtn"><i class="iconfa-plus"></i></a>
                          <a href="javascript:void(0);" class="btn btn-danger btn-circle remove-item" style="display: none;"><i class="iconfa-minus"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {{-- <button id="add-item" class="btn btn-primary" style="margin-top: -5px;padding: 5px 38px;"> Add </button> --}}
      </div>
    </div>
    
    {{-- <div class="widgetbox">                        
      <div class="headtitle">
          <h4 class="widgettitle form-title">Item Details</h4>
      </div>
      <div class="widgetcontent" id="item-details">
        <label class="control-label">Item name:<span style="color:red;">*</span></label>
        <div class="items-div">
            <div class="chatsearch">
              <input type="text" id="item[0][item_name]" name="item[0][item_name]" class="input-block-level item_name span4" placeholder="Item Name" value="" />
              <input type="number" id="item[0][item_quantity]" name="item[0][item_quantity]" class="input-small item_quantity input-spinner span2" placeholder="Item quantity" value="" max="25" min="1" />
              <button id="add-item" class="btn btn-primary" style="margin-top: -5px;padding: 5px 38px;"> Add </button>
            </div>
          </div>
        </div>
      </div> --}}
      <input type="hidden" id="delivery_fee" name="delivery_fee" value="" />
      <h3>Delivery Fees:<span id="delivery_fees_amount"></span></h3>
      {{-- <input type="submit" name="submit" class="btn btn-primary"></input> --}}
      <input id="form-submit" type="submit" name="submit" class="btn btn-primary"></input>

    <!--row-fluid-->
        <!--widgetcontent-->
    </form>


{{-- pickup_address:Satyanarayan park Rajkot
pickup_date:02-11-2020
pickup_time:02:10 p.m.
pickup_comment:
pickup_lat:0.0
pickup_long:0.0 --}}
</div>
<div id="add-item-div" class="hidden">
  <div class="items-div">
    <div class="chatsearch">
      <div class="row-fluid">
        <div class="span2">
          <input type="text" id="item[1][item_name]" name="" class="input-block-level item_name span12" placeholder="Name" value="" />
        <br>
          {{-- <span for="item[1][item_name]" generated="true" class="error hidden">This field is required.</span> --}}
        </div>
        <div class="span1">
          <input type="number" id="item[1][item_quantity]" name="" class="input-small item_quantity input-spinner span12" placeholder="Qty" value="" max="25" min="1"/>
        <br>
        {{-- <span for="item[1][item_name]" generated="true" class="error hidden">This field is required.</span> --}}
        </div>
        <div class="span1">
          <div class="setBtns">
             <a href="javascript:void(0);" class="btn btn-primary btn-circle addItemBtn"><i class="iconfa-plus"></i></a>
             <a href="javascript:void(0);" class="btn btn-danger btn-circle remove-item" ><i class="iconfa-minus"></i></a>
          </div>
        </div>
      </div>

    </div> 
  </div>
</div>
@endsection


@section('dashboard-right')
@endsection

@section('script')

<script type="text/javascript" src="{!! asset('assets/js/jquery-ui-1.10.3.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/js/bootstrap-fileupload.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/js/jquery.validate.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/js/jquery.tagsinput.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/js/jquery.autogrow-textarea.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/js/charCount.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/js/colorpicker.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/js/ui.spinner.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/js/chosen.jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/js/forms.js') !!}"></script>

<script type="text/javascript">
   jQuery(document).ready( function ($) {
     $(".chzn-select").chosen();

    // $('#form').hide();
    // $('#form').show('');
    $('#status-msg').hide('');
    $('#update-loader').hide('');
    // $('#sender_name_div').hide('');
    // $('#pickup_address_div').hide('');
    var theNum = 0;
    var sending_item_name = '';
    var delivery_fees_amount = 0;
    // jQuery('#add-item-div').hide('');
    $('#datepicker').datepicker();
    // jQuery("#address_list_id").chosen();

    // $(".item_quantity").spinner({ min: 0, max: 25, increment: 1 });
    // if allready checked in sendi_items then do add in sending_items
    $.ajax({
                    url: '{{url("api/global_setting")}}',
                    // data: fd,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(data) {
                       delivery_fees_amount=data.data.delivery_fee;
                       jQuery('#delivery_fees_amount').html(data.data.delivery_fee);delivery_fee
                       jQuery('#delivery_fee').val(data.data.delivery_fee);
                    }, 
                    complete: function() {
                    }
     }); 
     

        
    /* $(".sending_items").each(function() {
            if(this.checked) {
              sending_item_name = sending_item_name + $(this).val() + ',';
            }
            $('#sending_item_name').val(sending_item_name);
    }); */
    // if  checked in sendi_items then do add in sending_items
    $(".sending_items").change(function() {
        set_sending_item_name();
        sending_item_name='';
    });
   
      
      $(document).on('click','.addItemBtn',function(e) {
        $('#item-details').append(jQuery('#add-item-div').html());
            reset_item_field();
      });

      $(document).on('click','.remove-item',function(e) {
          e.preventDefault();
          $(this).closest(".items-div").hide('');
          setTimeout(() => {  $(this).closest(".items-div").remove(); }, 2000);
          
          reset_item_field();
      });
      $(document).on('change','#store_id',function() {
          // alert($(this).val());
          var store_list=@json($store_details);
          
          // console.log(store_list);
          if($(this).val()!=0){
              // $(".store_details").hide('');
              for(id in store_list) {
              if(store_list.hasOwnProperty(id)) {
                  var value = store_list[id];
                  if($('#store_id').val()==value.id){
                    $('#sender_name').val(value.name);
                    $('#pickup_address').val(value.adddress);
                    $("#sender_name_div").hide('');
                    $("#pickup_address_div").hide('');
                    $('#sender_name').attr('readonly', true);
                    $('#pickup_address').attr('readonly', true);

                  }
              }
          }
          } else {
              $(".store_details").show('');
              $("#sender_name").attr("readonly", false);
              $("#sender_name_div").show('');
              $("#pickup_address").attr("readonly", false);
              $("#pickup_address_div").show('');
              $('#sender_name').val('');
              $('#pickup_address').val('');
          }
          // $("#form").validate();
           $("#form").valid();
      });

      $(document).on('change','#address_list_id',function() {
          // alert($(this).val());
          var address_list_id=@json($address_list);
          
          // console.log(address_list_id);
          if($(this).val()!=0){
              // $(".store_details").hide('');
              for(id in address_list_id) {
                  if(address_list_id.hasOwnProperty(id)) {
                      var value = address_list_id[id];
                      if($('#address_list_id').val()==value.id){
                        $('#delivery_address').val(value.address);
                        $('#delivery_address').attr('readonly', true);
                        $('#delivery_address').hide('');
                      }
                  }
              }
          } else {
                        $('#delivery_address').val('');
                        $('#delivery_address').attr('readonly', false);
                        $('#delivery_address').show('');

          }
      });
      
      // $(".store_details").hide('');
      $(document).on('change','#user_id',function() {

          var user_id = $(this).val();
          var fd = new FormData();
          var user_mobile_id = new FormData();
          fd.append( 'user_id', user_id );
          if(user_id!=0){
                $.ajax({
                          url: '{{url("api/custumer_detail")}}',
                          data: fd,
                          processData: false,
                          contentType: false,
                          type: 'POST',
                          
                          success: function(data) {
                            // console.log(data.data.customer.add_address);
                            if(data.data.customer == null){
                              $('#delivery_receiver_name').val('');
                              $('#delivery_phone').val('');
                              $('#delivery_address').val('');
                              $('#delivery_address').attr('readonly', false);
                              $('#address_list_id').empty();
                              // $('#address_list_id').append("<option value=''>- Select Address-</option>");
                              $('#address_list_id').append("<option value='0' selected >- Add new address -</option>");
                              $("#address_list_id").trigger("liszt:updated");
                              $('#address_list_id').trigger('change');
                            } else {
                                $('#delivery_receiver_name').val(data.data.customer.sender_name);
                                $('#delivery_phone').val(data.data.customer.sender_mobile);
                                mobile_number = $('#delivery_phone').val();
                                // console.log('aaa:'+mobile_number);
                                $('#delivery_address').val('');
                                $('#delivery_address').attr('readonly', false);
                                $('#address_list_id').empty();
                                if(data.data.customer.add_address.length){
                                    // $('#address_list_id').append("<option value=''>- Select Address-</option>");
                                    $('#address_list_id').append("<option value='0'>- Add new address -</option>");
                                    $.each(data.data.customer.add_address, function(i,item){
                                        var selecting=''; 
                                        if (data.data.customer.add_address[i].default_address=='Y') {
                                          selecting = ' selected="selected"'; 
                                        } else {
                                              selecting = '';
                                        }
                                        $('#address_list_id').append('<option '+selecting+' value="'+data.data.customer.add_address[i].id+'">'+data.data.customer.add_address[i].address_type+'-'+data.data.customer.add_address[i].address+'</optoin>');
                                    });
                                } else {
                                    // $('#address_list_id').append("<option value=''>- Select Address-</option>");
                                    $('#address_list_id').append("<option value='0' selected >- Add new address -</option>");
                                }
                                $("#address_list_id").trigger("liszt:updated");
                                $('#address_list_id').trigger('change');
                                $("#form").valid();

                            }
                          }, 
                          complete: function() {
                            // jQuery("#address_list_id").chosen();
                                  var  mobile_number = $('#delivery_phone').val();
                                  // console.log('ss:'+mobile_number);
                                  user_mobile_id.append( 'user_id', user_id);
                                  user_mobile_id.append( 'mobile_number', mobile_number );
                                  count_order(user_mobile_id);
                          }
                  });  

          } else {
            $('#delivery_receiver_name').val('');
            $('#delivery_phone').val('');
            $('#address_list_id').val('');
            $('#delivery_address').val('');
            $('#address_list_id').empty();
            $('#address_list_id').append("<option value=''>- Select Address-</option>");
            $('#address_list_id').append("<option value='0' selected >- Add new address -</option>");
            $("#address_list_id").trigger("liszt:updated");
            $('#address_list_id').trigger('change');
            $('#delivery_comment').val('');

          }
            /*  $.ajax({
                    url: '{{url("api/order/order_count_according_mobile")}}',
                    data: user_mobile_id,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(data) {
                      console.log(data.data);
                      //  delivery_fees_amount=data.data.delivery_fee;
                      //  jQuery('#delivery_fees_amount').html(data.data.delivery_fee);delivery_fee
                      //  jQuery('#delivery_fee').val(data.data.delivery_fee);
                    }, 
                    complete: function() {
                    }
              });  */
       });

       $("#delivery_phone").on("keyup change", function(e) {
          if(this.value.length==10){
             var user_id = $('#user_id').val();
             var user_mobile_id = new FormData();
             var  mobile_number = $(this).val();
              // console.log('ss:'+mobile_number);
              user_mobile_id.append( 'user_id', user_id==0 ? '' : user_id);
              user_mobile_id.append( 'mobile_number', mobile_number );
              count_order(user_mobile_id);
          }

      });
      $('#form').on('submit', function(e) {
            e.preventDefault();
        if($("#form").valid()){
          // var data = $('#form').serialize(); document.getElementById("myform")
          // var data = document.getElementById("#form");
          // alert(data);
          var fd =new FormData(document.getElementById("form"));
          // alert(fd);
          $.ajax({
                    url: '{{url("api/order/save_v2")}}',
                    data: fd,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    beforeSend: function() {
                        // setting a timeout
                        $('#form-submit').hide('');
                        $('#form-submit').after(('<div id="submit-loader"><img src="'+'{{ asset("assets/images/loading.gif") }}'+'"></div>'));
                    },
                    success: function(data) {
                       alert(data.message);
                       location.replace("{{url('admin/order/create')}}");
                    }, 
                    complete: function() {

                    },
                    error: function(xhr){
                        var error_msg = JSON.parse(xhr.responseText);
                        $('#form-submit').show('');
                        $('#submit-loader').hide('');
                      }
          }); 
        }
     });

      $('#form').validate({ // initialize the plugin
        errorElement: "span",
        
        rules: {
          /* user_id:{
                required: true,
            }, */
            store_id:{
                required: true,
            },
            sender_name:{
                required: true,
            },
            pickup_address:{
                required: true,
            },
            address_list_id:{
                required: true,
            },
            sending_item_name:{
                required: true,
            },
            sending_items:{
                required: true,
            },
            "delivery[0][delivery_address]":{
                required: true,
            },
            "delivery[0][delivery_receiver_name]":{
                required: true,
            },
            "delivery[0][delivery_phone]":{
                required: true,
            },
            "delivery[0][delivery_address]":{
                required: true,
            },
        },
      });
      $.validator.addClassRules("item_name", {
          required: true
      });
      $.validator.addClassRules("item_quantity", {
          required: true
      });

      
      function reset_item_field() {
        $(".items-div").each(function(i) {
          $(this).find('.item_name').attr('name', 'item['+i+'][item_name]');
          $(this).find('.item_name').attr('id', 'item['+i+'][item_name]');
          $(this).find('.item_quantity').attr('name', 'item['+i+'][item_quantity]');
          $(this).find('.item_quantity').attr('id', 'item['+i+'][item_quantity]');
              /* $('.remove-item').each(function(i) {
                  if(i==0){
                    $('.remove-item').removeClass('hidden');
                  }
              }) */
              
              
              $('#item-details > .items-div >.chatsearch > .row-fluid > .span1 > .setBtns').each(function(i) {
                  if($('#item-details > .items-div >.chatsearch > .row-fluid > .span1 > .setBtns').length == i+1 ){
                // console.log(i);
                    $(this).children('.addItemBtn').show('');
                    $(this).children('.remove-item').hide();
                  } else {
                    $(this).children('.addItemBtn').hide();
                    $(this).children('.remove-item').show('');
                  }
              })

        });
              /* if(jQuery('#item-details .items-div .remove-item').length==1){
                $('.remove-item').addClass('hidden');
              } */
      }
      function set_sending_item_name() {
        $(".sending_items").each(function() {
            if(this.checked) {
              sending_item_name = sending_item_name + $(this).val() + ',';
            }
          });
        $('#sending_item_name').val(sending_item_name);
      }
    set_sending_item_name();
      function count_order(count_data) {

          $.ajax({
              url: '{{url("api/order/order_count_according_mobile")}}',
              data: count_data,
              processData: false,
              contentType: false,
              type: 'POST',
              
              success: function(data) {
                // console.log(data.data.count_of_order);
                if(!data.data.count_of_order){
                  jQuery('#delivery_fees_amount').html("Free");
                  jQuery('#delivery_fee').val("0"); 
                } else {
                //  delivery_fees_amount=data.data.delivery_fee;
                  jQuery('#delivery_fees_amount').html(delivery_fees_amount);
                  jQuery('#delivery_fee').val(delivery_fees_amount);
                }
              }, 
              complete: function() {
              },
          })
      }
    });

</script>
@endsection



