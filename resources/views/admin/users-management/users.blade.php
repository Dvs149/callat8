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
          {{-- 0 --}}{{-- <col class="con1" width="10%" /> --}}
          {{-- 1 --}}<col class="con0" width="10%" />
          {{-- 1 --}}<col class="con0" width="15%" />
          {{-- 2 --}}<col class="con1" width="18%" />
          {{-- 3 --}}<col class="con0" width="21%" />
          {{-- 4 --}}<col class="con1" width="21%" />
          {{-- 5 --}}<col class="con0" width="5%" />

        </colgroup>
        <thead>
          <tr>
            {{-- 0 --}}<th class="head1">Id</th>
            {{-- 0 --}}<th class="head1">Status</th>
            {{-- 1 --}}<th class="head0">Name</th>
            {{-- 2 --}}<th class="head1">email</th>
            {{-- 3 --}}<th class="head0">Mobile</th>
            {{-- 3 --}}{{-- <th class="head0">Whatsapp Mobile</th> --}}
            {{-- 4 --}}<th width="head1">Action</th>
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
          
          <form action="{{url(Helpers::admin_url('users'))}}" method="post" id="form" enctype="multipart/form-data">
           <!-- // CSRF token for securing form field from hacker-->
           {{ csrf_field() }}
           
             <input type="hidden" name="user_id" id="user_id" value="{{old('user_id')}}">

          <label class="control-label">Status:<span style="color:red;">*</span></label>
              <div class="chatsearch">
            <select id="status" class="input-block-level" name="status">
              <option value="">- - - Select Status - - - </option>
              <option value="Y" {{ old('status')=='Y' ? 'selected' : '' }}>Active</option>
                      <option value="N" {{  old('status')=='N' ? 'selected' : '' }}>Inactive</option>
            </select>
          </div>

             <label class="control-label">Name:<span style="color:red;">*</span></label>
             <div class="chatsearch">
              <input type="text" id="name" name="name" class="input-block-level" placeholder="Name" value="{{old('name')}}{{-- {{isset($banner->id)?$banner->name:old('name')}} --}}" />
              @if ($errors->has('name'))
              <span id="name-error" class="error">{{-- {{ $errors->first('name') }} --}}The field may not be greater than 25 characters.</span>
               @endif 
            </div>

            <label class="control-label">Email:<span style="color:red;">*</span></label>
            <div class="chatsearch">
             <input type="text" id="email" name="email" class="input-block-level" placeholder="Email" value="{{old('email')}}{{-- {{isset($banner->id)?$banner->email:old('email')}} --}}" />
             @if ($errors->has('email'))
             <span id="email-error" class="error">{{ $errors->first('email') }}{{-- The field may not be greater than 25 characters. --}}</span>
              @endif 
           </div>

           <label class="control-label">Mobile:<span style="color:red;">*</span></label>
            <div class="chatsearch">
             <input type="text" id="mobile" name="mobile" class="input-block-level" placeholder="Mobile" value="{{old('mobile')}}{{-- {{isset($banner->id)?$banner->mobile:old('mobile')}} --}}" />
             @if ($errors->has('mobile'))
             <span id="mobile-error" class="error">{{-- {{ $errors->first('mobile') }} --}}The field may not be greater than 25 characters.</span>
              @endif 
           </div>

          {{--  <label class="control-label">Whatsapp Mobile:<span style="color:red;">*</span></label>
            <div class="chatsearch">
             <input type="text" id="whatsapp_mobile" name="whatsapp_mobile" class="input-block-level" placeholder="Password" value="{{old('whatsapp_mobile')}}" />
             @if ($errors->has('whatsapp_mobile'))
             <span id="whatsapp_mobile-error" class="error"> {{ $errors->first('whatsapp_mobile') }}The field may not be greater than 25 characters.</span>
              @endif 
           </div> --}}

           <label class="control-label">Password:{{-- <span style="color:red;">*</span> --}}</label>
            <div class="chatsearch">
             <input type="password" id="password" name="password" class="input-block-level" placeholder="Password" value="{{old('password')}}{{-- {{isset($banner->id)?$banner->password:old('password')}} --}}" />
             @if ($errors->has('password'))
             <span id="password-error" class="error">{{-- {{ $errors->first('password') }} --}}The field may not be greater than 25 characters.</span>
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
    
    $('#delete_image').hide();
    $('#show_cms_image').hide();
    $('#delete-msg').hide();

     $('#dyntable').DataTable({
      // "pageLength": 50,
        
    //  processing: false,
    //  serverSide: true,
     ajax: "{{url(Helpers::admin_url('users'))}}",
     //------------------------------------------------------
      "columnDefs": [{
            "targets": 1,   // choose the correct column
            "render": function ( data, type, full,meta ) {
                if(data=='Y') {
                    return '<span style="text-align:center"><img src="{{asset('assets/images/active-16.png')}}"/></span>';
                }
                return '<span style="text-align:center" ><img src="{{asset('assets/images/inactive-16.png')}}"/></span>';
              }
      },
      /* {
            "targets": 1,   // choose the correct column
            "render": function ( data, type, full,meta ) {
                if(data) {
                    return '<span style="text-align:center"><img width="100" height="100" src="{{asset('public/image/cms-pages')}}'+'/'+data+'"/></span>';
                }
                return '<span style="text-align:center" ><img width="100" height="100" src="{{asset('assets/images/bg1.png')}}"/></span>';
              }
      } */

      ], 
     //----------------------------------------
     columns: [
               { data: 'id', name: 'id', visible: false  },
               { data: 'status', name: 'status', orderable: false,searchable: false},
               { data: 'name', name: 'name'},
               { data: 'email', name: 'email' },
               { data: 'mobile', name: 'mobile' },
              //  { data: 'whatsapp_mobile', name: 'whatsapp_mobile' },
               {data: 'action', name: 'action', orderable: false, searchable: false},
              ],
        "order": [[ 0, "dsc" ]]
    });

    //when user click particular row it will fetch data from server and give to the front end inside form, for editing
$('#dyntable').on('click', 'tr', function () {
      $(".message").remove();
      $('span.error').hide();
      $( ".form-title" ).text( "Edit {{$BreadCrumbPageHeader['breadcrumb']}}" );
      var id=($(this).closest('tr').attr('id')).slice(4);
      var user_id =  id;
            
              if(user_id){
                $.ajax({
                 type:"GET",
                 url:'{{url(Helpers::admin_url('users'))}}/' + user_id +'/edit',
                 dataType: "json",
                 success:function(res){               
                    if(res){
                      $('#user_id').val(res.id);
                      $('#status').val(res.status);
                      $('#name').val(res.name);
                      $('#email').val(res.email);
                      $('#mobile').val(res.mobile);
                      $('#password').val('');
                      // $('#whatsapp_mobile').val(res.whatsapp_mobile);

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

     $('#add_data').on('click',function(e){
                e.preventDefault();
                reset();
    });
    //on reset change value of update to submit
    jQuery('#reset').on('click',function(e){
                  e.preventDefault();
                  reset();
    });
     //to load the image after selection
     function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#show_cms_image').show();
          $('#cms_image').hide();

          $('#show_cms_image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
      $("#cms_image").change(function() {
      readURL(this);
    });

    //remove image form input file element
    $('#delete_image').on('click', function(e) { 
    e.preventDefault();
  });

   //dellete specific banner
   $('body').on('click', '#delete-user', function (e) {
      e.stopPropagation();

      $(".message").hide();
      
        
        var user_id = $(this).data("id");
          //var permissio_for_deletion=confirm("Are You sure want to delete !");
        var permissio_for_deletion;
        jConfirm('Are You sure want to delete !', 'Delete User',function(r) {
                    if(r)
                    {
                      $.ajax({
                        type: "get",
                        url:'{{url(Helpers::admin_url("users/"))}}/delete/' + user_id,
                        success: function (data) {
                          console.log(data);
                          $( "#add_data" ).trigger( "click" );
                          jQuery('#delete-msg').show();
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
  

     function reset(){

          $(".message").hide();
          $('#delete-msg').hide();
          $('span.error').hide();
          $( ".form-title" ).text( "Add {{$BreadCrumbPageHeader['breadcrumb']}}" );


          //it clear all the input field of form
          $('.input-block-level').val('');
          $('#submit').val("Submit");
          $('#submit').attr('name',"submit");
          $('#user_id').val('');
          jQuery('.highlight').removeClass('highlight');

    }
    
    
        $.validator.addMethod("greaterThan",
        function (value, element, param) {
              var $otherElement = $(param);
              return parseInt(value, 10) > parseInt($otherElement.val(), 10);
        },'Must be greater than Start Km.');
        /* $.validator.addMethod("lessThan",
        function (value, element, param) {
              var $otherElement = $(param);
              return parseInt(value, 10) < parseInt($otherElement.val(), 10);
        },'Must be less than End Km.'); */
     $('#form').validate({ // initialize the plugin
        errorElement: "span",
        rules: {
            status:{
                  required: true,
            },
            name:{
                required: true,
                maxlength:25,
                nowhitespace: true,
            },
            email:{
                required: true,
                email:true,
            },
            mobile:{
              required:true,
              number:true,
              maxlength:10,
              minlength:10,
            },
            whatsapp_mobile:{
              required:true,
              number:true,
              maxlength:10,
              minlength:10,
            },
            // password:{
            //   required:true,
            // },
            
        },
      });
//form validation ends here     
   });

   //form validation starts he

   
   
   </script>
@endsection