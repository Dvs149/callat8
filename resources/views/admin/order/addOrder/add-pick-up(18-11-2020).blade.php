@extends(Helpers::file_path("mainLayout"))
@section('dashboard-left')

<div id="dashboard-right" class="span12">
    <form action="{{url(Helpers::admin_url('order/create/adding'))}}" method="post" id="form" enctype="multipart/form-data">
        {{ csrf_field() }}
            <input type="hidden" name="order_type" id="order_type" value="{{$order_type}}">

    <div class="widgetbox">                        
      <div class="headtitle">
          <h4 class="widgettitle form-title">Customer Details</h4>
        </div>
        <div class="widgetcontent" id="from">
           <!-- // CSRF token for securing form field from hacker-->
             <label class="control-label ">Customer mobile:<span style="color:red;">*</span></label>
             <div class="chatsearch">
                <select id="user_id" class="input-block-level {{-- chzn-select --}}" name="user_id">
                  <option value="">- - - Select Customer - - - </option>
                  <option value=''>Add new Customer</option>
                  @foreach($user_data as $key => $value)
                      <option value="{{$value['id']}}" {{ old('user_id')==$value['id'] ? 'selected' : '' }}>{{$value['sender_mobile']}}->{{$value['sender_name']}}</option>
                  @endforeach
                </select>
              </div>
        </div>
    </div>

    <div class="widgetbox">                        
      <div class="headtitle">
          <h4 class="widgettitle form-title">Order type Details</h4>
        </div>
        <div class="widgetcontent" id="from">
           <!-- // CSRF token for securing form field from hacker-->
             <label class="control-label ">Order type:<span style="color:red;">*</span></label>
             <div class="chatsearch">
                <select id="order_type_id" class="input-block-level {{-- chzn-select --}}" name="order_type_id">
                  {{-- <option value="">- - - Select Weight range - - - </option> --}}
                  @foreach($order_type_id as $key => $value)
                      <option value="{{$value['id']}}" {{ old('order_type_id')==$value['id'] ? 'selected' : '' }} data-price="{{$value['default_price']}}">{{$value['name']}}</option>
                  @endforeach
                </select>
              </div>
        </div>
    </div>

     <div class="widgetbox">                        
      <div class="headtitle">
          <h4 class="widgettitle form-title">Pickup Details</h4>
        </div>
        <div class="widgetcontent" id="from">
          
             <label class="control-label ">Sender name:<span style="color:red;">*</span></label>
             <div class="chatsearch">
              <input type="text" id="sender_name" name="sender_name" class="input-block-level  float" placeholder="Sender Name" value="{{old('sender_name')}}" />
              </div>

            <label class="control-label">Mobile:<span style="color:red;">*</span></label>
            <div class="chatsearch">
              <input type="text" id="pickup_phone" pattern="[0-9]{10}" name="pickup_phone" class="input-block-level  float" placeholder="Receiver Mobile" value="{{old('delivery[0][pickup_phone]')}}" />
            </div>

            <label class="control-label">Address:<span style="color:red;">*</span></label>
            <div class="chatsearch">
                <select id="address_list_id" class="input-block-level" name="address_list_id">
                  <option value="">- - - Select Address - - - </option>
                  <option value="0">Add new address</option>
                </select>
                <input type="text" id="pickup_address" name="delivery[0][pickup_address]" class="input-block-level  float" placeholder="Address" value="{{old('delivery[0][pickup_address]')}}" />
            </div>
            <div class="row-fluid">
              <div class="par span6">
                <label>Date</label>
                <span class="field">
                  <input  type="text" name="pickup_date" id="pickup_date" class="input-small datepicker11" />
                </span>
              </div> 
              <div class="par span6">
                <label>Time</label>
                <div class="input-append bootstrap-timepicker">
                    <input type="text" name="pickup_time" id="pickup_time" class="input-small timepicker" />
                    <span class="add-on"><i class="iconfa-time"></i></span>
                </div>
              </div>
            </div>
            
            <label class="control-label">Comments:</label>
            <div class="chatsearch">
              <input type="text" id="pickup_comment" name="pickup_comment" class="input-block-level  float" placeholder="Comments" value="{{old('delivery[0][delivery_comment]')}}" />
            </div>

            <label class="control-label">Sending item:<span style="color:red;">*</span></label>
            <div class="chatsearch">
              <select id="sending_item_id" class="input-block-level {{-- chzn-select --}}" name="sending_item_id">
                <option value="">- - - Select Weight range - - - </option>
                @foreach($sending_item_id as $key => $value)
                    <option value="{{$value['id']}}" {{ old('sending_item_id')==$value['id'] ? 'selected' : '' }} >{{$value['name']}}</option>
                @endforeach
              </select>
            </div>
            
            <label class="control-label">Parcel value:<span style="color:red;">*</span></label>
            <div class="chatsearch">
              <input type="number" id="parcel_value" name="parcel_value" class="input-block-level  float" placeholder="Parcel value" min="0" value="{{old('parcel_value')}}" />
            </div>

            <label class="control-label">SMS service</label>
              <div class="chatsearch">	
                <span >Notify sender by SMS:</span> <input type="checkbox" name="notify_me_by_sms" /> 
                <span >Notify reciever by SMS:</span> <input type="checkbox" name="notify_recipients_by_sms" />
              </div>
    </div>


    <div class="widgetbox">                        
      <div class="headtitle">
          <h4 class="widgettitle form-title">Delivery Details</h4>
        </div>
        <div class="widgetcontent" id="from">
            <div id="reciever-detail-box">
              <div class="reciever-detail">
                  <h3 class="deliver_point_count ">1</h3>
                  <label class="control-label ">Reciever name:<span style="color:red;">*</span></label>
                  <div class="chatsearch">
                    <input type="text" id="delivery_receiver_name" name="delivery[0][delivery_receiver_name]" class="input-block-level delivery_receiver_name float" placeholder="Sender Name" value="{{old('sender_name')}}" />
                    </div>

                  <label class="control-label">Mobile:<span style="color:red;">*</span></label>
                  <div class="chatsearch">
                    <input type="text" id="delivery[0][delivery_phone]" pattern="[0-9]{10}" name="delivery[0][delivery_phone]" class="input-block-level delivery_phone float" placeholder="Receiver Mobile" value="{{old('delivery[0][pickup_phone]')}}" />
                  </div>

                  <label class="control-label">Address:<span style="color:red;">*</span></label>
                  <div class="chatsearch">
                      <select id="address_list_id" class="input-block-level" name="address_list_id">
                        <option value="">- - - Select Address - - - </option>
                        <option value="0">Add new address</option>
                      </select>
                      <input type="text" id="delivery_address" name="delivery[0][delivery_address]" class="input-block-level delivery_address float" placeholder="Address" value="{{old('delivery[0][pickup_address]')}}" />
                  </div>
                  <div class="row-fluid">
                    <div class="par span6">
                      <label>Date</label>
                      <span class="field">
                        <input  type="text" name="delivery[0][delivery_date]" class="input-small delivery_date datepicker11" />
                      </span>
                    </div> 
                    <div class="par span6">
                      <label>Time</label>
                      <div class="input-append bootstrap-timepicker">
                          <input type="text" name="delivery[0][delivery_time]" id="delivery[0][delivery_time]" class="input-small delivery_time timepicker" />
                          <span class="add-on"><i class="iconfa-time"></i></span>
                      </div>
                    </div>
                  </div>
                  
                  <label class="control-label">Comments:</label>
                  <div class="chatsearch">
                    <input type="text" id="delivery_comment" name="delivery[0][delivery_comment]" class="input-block-level delivery_comment float" placeholder="Comments" value="{{old('delivery[0][delivery_comment]')}}" />
                  </div>

                  

                </div>
            </div>
                <br>
            <button id="add-item" class="btn btn-primary" style="margin-top: -5px;padding: 5px 38px;"> Add </button>

    </div>

    <input type="hidden" id="delivery_fee" name="delivery_fee" value="" />
      <h3>Delivery Fees:<span id="delivery_fees_amount"></span></h3>
      <input type="submit" name="submit" class="btn btn-primary"></input>
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
      <input type="text" id="item[1][item_name]" name="" class="input-block-level item_name span4" placeholder="Item Name" value="" />
      <input type="number" id="item[1][item_quantity]" name="" class="input-small item_quantity input-spinner span2" placeholder="Item quantity" value="" max="25" min="1"/>
      <button class="btn btn-danger remove-item" style="margin-top: -5px;padding: 5px 26px;" > Remove </button>
    </div> 
  </div>
</div>

  <div id="reciever-detail-append-box" class="hidden">
      <div class="reciever-detail">
          <hr style="color:#0a6bce;border: 1px solid #0a6bce;">
          <h3 class="deliver_point_count ">1</h3>
          <label class="control-label ">Reciever name:<span style="color:red;">*</span></label>
          <div class="chatsearch">
            <input type="text" id="delivery_receiver_name" name="delivery[0][delivery_receiver_name]" class="input-block-level delivery_receiver_name float" placeholder="Sender Name" value="{{old('sender_name')}}" />
            </div>

          <label class="control-label">Mobile:<span style="color:red;">*</span></label>
          <div class="chatsearch">
            <input type="text" id="delivery_phone" pattern="[0-9]{10}" name="delivery[0][delivery_phone]" class="input-block-level delivery_phone float" placeholder="Receiver Mobile" value="{{old('delivery[0][pickup_phone]')}}" />
          </div>

          <label class="control-label">Address:<span style="color:red;">*</span></label>
          <div class="chatsearch">
              <select id="address_list_id" class="input-block-level" name="address_list_id">
                <option value="">- - - Select Address - - - </option>
                <option value="0">Add new address</option>
              </select>
              <input type="text" id="delivery_address" name="delivery[0][delivery_address]" class="input-block-level delivery_address float" placeholder="Address" value="{{old('delivery[0][pickup_address]')}}" />
          </div>
          <div class="row-fluid">
            <div class="par span6">
              <label>Date</label>
              <span class="field">
                <input  type="text" name="delivery[0][delivery_date]" class="input-small delivery_date datepicker11" />
              </span>
            </div> 
            <div class="par span6">
              <label>Time</label>
              <div class="input-append bootstrap-timepicker">
                  <input type="text" name="delivery[0][delivery_time]" class="input-small delivery_time timepicker" />
                  <span class="add-on"><i class="iconfa-time"></i></span>
              </div>
            </div>
          </div>
          
          <label class="control-label">Comments:</label>
          <div class="chatsearch">
            <input type="text" id="delivery_comment" name="delivery[0][delivery_comment]" class="input-block-level delivery_comment float" placeholder="Comments" value="{{old('delivery[0][delivery_comment]')}}" />
          </div>
        </div>
      </div>
      <div id="removeBtn" class="hidden">
        <button class="btn btn-danger remove-item" style="margin-top: -5px;padding: 5px 26px;" > Remove </button>
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
    //  $(".chzn-select").chosen();

    $('#status-msg').hide();
    $('#update-loader').hide();
    var theNum = 0;
    var sending_item_name = '';
    var delivery_fees_amount = 0;
    // jQuery('#add-item-div').hide();
    // jQuery("#address_list_id").chosen();
    $('.datepicker11').datepicker({ dateFormat: 'dd-mm-yy' });
    $('.timepicker').timepicker();

    
        
    // if  checked in sendi_items then do add in sending_items
      $("#add-item").click(function(e){
          e.preventDefault();
            var count = 1;
            $('#reciever-detail-box').append(jQuery('#reciever-detail-append-box').html());
           
            reset_field();
      });
      $(document).on('click','.remove-item',function(e) {
          e.preventDefault();
          // $(this).closest(".items-div").remove();
          $(this).closest(".reciever-detail").remove();
          reset_field(); 
      });

      $(document).on('change','#address_list_id',function() {
          // alert($(this).val());
          var address_list_id=@json($address_list);
          
          // console.log(address_list_id);
          if($(this).val()!=0){
              // $(".store_details").hide();
              for(id in address_list_id) {
                  if(address_list_id.hasOwnProperty(id)) {
                      var value = address_list_id[id];
                      if($('#address_list_id').val()==value.id){
                        $('#pickup_address').val(value.address);
                        $('#pickup_address').attr('readonly', true);
                      }
                  }
              }
          } else {
                        $('#pickup_address').val('');
                        $('#pickup_address').attr('readonly', false);
          }
      });
      $(document).on('change','#order_type_id',function() {
        var user_id = $('#user_id').val();
        var mobile_number = $('#pickup_phone').val();
        // alert(mobile_number);
        var user_mobile_id = new FormData;
        user_mobile_id.append( 'user_id', user_id==0 ? '' : user_id);
        user_mobile_id.append( 'mobile_number', mobile_number );
        count_order(user_mobile_id);
        
        if(jQuery('#delivery_fees_amount').html()!='Free'){
          $('#delivery_fee').val($(this).find(':selected').data('price'));
          $('#delivery_fees_amount').html($(this).find(':selected').data('price'));
        }
          // alert($(this).find(':selected').data('price'));
      });
      // $(".store_details").hide();
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
                          $('#sender_name').val('');
                          $('#pickup_phone').val('');
                          $('#pickup_address').val('');
                          $('#pickup_address').attr('readonly', false);
                          $('#address_list_id').empty();
                          $('#address_list_id').append("<option value=''>- Select Address-</option>");
                          $('#address_list_id').append("<option value='0' selected >- Other-</option>");
                          $("#address_list_id").trigger("chosen:updated");
                          $('#address_list_id').trigger('change');
  
                        } else {
                            $('#sender_name').val(data.data.customer.sender_name);
                            $('#pickup_phone').val(data.data.customer.sender_mobile);
                            mobile_number = $('#pickup_phone').val();
                            // console.log('aaa:'+mobile_number);
                            $('#pickup_address').val('');
                            $('#pickup_address').attr('readonly', false);
                            $('#address_list_id').empty();
                            if(data.data.customer.add_address.length){
                                $('#address_list_id').append("<option value=''>- Select Address-</option>");
                                $('#address_list_id').append("<option value='0'>- Other-</option>");
                                $.each(data.data.customer.add_address, function(i,item){
                                    var selecting=''; 
                                    if (data.data.customer.add_address[i].default_address=='Y') {
                                      selecting = ' selected="selected"'; 
                                    } else {
                                          selecting = '';
                                    }
                                    $('#address_list_id').append('<option '+selecting+' value="'+data.data.customer.add_address[i].id+'">'+data.data.customer.add_address[i].address_type+'->'+data.data.customer.add_address[i].address+'</optoin>');
                                });
                            } else {
                                $('#address_list_id').append("<option value=''>- Select Address-</option>");
                                $('#address_list_id').append("<option value='0' selected >- Other-</option>");
                            }
                            // $("#address_list_id").trigger("chosen:updated");
                            $('#address_list_id').trigger('change');
                            $("#form").valid();
  
                        }
                      }, 
                      complete: function() {
                        // jQuery("#address_list_id").chosen();
                              var  mobile_number = $('#pickup_phone').val();
                              // console.log('ss:'+mobile_number);
                              user_mobile_id.append( 'user_id', user_id);
                              user_mobile_id.append( 'mobile_number', mobile_number );
                              count_order(user_mobile_id);
                      }
              });  
            
           } else {
                          $('#sender_name').val('');
                          $('#pickup_phone').val('');
                          $('#pickup_address').val('');
                          $('#pickup_address').attr('readonly', false);
                          $('#address_list_id').empty();
                          $('#address_list_id').append("<option value=''>- Select Address-</option>");
                          $('#address_list_id').append("<option value='0' selected >- Other-</option>");
                          $("#address_list_id").trigger("chosen:updated");
                          $('#address_list_id').trigger('change');
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

       $("#pickup_phone").on("keyup change", function(e) {
          if(this.value.length==10){
             var user_id = $('#user_id').val();
             var user_mobile_id = new FormData();
             var  mobile_number = $(this).val();
              // console.log('ss:'+mobile_number);
              user_mobile_id.append( 'user_id', user_id==0 ? null : user_id);
              user_mobile_id.append( 'mobile_number', mobile_number );
              count_order(user_mobile_id);
          }

      });
    
      $('#form').validate({ // initialize the plugin
        errorElement: "span",
        rules: {
            user_id:{
                required: true,
            }, 
            order_type_id:{
                required: true,
            },
            sender_name:{
                required: true,
            },
            address_list_id:{
                required: true,
            },
            pickup_address:{
                required: true,
            },
            pickup_phone:{
                required: true,
            },
            pickup_date:{
                required: true,
            },
            pickup_time:{
                required: true,
            },
            sending_item_id:{
                required: true,
            },
            parcel_value:{
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

      
      function reset_field() {
        var count = 1;
        $("#reciever-detail-box > .reciever-detail").each(function(i) {
              if($(this).children('.remove-item').length==0){
                $(this).append(jQuery('#removeBtn').html());
              }
              if(count==1){
                // remove first delivery point hr
                $(this).children('hr').remove();
              }
              $(this).children('.deliver_point_count').html(count++);

              $(this).find('.delivery_receiver_name').attr('name', 'delivery['+i+'][delivery_receiver_name]');
              $(this).find('.delivery_receiver_name').attr('id', 'delivery['+i+'][delivery_receiver_name]');

              
              $(this).find('.delivery_phone').attr('name', 'delivery['+i+'][delivery_phone]');
              $(this).find('.delivery_phone').attr('id', 'delivery['+i+'][delivery_phone]');
              
              $(this).find('.delivery_address').attr('name', 'delivery['+i+'][delivery_address]');
              $(this).find('.delivery_address').attr('id', 'delivery['+i+'][delivery_address]');
              
              $(this).find('.delivery_date').attr('name', 'delivery['+i+'][delivery_date]');
              $(this).find('.delivery_date').attr('id', 'delivery['+i+'][delivery_date]');
              
              $(this).find('.delivery_time').attr('name', 'delivery['+i+'][delivery_time]');
              $(this).find('.delivery_time').attr('id', 'delivery['+i+'][delivery_time]');

              $(this).find('.delivery_comment').attr('name', 'delivery['+i+'][delivery_comment]');
              $(this).find('.delivery_comment').attr('id', 'delivery['+i+'][delivery_comment]');

            });
            // remove removebtn if only one delivery address is there
            if($("#reciever-detail-box > .reciever-detail").length==1){
              $("#reciever-detail-box > .reciever-detail").children('.remove-item').remove();
              jQuery("#reciever-detail-box > .reciever-detail").children('.remove-item').html();
            }
            // $('.datepicker11').datepicker({ dateFormat: 'dd-mm-yy' });
            // $('.datepicker11').removeClass('.hasDatepicker').datepicker({ dateFormat: 'dd-mm-yy' });
            $('.timepicker').timepicker();  
          }

          $('body').on('focus', '.datepicker11', function() {
               $('.datepicker11').removeClass('hasDatepicker').datepicker({ dateFormat: 'dd-mm-yy' });
          });
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
                        delivery_fees_amount = $('#order_type_id').find(':selected').data('price');
                        // alert(delivery_fees_amount);
                         jQuery('#delivery_fees_amount').html(delivery_fees_amount);
                         jQuery('#delivery_fee').val(delivery_fees_amount != undefined ? delivery_fees_amount : '0');
                        }
                      }, 
                      complete: function() {
                      }
          })
      }


    });

</script>
@endsection



