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
        <table  style="width:100%; margin-top: 15px;" cellpadding="0" cellspacing="0" class="">
          <tr>
           <td>
             <label class="control-label" style="margin-top: 3px;"><b>Customer Name :</b> {{ $customer_data->sender_name }}</label>
           </td>
           <td>
             <label class="control-label" style="margin-top: 3px;"><b>Customer Mobile :</b> {{ $customer_data->sender_mobile }}</label>
           </td>
          </tr>
        </table>
         
      <table id="dyntable" class="table table-bordered overflow-auto responsive data-table" style="width: 100%">
        <colgroup>
          {{-- 0 --}}<col class="con1" width="5%" />
          {{-- 1 --}}<col class="con0" width="10%" />
          {{-- 2 --}}<col class="con0" width="25%" />
          {{-- 3 --}}<col class="con1" width="25%" />
          {{-- 4 --}}<col class="con0" width="25%" />
          {{-- 5 --}}<col class="con1" width="10%" />

        </colgroup>
        <thead>
          <tr>
            {{-- 0 --}}<th class="head0">id</th>
            {{-- 1 --}}<th class="head1">Default</th>
            {{-- 2 --}}<th class="head0">Type</th>
            {{-- 3 --}}<th class="head1">Address</th>
            {{-- 4 --}}<th class="head0">Landmark</th>
            {{-- 5 --}}<th width="head1">Action</th>
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
          
          <form action="{{url()->current()}}" method="post" id="form" enctype="multipart/form-data">
           <!-- // CSRF token for securing form field from hacker-->
           {{ csrf_field() }}
           
             <input type="hidden" name="address_id" id="address_id" value="{{old('address_id')}}">

          <label class="control-label">Default:<span style="color:red;">*</span></label>
          
         <div class="chatsearch">
            <select id="default_address" class="input-block-level" name="default_address">
              <option value="Y" {{ old('default_address')=='Y' ? 'selected' : '' }}>Yes</option>
              <option value="N" {{  old('default_address')=='N' ? 'selected' : '' }}>No</option>
            </select>
          </div>

          <label class="control-label">Type:<span style="color:red;">*</span></label>
          
          <div class="chatsearch">
              <select id="address_type" class="input-block-level" name="address_type">
                  <option value="Home" {{ old('address_type')=='Home' ? 'selected' : '' }}>Home</option>
                  <option value="Work" {{  old('address_type')=='Work' ? 'selected' : '' }}>Work</option>
                  <option value="Other" {{  old('address_type')=='Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            
            <label class="control-label">Other Name:</label>
            <div class="chatsearch">
            <input type="text" id="other_name" name="other_name" class="input-block-level" placeholder="Other Name" value="{{old("other_name")}}" />
             @if ($errors->has('other_name'))
             <span id="other_name-error" class="error"></span>
              @endif 
           </div>
           
           <label class="control-label">Address:<span style="color:red;">*</span></label>
            <div class="chatsearch">
            <textarea name="address" id="address" class="input-block-level" rows="3"></textarea>
            {{-- <input type="text" id="address" name="address" class="input-block-level" placeholder="Name" value="{{old("address")}}" /> --}}
             @if ($errors->has('address'))
             <span id="address-error" class="error">The fiels may not be greater than 25 characters.</span>
              @endif 
           </div>

           <label class="control-label">Landmark:<span style="color:red;">*</span></label>
           <div class="chatsearch">
               <input type="text" id="landmark" name="landmark" class="input-block-level" placeholder="" value="{{old("landmark")}}" />
               @if ($errors->has('landmark'))
           <span id="landmark-error" class="error">The fiels may not be greater than 25 characters.</span>
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
    $('#delete-msg').hide();

    $('#dyntable').DataTable({
      // "pageLength": 50,
        
    //  processing: false,
    //  serverSide: true,
     ajax: "{{ url()->current()}}",
     //------------------------------------------------------
     //----------------------------------------
     columns: [
        { data: 'id', name: 'id' , visible:false},
               { data: 'default_address', name: 'default_address'},
               { data: 'address_type', name: 'address_type' },
               { data: 'address', name: 'address' },
               { data: 'landmark', name: 'sender_mobile' },
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
    function reset(){

        $(".message").hide();
        $('#delete-msg').hide();
        $('span.error').hide();
        jQuery('.highlight').removeClass('highlight');
        $( ".form-title" ).text( "Add {{$BreadCrumbPageHeader['breadcrumb']}}" );


        //it clear all the input field of form
        $('.input-block-level').val('');
        $('#submit').val("Submit");
        $('#submit').attr('name',"submit");
        $('#customer_id').val('');
    }

    $('#dyntable').on('click', 'tr', function () {
      $(".message").remove();
      $('span.error').hide();
      $( ".form-title" ).text( "Edit  {{$BreadCrumbPageHeader['breadcrumb']}}" );

      var id=($(this).closest('tr').attr('id')).slice(4);
      var customer_id =  id;
      // console.log(customer_id);
      //$("#form").append("<span class='update-method'><input type='hidden' name='_method' value='PUT'></span>");
      //var formAction="{{url(Helpers::admin_url('category/'))}}/"+ customer_id;
      //$("#form").attr("action", formAction);
      //it shows @ method('POST') which means in laravel it is used for updation using resource controller so we need to show it
      
            
              if(customer_id){
                $.ajax({
                 type:"GET",
                 url:'{{url()->current()}}/' + customer_id +'/edit',
                 dataType: "json",
                 success:function(res){               
                    if(res){
                      $('#address_id').val(res.id);
                      $('#default_address').val(res.default_address);
                      $('#address').val(res.address);
                      $('#landmark').val(res.landmark);
                      $('#other_name').val(res.other_name);
                      $('#address_type').val(res.address_type);
                      
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
            
              
              var customer_id = $(this).data("id");
              console.log('{{url()->current()}}/delete/' + customer_id);
                //var permissio_for_deletion=confirm("Are You sure want to delete !");
              var permissio_for_deletion;
              jConfirm('Are You sure want to delete !', 'Delete Address',function(r) {
                          if(r)
                          {
                            $.ajax({
                              type: "get",
                              url:'{{url()->current()}}/delete/' + customer_id,
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

    $('#form').validate({ // initialize the plugin
        errorElement: "span",
        rules: {
          status:{
                required: true,
            },
            // created_on:{
            //     required: true,
            // },
            // sender_name:{
            //     required: true,
            // },
            landmark:{
                required: true,
            },
            sender_mobile:{
                required: true,
            },
            address:{
                required: true,
            },
        },
      });
   });

</script>
@endsection