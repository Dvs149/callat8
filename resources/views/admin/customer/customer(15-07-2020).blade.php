@extends(Helpers::file_path("mainLayout"))
@section('dashboard-left')
<div id="dashboard-left" class="span8">
    <h4 class="widgettitle">{{$BreadCrumbPageHeader['table_name']}}</h4>
    <div class="widgetcontent">


      @if (session('message'))
        <div class="alert alert-success message alert-block">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong> {{ session('message') }}</strong>
        </div>
        @endif
        <div id="delete-msg" class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            <strong>Deleted Successfully</strong>
        </div>

    <div style="overflow-x:auto;">
      <table id="dyntable" class="table table-bordered overflow-auto responsive data-table" style="width: 100%">
        <colgroup>
          {{-- 0 --}}<col class="con1" width="5%" />
          {{-- 1 --}}<col class="con0" width="10%" />
          {{-- 2 --}}<col class="con0" width="25%" />
          {{-- 3 --}}<col class="con1" width="25%" />
          {{-- 4 --}}<col class="con0" width="25%" />
          {{-- 5 --}}<col class="con1" width="10%" />

        </colgroup>
        <thead>
          <tr>
            {{-- 0 --}}<th class="head0">id</th>
            {{-- 1 --}}<th class="head1">Status</th>
            {{-- 2 --}}<th class="head0">Sender Name</th>
            {{-- 3 --}}<th class="head1">Sender Email</th>
            {{-- 4 --}}<th class="head0">Sender Mobile</th>
            {{-- 5 --}}<th width="head1">Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    </div>
</div><!--span8-->
@endsection

@section('dashboard-right')
<div id="dashboard-right" class="span4">
    <div class="widgetbox">                        
      <div class="headtitle">
          <h4 class="widgettitle form-title">Add {{$BreadCrumbPageHeader['breadcrumb']}}</h4>
      </div>
      <div class="widgetcontent" id="from">
          
          <form action="{{url(Helpers::admin_url('customer'))}}" method="post" id="form" enctype="multipart/form-data">
           <!-- // CSRF token for securing form field from hacker-->
           {{ csrf_field() }}
           
             <input type="hidden" name="customer_id" id="customer_id" value="{{old('customer_id')}}">

          <label class="control-label">Status:<span style="color:red;">*</span></label>
          
         <div class="chatsearch">
            <select id="status" class="input-block-level" name="status">
              <option value="">- - - Select Status - - - </option>
              <option value="Y" {{ old('status')=='Y' ? 'selected' : '' }}>Active</option>
                      <option value="N" {{  old('status')=='N' ? 'selected' : '' }}>Inactive</option>
            </select>
          </div>

         <label class="control-label">created_on:<span style="color:red;">*</span></label>
          <div class="chatsearch">
          {{-- <input type="text" id="created_on" name="created_on" class="input-block-level" placeholder="Name" value="{{old("created_on")}}" /> --}}
          <select id="created_on" class="input-block-level" name="created_on">
            <option value="">- - - Select Status - - - </option>
            <option value="web" {{ old('status')=='web' ? 'selected' : '' }}>Web</option>
                    <option value="app" {{  old('status')=='app' ? 'selected' : '' }}>App</option>
          </select>
           @if ($errors->has('created_on'))
           <span id="created_on-error" class="error">The fiels may not be greater than 25 characters.</span>
            @endif 
         </div>

         <label class="control-label">Name:<span style="color:red;">*</span></label>
          <div class="chatsearch">
          <input type="text" id="sender_name" name="sender_name" class="input-block-level" placeholder="Name" value="{{old("sender_name")}}" />
           @if ($errors->has('sender_name'))
           <span id="sender_name-error" class="error">The fiels may not be greater than 25 characters.</span>
            @endif 
         </div>

         <label class="control-label">Email Id:<span style="color:red;">*</span></label>
          <div class="chatsearch">
          <input type="text" id="sender_email" name="sender_email" class="input-block-level" placeholder="Email" value="{{old("sender_email")}}" />
           @if ($errors->has('sender_email'))
           <span id="sender_email-error" class="error">The fiels may not be greater than 25 characters.</span>
            @endif 
         </div>

          <label class="control-label">Sender Mobile:<span style="color:red;">*</span></label>
          <div class="chatsearch">
          <input type="text" id="sender_mobile" pattern="[0-9]{10}" name="sender_mobile" class="input-block-level" placeholder="Sender Mobile" value="{{old("sender_mobile")}}" />
           @if ($errors->has('sender_mobile'))
           <span id="sender_mobile-error" class="error"></span>
            @endif 
         </div>

         <label class="control-label">Sender Address 1:<span style="color:red;">*</span></label>
         <div class="chatsearch">
         <input type="text" id="sender_address_1" name="sender_address_1" class="input-block-level" placeholder="Address 1" value="{{old("sender_address_1")}}" />
          @if ($errors->has('sender_address_1'))
          <span id="sender_address_1-error" class="error"></span>
           @endif 
        </div>

        <label class="control-label">Sender Address 2:</label>
         <div class="chatsearch">
         <input type="text" id="sender_address_2" name="sender_address_2" class="input-block-level" placeholder="Address 2" value="{{old("sender_address_2")}}" />
          @if ($errors->has('sender_address_2'))
          <span id="sender_address_2-error" class="error"></span>
           @endif 
        </div>

        <label class="control-label">Sender Address 3:</label>
         <div class="chatsearch">
         <input type="text" id="sender_address_3" name="sender_address_3" class="input-block-level" placeholder="Address 3" value="{{old("sender_address_3")}}" />
          @if ($errors->has('sender_address_3'))
          <span id="sender_address_3-error" class="error"></span>
           @endif 
        </div>
        
        {{-- <label class="control-label">Sender City:</label>
        <div class="chatsearch">
        <input type="text" id="sender_city" name="sender_city" class="input-block-level" placeholder="City" value="{{old("sender_city")}}" />
          @if ($errors->has('sender_city'))
          <span id="sender_city-error" class="error"></span>
           @endif 
        </div> --}}

        <label class="control-label">Sender City:</label>
          <div class="chatsearch">
            <select id="sender_city" class="input-block-level" name="sender_city">
              <option value="">- - - Select Status - - - </option>
              @foreach($cities as $city)
                          <option value="{{ $city->id }}" >{{ $city->city_name }}</option>
              @endforeach
            </select>
          </div>
        
        <label class="control-label">Sender Latitude:</label>
        <div class="chatsearch">
        <input type="text" id="sender_latitude" name="sender_latitude" class="input-block-level" placeholder="Sender Latitude" value="{{old("sender_latitude")}}" />
          @if ($errors->has('sender_latitude'))
          <span id="sender_latitude-error" class="error"></span>
           @endif 
        </div>

        <label class="control-label">Sender Longitute:</label>
        <div class="chatsearch">
        <input type="text" id="sender_longitute" name="sender_longitute" class="input-block-level" placeholder="Sender Longitute" value="{{old("sender_longitute")}}" />
          @if ($errors->has('sender_longitute'))
          <span id="sender_longitute-error" class="error"></span>
           @endif 
        </div>

        <label class="control-label">Password:</label>
        <div class="chatsearch">
        <input type="password" id="password" name="password" class="input-block-level" placeholder="Password" value="" />
          @if ($errors->has('password'))
          <span id="password-error" class="error"></span>
           @endif 
        </div>

       <div class="chatsearch" style="margin-top: 10px;" >
        <span class="field">
          <input type="reset" id="reset" class="btn" value="Reset" >
          <input type="submit" id="submit"  name="submit" class="btn btn-primary" value="Submit">
          
        </span>
      </div>
    </form>
</div><!--widgetcontent-->
@endsection

@section('script')
<script type="text/javascript">
   jQuery(document).ready( function ($) {
    $('#delete-msg').hide();

    $('#dyntable').DataTable({
      // "pageLength": 50,
        
    //  processing: false,
    //  serverSide: true,
     ajax: "{{url(Helpers::admin_url('customer'))}}",
     //------------------------------------------------------
     //----------------------------------------
     columns: [
        { data: 'id', name: 'id' , visible:false},
               { data: 'status', name: 'status'},
               { data: 'sender_name', name: 'sender_name' },
               { data: 'sender_email', name: 'sender_email' },
               { data: 'sender_mobile', name: 'sender_mobile' },
               {data: 'action', name: 'action', orderable: false, searchable: false},
              ],
            "columnDefs": [{
                "targets": 1,   // choose the correct column
                "render": function ( data, type, full,meta ) {
                    if(data=='Y') {
                        return '<span style="text-align:center"><img src="{{asset('assets/images/active-16.png')}}"/></span>';
                    }
                    return '<span style="text-align:center" ><img src="{{asset('assets/images/inactive-16.png')}}"/></span>';
                }
                }
            ],
      
        "order": [[ 0, "dsc" ]]

    });

    //on reset change value of update to submit
    jQuery('#reset').on('click',function(e){
                  e.preventDefault();
                  reset();
    });

    $('#add_data').on('click',function(e){
                e.preventDefault();
                reset();
    });
    function reset(){

        $(".message").hide();
        $('#delete-msg').hide();
        $('span.error').hide();
        jQuery('.highlight').removeClass('highlight');
        $( ".form-title" ).text( "Add {{$BreadCrumbPageHeader['breadcrumb']}}" );


        //it clear all the input field of form
        $('.input-block-level').val('');
        $('#submit').val("Submit");
        $('#submit').attr('name',"submit");
        $('#customer_id').val('');
    }

    $('#dyntable').on('click', 'tr', function () {
      $(".message").remove();
      $('span.error').hide();
      $( ".form-title" ).text( "Edit  {{$BreadCrumbPageHeader['breadcrumb']}}" );

      var id=($(this).closest('tr').attr('id')).slice(4);
      var customer_id =  id;
      // console.log(customer_id);
      //$("#form").append("<span class='update-method'><input type='hidden' name='_method' value='PUT'></span>");
      //var formAction="{{url(Helpers::admin_url('category/'))}}/"+ customer_id;
      //$("#form").attr("action", formAction);
      //it shows @ method('POST') which means in laravel it is used for updation using resource controller so we need to show it
      
            
              if(customer_id){
                $.ajax({
                 type:"GET",
                 url:'{{url(Helpers::admin_url('customer'))}}/' + customer_id +'/edit',
                 dataType: "json",
                 success:function(res){               
                    if(res){
                      $('#customer_id').val(res.id);
                      $('#status').val(res.status);
                      $('#created_on').val(res.created_on);
                      $('#sender_name').val(res.sender_name);
                      $('#sender_email').val(res.sender_email);
                      $('#sender_mobile').val(res.sender_mobile);
                      $('#sender_address_1').val(res.sender_address_1);
                      $('#sender_address_2').val(res.sender_address_2);
                      $('#sender_address_3').val(res.sender_address_3);
                      $('#sender_city').val(res.sender_city);
                      $('#sender_longitute').val(res.sender_longitute);
                      $('#sender_latitude').val(res.sender_latitude);
                      $('#password',).val();

                      //on reset change value of submit to update
                      $('#submit').val("Update");
                      $("#submit").attr('name','update');

                    };
                  }  
                });
              }

          // // //select current row for edit
           jQuery('.highlight').removeClass('highlight');
           jQuery(this).addClass('highlight');   
      });
    //dellete specific banner
    $('body').on('click', '#delete-user', function (e) {
            e.stopPropagation();

            $(".message").hide();
            
              
              var customer_id = $(this).data("id");
                //var permissio_for_deletion=confirm("Are You sure want to delete !");
              var permissio_for_deletion;
              jConfirm('Are You sure want to delete !', 'Delete Product',function(r) {
                          if(r)
                          {
                            $.ajax({
                              type: "get",
                              url:'{{url(Helpers::admin_url("customer"))}}/delete/' + customer_id,
                              success: function (data) {
 
                                $( "#add_data" ).trigger( "click" );
                                jQuery('#delete-msg').show();

                                var d_Table = $('#dyntable').dataTable(); 
                                d_Table.api().ajax.reload();
                                /* var oTable = $('#dyntable').dataTable(); 
                                oTable.fnDraw(false); */
                              },
                              error: function (data) {
                                // console.log('Error:', data);
                              }
                            });  
                          }
                          else{
                            // $('#delete-msg').hide();
                          }
                        });
          });

    $('#form').validate({ // initialize the plugin
        errorElement: "span",
        rules: {
          status:{
                required: true,
            },
            created_on:{
                required: true,
            },
            sender_name:{
                required: true,
            },
            sender_email:{
                required: true,
            },
            sender_mobile:{
                required: true,
            },
            sender_address_1:{
                required: true,
            },
        },
      });
   });

</script>
@endsection