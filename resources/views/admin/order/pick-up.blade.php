
                <div class="widgetbox box-inverse span12" style="margin-left: 0;">
                    <h4 class="widgettitle title-inverse">Sender Info</h4>
                    
                    <div class="widgetcontent">
                        <div style="overflow-x:auto;overflow: hidden;">
                            <div class="span12">
                                    <label class="control-label">{{ ucfirst($doubleGoogleOrderData['order_address'][0]['sender_name']) }}</label>
                                <div class="span2">
                                    <label class="control-label"><b>Date:</b></label>
                                    <p style="margin: 0;">{{ Carbon\Carbon::parse($doubleGoogleOrderData['order_address'][0]['pickup_date'])->format('d/m/Y') }}</p>
                                </div>
                                <div class="span2">
                                    <label class="control-label"><b>Time:</b></label>
                                    <p style="margin: 0;">{{ Carbon\Carbon::parse($doubleGoogleOrderData['order_address'][0]['pickup_time'])->format('h:i A') }}</p>
                                </div>
                                <div class="span2">
                                    <label class="control-label"><b>Phone:</b></label>
                                    <p style="margin: 0;">{{ $doubleGoogleOrderData['order_address'][0]['pickup_phone'] }}</p>
                                </div>
                                <div class="span2">
                                    <label class="control-label"><b>Address:</b>
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-address-type="pickup_address" data-order-id="{{$doubleGoogleOrderData['id']}}" data-order-address-id="{{$doubleGoogleOrderData['order_address'][0]['id']}}" data-original-title="Edit" class="edit"><img class="edit-address" title="Edit" alt="Edit" style="cursor: pointer;" src="{{asset('assets/images/Edit - 16.png')}}" ></a>
                                </label>
                                    <p style="margin: 0;" id="{{$doubleGoogleOrderData['order_address'][0]['id']}}">{{ $doubleGoogleOrderData['order_address'][0]['pickup_address'] }}</p>
                                </div>
                                <div class="span2">
                                    <label class="control-label"><b>Comments:</b></label>
                                    <p style="margin: 0;">{{ $doubleGoogleOrderData['order_address'][0]['pickup_comment'] }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!--span8-->

                @foreach ( $doubleGoogleOrderData['order_address'] as $key => $value)
                <div class="widgetbox box-inverse span12" style="margin-left: 0;">
                <h4 class="widgettitle">Receiver Info {{ $key+1 }}</h4>
                <div class="widgetcontent">
                <div style="overflow-x:auto;">
                    <div class="span12">
                        <label class="control-label">{{ ucfirst( $value['delivery_receiver_name']) }}</label>
                        <div class="span2">
                                    <label class="control-label"><b>Date:</b></label>
                                    <p style="margin: 0;">{{ Carbon\Carbon::parse($value['delivery_date'])->format('d/m/Y') }}</p>
                        </div>
                        <div class="span2">
                            <label class="control-label"><b>Time:</b></label>
                            <p style="margin: 0;">{{ Carbon\Carbon::parse($value['delivery_time'])->format('h:i A') }}</p>
                        </div>
                        <div class="span2">
                            <label class="control-label"><b>Phone:</b></label>
                            <p style="margin: 0;">{{ $value['delivery_phone'] }}</p>
                        </div>
                        <div class="span2">
                            <label class="control-label"><b>Address:</b>
                                <a href="javascript:void(0)" data-toggle="tooltip" data-address-type="delivery_address" data-order-address-id="{{$doubleGoogleOrderData['order_address'][$key]['id']}}" data-order-id="{{$doubleGoogleOrderData['id']}}" data-original-title="Edit" class="edit"><img class="edit-address" title="Edit" alt="Edit" style="cursor: pointer;" src="{{asset('assets/images/Edit - 16.png')}}" ></a>
                            </label>
                            <p style="margin: 0;" id="{{$doubleGoogleOrderData['order_address'][$key]['id']}}">{{ $value['delivery_address'] }}</p>
                        </div>
                        <div class="span2">
                            <label class="control-label"><b>Comments:</b></label>
                            <p style="margin: 0;">{{ $value['delivery_comment'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            </div><!--span8-->
            @endforeach
        {{-- </div> --}}

        <div class="widgetbox box-inverse span12" style="margin-left: 0;">
            <h4 class="widgettitle title-inverse">Item Information</h4>
            <div class="widgetcontent">
            <div style="overflow-x:auto;">
                <div class="span12">
                    <label class="control-label"></label>
                    <div class="span2">
                        <label class="control-label"><b>Total Kg:</b></label>
                        <p style="margin: 0;">{{ $doubleGoogleOrderData['order_type_name'] }}</p>
                    </div>
                    <div class="span2">
                        <label class="control-label"><b>Type of item:</b></label>
                        <p style="margin: 0;">{{ $doubleGoogleOrderData['sending_item_name'] }}</p>
                    </div>
                   <div class="span2">
                   <label class="control-label"><b>Parcel value:</b></label>
                   <p style="margin: 0;">&#8377 {{ $doubleGoogleOrderData['parcel_value'] }}</p>
                </div>
                </div>
            </div>
        </div>
        </div><!--span8-->
<div class="widgetbox box-inverse span12" style="margin-left: 0;">
    <div class="span6">

        <h4 class="widgettitle title-inverse">Pickup Photos</h4>
        <div class="widgetcontent">
            <div style="overflow-x:auto;overflow: hidden;">
                <label class="control-label"><b>Location:</b></label>
                <div class="span12">
                    @if($doubleGoogleOrderData['double_google_order_photo'] && $doubleGoogleOrderData['double_google_order_photo']['pickup_location_photo_url'])
                        <img src="{{$doubleGoogleOrderData['double_google_order_photo']['pickup_location_photo_url']}}" height="150" width="150" alt="">
                    @else
                        <p>Photo not available</p>
                    @endif
                </div> 
            </div>
            <div style="overflow-x:auto;overflow: hidden;">
                <label class="control-label"><b>Material:</b></label>
                <div class="span12">
                    @if($doubleGoogleOrderData['double_google_order_photo'] && $doubleGoogleOrderData['double_google_order_photo']['pickup_material_photo_url'])
                        <img src="{{$doubleGoogleOrderData['double_google_order_photo']['pickup_material_photo_url']}}" height="150" width="150" alt="">
                    @else
                        <p>Photo not available</p>
                    @endif
                </div> 
            </div>
            <div style="overflow-x:auto;overflow: hidden;">
                <label class="control-label"><b>Challan:</b></label>
                <div class="span12">
                    @if($doubleGoogleOrderData['double_google_order_photo'] && $doubleGoogleOrderData['double_google_order_photo']['pickup_challan_photo_url'])
                        <img src="{{$doubleGoogleOrderData['double_google_order_photo']['pickup_challan_photo_url']}}" height="150" width="150" alt="">
                    @else
                        <p>Photo not available</p>
                    @endif
                </div> 
            </div>
        </div>
    </div>

    <div class="span6">
        <h4 class="widgettitle title-inverse">Delivery Photos</h4>
        <div class="widgetcontent">
            <div style="overflow-x:auto;overflow: hidden;">
                <label class="control-label"><b>Location:</b></label>
                <div class="span12">
                    @if($doubleGoogleOrderData['double_google_order_photo'] && $doubleGoogleOrderData['double_google_order_photo']['delivered_location_photo_url'])
                        <img src="{{$doubleGoogleOrderData['double_google_order_photo']['delivered_location_photo_url']}}" height="150" width="150" alt="">
                    @else
                        <p>Photo not available</p>
                    @endif
                </div> 
            </div>
            <div style="overflow-x:auto;overflow: hidden;">
                <label class="control-label"><b>Material:</b></label>
                <div class="span12">
                    @if($doubleGoogleOrderData['double_google_order_photo'] && $doubleGoogleOrderData['double_google_order_photo']['delivered_material_photo_url'])
                        <img src="{{$doubleGoogleOrderData['double_google_order_photo']['delivered_material_photo_url']}}" height="150" width="150" alt="">
                    @else
                        <p>Photo not available</p>
                    @endif
                </div> 
            </div>
            <div style="overflow-x:auto;overflow: hidden;">
                <label class="control-label"><b>Challan:</b></label>
                <div class="span12">
                    @if($doubleGoogleOrderData['double_google_order_photo'] && $doubleGoogleOrderData['double_google_order_photo']['delivered_challan_photo_url'])
                        <img src="{{$doubleGoogleOrderData['double_google_order_photo']['delivered_challan_photo_url']}}" height="150" width="150" alt="">
                    @else
                        <p>Photo not available</p>
                    @endif
                </div> 
            </div>
        </div>
    </div>
</div>
        @if($doubleGoogleOrderData['driver'])
        <div class="widgetbox box-inverse span12" style="margin-left: 0;">
            <h4 class="widgettitle title-inverse">Driver details</h4>
            <div class="widgetcontent">
            <div style="overflow-x:auto;overflow: hidden;">
                 <div class="span12">
                    <label class="control-label">{{ ucfirst($doubleGoogleOrderData['driver']['name']) }}</label>
                    <div class="span2">
                        <label class="control-label"><b>Mobile:</b></label> 
                        <p  style="margin: 0;">{{ $doubleGoogleOrderData['driver']['phone'] }}</p>
                    </div> 
                    <div class="span2"></div>
        {{--             <div class="span2">
                        <label class="control-label"><b>Comments:</b></label>
                        <p style="margin: 0;">{{ $doubleGoogleOrderData['order_address'][0]['pickup_comment'] }}</p>
                    </div>--}}
                    </div> 
            </div>
        </div>
        @endif


