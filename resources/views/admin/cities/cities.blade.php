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
          {{-- <col class="con1" width="0%" /> --}}
          {{-- 1 --}}<col class="con0" width="90%" />
          {{-- 6 --}}<col class="con1" width="10%" />
        </colgroup>
        <thead>
          <tr>
            {{-- 0 --}}<th class="head1">id</th>
            {{-- 1 --}}<th class="head0">City name</th>
            {{-- 7 --}}<th width="head1">Action</th>
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
          
          <form action="{{url(Helpers::admin_url('cities'))}}" method="post" id="form" enctype="multipart/form-data">
           <!-- // CSRF token for securing form field from hacker-->
           {{ csrf_field() }}
           
             <input type="hidden" name="cities_id" id="cities_id" value="">

          <label class="control-label">City name:<span style="color:red;">*</span></label>
          <div class="chatsearch">
          <input type="text" id="city_name" name="city_name" class="input-block-level" placeholder="Name" value="{{old("city_name")}}" />
           @if ($errors->has('city_name'))
           <span id="city_name_editor-error" class="error">The fiels may not be greater than 25 characters.</span>
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
    $('#show_pm_image').hide();
    $('#delete-msg').hide();

    $('#dyntable').DataTable({
      // "pageLength": 50,
        
    //  processing: false,
    //  serverSide: true,
     ajax: "{{url(Helpers::admin_url('cities'))}}",
     //------------------------------------------------------
     //----------------------------------------
     columns: [
              //  { data: 'id', name: 'id' , visible:false},
               { data: 'id', name: 'id', visible: false  },
               { data: 'city_name', name: 'city_name' },
               {data: 'action', name: 'action', orderable: false, searchable: false},
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


    $('#dyntable').on('click', 'tr', function () {
      $(".message").remove();
      $('span.error').hide();
      $( ".form-title" ).text( "Edit  {{$BreadCrumbPageHeader['breadcrumb']}}" );

      var id=($(this).closest('tr').attr('id')).slice(4);
      var cities_id =  id;
      // console.log(cities_id);
      //$("#form").append("<span class='update-method'><input type='hidden' name='_method' value='PUT'></span>");
      //var formAction="{{url(Helpers::admin_url('category/'))}}/"+ cities_id;
      //$("#form").attr("action", formAction);
      //it shows @ method('POST') which means in laravel it is used for updation using resource controller so we need to show it
      
            
              if(cities_id){
                $.ajax({
                 type:"GET",
                 url:'{{url(Helpers::admin_url('cities'))}}/' + cities_id +'/edit',
                 dataType: "json",
                 success:function(res){               
                    if(res){
                      // console.log(res);
                      $('#cities_id').val(res.id);
                      $('#city_name').val(res.city_name);

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
            
              
              var cities_id = $(this).data("id");
                //var permissio_for_deletion=confirm("Are You sure want to delete !");
              var permissio_for_deletion;
              jConfirm('Are You sure want to delete !', 'Delete City',function(r) {
                          if(r)
                          {
                            $.ajax({
                              type: "get",
                              url:'{{url(Helpers::admin_url("cities"))}}/delete/' + cities_id,
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
          $('#cities_id').val('');
    }

     $('#form').validate({ // initialize the plugin
        errorElement: "span",
        rules: {
            city_name:{
                required: true,
                maxlength:50,
            },
        },
      });
//form validation ends here     
   });

   //form validation starts he

   
   
   </script>
@endsection