@extends(Helpers::file_path("mainLayout"))
@section('dashboard-left')
<div class="maincontent">
    <div class="maincontentinner" >
      <div class="row-fluid">
        <div id="dashboard-left" class="span8" style="width: 100%;">
          <h4 class="widgettitle">Users</h4>
          <div class="widgetcontent" >

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


            <table id="dyntable" class="table table-bordered responsive data-table" style="width: 100%">
              <colgroup>                                         
                  <col class="con0" style="width:10%%;" >
                  <col class="con1" style="width:40%;">
                  <col class="con0" style="width:40%;" >
                  <col class="con1" style="width:10%;" >
              </colgroup>
              <thead>
                <tr>
                    <th class="center hide_in_export">Status</th>
                    <th>Name</th>
                    {{-- <th>Phone</th> --}}
                    {{-- <th>Alternate Number</th>    --}}
                    <th>Email</th> 
                    {{-- <th>Location</th>  --}}
                    {{-- <th>Reg. Date</th> --}}
                    {{-- <th>Remark</th> --}}
                    <th class="head1 hide_in_export">Action</th>

                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>{{-- widgetcontent --}}
        </div><!--dashboard-left-->

  </div><!--tabbedwidget-->
@endsection
@section('script')
<script type="text/javascript">

    jQuery(document).ready( function ($) {
        //call to datatable 
     $('.data-table').DataTable();

        $('#delete-msg').hide();

        // fill_datatable();
          //on clicking add button it will redirect to the form
        jQuery('#add_data').on('click',function(){
            window.location = "{{url(Helpers::admin_url('add_user'))}}";
        });
    
        
       
        jQuery('#from_date').datepicker({
            changeMonth:true,
            changeYear:true,
            dateFormat:'yy-mm-dd',
            onSelect: function (dateText, inst) {
                jQuery( "#to_date" ).datepicker( "option", "minDate", dateText );
            }     
        });
        jQuery('#to_date').datepicker({
            changeMonth:true,
            changeYear:true,
            dateFormat:'yy-mm-dd',
            /*onSelect: function (dateText, inst) {
                //jQuery( "#from_date" ).datepicker( "option", "maxDate", dateText );
            } */    
        });

      
    
        //on clicking add button it will redirect to the form
        jQuery('#add_data').on('click',function(){
            window.location = "{{url(Helpers::admin_url('add_user'))}}";
        });
    
                // on click on the search filter input
         $('#filter').click(function(){
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var txtPhone = $('#txtPhone').val();
            var search_user_by_status = $('#search_user_by_status').val();
    
          
            //console.log(from_date);
    
            if(from_date != '' ||  to_date != '' || txtPhone != '' || search_user_by_status!='')
            {
                $('.data-table').DataTable().destroy();
                fill_datatable(from_date, to_date, txtPhone,search_user_by_status);
            }
            else
            {
                jAlert('Select at least on Filter option');
            }
        });
    
        $('#filter_reset').click(function(){
            $('#from_date').val('');
            $('#to_date').val('');
            $('#txtPhone').val('');
            $('#search_user_by_status option:selected').each(function() {
                $(this).prop('selected', false);
            });
            $('#search_user_by_status').multiselect('refresh');
            $('#dyntable').DataTable().destroy();
            fill_datatable();
        });
    
    
        $('body').on('click', '#delete-user', function (e) {
            e.stopPropagation();
            $(".message").hide();
          
            
            var manage_user_id = $(this).data("id");
              //var permissio_for_deletion=confirm("Are You sure want to delete !");
            var permissio_for_deletion;
            jConfirm('Are You sure want to delete !', 'Delete user',function(r) {
                        if(r)
                        {
                          $.ajax({
                            type: "get",
                            url:'{{url(Helpers::admin_url("manage_users"))}}/delete/' + manage_user_id,
                            success: function (data) {
                              //console.log('asd');
                              jQuery('#delete-msg').show();
    
                              var oTable = $('#dyntable').dataTable(); 
                              oTable.fnDraw(false);
                            },
                            error: function (data) {
                              //console.log('Error:', data);
                            }
                          });  
                        }
                        else{
                          $('#delete-msg').hide();
                        }
                      });
        });
    
        // initialize the plugin
        /*$('#form').validate({ 
            errorElement: "span",
            rules: {
                from_date:{
                    required: true      
                },
                to_date:{
                    required:true,
                },
                txtPhone:{
                    required: true,
                }
               
            },
        });*/
    });
    </script>
@endsection