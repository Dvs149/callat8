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
                <strong id="msg-remark">Deleted Successfully</strong>
            </div>

        <div style="overflow-x:auto;">

      <table id="dyntable" class="table table-bordered responsive data-table" style="width: 100%">
        <colgroup>
          {{-- 0 --}}<col class="con1" width="10%" />
          {{-- 1 --}}<col class="con0" width="20%" />
          {{-- 1 --}}<col class="con0" width="20%" />
          {{-- 1 --}}<col class="con0" width="20%" />
          {{-- 1 --}}<col class="con0" width="5%" />
          {{-- 1 --}}<col class="con0" width="15%" />
          {{-- 1 --}}<col class="con0" width="10%" />
        </colgroup>
        <thead>
          <tr>
                        <th>id</th>
            {{-- 0 --}}<th class="head1">Status</th>
            {{-- 0 --}}<th class="head1">Name</th>
            {{-- 0 --}}<th class="head1">Driver</th>
            {{-- 0 --}}<th class="head1">Comments</th>
            {{-- 0 --}}<th class="head1">Ratings</th>
            {{-- 0 --}}<th class="head1">Order ID</th>
            {{-- 0 --}}<th class="head1">Submitted Date</th>
            {{-- 1 --}}<th width="head0">Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    </div>
</div><!--span8-->
  
      {{-- Filter modal ends here --}}
@endsection
@section('dashboard-right')
<div id="dashboard-right" class="span4">
    <div class="widgetbox">                        
      <div class="headtitle">
          <h4 class="widgettitle form-title">Add {{$BreadCrumbPageHeader['breadcrumb']}}</h4>
      </div>
      <div class="widgetcontent" id="from">
          
          <form action="{{url(Helpers::admin_url('review'))}}" method="post" id="form" enctype="multipart/form-data">
           <!-- // CSRF token for securing form field from hacker-->
           {{ csrf_field() }}
           
             <input type="hidden" name="review_id" id="review_id" value="{{old('review_id')}}">

              <label class="control-label">Status:<span style="color:red;">*</span></label>
             <div class="chatsearch">
              <select id="status" class="input-block-level" name="status">
                <option value="">- - - Select Status - - - </option>
                <option value="Y" {{ old('status')=='Y' ? 'selected' : '' }}>Active</option>
                <option value="N" {{ old('status')=='N' ? 'selected' : '' }}>Inactive</option>
              </select>
            </div>

            <label class="control-label">Customer:<span style="color:red;">*</span></label>
             <div class="chatsearch">
               <select id="user_id" class="input-block-level" name="user_id">
                        <option value="" >Select Customer</option>
               @foreach($user_list as $user)
                            <option value="{{ $user->id }}" {{ old('user_id')== $user->id ? 'selected' : '' }}>{{ $user->sender_name }}</option>
                @endforeach 
              </select>
            </div>

            <label class="control-label">Driver:<span style="color:red;">*</span></label>
             <div class="chatsearch">
               <select id="driver_id" class="input-block-level" name="driver_id">
                        <option value="" >Select Driver</option>
                 @foreach($driver_list as $driver)
                            <option value="{{ $driver->id }}" {{ old('driver_id')== $driver->id ? 'selected' : '' }}>{{ $driver->name }}</option>
                @endforeach
              </select>
            </div>
            <label class="control-label">Order Number:<span style="color:red;">*</span></label>
             <div class="chatsearch">
              <input type="hidden" id="double_google_order_id" name="double_google_order_id" class="input-block-level" value="{{old('double_google_order_id')}}{{-- {{isset($banner->id)?$banner->name:old('name')}} --}}" />
              <input type="text" id="order_number" name="order_number" class="input-block-level" placeholder="Order Number" value="{{old('order_number')}}{{-- {{isset($banner->id)?$banner->name:old('name')}} --}}" />
            </div>
            <label class="control-label">Rate:<span style="color:red;">*</span></label>
             <div class="chatsearch">
               <select id="rate" class="input-block-level" name="rate">
                <option value="">- - - Select Status - - - </option>
                <option value="0.0" {{ old('rate')=='0.0' ? 'selected' : '' }}>0.0</option>
                <option value="0.5" {{ old('rate')=='0.5' ? 'selected' : '' }}>0.5</option>
                <option value="1.0" {{ old('rate')=='1.0' ? 'selected' : '' }}>1.0</option>
                <option value="1.5" {{ old('rate')=='1.5' ? 'selected' : '' }}>1.5</option>
                <option value="2.0" {{ old('rate')=='2.0' ? 'selected' : '' }}>2.0</option>
                <option value="2.5" {{ old('rate')=='2.5' ? 'selected' : '' }}>2.5</option>
                <option value="3.0" {{ old('rate')=='3.0' ? 'selected' : '' }}>3.0</option>
                <option value="3.5" {{ old('rate')=='3.5' ? 'selected' : '' }}>3.5</option>
                <option value="4.0" {{ old('rate')=='4.0' ? 'selected' : '' }}>4.0</option>
                <option value="4.5" {{ old('rate')=='4.5' ? 'selected' : '' }}>4.5</option>
                <option value="5.0" {{ old('rate')=='5.0' ? 'selected' : '' }}>5.0</option>
              </select>
            </div>

            <label class="control-label">Message:<span style="color:red;">*</span></label>
             <div class="chatsearch">
              <input type="text" id="comments" name="comments" class="input-block-level" placeholder="Comments" value="{{old('comments')}}{{-- {{isset($banner->id)?$banner->name:old('name')}} --}}" />
              @if ($errors->has('comments'))
              <span id="comments-error" class="error">{{-- {{ $errors->first('user_name') }} --}}</span>
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
  </div><!--row-fluid-->
</div><!--maincontentinner-->
@endsection


@section('script')
<script type="text/javascript">

    jQuery(document).ready( function ($) {
    
    // $('#aadhar_card_photo').hide();
    $('#delete-msg').hide();
    // $('#show_aadhar_card_photo').hide();
    
    $('#add_data').on('click',function(e){
                e.preventDefault();
                reset();
    });
    
//when user click particular row it will fetch data from server and give to the front end inside form, for editing
$('#dyntable').on('click', 'tr', function () {
      $(".message").remove();
      $('span.error').hide();
      $( ".form-title" ).text( "Edit {{$BreadCrumbPageHeader['breadcrumb']}}" );



      var id=($(this).closest('tr').attr('id')).slice(4);
      var review_id =  id;
      
      console.log(id);
      //$("#form").append("<span class='update-method'><input type='hidden' name='_method' value='PUT'></span>");
      //var formAction="{{url(Helpers::admin_url('driver/'))}}/"+ review_id;
      //$("#form").attr("action", formAction);
      //it shows @ method('POST') which means in laravel it is used for updation using resource controller so we need to show it
      
            
              if(review_id){
                $.ajax({
                 type:"GET",
                 url:'{{url(Helpers::admin_url('review'))}}/' + review_id +'/edit',
                 dataType: "json",
                 success:function(res){               
                    if(res){
                      // console.log(res);
                      $('#review_id').val(res.id);
                      $('#status').val(res.status);
                      $('#comments').val(res.comments);
                      $('#rate').val(res.rate);
                      $('#user_id').val(res.customer.id);
                      $('#driver_id').val(res.driver.id);
                      $('#order_number').val(res.double_google_order.order_number);
                      $('#double_google_order_id').val(res.double_google_order.id);
                      
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

       //to load the image after selection
     function readURL(input,input_id) {
      //  console.log(input_id);

      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#show_'+input_id).show();
          $('#delete_image_'+input_id).show();

          $('#show_'+input_id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    function  delete_image(input){
        $('#delete_image_'+input).hide();
        $('#'+input).val('');
        $('#show_'+input).hide();
        $('#'+input).show();
        $('#delete_img_'+input).attr('value','');
      }

     $('#dyntable').DataTable({
      // "pageLength": 50,
        
    //  processing: false,
    //  serverSide: true,
     ajax: "{{url(Helpers::admin_url('review'))}}",
     //----------------------------------------
     columns: [
               { data: 'id', name: 'id' , visible:false },
               { data: 'status', name: 'status'},
               { data: 'customer.sender_name', name: 'customer.sender_name'},
               { data: 'driver.name', name: 'driver.name'},
               { data: 'comments', name: 'comments'},
               { data: 'rate', name: 'rate'},
               { data: 'double_google_order.order_number', name: 'double_google_order.order_number'},
               { data: 'created_date', name: 'created_date'},
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
                  },
                  {
                    "targets": 3,   // choose the correct column
                    "render": function ( data, type, full,meta ) {
                          if(data) {
                              return data;
                        }
                        return '';
                      }
                  },
                  {
                    "targets": 7,   // choose the correct column
                    "render": function ( data, type, full,meta ) {
                      console.log(data);
                          if(data){
                            var d = new Date(data); 
                            return d.toLocaleDateString('en-GB') +',<br> '+ d.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
                          } else {
                            return "Date is not Available";
                          } 
                      },
                  },
      ],


        "order": [[ 0, "dsc" ]]
    });
    //on reset change value of update to submit
    jQuery('#reset').on('click',function(e){
                  e.preventDefault();
                  reset();
    });

     function reset(){

          $(".message").hide();
          // $('#delete-msg').hide();
          $('span.error').hide();
          jQuery('.highlight').removeClass('highlight');

          $( ".form-title" ).text( "Add  {{$BreadCrumbPageHeader['breadcrumb']}}" );


          //it clear all the input field of form
          $('.input-block-level').val('');
          $('#submit').val("Submit");
          $('#submit').attr('name',"submit");
          $('#phones_id').val('');

          
          delete_image('aadhar_card_photo');
          delete_image('license_photo');
    }

    //dellete specific banner
   $('body').on('click', '#delete-user', function (e) {
      e.stopPropagation();

      $(".message").hide();
      
        
        var review_id = $(this).data("id");
        jConfirm('Are You sure want to delete !', 'Delete Review',function(r) {
                    if(r)
                    {
                      $.ajax({
                        type: "get",
                        url:'{{url(Helpers::admin_url("review"))}}/delete/' + review_id,
                        success: function (data) {
                          // console.log(data);
                          // $( "#add_data" ).trigger( "click" );
                          jQuery('#delete-msg').show();
                          reset();
                        $("#msg-remark").html('Deleted Successfully');

                          /* var oTable = $('#dyntable').dataTable(); 
                          oTable.fnDraw(false); */

                          var d_Table = $('#dyntable').dataTable(); 
                          d_Table.api().ajax.reload();

                         /*  var oTable = $('#dyntable').dataTable(); 
                          oTable.fnDraw(false); */
                        },
                        error: function (data) {
                        }
                      });  
                    }
                    else{
                    }
                  });
    });

     
      $('#form').validate({ // initialize the plugin
        errorElement: "span",
        rules: {
            status:{
                required: true,
            },
            comments:{
                required: true,
            },
            rate:{
                required: true,
            },
            user_id:{
                required: true,
            },
            driver_id:{
                required: true,
            },
            order_number:{
                required: true,
            },
        },
      });
//form validation ends here     
   });

   //form validation starts he

   
   
   </script>
@endsection