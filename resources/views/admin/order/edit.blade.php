@extends(Helpers::file_path("mainLayout"))
@section('dashboard-left')

<div class="widgetbox span12">
  <h4 class="widgettitle ">Order Details</h4>
  <div class="widgetcontent">
    <div id="status-msg" class="alert alert-success alert-dismissible">
      <strong>Order status changed successfully</strong>
    </div>
    <div style="overflow-x:auto;overflow: hidden;">
      <div class="span12" style="margin-left: 0;">
      <table  style="width:100%;" cellpadding="0" cellspacing="0" class=""  >
        <tbody>
          <tr>
            <td style="width: 30%;" >
              <label class="control-label" >Order status :
              <select id="order_status" data-id="{{ $doubleGoogleOrderData['id'] }}" class="searchForm_input" style="margin-top: 0;margin-bottom: 0;" name="order_status" >
                <option value="Pending" {{ $doubleGoogleOrderData['order_status']=='Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Confirm" {{ $doubleGoogleOrderData['order_status']=='Confirm' ? 'selected' : '' }}>Confirm</option>
                <option value="Out for delivery" {{ $doubleGoogleOrderData['order_status']=='Out for delivery' ? 'selected' : '' }}>Out for delivery</option>
                <option value="Delivered" {{ $doubleGoogleOrderData['order_status']=='Delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="Completed" {{ $doubleGoogleOrderData['order_status']=='Completed' ? 'selected' : '' }}>Completed</option>
                {{-- <option value="Return" {{ $doubleGoogleOrderData['order_status']=='Return' ? 'selected' : '' }}>Return</option> --}}
                <option value="Canceled" {{ $doubleGoogleOrderData['order_status']=='Canceled' ? 'selected' : '' }}>Cancelled</option>
                <option value="Deleted" {{ $doubleGoogleOrderData['order_status']=='Deleted' ? 'selected' : '' }}>Deleted</option>

              </select></label>
            </td>
            <td style="width: 30%;" >
              <label class="control-label" >Driver assigned:
              <select id="driver" data-id="{{ $doubleGoogleOrderData['id'] }}" class="searchForm_input" name="driver" {{-- style="margin-left:10px;width: 100%;" --}}style="margin-top: 0;margin-bottom: 0;" name="order_status">
                <option value="" >Select Driver</option>
                @foreach ($drivers as $driver_id => $driver_name)
              <option value="{{$driver_id}}" {{ isset($doubleGoogleOrderData['driver']['id']) && $driver_id==$doubleGoogleOrderData['driver']['id'] ? 'selected' : ''}} {{-- title="{{$driver_id}}" --}}>{{$driver_name}}</option>
                @endforeach
              </select></label>

            </td>
               <td >
                   <button id="update" class="btn btn-primary" style="margin-top: 3px;">Update</button> 
                  <img id="update-loader" style="margin: -14px 20px;" src="{{ asset('assets/images/loaders/loader6.gif') }}" alt="">
                </td>
           </tr>
          </table>
          <table  style="width:100%; margin-top: 15px;" cellpadding="0" cellspacing="0" class="">
           <tr>
            <td>
              <label class="control-label" style="margin-top: 3px;"><b>Order Number :</b> #{{ $doubleGoogleOrderData['order_number'] }}</label>
            </td>
            <td>
              <label class="control-label" style="margin-top: 3px;"><b>Order Type :</b> {{ /* !empty($doubleGoogleOrderData['store']['type']) ? $doubleGoogleOrderData['store']['type'] :  */$doubleGoogleOrderData['order_type'] }}</label>
            </td>
            <td>
              <label class="control-label" style="margin-top: 3px;"><b>Delivery Fee : </b>&#8377 {{ $doubleGoogleOrderData['delivery_fee'] }}</label>
            </td>
            <td>
              <label class="control-label" style="margin-top: 3px;"><b>Order Date :</b> {{ Carbon\Carbon::parse($doubleGoogleOrderData['order_address'][0]['created_at'])->format('d/m/Y h:i A')  }}</label>
            </td>
          </tr>
          <tr>
            <td>
              <label class="control-label" style="margin-top: 3px;"><b>Customer Name : </b>{{ ucfirst($doubleGoogleOrderData['customer']['sender_name']) }}</label>
            </td>
            <td>
              <label class="control-label" style="margin-top: 3px;"><b>Customer Phone : </b>{{ ucfirst($doubleGoogleOrderData['customer']['sender_mobile']) }}</label>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
        
       {{--  <div class="span12">
          
          <p style="margin: 10px 0;font-size: 15px;">Order Number : <strong>#{{ $doubleGoogleOrderData['order_number'] }}</strong></p>
          <p style="margin: 10px 0;font-size: 15px;">Order Type : <strong>{{ $doubleGoogleOrderData['order_type'] }}</strong></p>
          <p style="margin: 10px 0;font-size: 15px;">Delivery Fee : &#8377 <strong>{{ $doubleGoogleOrderData['delivery_fee'] }}</strong></p>
          <p style="margin: 10px 0;font-size: 15px;">Order Date : <strong>{{ Carbon\Carbon::parse($doubleGoogleOrderData['order_address'][0]['pickup_date'])->format('d-m-Y') }}</strong></p>
        </div>   --}}
        {{-- <div class="span12" style="margin-left: 0;"> --}}
          {{-- <table> --}}
            {{-- <tr>
              <td><p style="margin: 10px 0;font-size: 15px;">Order Status :</p></td>
              <td><select id="order_status" data-id="{{ $doubleGoogleOrderData['id'] }}" class="input-block-level span5" name="order_status" style="margin-left:10px;width: 100%;">
                <option value="Pending" {{ $doubleGoogleOrderData['order_status']=='Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ $doubleGoogleOrderData['order_status']=='Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Canceled" {{ $doubleGoogleOrderData['order_status']=='Canceled' ? 'selected' : '' }}>Canceled</option>
                <option value="Out for delivery" {{ $doubleGoogleOrderData['order_status']=='Out for delivery' ? 'selected' : '' }}>Out for delivery</option>
                <option value="Delivered" {{ $doubleGoogleOrderData['order_status']=='Delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="Return" {{ $doubleGoogleOrderData['order_status']=='Return' ? 'selected' : '' }}>Return</option>
              </select></td>
            </tr> --}}
            {{-- <tr>
              <td><p style="margin: 10px 0;font-size: 15px;">Order Assign to Driver : </p></td>
              <td><select id="order_status" data-id="{{ $doubleGoogleOrderData['id'] }}" class="input-block-level span5" name="order_status" style="margin-left:10px;width: 100%;">
                <option value="" >Select Driver</option>
                @foreach ($drivers as $driver_id => $driver_name)
                <option value="{{$driver_id}}" {{$driver_id==$doubleGoogleOrderData['driver']['id']? 'selected' : ''}} >{{$driver_name}}</option>
            @endforeach
          </select></td>
            </tr> --}}
            {{-- <tr>
              <td></td>
                <td>
                  <button id="update" class="btn btn-primary pull-right" style="margin-right: 0;">Update</button> 
                  <img id="update-loader" class="pull-right" style="margin-right: 0;" src="{{ asset('assets/images/loaders/loader6.gif') }}" alt="">
                </td>
            </tr> --}}
          {{-- </table> --}}
          {{-- <p style="margin: 10px 0;font-size: 15px;">Order Status : 
            <select id="order_status" data-id="{{ $doubleGoogleOrderData['id'] }}" class="input-block-level span5" name="order_status">
              <option value="Pending" {{ $doubleGoogleOrderData['order_status']=='Pending' ? 'selected' : '' }}>Pending</option>
              <option value="Completed" {{ $doubleGoogleOrderData['order_status']=='Completed' ? 'selected' : '' }}>Completed</option>
              <option value="Canceled" {{ $doubleGoogleOrderData['order_status']=='Canceled' ? 'selected' : '' }}>Canceled</option>
              <option value="Out for delivery" {{ $doubleGoogleOrderData['order_status']=='Out for delivery' ? 'selected' : '' }}>Out for delivery</option>
              <option value="Delivered" {{ $doubleGoogleOrderData['order_status']=='Delivered' ? 'selected' : '' }}>Delivered</option>
              <option value="Return" {{ $doubleGoogleOrderData['order_status']=='Return' ? 'selected' : '' }}>Return</option>
            </select></p>
            <p style="margin: 10px 0;font-size: 15px;">Order Assign to Driver :   
              <select id="order_status" data-id="{{ $doubleGoogleOrderData['id'] }}" class="input-block-level span5" name="order_status">
                <option value="" >Select Driver</option>
                @foreach ($drivers as $driver_id => $driver_name)
                <option value="{{$driver_id}}" {{$driver_id==$doubleGoogleOrderData['driver']['id']? 'selected' : ''}} >{{$driver_name}}</option>
                @endforeach
              </select></p> --}}
              
        {{-- </div>   --}}
      @if($doubleGoogleOrderData['order_type']=='Pick up')
          @include('admin.order.pick-up')
      @else
          @include('admin.order.not-pick-up')
      @endif
</div>
</div>
</div>
{{-- 
    <div class="span8">
    <h4 class="span2" style="padding-top: 5px;">Order status</h4>
        <select id="order_status" data-id="{{ $doubleGoogleOrderData['id'] }}" class="input-block-level span5" name="order_status">
        <option value="Pending" {{ $doubleGoogleOrderData['order_status']=='Pending' ? 'selected' : '' }}>Pending</option>
        <option value="Completed" {{ $doubleGoogleOrderData['order_status']=='Completed' ? 'selected' : '' }}>Completed</option>
        <option value="Canceled" {{ $doubleGoogleOrderData['order_status']=='Canceled' ? 'selected' : '' }}>Canceled</option>
        <option value="Out for delivery" {{ $doubleGoogleOrderData['order_status']=='Out for delivery' ? 'selected' : '' }}>Out for delivery</option>
        <option value="Delivered" {{ $doubleGoogleOrderData['order_status']=='Delivered' ? 'selected' : '' }}>Delivered</option>
        <option value="Return" {{ $doubleGoogleOrderData['order_status']=='Return' ? 'selected' : '' }}>Return</option>
        </select>
        <button id="update" class="btn btn-primary" style="margin-bottom: 10px;">Update</button> 
        <img id="update-loader" src="{{ asset('assets/images/loaders/loader6.gif') }}" alt="">
    </div>
 --}}
@endsection


@section('dashboard-right')
@endsection

@section('script')
<script type="text/javascript">
   jQuery(document).ready( function ($) {
    $('#status-msg').hide();
    $('#update-loader').hide();
    var theNum = 0;

    $("body").on('click','.edit',function(){
      theNum = theNum +1;
      
      var cur_element = $(this);
      /* if(theNum%2 != 0)
      { */   
          var address =cur_element.parent().next().html();
          $('img',this).attr('src',"{{asset('assets/images/Toolbar - Save.png')}}");
          h5_id = cur_element.parent().next().attr('id');
          // '<textarea class="input-block-level" id="'+h5_id+'" style="width: 100%;"data-id="'+h5_id+'">'+address+'</textarea>'

          // cur_element.parent().next().replaceWith('<input type="text" id="'+h5_id+'" style="width: 100%;"data-id="'+h5_id+'" value="'+address+'">');
          cur_element.parent().next().replaceWith('<textarea class="input-block-level" id="'+h5_id+'" style="width: 100%;"data-id="'+h5_id+'">'+address+'</textarea>');
          $(this).attr('class',"save-address");
      /* } */
      /* else
      {
        var address =cur_element.parent().next().val();
        $('img',this).attr('src',"{{asset('assets/images/Edit - 16.png')}}");
        // $(this).attr('class',"edit");
        cur_element.parent().next().replaceWith('<h5 id="'+cur_element.attr('data-id')+'">'+address+'</h5>');
        // cur_element.parent().next().html('<input type="text" data-id="'+cur_element.attr('data-id')+'" value="'+address+'">');
      } */
      
    });
    $('body').on('click', '.save-address',function () {
      $(".message").remove();
      var fd = new FormData();
      var cur_element = $(this);
      // alert(cur_element.parent().next().val());
      fd.append( 'address', cur_element.parent().next().val() );
      fd.append( 'address_type', cur_element.attr('data-address-type') );
      fd.append( 'order_id', cur_element.attr('data-order-id') );
      fd.append( 'order_address_id', cur_element.attr('data-order-address-id') );
      
      var order_address_id=cur_element.attr('data-order-id');
      // alert(order_address_id);
      // console.log(fd.keys('address'));
      $.ajax({
                    url: '{{url(Helpers::admin_url('order'))}}/edit_address/'+order_address_id,
                    headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: fd,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    beforeSend: function(){
                        $('img',cur_element).attr('src',"{{asset('assets/images/loaders/loader8.gif')}}");
                    },
                    success: function ( data ) {
                        address =cur_element.parent().next().val();
                        $('img',cur_element).attr('src',"{{asset('assets/images/Edit - 16.png')}}");
                        h5_id = cur_element.parent().next().attr('id');
                        cur_element.parent().next().replaceWith('<p style="margin: 0;" id="'+h5_id+'">'+address+'</p>');
                    },
                    complete: function(){
                        cur_element.attr('class',"edit");
                    }
                });

    });



    $('body').on('click', '#update',function () {
          $(".message").remove();
          $('span.error').hide();
          var fd = new FormData();
          // fd.append("_token", getCSRFTokenValue());
            
            fd.append( 'order_id', $('#order_status').attr('data-id') );
            fd.append( 'order_status', $('#order_status').val() );
            fd.append( 'driver_id', $('#driver').val() );



                $.ajax({
                    url: '{{url(Helpers::admin_url('order'))}}/status_change',
                    headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: fd,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    beforeSend: function(){
                      /* <img src="images/loaders/loader6.gif" alt=""> */
                        $('#update').hide();
                        $('#status-msg').hide();
                        $('#update-loader').show();
                    },
                    success: function ( data ) {
                      // alert('d')
                      $('#update').show();
                        $('#status-msg').show();
                        setTimeout(function() { $("#status-msg").hide(); }, 5000);
                        $('#update-loader').hide();
                    }
                    
                });
      });

    });

</script>
@endsection