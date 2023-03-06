@extends("layout.frontend-default-layout")
@section('style')
     <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="
     stylesheet">
     <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" rel="
     stylesheet">
@endsection
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 inner_section">
     <form action="{{ route('order_create') }}">
          {{ csrf_field() }}
          <div class="row">
               <div class="container">
                    <h2>Delivery Order</h2>
                    <div class="row">
                         <div class="col-xs-12 col-sm-12 col-md-12 wow fadeInRight">
                              <div class="ordertype">
                                   <h3>New Order Type</h3>
                                   <?php 
                                        if( !empty($data['order_type']) ) {
                                             foreach ($data['order_type'] as $key => $value) {
                                                  ?>
                                                  <label class="radiobtn">{{ $value['name'] }} 
                                                       @if($key==0)
                                                            <input type="radio" name="order_type_id" checked="checked" value="{{ $value['id'] }}">
                                                       @else
                                                            <input type="radio" name="order_type_id" value="{{ $value['id'] }}">
                                                       @endif     

                                                       <span class="checkmark"></span>
                                                  </label>
                                                  <?php
                                             }
                                        }
                                   ?>
                              </div>
                              <div class="pickupbox">
                                   <h3><span>1</span> Pickup Point</h3>
                                   <div class="form-group">
                                        <textarea name="pickup_address" cols="40" rows="2" class="form-control" placeholder="Address"></textarea>
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-4">
                                             <input name="pickup_phone" type="text" class="form-control" placeholder="Phone Number">
                                        </div>
                                        <div class="form-group col-md-4">
                                             <input name="pickup_date" type="text" class="form-control datetimepicker" placeholder="Today">
                                        </div>
                                        <div class="form-group col-md-4">
                                             <input name="pickup_time" type="text" class="form-control timepicker" placeholder="At any time">
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <textarea name="pickup_comment" cols="40" rows="4" class="form-control" placeholder="Comment..."></textarea>
                                   </div>                
                              </div>
                              <div class="pickupbox">
                                   <h3><span>2</span> Delivery Point</h3>    
                                   <div class="dilivery-point-added-div">
                                        <div class="form-group">
                                             <textarea name="delivery[0][delivery_address]" cols="40" rows="2" class="form-control" placeholder="Address"></textarea>
                                        </div>
                                        <div class="form-row">
                                             <div class="form-group col-md-3">
                                                  <input name="delivery[0][delivery_phone]" type="text" class="form-control" placeholder="Phone Number">
                                             </div>
                                             <div class="form-group col-md-3">
                                                  <input name="delivery[0][delivery_date]" type="text" class="form-control datetimepicker" placeholder="Today">
                                             </div>
                                             <div class="form-group col-md-3">
                                                  <input name="delivery[0][delivery_time]" type="text" class="form-control timepicker" placeholder="till 13.30pm">
                                             </div>
                                             <div class="form-group col-md-3">
                                                  <input name="delivery[0][pickup_distance]" type="hidden" value="0"  class="form-control" placeholder="">
                                                  <input name="delivery[0][dilivery_distance]" type="text" value=""  class="form-control" placeholder="">
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <textarea name="delivery[0][delivery_comment]" cols="40" rows="4" class="form-control" placeholder="Comment..."></textarea>
                                        </div>
                                   </div>            
                                   <a href="javascript:void(0)" class="link add-delivery-points"><i class="mdi mdi-plus-circle-outline "></i> Add Delivery Point</a>         
                              </div>
                              <div class="pickupbox">
                                   <h3>What are you sending?</h3>
                                   <div class="form-group">
                                        <input name="parcel_value" type="text" class="form-control" placeholder="Parcel Value">
                                   </div>
                                   <div class="form-row">
                                        <div class="form-group col-md-10">
                                             <input name="promo_code" type="text" class="form-control" placeholder="Promocode">
                                        </div>
                                        <div class="form-group col-md-2">
                                             <input type="submit" value="APPLY" class="btn-primary">
                                        </div>
                                   </div>
                                   <?php /*
                                   <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Phone Number">
                                   </div>
                                   */ ?>
                                   <div class="form-row ordertype">
                                        <label class="radiobtn">Notify me by SMS <input type="radio" name="notify_me_by_sms" value="Yes"><span class="checkmark"></span></label>
                                        <label class="radiobtn">Notify recipients by SMS <input type="radio" name="notify_recipients_by_sms" value="Yes"><span class="checkmark"></span></label>
                                   </div>
                                   <div class="cashcheck">
                                        <label class="radiobtn">Cash <input type="checkbox" name="payment_type" checked="checked" value="cash"><span class="checkmark"></span></label>
                                   </div>            
                                   <div class="form-row freedelivery">
                                        <div class="form-group col-md-3">
                                             <p>Sending Item</p>
                                             <i class="mdi mdi-currency-inr"></i> 
                                             <select name="sending_item_id" id="sending_item_id" class="form-control">
                                                  <?php 
                                                       if( !empty($data['sending_item']) ) {
                                                            foreach ($data['sending_item'] as $key => $value) {
                                                                 ?>
                                                                 <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                                                 <?php
                                                            }
                                                       }
                                                  ?>
                                             </select>
                                        </div>
                                   </div>              
                                   <div class="form-row freedelivery">
                                        <div class="form-group col-md-2">
                                             <p>Delivery Free</p>
                                             <i class="mdi mdi-currency-inr"></i> 
                                             <select name="delivery_fee" id="delivery_fee" style="width: 76%;" class="form-control">
                                                  <option selected>75</option>
                                                  <option>60</option>
                                                  <option>50</option>
                                                  <option>40</option> 
                                                  <option>30</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                             <input type="submit" value="CREATE ORDER" class="btn-primary">
                                        </div>
                                   </div>              
                              </div>
                              <!--<p>Delivery Free</p>
                              <a href="#" class="button">CREATE ORDER</a>-->
                         </div>
                    </div>
               </div>
          </div>
     </form>
</div>
<div id="add_hidden_delivery_div" style="display: none;">
     <div class="form-group">
          <textarea name="delivery[##TIME##][delivery_address]" cols="40" rows="2" class="form-control" placeholder="Address"></textarea>
     </div>
     <div class="form-row">
          <div class="form-group col-md-3">
               <input name="delivery[##TIME##][delivery_phone]" type="text" class="form-control" placeholder="Phone Number">
          </div>
          <div class="form-group col-md-3">
               <input name="delivery[##TIME##][delivery_date]" type="text" class="form-control datetimepicker" placeholder="Today">
          </div>
          <div class="form-group col-md-3">
               <input name="delivery[##TIME##][delivery_time]" type="text" class="form-control timepicker" placeholder="till 13.30pm">
          </div>
          <div class="form-group col-md-3">
               <input name="delivery[##TIME##][pickup_distance]" type="hidden" value="0"  class="form-control" placeholder="">
               <input name="delivery[##TIME##][dilivery_distance]" type="text" value=""  class="form-control" placeholder="">
          </div>
     </div>
     <div class="form-group">
          <textarea name="delivery[##TIME##][delivery_comment]" cols="40" rows="4" class="form-control" placeholder="Comment..."></textarea>
     </div>
</div>
@endsection
@section('script')
{{-- {!! JsValidator::formRequest('App\Http\Requests\OrderControllerRequest') !!} --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js" type="text/javascript"></script> 

<script type="text/javascript">
     $(document).on('click','.add-delivery-points',function(){
          var $time = $.now();
          $('.dilivery-point-added-div').append( $('#add_hidden_delivery_div').html().replace(/##TIME##/g, $time) );
          $('.datetimepicker').datepicker({
               format: 'dd/mm/yyyy'
          });
          $('.timepicker').timepicker({});
     });
     $(document).ready(function(){
          $('.datetimepicker').datepicker({
               format: 'dd/mm/yyyy'
          });
           $('.timepicker').timepicker({});
     });
</script>
@endsection
