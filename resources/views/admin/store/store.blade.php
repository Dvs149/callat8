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
          {{-- 0 --}}<col class="con0" width="5%" />
          {{-- 1 --}}<col class="con1" width="10%" />
          {{-- 2 --}}<col class="con0" width="25%" />
          {{-- 3 --}}<col class="con1" width="30%" />
          {{-- 4 --}}<col class="con0" width="20%" />
          {{-- 5 --}}<col class="con1" width="10%" />

        </colgroup>
        <thead>
          <tr>
            {{--  --}}<th class="head0">Id</th>
            {{-- 0 --}}<th class="head1">status</th>
            {{-- 1 --}}<th class="head0">type</th>
            {{-- 2 --}}<th class="head1">name</th>
            {{-- 3 --}}<th class="head0">adddress</th>
            {{-- 4 --}}<th width="head1">image</th>
            {{-- 5 --}}<th width="head0">Action</th>
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
          
          <form action="{{url(Helpers::admin_url('store'))}}" method="post" id="form" enctype="multipart/form-data">
           <!-- // CSRF token for securing form field from hacker-->
           {{ csrf_field() }}
           
             <input type="hidden" name="store_id" id="store_id" value="{{old('store_id')}}">

              <label class="control-label">Status:<span style="color:red;">*</span></label>
             <div class="chatsearch">
              <select id="status" class="input-block-level" name="status">
                <option value="">- - - Select Status - - - </option>
                <option value="Y" {{ old('status')=='Y' ? 'selected' : '' }}>Active</option>
                <option value="N" {{ old('status')=='N' ? 'selected' : '' }}>Inactive</option>
              </select>
            </div>

             <label class="control-label">Store name:<span style="color:red;">*</span></label>
             <div class="chatsearch">
              <input type="text" id="name" name="name" class="input-block-level" placeholder="Name" value="{{old('name')}}{{-- {{isset($banner->id)?$banner->name:old('name')}} --}}" />
              @if ($errors->has('name'))
              <span id="name-error" class="error">{{-- {{ $errors->first('name') }} --}}</span>
               @endif 
            </div>

            <label class="control-label">Adddress:<span style="color:red;">*</span></label>
            <div class="chatsearch">
            <textarea class="input-block-level" id="adddress" name="adddress">{!!old('adddress')!!}</textarea>
             {{-- <input type="text" id="adddress" name="adddress" class="input-block-level" placeholder="Address" value="{{old('adddress')}}{{isset($banner->id)?$banner->adddress:old('adddress')}}" /> --}}
             @if ($errors->has('adddress'))
              <span id="adddress-error" class="error">{{ $errors->first('adddress') }}{{-- The field may not be greater than 25 characters. --}}</span>
             @endif 
           </div>

           <label class="control-label">City:<span style="color:red;">*</span></label>
            <div class="chatsearch">
                <select id="city_id" class="input-block-level" name="city_id">
                <option value="">- - - Select City - - - </option>
                @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_id')== $city->id ? 'selected' : '' }}>{{ $city->city_name }}</option>
                @endforeach
                </select>
            </div>

            <label class="control-label">Type:<span style="color:red;">*</span></label>
             <div class="chatsearch">
              <select id="type" class="input-block-level" name="type">
                <option value="">- - - Select Type - - - </option>
                <option value="store" {{ old('type')=='store' ? 'selected' : '' }}>Store</option>
                <option value="restaurant" {{ old('type')=='restaurant' ? 'selected' : '' }}>Restaurant</option>
                <option value="medical" {{ old('type')=='medical' ? 'selected' : '' }}>Medical</option>
                <option value="vegetable" {{ old('type')=='vegetable' ? 'selected' : '' }}>Vegetable</option>
              </select>
            </div>

            <label class="control-label">Note:</label>
             <div class="chatsearch">
               <textarea id='notes' name="notes" rows="3" class="input-block-level span12"></textarea>
            </div>

           
            <div class="par">
              <label>Open Time:</label>
              <div class="input-append bootstrap-timepicker">
                <input id="open_time" type="text" name="open_time" class="form-control input-small" style="height: 22px;">
                <span class="add-on"><i class="iconfa-time"></i></span>
              </div>
            </div>
            <div class="par">
              <label>Close Time:</label>
              <div class="input-append bootstrap-timepicker" >
                <input id="close_time" type="text" name="close_time" class="form-control input-small" style="height: 22px;">
                <span class="add-on"><i class="iconfa-time"></i></span>
              </div>
            </div>

            <label class="control-label">Close Day:</label>
            <div class="chatsearch">
             <select id="close_day" class="input-block-level" name="close_day">
               <option value="">- - - Select Day - - - </option>
               '',','',','',','
               <option value="Mon" {{ old('close_day')=='Mon' ? 'selected' : '' }}>Monday</option>
               <option value="Tue" {{ old('close_day')=='Tue' ? 'selected' : '' }}>Tuesday</option>
               <option value="Wed" {{ old('close_day')=='Wed' ? 'selected' : '' }}>Wednesday</option>
               <option value="Thu" {{ old('close_day')=='Thu' ? 'selected' : '' }}>Thursday</option>
               <option value="Fri" {{ old('close_day')=='Fri' ? 'selected' : '' }}>Friday</option>
               <option value="Sat" {{ old('close_day')=='Sat' ? 'selected' : '' }}>Saturday</option>
               <option value="Sun" {{ old('close_day')=='Sun' ? 'selected' : '' }}>Sunday</option>
             </select>
           </div>

            <label class="control-label" id="validation_size">Logo(200x200):</label>
            <div class="chatsearch">
                <input type="file" id="logo"  name="logo" class="imagefile"  value="Upload"/><br>
                <img id="show_logo" src="#" alt="your image" />
                <button class="btn btn-primary" type="button" onclick="" id="delete_image">Delete</button>
                <input type="hidden" name="delete_img" id="delete_img" value="{{isset($details_for_updation[0]->id)?$details_for_updation[0]->logo:''}}">
                @if ($errors->has('logo'))
                @foreach ($errors->all() as $error)
                  <span id="logo-error" class="error"><br>{{ $error }}</span>
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

    jQuery(document).ready( function ($) {

        $('#open_time').timepicker({
            showMeridian: true ,
            defaultTime: '10:00 a',   

        });
        $('#close_time').timepicker({
            showMeridian: true,
            defaultTime: '08:00 p'    
        });

    $('#delete_image').hide();
    $('#show_logo').hide();
    $('#delete-msg').hide();

     $('#dyntable').DataTable({
      // "pageLength": 50,
        
    //  processing: false,
    //  serverSide: true,
     ajax: "{{url(Helpers::admin_url('store'))}}",
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
      {
            "targets": 5,   // choose the correct column
            "render": function ( data, type, full,meta ) {
                if(data) {
                    return '<span style="text-align:center"><img width="100" height="100" src="{{asset('storage/image/store')}}'+'/'+data+'"/></span>';
                }
                $('#delete_image').hide();
                return '<span style="text-align:center" ><img width="100" height="100" src="{{asset('assets/images/bg1.png')}}"/></span>';
              }
      }

      ], 
     //----------------------------------------
     columns: [
               { data: 'id', name: 'id', visible: false   },
              //  { data: 'cms_status', name: 'cms_status', orderable: false,searchable: false},
               { data: 'status', name: 'status'},
               { data: 'type', name: 'type'},
               { data: 'name', name: 'name'},
               { data: 'adddress', name: 'adddress' },
               { data: 'logo', name: 'logo' },
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
      var store_id =  id;
      //console.log(id);
      //$("#form").append("<span class='update-method'><input type='hidden' name='_method' value='PUT'></span>");
      //var formAction="{{url(Helpers::admin_url('category/'))}}/"+ store_id;
      //$("#form").attr("action", formAction);
      //it shows @ method('POST') which means in laravel it is used for updation using resource controller so we need to show it
      
            
              if(store_id){
                $.ajax({
                 type:"GET",
                 url:'{{url(Helpers::admin_url('store'))}}/' + store_id +'/edit',
                 dataType: "json",
                 success:function(res){               
                    if(res){
                      $('#store_id').val(res.id);
                      $('#status').val(res.status);
                      $('#name').val(res.name);
                      $('#adddress').val(res.adddress);
                      $('#city_id').val(res.city_id);
                      $('#type').val(res.type);
                      $('#notes').val(res.notes);
                      $('#open_time').val(res.open_time);
                      $('#close_time').val(res.close_time);
                      $('#close_day').val(res.close_day);
                      
                      

                      if (res.logo){
                        $('#logo').hide();
                        jQuery('#show_logo').show();
                        jQuery('#delete_image').show();
                        
                        jQuery('#show_logo').attr('src','{{asset('storage/image/store')}}/'+res.logo);
                        jQuery('#delete_img').val(res.logo);
                      }
                      else{
                        $('#show_logo').hide('');
                        $('#logo').show();
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
          $('#show_logo').show();
          $('#logo').hide();
          $('#delete_image').show();

          $('#show_logo').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
      $("#logo").change(function() {
      readURL(this);
    });

    //remove image form input file element
    $('#delete_image').on('click', function(e) { 
    // e.preventDefault();
      delete_image();

     });

     function  delete_image(){
        $('#delete_image').hide();
        $('#logo').val('');
        $('#show_logo').hide();
        $('#logo').show();
        $('#delete_img').attr('value','');
      }

   //dellete specific banner
   $('body').on('click', '#delete-user', function (e) {
      e.stopPropagation();

      $(".message").hide();
      
        
        var store_id = $(this).data("id");
          //var permissio_for_deletion=confirm("Are You sure want to delete !");
        var permissio_for_deletion;
        jConfirm('Are You sure want to delete !', 'Delete Store',function(r) {
                    if(r)
                    {
                      $.ajax({
                        type: "get",
                        url:'{{url(Helpers::admin_url("store"))}}/delete/' + store_id,
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
          $('#logo').show();
          $('#show_logo').hide();
          $('#delete_image').hide();
          $('span.error').hide();
          $( ".form-title" ).text( "Add {{$BreadCrumbPageHeader['breadcrumb']}}" );


          //it clear all the input field of form
          $('.input-block-level').val('');
          $('#submit').val("Submit");
          $('#submit').attr('name',"submit");
          $('#store_id').val('');
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
            name:{
                required: true,

            },
            status:{
              required:true,
            },
            adddress:{
              required:true,
            },
            city_id:{
              required:true,
            },
            type:{
              required:true,
            },
            
            
        },
      });
//form validation ends here     
   });

   //form validation starts he

   
   
   </script>
@endsection