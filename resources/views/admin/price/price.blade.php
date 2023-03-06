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
          {{-- 1 --}}<col class="con0" width="15%" />
          {{-- 2 --}}<col class="con1" width="15%" />
          {{-- 3 --}}<col class="con0" width="44%" />
          {{-- 4 --}}<col class="con1" width="16%" />
        </colgroup>
        <thead>
          <tr>
            {{-- 0 --}}<th class="head1">Id</th>
            {{-- 1 --}}<th class="head0">start-km</th>
            {{-- 2 --}}<th class="head1">end-km</th>
            {{-- 3 --}}<th class="head0">price</th>
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
          
          <form action="{{url(Helpers::admin_url('price'))}}" method="post" id="form" enctype="multipart/form-data">
           <!-- // CSRF token for securing form field from hacker-->
           {{ csrf_field() }}
           
             <input type="hidden" name="price_id" id="price_id" value="{{old('price_id')}}">

             <label class="control-label">Start Km:<span style="color:red;">*</span></label>
             <div class="chatsearch">
              <input type="number" id="start_km" name="start_km" class="input-block-level" placeholder="Start km" value="{{old('start_km')}}{{-- {{isset($banner->id)?$banner->start_km:old('start_km')}} --}}" />
              @if ($errors->has('start_km'))
              <span id="start_km-error" class="error">{{-- {{ $errors->first('start_km') }} --}}The field may not be greater than 25 characters.</span>
               @endif 
            </div>
            <label class="control-label">End Km:<span style="color:red;">*</span></label>
            <div class="chatsearch">
             <input type="number" id="end_km" name="end_km" class="input-block-level" placeholder="End km" value="{{old('end_km')}}{{-- {{isset($banner->id)?$banner->end_km:old('end_km')}} --}}" />
             @if ($errors->has('end_km'))
             <span id="end_km-error" class="error">{{ $errors->first('end_km') }}{{-- The field may not be greater than 25 characters. --}}</span>
              @endif 
           </div>
           <label class="control-label">Price:<span style="color:red;">*</span></label>
            <div class="chatsearch">
             <input type="number" id="price" name="price" class="input-block-level" placeholder="Start km" value="{{old('price')}}{{-- {{isset($banner->id)?$banner->price:old('price')}} --}}" />
             @if ($errors->has('price'))
             <span id="price-error" class="error">{{-- {{ $errors->first('price') }} --}}The field may not be greater than 25 characters.</span>
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
     ajax: "{{url(Helpers::admin_url('price'))}}",
     //------------------------------------------------------
     /* "columnDefs": [{
            "targets": 0,   // choose the correct column
            "render": function ( data, type, full,meta ) {
                if(data=='Y') {
                    return '<span style="text-align:center"><img src="{{asset('assets/images/active-16.png')}}"/></span>';
                }
                return '<span style="text-align:center" ><img src="{{asset('assets/images/inactive-16.png')}}"/></span>';
              }
      },
      {
            "targets": 1,   // choose the correct column
            "render": function ( data, type, full,meta ) {
                if(data) {
                    return '<span style="text-align:center"><img width="100" height="100" src="{{asset('public/image/cms-pages')}}'+'/'+data+'"/></span>';
                }
                return '<span style="text-align:center" ><img width="100" height="100" src="{{asset('assets/images/bg1.png')}}"/></span>';
              }
      }

      ], */
     //----------------------------------------
     columns: [
               { data: 'id', name: 'id', visible: false  },
              //  { data: 'cms_status', name: 'cms_status', orderable: false,searchable: false},
               { data: 'start_km', name: 'start_km'},
               { data: 'end_km', name: 'end_km' },
               { data: 'price', name: 'price' },
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
      var price_id =  id;
      //console.log(id);
      //$("#form").append("<span class='update-method'><input type='hidden' name='_method' value='PUT'></span>");
      //var formAction="{{url(Helpers::admin_url('category/'))}}/"+ price_id;
      //$("#form").attr("action", formAction);
      //it shows @ method('POST') which means in laravel it is used for updation using resource controller so we need to show it
      
            
              if(price_id){
                $.ajax({
                 type:"GET",
                 url:'{{url(Helpers::admin_url('price'))}}/' + price_id +'/edit',
                 dataType: "json",
                 success:function(res){               
                    if(res){
                      $('#price_id').val(res.id);
                      $('#start_km').val(res.start_km);
                      $('#end_km').val(res.end_km);
                      $('#price').val(res.price);

                      if (res.cms_image){
                      $('#cms_image').hide();
                      jQuery('#show_cms_image').show();
                      jQuery('#show_cms_image').attr('src','{{asset('public/image/cms-pages')}}/'+res.cms_image);
                      jQuery('#delete_img').val(res.cms_image);
                    }
                    else{
                     $('#show_cms_image').hide('');
                     $('#cms_image').show();
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
      
        
        var price_id = $(this).data("id");
          //var permissio_for_deletion=confirm("Are You sure want to delete !");
        var permissio_for_deletion;
        jConfirm('Are You sure want to delete !', 'Delete Price',function(r) {
                    if(r)
                    {
                      $.ajax({
                        type: "get",
                        url:'{{url(Helpers::admin_url("price"))}}/delete/' + price_id,
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
          $('#cms_short_description').val('');
          $('#submit').val("Submit");
          $('#submit').attr('name',"submit");
          $('#price_id').val('');
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
            start_km:{
                required: true,
                number:true,
                // lessThan:"#end_km"

            },
            end_km:{
                required: true,
                number:true,
                greaterThan: "#start_km" 
            },
            price:{
              required:true,
              number:true
            },
            
        },
      });
//form validation ends here     
   });

   //form validation starts he

   
   
   </script>
@endsection