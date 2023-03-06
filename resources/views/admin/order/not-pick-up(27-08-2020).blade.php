<div class="widgetbox box-inverse span12" style="margin-left: 0;">
    <h4 class="widgettitle title-inverse">Sender Information</h4>
    <div class="widgetcontent">
    <div style="overflow-x:auto;overflow: hidden;">
         <div class="span12">
            {{-- <h4>{{ ucfirst($doubleGoogleOrderData['order_address'][0]['sender_name']) }}</h4><br> --}}
            <label class="control-label">{{ ucfirst($doubleGoogleOrderData['order_address'][0]['sender_name']) }}</label>
             {{-- <div class="span2">

                <label class="control-label">Date:</label>
                <p style="margin: 0;">{{ Carbon\Carbon::parse($doubleGoogleOrderData['order_address'][0]['pickup_date'])->format('d-m-Y') }}</p>
            </div>
            <div class="span2">
                <label class="control-label">Time:</label>
                <p style="margin: 0;">{{ Carbon\Carbon::parse($doubleGoogleOrderData['order_address'][0]['pickup_time'])->format('h:m A') }}</p>
            </div> --}}
{{--             @if($doubleGoogleOrderData['order_address'][0]['pickup_phone']!=null)
            <div class="span2">
                <label class="control-label">Phone:</label>
                <p style="margin: 0;">{{ $doubleGoogleOrderData['order_address'][0]['pickup_phone'] }}</p>
            </div>
            @endif --}}
            <div class="span4">
                    <label class="control-label"><b>Address:</b>
                    <a href="javascript:void(0)" data-toggle="tooltip" data-address-type="pickup_address" data-order-address-id="{{$doubleGoogleOrderData['order_address'][0]['id']}}" data-order-id="{{$doubleGoogleOrderData['id']}}" data-original-title="Edit" class="edit"><img class="edit-address" title="Edit" alt="Edit" style="cursor: pointer;" src="{{asset('assets/images/Edit - 16.png')}}" ></a>
                </label> </h4> 
                <p  style="margin: 0;" id="{{$doubleGoogleOrderData['order_address'][0]['id']}}">{{ $doubleGoogleOrderData['order_address'][0]['pickup_address'] }}</p>
            </div> 
        </div> 
    </div>
</div>
</div><!--span8-->

<div class="widgetbox box-inverse span12" style="margin-left: 0;">
    <h4 class="widgettitle title-inverse">Receiver Information</h4>
    <div class="widgetcontent">
    <div style="overflow-x:auto;">
        <div class="span12">
            {{-- <h4>{{ ucfirst($doubleGoogleOrderData['last_delivery_receiver_name']) }}</h4> --}}
            <label class="control-label">{{ ucfirst($doubleGoogleOrderData['last_delivery_receiver_name']) }}</label>

            {{-- <br> --}}
            {{-- <div class="span2">
                <label class="control-label">Date:</label>

                <p style="margin: 0;">{{ Carbon\Carbon::parse($doubleGoogleOrderData['order_address'][0]['delivery_date'])->format('d-m-Y') }}</p>
            </div> --}}
            {{-- <div class="span2">
                <label class="control-label">Time:</label>
                <p style="margin: 0;">{{ Carbon\Carbon::parse($doubleGoogleOrderData['order_address'][0]['delivery_time'])->format('h:m A') }}</p>
            </div> --}}
            <div class="span2">
                <label class="control-label"><b>Phone:</b></label>
                <p style="margin: 0;">{{ $doubleGoogleOrderData['order_address'][0]['delivery_phone'] }}</p>
            </div>
            <div class="span4">
                <label class="control-label"><b>Address:</b>
                    <a href="javascript:void(0)" data-toggle="tooltip" data-address-type="delivery_address" data-order-id="{{$doubleGoogleOrderData['id']}}" data-order-address-id="{{$doubleGoogleOrderData['order_address'][0]['id']}}" data-original-title="Edit" class="edit"><img class="edit-address" title="Edit" alt="Edit" style="cursor: pointer;" src="{{asset('assets/images/Edit - 16.png')}}" ></a>
                </label>
                <p  style="margin: 0;" id="{{$doubleGoogleOrderData['order_address'][0]['id']}}">{{ $doubleGoogleOrderData['order_address'][0]['delivery_address'] }}</p>
            </div>
        </div>
        
    </div>
</div>
</div><!--span8-->

<div class="widgetbox box-inverse span12" style="margin-left: 0;">
    <h4 class="widgettitle title-inverse">Item Information</h4>
    <div class="widgetcontent">
    <div style="overflow-x:auto;">
        <div class="span12">
            <div class="span2">
                <label class="control-label"><b>Types of item:</b></label>
                <p style="margin: 0;">{{rtrim($doubleGoogleOrderData['sending_item_name'], ',')}}</p>
            </div>
            <div class="span2">
                    <label class="control-label"><b>Ordered item:</b></label>
                    @foreach ( $doubleGoogleOrderData['double_google_order_items'] as $key => $value)
                    <p style="margin: 0;">{{ $value['item_name'].'('.$value['item_quantity'].')' }}</p>
                    @endforeach
            </div>

        </div>
    </div>
</div>
</div><!--span8-->

