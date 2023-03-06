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

      <table id="dyntable" class="table table-bordered responsive data-table" style="width: 100%">
        <colgroup>
          {{-- 0 --}}<col class="con1" width="10%" />
          {{-- 1 --}}<col class="con0" width="80%" />
          {{-- 2 --}}<col class="con1" width="10%" />
        </colgroup>
        <thead>
          <tr>
            {{-- <th>id</th> --}}
            {{-- 0 --}}<th class="head1">status</th>
            {{-- 2<th class="head0">image</th> --}}
            {{-- 6<th width="head1">title</th> --}}
            {{-- 2 --}}<th class="head0">Name</th>
            {{-- 6 --}}<th width="head1">Action</th>
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
          
          <form action="{{url(Helpers::admin_url('driver'))}}" method="post" id="form" enctype="multipart/form-data">
           <!-- // CSRF token for securing form field from hacker-->
           {{ csrf_field() }}
           
             <input type="hidden" name="driver_id" id="driver_id" value="{{old('driver_id')}}">

             <label class="control-label">Status:<span style="color:red;">*</span></label>
             <div class="chatsearch">
              <select id="status" class="input-block-level" name="status">
                <option value="">- - - Select Status - - - </option>
                <option value="Y" {{ old('status')=='Y' ? 'selected' : '' }}>Active</option>
                <option value="N" {{ old('status')=='N' ? 'selected' : '' }}>Inactive</option>
              </select>
            </div>

          <label class="control-label">Name:<span style="color:red;">*</span></label>
          <div class="chatsearch">
           <input type="text" id="name" name="name" class="input-block-level" placeholder="Name" value="{{old('name')}}{{-- {{isset($banner->id)?$banner->name:old('name')}} --}}" />
           @if ($errors->has('name'))
           <span id="bnr_short_description_editor-error" class="error">{{ $errors->first('name') }}</span>
            @endif 
         </div>

         <label class="control-label">Email:<span style="color:red;">*</span></label>
          <div class="chatsearch">
           <input type="text" id="email" name="email" class="input-block-level" placeholder="Email" value="{{old('email')}}{{-- {{isset($banner->id)?$banner->email:old('email')}} --}}" />
         </div>

         <label class="control-label">Phone:<span style="color:red;">*</span></label>
          <div class="chatsearch">
           <input type="text" id="phone" name="phone" class="input-block-level" placeholder="Phone" value="{{old('phone')}}" />
         </div>

         <label class="control-label">Alternate phone:</label>
          <div class="chatsearch">
           <input type="text" id="alternate_phone" name="alternate_phone" class="input-block-level" placeholder="Alternate phone" value="{{old('alternate_phone')}}" />
         </div>

         <label class="control-label">Address 1:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <input type="text" id="address1" name="address1" class="input-block-level" placeholder="Address1" value="{{old('address1')}}" />
        </div>

        <label class="control-label">Address 2:</label>
         <div class="chatsearch">
          <input type="text" id="address2" name="address2" class="input-block-level" placeholder="Address2" value="{{old('address2')}}" />
        </div>

        <label class="control-label">Address 3:</label>
         <div class="chatsearch">
          <input type="text" id="address3" name="address3" class="input-block-level" placeholder="Address3" value="{{old('address3')}}" />
        </div>

        <label class="control-label">City:<span style="color:red;">*</span></label>
        <div class="chatsearch">
         <input type="text" id="city" name="city" class="input-block-level" placeholder="City" value="{{old('city')}}" />
       </div>

       <label class="control-label">Postcode:<span style="color:red;">*</span></label>
       <div class="chatsearch">
        <input type="text" id="postcode" name="postcode" class="input-block-level" placeholder="Postcode" value="{{old('postcode')}}" />
      </div>
         

      <label class="control-label">Aadhar no:<span style="color:red;">*</span></label>
       <div class="chatsearch">
        <input type="text" id="aadhar_no" name="aadhar_no" class="input-block-level" placeholder="Aadhar no" value="{{old('aadhar_no')}}" />
      </div>

      <label class="control-label">Aadhar card photo:<span style="color:red;">*</span></label>
      <div class="chatsearch">
       <input type="text" id="aadhar_card_photo" name="aadhar_card_photo" class="input-block-level" placeholder="Aadhar card photo" value="{{old('aadhar_card_photo')}}" />
     </div>

     

     <label class="control-label">License photo:<span style="color:red;">*</span></label>
      <div class="chatsearch">
       <input type="text" id="license_photo" name="license_photo" class="input-block-level" placeholder="License photo" value="{{old('license_photo')}}" />
     </div>

     <label class="control-label">Vehicle no:<span style="color:red;">*</span></label>
     <div class="chatsearch">
      <input type="text" id="vehicle_no" name="vehicle_no" class="input-block-level" placeholder="Vehicle no" value="{{old('vehicle_no')}}" />
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
    
    $('#show_email').hide();
    $('#delete-msg').hide();
    $('#delete_image').hide();



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
      var driver_id =  id;
      //console.log(id);
      //$("#form").append("<span class='update-method'><input type='hidden' name='_method' value='PUT'></span>");
      //var formAction="{{url(Helpers::admin_url('driver/'))}}/"+ driver_id;
      //$("#form").attr("action", formAction);
      //it shows @ method('POST') which means in laravel it is used for updation using resource controller so we need to show it
      
            
              if(driver_id){
                $.ajax({
                 type:"GET",
                 url:'{{url(Helpers::admin_url('driver'))}}/' + driver_id +'/edit',
                 dataType: "json",
                 success:function(res){               
                    if(res){
                      $('#driver_id').val(res.id);
                      $('#driver_id').val(res.id);

                      $('#name').val(res.name);
                      $('#email').val(res.email);
                      $('#phone').val(res.phone);
                      $('#alternate_phone').val(res.alternate_phone);
                      $('#address1').val(res.address1);
                      $('#address2').val(res.address2);
                      $('#address3').val(res.address3);
                      $('#city').val(res.city);
                      $('#postcode').val(res.postcode);
                      $('#aadhar_no').val(res.aadhar_no);
                      $('#aadhar_card_photo').val(res.aadhar_card_photo);
                      $('#license_no').val(res.license_no);
                      $('#license_photo').val(res.license_photo);
                      $('#vehicle_no').val(res.vehicle_no);
                      $('#status').val(res.status);
                      $('#created_by').val(res.created_by);
                      $('#created_date').val(res.created_date);
                      $('#updated_by').val(res.updated_by);
                      $('#updated_date').val(res.updated_date);

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
    /* $('#dyntable').on('click', 'tr', function () {
      $(".message").remove();
      $('span.error').hide();
      $( ".form-title" ).text( "Edit driver" );

      var id=($(this).closest('tr').attr('id')).slice(4);
      var cat_id =  id;
      
            
              if(cat_id){
                $.ajax({
                 type:"GET",
                 url:'{{url(Helpers::admin_url('driver'))}}/' + cat_id +'/edit',
                 dataType: "json",
                 success:function(res){               
                    if(res){
                      $('#driver_id').val(res.id);
                      $('#cat_status').val(res.cat_status);
                      $('#name').val(res.name);
                    }
                    else{

                   }
                      $('#submit').val("Update");
                      $("#submit").attr('name','update');

                    }
                    
                });
              // // //select current row for edit
              jQuery('.highlight').removeClass('highlight');
              jQuery(this).addClass('highlight');   
          }
    }); */

     $('#dyntable').DataTable({
      // "pageLength": 50,
        
    //  processing: false,
    //  serverSide: true,
     ajax: "{{url(Helpers::admin_url('driver'))}}",
     //------------------------------------------------------
     /* "columnDefs": [{
            "targets": 1,   // choose the correct column
            "render": function ( data, type, full,meta ) {
                if(data=='Y') {
                    return '<span style="text-align:center"><img src="{{asset('assets/images/active-16.png')}}"/></span>';
                }
                return '<span style="text-align:center" ><img src="{{asset('assets/images/inactive-16.png')}}"/></span>';
              }
      },
      {
            "targets": 2,   // choose the correct column
            "render": function ( data, type, full,meta ) {
                if(data) {
                    return '<span style="text-align:center"><img width="100" height="100" src="{{asset('public/image/driver')}}'+'/'+data+'"/></span>';
                }
                return '<span style="text-align:center" ><img width="100" height="100" src="{{asset('assets/images/bg1.png')}}"/></span>';
              }
      }
      

      ], */
     //----------------------------------------
     columns: [
               { data: 'id', name: 'id' },
               { data: 'name', name: 'name', orderable: false,searchable: false},
              //  { data: 'email', name: 'email'},
              //  { data: 'name', name: 'name' },
              //  { data: 'cat_short_description', name: 'cat_short_description' },
               {data: 'action', name: 'action', orderable: false, searchable: false},
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
          $('#driver_id').val('');

           //it clear all the input field of form
           $('.input-block-level').val('');
          $('#bnr_link').val('');
          $('#bnr_short_description').val('');
          $('#submit').val("Submit");
          $('#submit').attr('name',"submit");
          $('#banner_id').val('');
          delete_image();
    }

    //dellete specific banner
   $('body').on('click', '#delete-user', function (e) {
      e.stopPropagation();

      $(".message").hide();
      
        
        var cat_id = $(this).data("id");
          //var permissio_for_deletion=confirm("Are You sure want to delete !");
        var permissio_for_deletion;
        jConfirm('Are You sure want to delete !', 'Delete driver',function(r) {
                    if(r)
                    {
                      $.ajax({
                        type: "get",
                        url:'{{url(Helpers::admin_url("driver"))}}/delete/' + cat_id,
                        success: function (data) {
                          console.log(data);
                          // $( "#add_data" ).trigger( "click" );
                          jQuery('#delete-msg').show();
                          reset();


                          // console.log('deleted shown');


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

    //to load the image after selection
     function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#show_email').show();
          $('#delete_image').show();
          $('#email').hide();

          $('#show_email').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
      $("#email").change(function() {
      readURL(this);
    });

    //remove image form input file element
    $('#delete_image').on('click', function(e) { 
    e.preventDefault();
    delete_image();
  });

  function  delete_image(){
        $('#delete_image').hide();
        $('#email').val('');
        $('#show_email').hide();
        $('#email').show();
        $('#delete_img').attr('value','');
      }

     $('#form').validate({ // initialize the plugin
        errorElement: "span",
        rules: {
            cat_status:{
                required: true,
            },
            name:{
                required: true,
                maxlength:50
            },
            email:{
              required:true,
            },
            cat_short_description:{
                required: true,
                maxlength:250
            },
        },
      });
//form validation ends here     
   });

   //form validation starts he

   
   
   </script>
@endsection