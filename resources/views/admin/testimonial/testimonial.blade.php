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
          {{-- 0 --}}<col class="con1" width="20%" />
          {{-- 1 --}}<col class="con0" width="20%" />
          {{-- 1 --}}<col class="con0" width="20%" />
          {{-- 1 --}}<col class="con0" width="20%" />
          {{-- 1 --}}<col class="con0" width="20%" />
        </colgroup>
        <thead>
          <tr>
            <th>id</th>
            {{-- 0 --}}<th class="head1">Status</th>
            {{-- 0 --}}<th class="head1">Name</th>
            {{-- 0 --}}<th class="head1">Message</th>
            {{-- 0 --}}<th class="head1">Created Date</th>
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
          
          <form action="{{url(Helpers::admin_url('testimonial'))}}" method="post" id="form" enctype="multipart/form-data">
           <!-- // CSRF token for securing form field from hacker-->
           {{ csrf_field() }}
           
             <input type="hidden" name="testimonial_id" id="testimonial_id" value="{{old('testimonial_id')}}">

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
              <input type="text" id="user_name" name="user_name" class="input-block-level" placeholder="Name" value="{{old('name')}}{{-- {{isset($banner->id)?$banner->name:old('name')}} --}}" />
              @if ($errors->has('user_name'))
              <span id="user_name-error" class="error">{{-- {{ $errors->first('user_name') }} --}}</span>
               @endif 
            </div>

            <label class="control-label">Message:<span style="color:red;">*</span></label>
             <div class="chatsearch">
              <input type="text" id="message" name="message" class="input-block-level" placeholder="Message" value="{{old('message')}}{{-- {{isset($banner->id)?$banner->name:old('name')}} --}}" />
              @if ($errors->has('message'))
              <span id="message-error" class="error">{{-- {{ $errors->first('user_name') }} --}}</span>
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
      var testimonial_id =  id;
      
      console.log(id);
      //$("#form").append("<span class='update-method'><input type='hidden' name='_method' value='PUT'></span>");
      //var formAction="{{url(Helpers::admin_url('driver/'))}}/"+ testimonial_id;
      //$("#form").attr("action", formAction);
      //it shows @ method('POST') which means in laravel it is used for updation using resource controller so we need to show it
      
            
              if(testimonial_id){
                $.ajax({
                 type:"GET",
                 url:'{{url(Helpers::admin_url('testimonial'))}}/' + testimonial_id +'/edit',
                 dataType: "json",
                 success:function(res){               
                    if(res){
                      // console.log(res);
                      $('#testimonial_id').val(res.id);
                      $('#status').val(res.status);
                      $('#user_name').val(res.user_name);
                      $('#message').val(res.message);
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
     ajax: "{{url(Helpers::admin_url('testimonial'))}}",
     //----------------------------------------
     columns: [
               { data: 'id', name: 'id' , visible:false },
               { data: 'status', name: 'status'},
               { data: 'user_name', name: 'user_name'},
               { data: 'message', name: 'message'},
               { data: 'date', name: 'date'},
               {data: 'action', name: 'action', orderable: false, searchable: false},
              ],
              "columnDefs": [{
                  "targets": 1,   // choose the correct column
                  "render": function ( data, type, full,meta ) {
                      if(data=='Y') {
                          return '<span style="text-align:center"><img src="{{asset('assets/images/active-16.png')}}"/></span>';
                      }
                      return '<span style="text-align:center" ><img src="{{asset('assets/images/inactive-16.png')}}"/></span>';
                  },

              },
              {
                    "targets": 4,   // choose the correct column
                    "render": function ( data, type, full,meta ) {
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
      
        
        var testimonial_id = $(this).data("id");
        jConfirm('Are You sure want to delete !', 'Delete Testimonial',function(r) {
                    if(r)
                    {
                      $.ajax({
                        type: "get",
                        url:'{{url(Helpers::admin_url("testimonial"))}}/delete/' + testimonial_id,
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
            user_name:{
                required: true,
            },
            message:{
                required: true,
            },
        },
      });
//form validation ends here     
   });

   //form validation starts he

   
   
   </script>
@endsection