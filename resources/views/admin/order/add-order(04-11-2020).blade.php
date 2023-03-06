@extends(Helpers::file_path("mainLayout"))
@section('dashboard-left')

<div id="dashboard-right" class="span12">
    <div class="widgetbox">                        
      <div class="headtitle">
          <h4 class="widgettitle form-title">{{$BreadCrumbPageHeader['breadcrumb']}}</h4>
      </div>
      <div class="widgetcontent" id="from">
          
          <form action="{{url(Helpers::admin_url('driver'))}}" method="post" id="form" enctype="multipart/form-data">
           <!-- // CSRF token for securing form field from hacker-->
           {{ csrf_field() }}
           
             <input type="hidden" name="driver_id" id="driver_id" value="{{old('driver_id')}}">

             <label class="control-label">Status:<span style="color:red;">*</span></label>
             <div class="chatsearch">
                <select id="status" class="input-block-level " name="status">
                  <option value="">- - - Select Status - - - </option>
                  <option value="Y" {{ old('status')=='Y' ? 'selected' : '' }}>Active</option>
                  <option value="N" {{ old('status')=='N' ? 'selected' : '' }}>Inactive</option>
                </select>
              </div>

            <label class="control-label">Name:<span style="color:red;">*</span></label>
            <div class="chatsearch">
              <input type="text" id="name" name="name" class="input-block-level  float" placeholder="Name" value="{{old('name')}}{{-- {{isset($banner->id)?$banner->name:old('name')}} --}}" />
              @if ($errors->has('name'))
              <span id="bnr_short_description_editor-error" class="error">{{ $errors->first('name') }}</span>
                @endif 
            </div>


     

  
    </form>
</div><!--widgetcontent-->
</div><!--row-fluid-->
<div class="widgetbox ">
                <h4 class="widgettitle">Add Order</h4>
                <div class="widgetcontent nopadding">
                    <form class="stdform stdform2" method="post" action="{{url(Helpers::admin_url('order/create'))}}">
                            <p>
                                <label>New order type</label>
                                 <span class="field"><select name="selection" id="selection2" class="uniformselect">
                                    <option value="">Choose One</option>
                                    <option value="1">Up to 1 kg</option>
                                    <option value="2">Up to 1 kg</option>
                                    <option value="3">Up to 1 kg</option>
                                    <option value="4">Up to 1 kg</option>
                                </select>
                            </p>
                            <h2>Pickup point</h2>

                                <label>Sender Name</label>
                                <span class="field"><input type="text" name="sender_name" id="sender_name" class="input-xxlarge"></span>

                                <label>Address</label>
                                <span class="field"><textarea cols="80" rows="5" name="pickup_address" id="pickup_address" class="span5"></textarea></span>

                                <label>Phone number</label>
                                <span class="field"><input type="text" name="pickup_phone" id="pickup_phone" class="input-xxlarge"></span>

                                <label>Date</label>
                                <span class="field"><input type="text" name="pickup_date" id="pickup_date" class="input-xxlarge"></span>
                                <label>Select</label>
                                <span class="field"><select name="selection" id="selection2" class="uniformselect">
                                    <option value="">Choose One</option>
                                    <option value="1">Selection One</option>
                                    <option value="2">Selection Two</option>
                                    <option value="3">Selection Three</option>
                                    <option value="4">Selection Four</option>
                                </select></span>
                            <div class="par">
                              <label>Date Picker</label>
                              <span class="field"><input id="datepicker" type="text" name="date" class="input-small hasDatepicker"></span>
                          </div>

                                                    
                                <button class="btn btn-primary">Submit Button</button>
                                <button type="reset" class="btn">Reset Button</button>
                    </form>
                </div><!--widgetcontent-->
            </div>
</div>

@endsection


@section('dashboard-right')
@endsection

@section('script')
<script type="text/javascript">
   jQuery(document).ready( function ($) {
    $('#status-msg').hide();
    $('#update-loader').hide();
    var theNum = 0;
      $('#datepicker').datepicker();
    });

</script>
@endsection