<div class="widgetbox box-inverse span12" style="margin-left: 0;">
    <h4 class="widgettitle title-inverse">Order number #{{ $doubleGoogleOrderData['order_number'] }} {{-- <span class="pull-right">Order type: {{ ($doubleGoogleOrderData['order_type']=='Pick up' ? ucfirst($doubleGoogleOrderData['order_type']) : ucfirst($doubleGoogleOrderData['store']['type'] )) }}</span> --}}</h4>
    <div class="widgetcontent">
    <div style="overflow-x:auto;">
        <div class="span6" >
            <h4>Sender Info</h4>
            <h3>{{ $doubleGoogleOrderData['order_address'][0]['sender_name'] }}</h3><br>
            <div class="span5">
                <h4>Date</h4>
                {{-- <label class="control-label">Date:</label> --}}
                <p style="margin: 0;">{{ Carbon\Carbon::parse($doubleGoogleOrderData['order_address'][0]['pickup_date'])->format('d-m-Y') }}</p>
            </div>
            <div class="span5">
                <h4>Time</h4>
                <h5>{{ Carbon\Carbon::parse($doubleGoogleOrderData['order_address'][0]['pickup_time'])->format('h:m A') }}</h5>
            </div><br><br><br>
            <div class="span5">
                <h4>Phone</h4>
                <h5>{{ $doubleGoogleOrderData['order_address'][0]['pickup_phone'] }}</h5>
            </div>
            <div class="span5">
                <h4>Address
                    <a href="javascript:void(0)" data-toggle="tooltip" data-address-type="pickup_address" data-order-address-id="{{$doubleGoogleOrderData['order_address'][0]['id']}}" data-order-id="{{$doubleGoogleOrderData['id']}}" data-original-title="Edit" class="edit"><img class="edit-address" title="Edit" alt="Edit" style="cursor: pointer;" src="{{asset('assets/images/Edit - 16.png')}}" ></a>
                </h4>
                <h5 id="{{$doubleGoogleOrderData['order_address'][0]['id']}}">{{ $doubleGoogleOrderData['order_address'][0]['pickup_address'] }}</h5>
            </div>
        </div>
        <div class="span6">
            <h4>Receiver Info</h4>
            <h3>{{ $doubleGoogleOrderData['last_delivery_receiver_name'] }}</h3>
            <br>
            <div class="span5">
                <h4>Date</h4>
                <h5>{{ Carbon\Carbon::parse($doubleGoogleOrderData['order_address'][0]['delivery_date'])->format('d-m-Y') }}</h5>
            </div>
            <div class="span5">
                <h4>Time</h4>
                <h5>{{ Carbon\Carbon::parse($doubleGoogleOrderData['order_address'][0]['delivery_time'])->format('h:m A') }}</h5>
            </div><br><br><br>
            <div class="span5">
                <h4>Phone</h4>
                <h5>{{ $doubleGoogleOrderData['order_address'][0]['delivery_phone'] }}</h5>
            </div>
            <div class="span5">
                <h4>Address
                    <a href="javascript:void(0)" data-toggle="tooltip" data-address-type="delivery_address" data-order-id="{{$doubleGoogleOrderData['id']}}" data-order-address-id="{{$doubleGoogleOrderData['order_address'][0]['id']}}" data-original-title="Edit" class="edit"><img class="edit-address" title="Edit" alt="Edit" style="cursor: pointer;" src="{{asset('assets/images/Edit - 16.png')}}" ></a>
                </h4>
                <h5 id="{{$doubleGoogleOrderData['order_address'][0]['id']}}">{{ $doubleGoogleOrderData['order_address'][0]['delivery_address'] }}</h5>
            </div>
        </div>
        
    </div>
</div>
</div><!--span8-->