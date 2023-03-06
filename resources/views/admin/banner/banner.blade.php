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
          {{-- 0 --}}{{-- <col class="con1" width="10%" /> --}}
          {{-- 1 --}}<col class="con0" width="10%" />
          {{-- 1 --}}<col class="con0" width="10%" />
          {{-- 1 --}}<col class="con0" width="60%" />
          {{-- 6 --}}<col class="con1" width="15%" />
          {{-- 1 --}}<col class="con0" width="5%" />

        </colgroup>
        <thead>
          <tr>
            {{-- 1 --}}<th class="head0">id</th>
            {{-- 0 --}}<th class="head1">status</th>
            {{-- 0 --}}<th class="head1">Type</th>
            {{-- 1 --}}<th class="head0">Banner text</th>
            {{-- 1 --}}<th class="head1">Image</th>
            {{-- 7 --}}<th width="head0">Action</th>
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
          
          <form action="{{url(Helpers::admin_url('banner'))}}" method="post" id="form" enctype="multipart/form-data">
           <!-- // CSRF token for securing form field from hacker-->
           {{ csrf_field() }}
           
             <input type="hidden" name="banner_id" id="banner_id" value="{{old('banner_id')}}">

          <label class="control-label">Status:<span style="color:red;">*</span></label>
          
         <div class="chatsearch">
            <select id="bnr_status" class="input-block-level" name="bnr_status">
              <option value="">- - - Select Status - - - </option>
              <option value="Y" {{ old('bnr_status')=='Y' ? 'selected' : '' }}>Active</option>
                      <option value="N" {{  old('bnr_status')=='N' ? 'selected' : '' }}>Inactive</option>
            </select>
          </div>

          <label class="control-label">Type:<span style="color:red;">*</span></label>
          <div class="chatsearch">
             <select id="type" class="input-block-level" name="type">
                <option value="">- - - Select Type - - - </option>
                <option value="slider" {{ old('type')=='slider' ? 'selected' : '' }}>Slider</option>
                <option value="banner" {{ old('type')=='banner' ? 'selected' : '' }}>Banner</option>
                <option value="restaurant" {{ old('type')=='restaurant' ? 'selected' : '' }}>Restaurant</option>
                <option value="groceries" {{ old('type')=='groceries' ? 'selected' : '' }}>Groceries</option>
                <option value="vegetable" {{ old('type')=='vegetable' ? 'selected' : '' }}>Vegetable</option>
             </select>
           </div>

         <label class="control-label">Title:{{-- <span style="color:red;">*</span> --}}</label>
          <div class="chatsearch">
          <input type="text" id="bnr_title" name="bnr_title" class="input-block-level" placeholder="Name" value="{{old("bnr_title")}}" />
           @if ($errors->has('bnr_title'))
           <span id="bnr_title_editor-error" class="error">The fiels may not be greater than 25 characters.</span>
            @endif 
         </div>

         <label class="control-label">Description:</label>
         <div class="chatsearch">
         <input type="text" id="bnr_description" name="bnr_description" class="input-block-level" placeholder="Description" value="{{old("bnr_description")}}" />
          @if ($errors->has('bnr_description'))
          <span id="bnr_description_editor-error" class="error">The fiels may not be greater than 25 characters.</span>
           @endif 
        </div>

        <label class="control-label" id="validation_size">Image:</label>
        <div class="chatsearch">
            <input type="file" id="bnr_image"  name="bnr_image" class="imagefile"  value="Upload"/><br>
            <img id="show_bnr_image" src="#" alt="your image" />
            <button class="btn btn-primary" type="button" onclick="" id="delete_image">Delete</button>
            <input type="hidden" name="delete_img" id="delete_img" value="{{isset($details_for_updation[0]->id)?$details_for_updation[0]->bnr_image:''}}">
            @if ($errors->has('bnr_image'))
            @foreach ($errors->all() as $error)
              <span id="bnr_image-error" class="error"><br>{{ $error }}</span>
            @endforeach
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
   /*  jQuery(document).ready( function ($) {


        $('#dyntable').DataTable({
      // "pageLength": 50,
        
    //  processing: false,
    //  serverSide: true,
     ajax: "{{url(Helpers::admin_url('banner'))}}",
     //----------------------------------------
     columns: [
               { data: 'id', name: 'id' },
               { data: 'bnr_status', name: 'bnr_status'},
               { data: 'bnr_image', name: 'bnr_image'},
               { data: 'bnr_title', name: 'bnr_title' },
               {data: 'action', name: 'action', orderable: false, searchable: false},
              ],
        "order": [[ 0, "dsc" ]]
    });
   }); */

   jQuery(document).ready( function ($) {
    
    $('#delete_image').hide();
    $('#show_bnr_image').hide();
    $('#delete-msg').hide();

    $('#dyntable').DataTable({
      // "pageLength": 50,
        
    //  processing: false,
    //  serverSide: true,
     ajax: "{{url(Helpers::admin_url('banner'))}}",
     //------------------------------------------------------
     //----------------------------------------
     columns: [
        { data: 'id', name: 'id', visible: false },
               { data: 'bnr_status', name: 'bnr_status'},
               { data: 'type', name: 'type' },
               { data: 'bnr_title', name: 'bnr_title' },
               { data: 'bnr_image', name: 'bnr_image'},
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
            "targets": 4,   // choose the correct column
            "render": function ( data, type, full,meta ) {
                if(data) {
                    return '<span style="text-align:center"><img width="100" height="100" src="{{url('storage/image/banner')}}'+'/'+data+'"/></span>';
                }
                return '<span style="text-align:center" ><img width="100" height="100" src="{{asset('assets/images/bg1.png')}}"/></span>';
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

    function  delete_image(){
        $('#delete_image').hide();
        $('#bnr_image').val('');
        $('#show_bnr_image').hide();
        $('#bnr_image').show();
        $('#delete_img').attr('value','');
      }

      //remove image form input file element
    $('#delete_image').on('click', function(e) { 
    //e.preventDefault();
        delete_image();
    });

    $("#type").on('change',function(e){
      
      if($(this).val()=='slider'){
        // alert($(this).val()=='slider');
        $('#validation_size').html('Image(720x1200):');
      }
      else if($(this).val()=='banner'){
        // alert($(this).val()=='slider');
        $('#validation_size').html('Image(800x900):');

      } else if($(this).val()=='restaurant' || $(this).val()=='groceries' ){
          $('#validation_size').html('Image(1600x900):');
      }
    });

    //to load the image after selection
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#show_bnr_image').show();
          $('#delete_image').show();
          $('#bnr_image').hide();
          $("#bnr_image-error").hide();

          $('#show_bnr_image').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }
      $("#bnr_image").change(function() {
      readURL(this);
    });


    $('#dyntable').on('click', 'tr', function () {
      $(".message").hide();
      $('span.error').hide();
      $( ".form-title" ).text( "Edit  {{$BreadCrumbPageHeader['breadcrumb']}}" );

      var edit_id=($(this).find('.edit').attr('data-url'));
            
              if(edit_id){
                $.ajax({
                 type:"GET",
                //  url:'{{url(Helpers::admin_url('banner'))}}/' + banner_id +'/edit',
                 url:edit_id,
                 dataType: "json",
                 success:function(res){               
                    if(res){
                      // console.log('{{url('storage/image/banner')}}/');
                      $('#banner_id').val(res.id);
                      $('#bnr_status').val(res.bnr_status);
                      $('#type').val(res.type);
                      $('#bnr_title').val(res.bnr_title);
                      $('#bnr_description').val(res.bnr_description);

                      if(res.type=='banner'){
                        $('#validation_size').html('Image(800x900):');
                      } else if(res.type=='slider'){
                        $('#validation_size').html('Image(720x1200):');
                      } else if(res.type=='restaurant' || res.type=='groceries' ){
                        $('#validation_size').html('Image(1600x900):');
                      }

                      if (res.bnr_image){
                      $('#bnr_image').hide();
                      jQuery('#show_bnr_image').show();
                      $('#delete_image').show();
                      jQuery('#show_bnr_image').attr('src','{{url('storage/image/banner')}}/'+res.bnr_image);
                      jQuery('#delete_img').val(res.bnr_image);
                    }
                    else{
                     $('#show_bnr_image').hide('');
                     $('#delete_image').hide();
                     $('#bnr_image').show();
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

      //dellete specific banner
      $('body').on('click', '#delete-user', function (e) {
            e.stopPropagation();

            $(".message").hide();
            
              
              var banner_url = $(this).data("url");
                //var permissio_for_deletion=confirm("Are You sure want to delete !");
              var permissio_for_deletion;
              jConfirm('Are You sure want to delete !', 'Delete {{$BreadCrumbPageHeader["breadcrumb"]}}',function(r) {
                          if(r)
                          {
                            $.ajax({
                              type: "get",
                              url: banner_url,
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


     function reset(){

          $(".message").hide();
          $('#delete-msg').hide();
          $('#bnr_image').show();
          $('#show_bnr_image').hide();
          $('#delete_image').hide();
          $('span.error').hide();
          $( ".form-title" ).text( "Add {{$BreadCrumbPageHeader['breadcrumb']}}" );

          $('#validation_size').html('Image:');
          //it clear all the input field of form
          $('.input-block-level').val('');
          $('#submit').val("Submit");
          $('#submit').attr('name',"submit");
          $('#banner_id').val('');
    }
    $.validator.addMethod('minImageWidth', function(value, element, minWidth) {
    return ($(element).data('imageWidth') || 0) > minWidth;
    }, function(minWidth, element) {
    var imageWidth = $(element).data('imageWidth');
    return (imageWidth)
        ? ("Your image's width must be greater than " + minWidth + "px")
        : "Selected file is not an image.";
    });

     $('#form').validate({ // initialize the plugin
        errorElement: "span",
        rules: {
            bnr_status:{
                required: true,
            },
            type:{
                required: true,
            },
           /*  bnr_title:{
                required: true,
            }, */
            bnr_image:{
                required: true,
                minImageWidth: 720,
                minImageHeight: 1200,
            },

        },
      });
//form validation ends here     
   });

   //form validation starts he

   

</script>
@endsection