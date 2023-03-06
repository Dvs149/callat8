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
                <select id="user_id" class="input-block-level chzn-select" name="user_id">
                  <option value="">- - - Select Customer - - - </option>
                  <option value="0">Other</option>
                  @foreach($user_data as $key => $value)
                      <option value="{{$value['id']}}" {{ old('user_id')==$value['id'] ? 'selected' : '' }}>{{$value['sender_mobile']}}->{{$value['sender_name']}}</option>
                  @endforeach
                </select>
              </div>
            
        </div>
    </div>


    <div class="widgetbox">                        
      <div class="headtitle">
          <h4 class="widgettitle form-title">{{Str::ucfirst($order_type)}} Details</h4>
        </div>
        <div class="widgetcontent" id="from" >
           <!-- // CSRF token for securing form field from hacker-->
             <label class="control-label ">{{Str::ucfirst($order_type)}}:<span style="color:red;">*</span></label>
             <div class="chatsearch">

                <select id="store_id" class="input-block-level chzn-select" name="store_id">
                  <option value="">- - - Select {{Str::ucfirst($order_type)}} - - - </option>
                  <option value="0">Other</option>
                  @foreach($store_details as $key => $value)
                      <option value="{{$value['id']}}" {{ old('store_id')==$value['id'] ? 'selected' : '' }}>{{$value['name']}} ->  {{$value['adddress']}}</option>
                  @endforeach
                </select>
              </div>
             <div class="store_details">
              <label class="control-label">{{Str::ucfirst($order_type)}} Name:<span style="color:red;">*</span></label>
              <div class="chatsearch">
               <input type="text" id="sender_name" name="sender_name" class="input-block-level  float" placeholder="{{Str::ucfirst($order_type)}} Name" value="{{old('sender_name')}}" />
               </div>
 
              <label class="control-label">{{Str::ucfirst($order_type)}} Address:<span style="color:red;">*</span></label>
              <div class="chatsearch">
               <input type="text" id="pickup_address" name="pickup_address" class="input-block-level  float" placeholder="{{Str::ucfirst($order_type)}} Address" value="{{old('pickup_address')}}" />
               </div>
             </div>
        </div>
    </div>

     <div class="widgetbox">                        
      <div class="headtitle">
          <h4 class="widgettitle form-title">Receiver Details</h4>
        </div>
        <div class="widgetcontent" id="from">
          
           <!-- // CSRF token for securing form field from hacker-->
           


             <label class="control-label ">Receiver name:<span style="color:red;">*</span></label>
             <div class="chatsearch">
              <input type="text" id="delivery_receiver_name" name="delivery[0][delivery_receiver_name]" class="input-block-level  float" placeholder="Receiver Name" value="{{old('delivery[0][delivery_receiver_name]')}}" />
              </div>


            <label class="control-label">Receiver Mobile:<span style="color:red;">*</span></label>
            <div class="chatsearch">
              <input type="text" id="delivery_phone" name="delivery[0][delivery_phone]" class="input-block-level  float" placeholder="Receiver Mobile" value="{{old('delivery[0][delivery_phone]')}}" />
            </div>


            <label class="control-label">Address:<span style="color:red;">*</span></label>
            <div class="chatsearch">
              <select id="address_list_id" class="input-block-level chzn-select" name="address_list_id">
                  <option value="">- - - Select Customer - - - </option>
                  <option value="0">Other</option>
                  @foreach($address_list as $key => $value)
                      <option value="{{$value['id']}}" {{ old('address_list_id')==$value['id'] ? 'selected' : '' }}>{{$value['address_type']}}->{{$value['address']}}</option>
                  @endforeach
                </select>
                <input type="text" id="delivery_address" name="delivery[0][delivery_address]" class="input-block-level  float" placeholder="Address" value="{{old('delivery[0][delivery_address]')}}" />
            </div>

            <label class="control-label">Comments:<span style="color:red;">*</span></label>
            <div class="chatsearch">
              <input type="text" id="delivery_comment" name="delivery[0][delivery_comment]" class="input-block-level  float" placeholder="Address" value="{{old('delivery[0][delivery_comment]')}}" />
            </div>
        </div>
    </div>


    <div class="widgetbox">                        
      <div class="headtitle">
          <h4 class="widgettitle form-title">Choose Category</h4>
      </div>
      <div class="widgetcontent" id="from">
            <input type="hidden" id="sending_item_name" name="sending_item_name" value="" />
            <label>Checkboxes</label>
            <div class="chatsearch">	
              <input type="checkbox" class="sending_items" name="" value="Food" {{Str::ucfirst($order_type)=='Restaurant' ? "checked" : ""}}/> Food<br />
              <input type="checkbox" class="sending_items" name="" value="Groceries" {{Str::ucfirst($order_type)=='Groceries' ? "checked" : ""}}/> Groceries<br />
              <input type="checkbox" class="sending_items" name="" value="Vegetable" {{Str::ucfirst($order_type)=='Vegetable' ? "checked" : ""}}/> Vegetable<br />
              <input type="checkbox" class="sending_items" name="" value="Other" {{Str::ucfirst($order_type)=='Other' ? "checked" : ""}}/> Other<br />
            </div>
      </div>
    </div>
    
    <div class="widgetbox">                        
      <div class="headtitle">
          <h4 class="widgettitle form-title">Item Details</h4>
      </div>
      <div class="widgetcontent" id="item-details">
        <label class="control-label">Item name:<span style="color:red;">*</span></label>
        <div class="items-div">
            <div class="chatsearch">
              <input type="text" id="item[0][item_name]" name="item[0][item_name]" class="input-block-level span8" placeholder="Item Name" value="" />
              <input type="number" id="item[0][item_quantity]" name="item[0][item_quantity]" class="input-small item_quantity input-spinner span2" placeholder="Item quantity" value="" max="25" min="1" />
              <button id="add-item" class="btn btn-primary" style="margin-top: -5px;padding: 5px 38px;"> Add </button>
            </div>
        </div>
      </div>
    </div>
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
      <input type="text" id="item[1][item_name]" name="" class="input-block-level item_name span8" placeholder="Item Name" value="" />
      <input type="number" id="item[1][item_quantity]" name="" class="input-small item_quantity input-spinner span2" placeholder="Item quantity" value="" max="25" min="1"/>
      <button class="btn btn-danger remove-item" style="margin-top: -5px;padding: 5px 26px;" > Remove </button>
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
    //  $(".chzn-select").chosen();

    $('#status-msg').hide();
    $('#update-loader').hide();
    var theNum = 0;
    var sending_item_name = '';
    // jQuery('#add-item-div').hide();
    $('#datepicker').datepicker();
    // $(".item_quantity").spinner({ min: 0, max: 25, increment: 1 });
    // if allready checked in sendi_items then do add in sending_items
    $(".sending_items").each(function() {
            if(this.checked) {
              sending_item_name = sending_item_name + $(this).val() + ',';
            }
            $('#sending_item_name').val(sending_item_name);
    });
    // if  checked in sendi_items then do add in sending_items
    $(".sending_items").change(function() {
      // var sending_item_name = '';
        /* if(this.checked) {
            // alert($(this).val());
          $(".sending_items").each(function() {
            if(this.checked) {
              sending_item_name = sending_item_name + $(this).val() + ',';
              console.log($(this).val());
            }
          });

        } else{ */
          $(".sending_items").each(function() {
            if(this.checked) {
              sending_item_name = sending_item_name + $(this).val() + ',';
            }
          });
        /* } */
        $('#sending_item_name').val(sending_item_name);
    });
      $("#add-item").click(function(e){
          e.preventDefault();
            $('#item-details').append(jQuery('#add-item-div').html());
            reset_item_field();
      });
      $(document).on('click','.remove-item',function(e) {
          e.preventDefault();
          $(this).closest(".items-div").remove();
          reset_item_field();
      });
      $(document).on('change','#store_id',function() {
          // alert($(this).val());
          var store_list=@json($store_details);
          
          // console.log(store_list);
          if($(this).val()!=0){
              // $(".store_details").hide();
              for(id in store_list) {
              if(store_list.hasOwnProperty(id)) {
                  var value = store_list[id];
                  if($('#store_id').val()==value.id){
                    $('#sender_name').val(value.name);
                    $('#pickup_address').val(value.adddress);
                    $('#sender_name').attr('readonly', true);
                    $('#pickup_address').attr('readonly', true);
                  }
              }
          }
          } else {
              $(".store_details").show();
              $("#sender_name").attr("readonly", false);
              $("#pickup_address").attr("readonly", false);
              $('#sender_name').val('');
              $('#pickup_address').val('');
          }
      });

      $(document).on('change','#address_list_id',function() {
          // alert($(this).val());
          var address_list_id=@json($address_list);
          
          console.log(address_list_id);
          if($(this).val()!=0){
              // $(".store_details").hide();
              for(id in address_list_id) {
                  if(address_list_id.hasOwnProperty(id)) {
                      var value = address_list_id[id];
                      if($('#address_list_id').val()==value.id){
                        $('#delivery_address').val(value.address);
                        $('#delivery_address').attr('readonly', true);
                      }
                  }
              }
          } else {
                        $('#delivery_address').val('');
                        $('#delivery_address').attr('readonly', false);
          }
      });
      
      // $(".store_details").hide();
      $(document).on('change','#user_id',function() {
          var user_id = $(this).val();
          var fd = new FormData();
          fd.append( 'user_id', user_id );
          $.ajax({
                    url: '{{url("api/get_customer_address")}}',
                    data: fd,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    
                    success: function(data) {
                      console.log(data.data.address_list);
                      $('#address_list_id').empty();
                      $('#address_list_id').append("<option value=''>- Select Zone-</option>");
                      $.each(data.data.address_list, function(i,item){
                          // var selecting=''; 
                          /* if ($('#dis').val().findIndex(x => x==data[i].id)>=0) {
                            selecting = ' selected="selected"'; 
                          } else {
                                selecting = '';
                          } */
                          $('#address_list_id').append('<option value="'+data.data.address_list[i].id+'">'+data.data.address_list[i].address_type+'->'+data.data.address_list[i].address+'</optoin>');
                      });
                      jQuery(".chzn-select").chosen();
                    }, 
                    complete: function() {}
            });  
       })
      function reset_item_field() {
        $(".items-div").each(function(i) {
          $(this).find('.item_name').attr('name', 'item['+i+'][item_name]');
          $(this).find('.item_name').attr('id', 'item['+i+'][item_name]');
          $(this).find('.item_quantity').attr('name', 'item['+i+'][item_quantity]');
          $(this).find('.item_quantity').attr('id', 'item['+i+'][item_quantity]');
        });
      }
    });

</script>
@endsection



