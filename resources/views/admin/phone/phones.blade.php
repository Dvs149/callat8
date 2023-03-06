@extends(Helpers::file_path("mainLayout"))
@section('dashboard-left')
<div id="dashboard-left" class="span12">
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
          {{-- 0 --}}<col class="con1" width="60%" />
          {{-- 0 --}}<col class="con1" width="20%" />
          {{-- 1 --}}<col class="con0" width="20%" />
        </colgroup>
        <thead>
          <tr>
            <th>id</th>
            {{-- 0 --}}<th class="head1">Mobile</th>
            {{-- 0 --}}<th class="head1">Created</th>
            {{-- 1 --}}<th width="head0">Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    </div>
</div><!--span8-->
   <!-- Modal content-->
      <div class="widgetbox modal fade" id="myModal">
        <h4 class="widgettitle" id="model-title">
            Delete Order 
        </h4>
        <div class="widgetcontent"   style="margin-bottom: 0">
          <div id="remark-record" ></div>
         <label class="control-label">Remarks:<span style="color:red;">*</span></label>
         <form action="" id="remark_form" method="post">
           {{-- @csrf --}}
          <input type="hidden" id="customer_remark_id" name="customer_remark_id" value="">
          <input type="hidden" id="user_for" name="user_for" value="">
          {{-- <input type="hidden" id="remark" name="remark" value=""> --}}
          <textarea id='remark' name="remark" rows="5" class="span16"></textarea>
            <div id="popup_panel">
              <input type="submit" value="&nbsp;OK&nbsp;" style="color: #0866c6;border: 2px solid #0866c6;padding: 7px 0;background: #fff;"> 
              <input type="button" data-dismiss="modal" value="&nbsp;Cancel&nbsp;" style="color: #0866c6;border: 2px solid #0866c6;padding: 7px 0;background: #fff;">
            </div>
          </form>
        </div>
      </div>
      {{-- Filter modal ends here --}}
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
      var phones_id =  id;
      
      console.log(id);
      //$("#form").append("<span class='update-method'><input type='hidden' name='_method' value='PUT'></span>");
      //var formAction="{{url(Helpers::admin_url('driver/'))}}/"+ phones_id;
      //$("#form").attr("action", formAction);
      //it shows @ method('POST') which means in laravel it is used for updation using resource controller so we need to show it
      
            
              if(phones_id){
                $.ajax({
                 type:"GET",
                 url:'{{url(Helpers::admin_url('phones'))}}/' + phones_id +'/edit',
                 dataType: "json",
                 success:function(res){               
                    if(res){
                      // console.log(res);
                      $('#phones_id').val(res.id);
                      $('#mobile').val(res.mobile);
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
     ajax: "{{url(Helpers::admin_url('phones'))}}",
     //----------------------------------------
     columns: [
               { data: 'id', name: 'id' , visible: false },
               { data: 'mobile', name: 'mobile'},
               { data: 'created_at', name: 'created_at'},
               {data: 'action', name: 'action', orderable: false, searchable: false},
              ],
              "columnDefs": [
      {
            "targets": 2,   // choose the correct column
            "render": function ( data, type, full,meta ) {
                  if(data){
                    var d = new Date(data); 
                    return d.toLocaleDateString('en-GB') +', '+ d.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
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
      
        
        var phones_id = $(this).data("id");
        jConfirm('Are You sure want to delete !', 'Delete Phone Number',function(r) {
                    if(r)
                    {
                      $.ajax({
                        type: "get",
                        url:'{{url(Helpers::admin_url("phones"))}}/delete/' + phones_id,
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

 /*  function  delete_image(){
        $('#delete_image').hide();
        $('#email').val('');
        $('#aadhar_card_photo').hide();
        $('#email').show();
        $('#delete_img').attr('value','');
      } */

    $('body').on('click', '.remark', function (e) {
      e.stopPropagation();
        var customer_id = $(this).data("id");
        var remark_old_data = $(this).closest('tr').find('.remark-data').text();
        console.log( remark_old_data );
        $("#customer_remark_id").val(customer_id);
        $('#model-title').html('View call for Update');
        $('#user_for').val('remark');
        $('#remark').val(remark_old_data);
        $('#myModal ').modal('show');
        
        var fd = new FormData();
        var task = $('#user_for').val();
        var task = $('#user_for').val();
        var token = $('input[name="csrfToken"]').attr('value');
        // var customer_id = $('#customer_id').val();
        fd.append(  'customer_id' , customer_id );
        $.ajax({
                    url: '{{url(Helpers::admin_url('phones'))}}/'+task+'/phonesRemark/'+customer_id,
                    headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: fd,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    beforeSend: function(){
                          $('#remark-record').html('<img id="remark-data-loader" src="http://localhost/callat7/assets/images/loaders/loader6.gif" alt="" style="align:center;">');
                    },
                    success: function ( data ) {
                      var remark_data_all = '';
                      Object.keys(data).forEach(function(key) {
                              var d = new Date(data[key].created_at); 
                              var created_at = d.toLocaleDateString('en-GB') +', '+ d.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true }); 
                              // console.log(created_at+'('+data[key].user.name+')'+' '+ data[key].remark);
                              remark_data_all = remark_data_all+'<p style="margin:0;"><span style="color:#0866c6">'+created_at+'('+data[key].user.name+')</span><span style="margin-left:5px">'+ data[key].remark+'</span></p>';
                      });
                      $('#remark-record').html(remark_data_all);
                    },
                    complete: function(){
                    }
                });
        });
        $('#remark_form').on('submit', function(e) {
              e.preventDefault();
            $(".message").remove();
            $('span.error').hide();
            // task depends on remark or delete action button in order management.
            var task = $('#user_for').val();
            if($('#remark').val()==''){
              $("#remark_form").valid()
              return false;
            }
            var fd = new FormData();
            var token = $('input[name="csrfToken"]').attr('value');
            var customer_id = $('#customer_remark_id').val();
            fd.append(  'customer_id' , customer_id );
            fd.append(  'remark',$('#remark').val() );

            $.ajax({
                          url: '{{url(Helpers::admin_url('phones'))}}/'+task+'/'+customer_id,
                          headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                          data: fd,
                          processData: false,
                          contentType: false,
                          type: 'POST',
                          beforeSend: function(){
                            /* <img src="images/loaders/loader6.gif" alt=""> */
                              $('#update-drivers').hide();
                              $('#update-drivers-loader').show();
                          },
                          success: function ( data ) {
                            // alert('d')
                            $('#update-drivers').show();
                              if(task == 'remark'){
                                $("#msg-remark").html('Remark submitted successfully');
                              } else {
                                $("#msg-remark").html('Deleted Successfully');
                              }
                              $('#delete-msg').show();
                              $('#update-drivers-loader').hide();
                              $('#remark').val('');
                              $('#myModal').modal('hide');
                              var d_Table = $('#dyntable').dataTable(); 
                                      d_Table.api().ajax.reload();

                          },
                          complete: function(){
                              $('#update-drivers').show();
                              $('#delete-msg').show();
                              $('#update-drivers-loader').hide();
                          }
                      });
            
            
          });

     $('#form').validate({ // initialize the plugin
        errorElement: "span",
        rules: {
          
            mobile:{
                required: true,
                maxlength:250
            },
        },
      });
      $('#remark_form').validate({ // initialize the plugin
        errorElement: "span",
        rules: {
            remark:{
                required: true,
            },
        },
      });
//form validation ends here     
   });

   //form validation starts he

   
   
   </script>
@endsection