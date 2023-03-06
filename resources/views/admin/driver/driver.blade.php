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
          {{-- 0 --}}<col class="con0" width="60%" />
          {{-- 1 --}}<col class="con1" width="10%" />
          {{-- 1 --}}<col class="con1" width="10%" />
          {{-- 2 --}}<col class="con0" width="10%" />
        </colgroup>
        <thead>
          <tr>
            <th>id</th>
            {{-- 0 --}}<th class="head1">status</th>
            {{-- 2<th class="head0">image</th> --}}
            {{-- 6 --}}<th width="head0">Name</th>
            {{-- 2 --}}<th class="head1">Mobile</th>
            {{-- 2 --}}<th class="head1">Otp</th>
            {{-- 6 --}}<th width="head0">Action</th>
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
           <input type="text" id="phone" pattern="[0-9]{10}" name="phone" class="input-block-level" placeholder="Phone" value="{{old('phone')}}" />
         </div>

         <label class="control-label">Alternate phone:</label>
          <div class="chatsearch">
           <input type="text" id="alternate_phone" pattern="[0-9]{10}" name="alternate_phone" class="input-block-level" placeholder="Alternate phone" value="{{old('alternate_phone')}}" />
         </div>

         <label class="control-label">Address 1:<span style="color:red;">*</span></label>
         <div class="chatsearch">
          <textarea class="input-block-level" id="address1" name="address1">{!!old('address1')!!}</textarea>

          {{-- <input type="text" id="address1" name="address1" class="input-block-level" placeholder="Address1" value="{{old('address1')}}" /> --}}
        </div>

        <label class="control-label">Address 2:</label>
         <div class="chatsearch">
          <textarea class="input-block-level" id="address2" name="address2">{!!old('address2')!!}</textarea>
          {{-- <input type="text" id="address2" name="address2" class="input-block-level" placeholder="Address2" value="{{old('address2')}}" /> --}}
        </div>

        <label class="control-label">Address 3:</label>
         <div class="chatsearch">
          <textarea class="input-block-level" id="address3" name="address3">{!!old('address3')!!}</textarea>
          {{-- <input type="text" id="address3" name="address3" class="input-block-level" placeholder="Address3" value="{{old('address3')}}" /> --}}
        </div>

        <label class="control-label">City:<span style="color:red;">*</span></label>
        
       <div class="chatsearch">
        <select id="city_id" class="input-block-level" name="city_id">
          <option value="">- - - Select Status - - - </option>
          @foreach($cities as $city)
                      <option value="{{ $city->id }}"@if (old('city_id') == $city->id) {{ 'selected' }} @endif >{{ $city->city_name }}</option>
          @endforeach
        </select>
      </div>

       <label class="control-label">Postcode:<span style="color:red;">*</span></label>
       <div class="chatsearch">
        <input type="text" id="postcode" pattern="[0-9]{6}" name="postcode" class="input-block-level" placeholder="Postcode" value="{{old('postcode')}}" />
      </div>
         

      <label class="control-label">Aadhar no:<span style="color:red;">*</span></label>
       <div class="chatsearch">
        <input type="text" id="aadhar_no"  name="aadhar_no" maxlength="19" pattern="\d{4}[\-]\d{4}[\-]\d{4}||\d{4}[\-]\d{4}[\-]\d{4}[\-]\d{4}" class="input-block-level" placeholder="Aadhar no" value="{{old('aadhar_no')}}" />
      </div>

      {{-- <label class="control-label">Aadhar card photo:<span style="color:red;">*</span></label>
      <div class="chatsearch">
       <input type="text" id="aadhar_card_photo" name="aadhar_card_photo" class="input-block-level" placeholder="Aadhar card photo" value="{{old('aadhar_card_photo')}}" />
     </div> --}}

     <label class="control-label">Aadhar card photo:</label>
     <div class="chatsearch">
       <input type="file" id="aadhar_card_photo" style="display: block;" name="aadhar_card_photo" class="imagefile"  value="Upload"/>
       <img id="show_aadhar_card_photo" src="#" alt="your image" />
       <button class="btn btn-primary" type="button" id="delete_image_aadhar_card_photo">Delete</button>
       <input type="hidden" name="delete_img_aadhar_card_photo" id="delete_img_aadhar_card_photo" value="{{isset($details_for_updation[0]->id)?$details_for_updation[0]->aadhar_card_photo:''}}">
     </div>
     

     <label class="control-label">License Number:<span style="color:red;">*</span></label>
     <div class="chatsearch">
      <input type="text" id="license_no" name="license_no"  class="input-block-level" placeholder="License Number" value="{{old('license_no')}}" />
    </div>
     

     <label class="control-label">License photo:</label>
     <div class="chatsearch">
       <input type="file" id="license_photo" style="display: block;" name="license_photo" class="imagefile"  value="Upload"/>
       <img id="show_license_photo" src="#" alt="your image" />
       <button class="btn btn-primary" type="button" id="delete_image_license_photo">Delete</button>
       <input type="hidden" name="delete_img_license_photo" id="delete_img_license_photo" value="{{isset($details_for_updation[0]->id)?$details_for_updation[0]->license_photo:''}}">
     </div>

     <label class="control-label">Passport size photo:</label>
     <div class="chatsearch">
       <input type="file" id="passport_photo" style="display: block;" name="passport_photo" class="imagefile"  value="Upload"/>
       <img id="show_passport_photo" src="#" alt="your image" />
       <button class="btn btn-primary" type="button" id="delete_image_passport_photo">Delete</button>
       <input type="hidden" name="delete_img_passport_photo" id="delete_img_passport_photo" value="{{isset($details_for_updation[0]->id)?$details_for_updation[0]->passport_photo:''}}">
       @if ($errors->has('passport_photo'))
       @foreach ($errors->all() as $error)
         <span id="passport_photo-error" class="error"><br>The passport photo should have 450x600</span>
       @endforeach
       @endif
      </div>


     <label class="control-label">Vehicle no:<span style="color:red;">*</span></label>
     <div class="chatsearch">
      <input type="text" id="vehicle_no" pattern="[A-Za-z]{2}[0-9]{2}[A-Za-z]{2}[0-9]{4}" name="vehicle_no" class="input-block-level" placeholder="Vehicle no" value="{{old('vehicle_no')}}" />
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
    
    $('#delete_image_aadhar_card_photo').hide();
    $('#delete_img_aadhar_card_photo').hide();
    $('#delete_image_license_photo').hide();
    $('#delete_img_license_photo').hide();
    $('#delete_image_passport_photo').hide();
    $('#delete_img_passport_photo').hide();

    $('#show_aadhar_card_photo').hide();
    $('#show_license_photo').hide();
    $('#show_passport_photo').hide();
    



    $('#add_data').on('click',function(e){
                e.preventDefault();
                reset();
    });
    $('#aadhar_no').keyup(function() {
      var adharsixteendigit = '/^\d{19}$/';
      var adhar = $('#aadhar_no').val();
      if (adhar != '')
      {
           if(!adhar.match(adharsixteendigit))
          {
              // alert("Invalid Aadhar Number");
          } 
      }
      // console.log('keyup');
        // alert('s');
        var foo = $(this).val().split("-").join(""); // remove hyphens
        if (foo.length > 0) {
          foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
        }
        $(this).val(foo);
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
                      // console.log(res);

                      $('#driver_id').val(res.id);

                      $('#name').val(res.name);
                      $('#email').val(res.email);
                      $('#phone').val(res.phone);
                      $('#alternate_phone').val(res.alternate_phone);
                      $('#address1').val(res.address1);
                      $('#address2').val(res.address2);
                      $('#address3').val(res.address3);
                      $('#city_id').val(res.city_id);
                      $('#postcode').val(res.postcode);
                      $('#aadhar_no').val(res.aadhar_no);
                      // $('#aadhar_card_photo').val(res.aadhar_card_photo);
                      $('#license_no').val(res.license_no);
                      // $('#license_photo').val(res.license_photo);
                      $('#vehicle_no').val(res.vehicle_no);
                      $('#status').val(res.status);
                      $('#created_by').val(res.created_by);
                      $('#created_date').val(res.created_date);
                      $('#updated_by').val(res.updated_by);
                      $('#updated_date').val(res.updated_date);


                    if (res.aadhar_card_photo){
                      $('#aadhar_card_photo').hide();
                      jQuery('#show_aadhar_card_photo').show();
                      $('#delete_image_aadhar_card_photo').show();
                      jQuery('#show_aadhar_card_photo').attr('src','{{url('storage/image/aadharCardPhoto')}}/'+res.aadhar_card_photo);
                      jQuery('#delete_img_aadhar_card_photo').val(res.aadhar_card_photo);
                    }
                    else{
                     $('#show_aadhar_card_photo').hide('');
                     $('#delete_image_aadhar_card_photo').hide();
                     $('#aadhar_card_photo').show();
                   }

                   if (res.license_photo){
                      $('#license_photo').hide();
                      jQuery('#show_license_photo').show();
                      $('#delete_image_license_photo').show();
                      jQuery('#show_license_photo').attr('src','{{url('storage/image/licensePhoto')}}/'+res.license_photo);
                      jQuery('#delete_img_license_photo').val(res.license_photo);
                    }
                    else{
                     $('#show_license_photo').hide('');
                     $('#delete_image_license_photo').hide();
                     $('#license_photo').show();
                   }

                   if (res.passport_photo){
                      $('#passport_photo').hide();
                      jQuery('#show_passport_photo').show();
                      $('#delete_image_passport_photo').show();
                      jQuery('#show_passport_photo').attr('src','{{url('storage/image/passportPhoto')}}/'+res.passport_photo);
                      jQuery('#delete_img_passport_photo').val(res.passport_photo);
                    }
                    else{
                     $('#show_passport_photo').hide();
                     $('#delete_image_passport_photo').hide();
                     $('#passport_photo').show();
                   }
                   
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

    $("#aadhar_card_photo").change(function() {
      readURL(this,$(this).attr('id'));
    });

    $("#license_photo").change(function() {
      readURL(this,$(this).attr('id'));
    });

    $("#passport_photo").change(function() {
      readURL(this,$(this).attr('id'));
    });

    //remove image form input file element
    $('#delete_image_aadhar_card_photo').on('click', function(e) { 
      //e.preventDefault();
      delete_image('aadhar_card_photo');
    });
    //remove image form input file element
    $('#delete_image_license_photo').on('click', function(e) { 
      //e.preventDefault();
      delete_image('license_photo');
    });
    $('#delete_image_passport_photo').on('click', function(e) { 
      //e.preventDefault();
      delete_image('passport_photo');
    });
    
      
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
     ajax: "{{url(Helpers::admin_url('driver'))}}",
     //----------------------------------------
     columns: [
               { data: 'id', name: 'id' , visible: false },
               { data: 'status', name: 'status' },
               { data: 'name', name: 'name', orderable: false,searchable: false},
               { data: 'phone', name: 'phone'},
               { data: 'otp', name: 'otp'},
              //  { data: 'name', name: 'name' },
              //  { data: 'cat_short_description', name: 'cat_short_description' },
               {data: 'action', name: 'action', orderable: false, searchable: false},
              ],
    columnDefs: [{
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

          
          delete_image('aadhar_card_photo');
          delete_image('license_photo');
    }

    //dellete specific banner
   $('body').on('click', '#delete-user', function (e) {
      e.stopPropagation();

      $(".message").hide();
      
        
        var driver_id = $(this).data("id");
        jConfirm('Are You sure want to delete !', 'Delete Driver',function(r) {
                    if(r)
                    {
                      $.ajax({
                        type: "get",
                        url:'{{url(Helpers::admin_url("driver"))}}/delete/' + driver_id,
                        success: function (data) {
                          console.log(data);
                          // $( "#add_data" ).trigger( "click" );
                          jQuery('#delete-msg').show();
                          reset();
                          delete_image();

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

 /*  function  delete_image(){
        $('#delete_image').hide();
        $('#email').val('');
        $('#aadhar_card_photo').hide();
        $('#email').show();
        $('#delete_img').attr('value','');
      } */

     $('#form').validate({ // initialize the plugin
        errorElement: "span",
        rules: {
          status:{
                required: true,
            },
            name:{
                required: true,
                maxlength:50
            },
            email:{
              required:true,
              email:true,
            },
            phone:{
                required: true,
                maxlength:250
            },
            address1:{
              required: true,
            },
            city_id:{
              required: true,
            },
            postcode:{
              required: true,
            },
            aadhar_no:{
              required: true,
            },
            license_no:{
              required: true,
            },
            vehicle_no:{
              required: true,
            },
        },
      });
//form validation ends here     
   });

   //form validation starts he

   
   
   </script>
@endsection