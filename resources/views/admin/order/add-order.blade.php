@extends(Helpers::file_path("mainLayout"))
@section('dashboard-left')

<div id="dashboard-right" class="span6">
    <div class="widgetbox">                        
        <div class="headtitle">
            <h4 class="widgettitle form-title">{{$BreadCrumbPageHeader['breadcrumb']}}</h4>
        </div>
        <div class="widgetcontent " id="from">
             <form action="{{url(Helpers::admin_url('order/create'))}}" method="post" id="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <label class="control-label">Order type:<span style="color:red;">*</span></label>
                <div class="chatsearch">
                <select id="order_type" class="input-block-level" name="order_type">
                    <option value="">- - - Select Order Type - - - </option>
                    <option value="Pick up" {{ old('order_type')=='Pick up' ? 'selected' : '' }}>Send Package</option>
                    <option value="Restaurant" {{ old('order_type')=='Restaurant' ? 'selected' : '' }}>Order Food</option>
                    <option value="Store" {{ old('order_type')=='Store' ? 'selected' : '' }}>Order Grocery</option>
                    <option value="Vegetable" {{ old('order_type')=='Vegetable' ? 'selected' : '' }}>Order Vegetables</option>
                    <option value="Anything else" {{ old('order_type')=='Anything else' ? 'selected' : '' }}>Anything else</option>
                    {{-- <option value="Groceries" {{ old('order_type')=='Groceries' ? 'selected' : '' }}>Order Grocery</option> --}}
                </select>
                </div>
                {{-- <input type="submit" name="submit" class="btn btn-primary"></input> --}}
             </form>
            
        </div><!--widgetcontent-->
    </div><!--row-fluid-->
</div>
@endsection


@section('dashboard-right')
@endsection

@section('script')
<script type="text/javascript">
   jQuery(document).ready( function ($) {
    $(document).on('change','#order_type',function() {
        $('#form').submit();
    }); 

    $('#form').validate({ // initialize the plugin
        errorElement: "span",
        
        rules: {
            order_type:{
                required: true,
            },
        },
      });
    });

</script>
@endsection