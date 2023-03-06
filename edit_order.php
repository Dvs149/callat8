

<script type="text/javascript" src="js/bootstrap-timepicker.min.js"></script>

<script>
	jQuery(document).ready(function($){		
		jQuery('#dyntable1').dataTable({
			 "sPaginationType": "full_numbers",
			 "aaSorting": []
		});
		
		jQuery('.abo_get_date_order').datepicker({
			changeMonth:true,
			changeYear:true,
			dateFormat:'yy-mm-dd',
			//minDate : 0,
			onSelect: function (dateText, inst) {
				jQuery( ".abo_get_date_order" );
        	}			
		});
		
		
		var msg = '<?php echo $_REQUEST['msg']; ?>';
		if(msg==1){
			jAlert('Status Updated successfully!','Alert Dialog', function(){
				window.history.pushState( '', '', removeURLParameter(window.location.href, 'msg') );
			});			
		}

		if(msg==4){
			jAlert('Manual Discount Updated successfully!','Alert Dialog', function(){
				window.history.pushState( '', '', removeURLParameter(window.location.href, 'msg') );
			});			
		}
		
		
		$("#abo_status").change(function(){
			var status = jQuery(this).val();
			$(".status_details").hide();
			$(".seller_payment_status_detail").hide();
			switch(status) {
				case 'Packed':
					$('#packed_order_detail').show();
					break;
				case 'Shipped':
					$('#Shipped_detail').show();
					break;
				case 'Delivered':
					$('#deliver_order_detail').show();
					break;
				case 'Return':
					$('#retuen_order_detail').show();
					break;
				case 'Deleted':
					$('#delete_order_detail').show();
					break;
				case 'Cancel':
					$('#cancel_order_detail').show();
					break;
				case 'Complete':
					$('#complete_order_detail').show();
					break;
				case 'Return Completed':
					$('#return_completed_order_detail').show();
					break;
				default:
					break;
			}
		});
		
		//.......Seller Payment Status change event.........//
		$("#abo_selelr_payment_status").change(function(){
			var selelr_payment_status = jQuery(this).val();
			$(".status_details").hide();
			$(".seller_payment_status_detail").hide();
			
			switch(selelr_payment_status) {
				case 'Invoice Generated':
					$('#invoice_received_detail').show();
					break;
				case 'Paid':
					$('#paid_detail').show();
					break;
				default:
					break;
			}
			
		});
		//.......Seller Payment Status event.........//
		$("#update_manual_discount_frm").submit(function(){
			if(jQuery("#abo_manual_discount").length > 0){

				if(jQuery('#abo_manual_discount').val() != '' && eval(jQuery('#abo_manual_discount').val()) > eval(jQuery('#abo_net_amount').val())){
					jAlert("Please Enter Amount Less Than Net Amount!",'Alert Dialog', function(){
							jQuery('#abo_manual_discount').val('');
					});
					return false;
				}else{
					return true;
				}		
			}
		});
	});
</script>
<style type="text/css">
	#update_manual_discount_frm input[type="text"]{width: auto; max-width: 70px;}
</style>
</head>
<body>
<div id="mainwrapper" class="mainwrapper">
  <div class="header">
    <?php include('Include/header.php'); ?>
  </div>
  <div class="leftpanel">
    <?php include('Include/left_menu.php'); ?>
  </div>
  <div class="rightpanel">
    <ul class="breadcrumbs">
      <li><a href="dashboard.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
      <li>Manage Orders</li>
      
      
    </ul>
    <div class="pageheader">
    	<div class="searchbar" >
             <a href="manage_orders.php"><button class="btn btn-primary btn-large">Back</button></a>
         </div>   
      <div class="pageicon"><span class="iconfa-shopping-cart"></span></div>
      <div class="pagetitle">
        <h5>Manage All of your Orders.</h5>
        <h1>Manage Orders</h1>
      </div>
    </div>
    <!--pageheader-->
    <div class="maincontent">
      <div class="maincontentinner">
        <div class="row-fluid" >
          <div class="span12">
            <div class="widgetbox">
              <div class="headtitle">
                <h4 class="widgettitle">Order Details
                	<a href="tcpdf/order_generateinvoice.php?abo_id=<?php echo $abo_id; ?>" target="_blank">
		                <input style="float:right; margin-top:-7px;" type="button" name="btnGenerateInvoice" id="btnGenerateInvoice" class="btn btn-success"  value="Generate Invoice" >
                    </a>
                </h4>
              </div>
              <div class="widgetcontent" >
              <div class="span12" style="margin-bottom:20px;">
              		<?php 
              		if($_SESSION['admin_id']!=1){
						$disabled = '';
						$hide = '';
						
						if($order['abo_status']=='Complete' || $order['abo_status']=='Cancel'){						
											
							$disabled =  'disabled="disabled"';
							$hide = "display:none"; 
						}if($order['abo_status']=='Shipped' || $order['abo_status']=='Packed' || $order['abo_status']=='Return' ){
							$disabled_pen =  'disabled="disabled"';
							$hide = "display:none"; 
						}else if($order['abo_status']=='Delivered'){
							$disabled_Delivered =  'disabled="disabled"';
						}
						else if($order['abo_status']=='Deleted' ){
							//$disabled =  'disabled="disabled"';
						}
					}
					?>
                    <form onSubmit="return validate();" name="status_frm" id="status_frm" action="" method="post" class="res_edit_frm">
                        <input type="hidden" name="abo_id" id="abo_id" value="<?php echo $abo_id; ?>" > 
                        
                        <ul style="list-style:none;">
                            <li style="float:left;"> 
		                        <label style="float:left; padding-top:4px; width:100px;" >Order Status : </label>&nbsp;
                                <select name="abo_status" id="abo_status" class="edit_order_select">
                                   
                                    <option <?php echo $disabled; echo $disabled_pen; echo $disabled_Delivered; echo $paid_seller_disabled; ?> <?php if($order['abo_status']=='Pending'){ echo 'selected="selected"'; } ?> value="Pending">Pending</option>
                                    <option <?php echo $disabled; echo $disabled_Delivered; echo $paid_seller_disabled; ?> <?php if($order['abo_status']=='Packed'){ echo 'selected="selected"'; } ?> value="Packed">Packed</option>
                                    <option <?php echo $disabled; echo $disabled_Delivered; echo $paid_seller_disabled; ?> <?php if($order['abo_status']=='Shipped'){ echo 'selected="selected"'; } ?> value="Shipped">Shipped</option>
                                    <option <?php echo $disabled;?> <?php if($order['abo_status']=='Delivered'){ echo 'selected="selected"'; } ?> value="Delivered">Delivered </option>
                                    
                                    <option <?php echo $disabled;?> <?php if($order['abo_status']=='Return'){ echo 'selected="selected"'; } ?> value="Return">Return </option>        
                                    
                                    <!--<option <?php echo $disabled; echo $disabled_Delivered; ?> <?php if($order['abo_status']=='Cancel'){ echo 'selected="selected"'; } ?> value="Cancel">Cancelled </option>-->
                                    
                                    <option <?php echo $disabled_Delivered." ".$disabled; ?> <?php if($order['abo_status']=='Deleted'){ echo 'selected="selected"'; } ?> value="Deleted">Deleted</option>
                                    <option <?php echo $disabled; ?> <?php if($order['abo_status']=='Return Completed'){ echo 'selected="selected"'; } ?> value="Return Completed">Return Completed</option>
                                    <option <?php echo $disabled; ?> <?php if($order['abo_status']=='Complete'){ echo 'selected="selected"'; } ?> value="Complete">Complete</option>
                                </select>
                            </li>
                            <li style="float:left;">
 		                       <label style="float:left; padding-top:4px; margin-left:10px;" >Seller Payment Status : </label>&nbsp;
                                <select name="abo_selelr_payment_status" id="abo_selelr_payment_status" class="edit_order_select">
                                   <option value="Pending" <?php echo ($order['abo_selelr_payment_status']=='Pending') ? 'selected' : '';?> <?php echo ($order['abo_selelr_payment_status'] == 'Invoice Generated' || $order['abo_selelr_payment_status'] == 'Paid') ? 'disabled' : ''; ?>>Pending</option>
                                   <option value="Paid" <?php echo ($order['abo_selelr_payment_status']=='Paid') ? 'selected' : '';?> >Paid</option>
                                   <option value="Invoice Generated" <?php echo ($order['abo_selelr_payment_status']=='Invoice Generated') ? 'selected' : '';?> <?php echo ($order['abo_selelr_payment_status'] == 'Paid') ? 'disabled' : ''; ?>>Invoice Generated</option>
                                </select> 
                            </li>
                            <li style="float:left; <?php// echo ($order['abo_payment_type'] == 'COD') ? "display:none;" : ''; ?>">
 		                       <label style="float:left; padding-top:4px; margin-left:10px;" >Payemnt Status : </label>&nbsp;
                                <select name="abo_payment_type" id="abo_payment_type" class="edit_order_select">
                                   <?php if($order['abo_payment_type'] == 'Online' || $order['abo_payment_type'] == 'Online - Payment Received'){ ?>
                                   	<option value="Online" <?php echo ($order['abo_payment_type']=='Online') ? 'selected' : '';?> <?php echo ($order['abo_payment_type']=='Online - Payment Received') ? 'disabled' : ''; ?>>Online Payment</option>
                                    <option value="Online - Payment Received" <?php echo ($order['abo_payment_type']=='Online - Payment Received') ? 'selected' : '';?> >Online Payment - Payment Received</option>
                                   <?php } ?>
                                   
                                   <?php if($order['abo_payment_type'] == 'paytm' || $order['abo_payment_type'] == 'Paytm - Payment Received'){ ?>
                                   <option value="paytm" <?php echo ($order['abo_payment_type']=='paytm') ? 'selected' : '';?> <?php echo ($order['abo_payment_type']=='Paytm - Payment Received') ? 'disabled' : ''; ?>>Paytm</option>
                                   <option value="Paytm - Payment Received" <?php echo ($order['abo_payment_type']=='Paytm - Payment Received') ? 'selected' : '';?>>Paytm - Payment Received</option>
                                   <?php } ?>
                                   <?php if($order['abo_payment_type'] == 'COD' || $order['abo_payment_type'] == 'Bank Payment Recieved'){ ?>
                                   <option value="COD" <?php echo ($order['abo_payment_type']=='COD') ? 'selected' : '';?>>Cash on Delivery</option>
                                   
                                   <?php } ?>
                                   <option value="Bank Payment Recieved" <?php echo ($order['abo_payment_type']=='Bank Payment Recieved') ? 'selected' : '';?>>Bank Payment Recieved</option>
                                </select> 
                            </li>
                        </ul>
                        
                        <span id="packed_order_detail" class="status_details" style="width: 100%;float: left;display:<?php if($order['abo_status']=='Packed'){ echo 'block';}else{ echo 'none'; } ?>" >
                          <ul style="list-style:none;">
                            <li style="float:left;"> 
                              <label style="float:left; padding-top:4px;  width:100px;" >Packed Date<span style="color:#FF0000;">*</span> : </label>&nbsp;
                              <input  type="text" class="abo_get_date_order" name="abo_packed_date" id="abo_packed_date" style="float:left; margin-left:6px;" value="<?php echo $order['abo_packed_date'] == '0000-00-00' ? '' : $order['abo_packed_date']; ?>" >
                            </li>
                            <li style="float:left; width:100%"> 
                              <label style="float:left; padding-top:4px;  width:100px;" >Notes<span style="color:#FF0000;">*</span> : </label>&nbsp;
                              <textarea name="abo_packed_reason" id="abo_packed_reason" style="float:left; margin-left:6px;" ><?php echo $order['abo_packed_reason']; ?></textarea>
                            </li>
                          </ul>
                      </span>
                          
                      <span id="Shipped_detail" class="status_details" style="width: 100%;float: left;display:<?php if($order['abo_status']=='Shipped'){ echo 'block';}else{ echo 'none'; } ?>" >
                          <ul style="list-style:none;">
                            <li style="float:left;"> 
                              <label style="float:left; padding-top:4px;  width:100px;" >Courier Name<span style="color:#FF0000;">*</span> : </label>&nbsp;
                              <input  type="text" name="abo_courier_name" id="abo_courier_name" style="float:left; margin-left:6px;" value="<?php echo $order['abo_shipped_courier_name']; ?>" >
                            </li>
                            <li style="float:left;">
                              <label style="float:left; padding-top:4px;  width:100px;">Track Number<span style="color:#FF0000;">*</span> : </label>&nbsp;
                              <input  type="text" name="abo_shipped_track_number" style="float:left; margin-left:6px;" id="abo_shipped_track_number" value="<?php echo $order['abo_shipped_track_number']; ?>" ><br>
                            </li>
                            <li style="float:left; display:none;">
                              <label style="float:left; padding-top:4px;  width:100px;">Courier Charge<span style="color:#FF0000;">*</span> : </label>&nbsp;
                              <input  type="text" name="abo_shipped_courier_charge" style="float:left; margin-left:6px;" id="abo_shipped_courier_charge" value="<?php echo $order['abo_shipped_courier_charge']; ?>" class="decimal_only" >
                            </li>
                            <li style="float:left;">
                              <label style="float:left; padding-top:4px;  width:100px;" >Tracking Link<span style="color:#FF0000;">*</span> : </label>&nbsp;
                              <input type="text" name="abo_shipped_notes" id="abo_shipped_notes" value="<?php echo $order['abo_shipped_notes']; ?>" >
                            </li>
                            <li style="float:left;">
                              <label style="float:left; padding-top:4px;  width:100px;" > Admin Notes : </label>&nbsp;
                              <textarea  type="text" name="abo_shipped_admin_notes" id="abo_shipped_admin_notes" ><?php echo $order['abo_shipped_admin_notes']; ?></textarea> 
                            </li>
                            <?php //if($order['abo_shipped_dates'] > 0 ){ ?>
                            <li style="float:left;">
                              <label style="float:left; width:100px;" >Shipped Date<span style="color:#FF0000;">*</span> : </label>
                              <!--<span><?php echo $order['abo_shipped_dates']; ?></span>-->
                              <input type="text" class="abo_get_date_order" name="abo_shipped_date" id="abo_shipped_date" value="<?php echo $order['abo_shipped_date'] == '0000-00-00' ? '' : $order['abo_shipped_date']; ?>"/>
                            </li>
                            <?php //} ?>
                          </ul>
                      </span>
                      
                      <span id="deliver_order_detail" class="status_details" style="width: 100%;float: left;display:<?php if($order['abo_status']=='Delivered'){ echo 'block';}else{ echo 'none'; } ?>" >
                          <ul style="list-style:none;">
                            <li style="float:left;"> 
                              <label style="float:left; padding-top:4px;  width:100px;" >Delivered Order Date<span style="color:#FF0000;">*</span> : </label>&nbsp;
                              <input  type="text" class="abo_get_date_order" name="abo_delivered_order_date" id="abo_delivered_order_date" style="float:left; margin-left:6px;" value="<?php echo $order['abo_delivered_order_date'] == '0000-00-00' ? '' : $order['abo_delivered_order_date']; ?>" >
                            </li>
                            <li style="float:left; width:100%"> 
                              <label style="float:left; padding-top:4px;  width:100px;" >Notes<span style="color:#FF0000;">*</span> : </label>&nbsp;
                              <textarea name="abo_delivered_reason" id="abo_delivered_reason" style="float:left; margin-left:6px;" ><?php echo $order['abo_delivered_reason']; ?></textarea>
                            </li>
                          </ul>
                      </span>
                          
                      <span id="retuen_order_detail" class="status_details" style="width: 100%;float: left;display:<?php if($order['abo_status']=='Return'){ echo 'block';}else{ echo 'none'; } ?>" >
                          <ul style="list-style:none;">
                            <li style="float:left;"> 
                              <label style="float:left; padding-top:4px;  width:100px;" >Return Order Date<span style="color:#FF0000;">*</span> : </label>&nbsp;
                              <input  type="text" class="abo_get_date_order" name="abo_return_order_date" id="abo_return_order_date" style="float:left; margin-left:6px;" value="<?php echo $order['abo_return_order_date'] == '0000-00-00' ? '' : $order['abo_return_order_date']; ?>" >
                            </li>
                            <li style="float:left; width:100%"> 
                              <label style="float:left; padding-top:4px;  width:100px;" >Reason<span style="color:#FF0000;">*</span> : </label>&nbsp;
                              <textarea name="abo_return_reason" id="abo_return_reason" style="float:left; margin-left:6px;" ><?php echo $order['abo_return_reason']; ?></textarea>
                            </li>
                          </ul>
                      </span>
                          
                      <span id="delete_order_detail" class="status_details" style="width: 100%;float: left;display:<?php if($order['abo_status']=='Deleted'){ echo 'block';}else{ echo 'none'; } ?>" >
                          <ul style="list-style:none;">
                            <li style="float:left;"> 
                              <label style="float:left; padding-top:4px;  width:100px;" >Deleted Order Reason<span style="color:#FF0000;">*</span> : </label>&nbsp;
                              <textarea name="abo_delete_reason" id="abo_delete_reason"><?php echo $order['abo_delete_reason']; ?></textarea>
                            </li>
                          </ul>
                      </span>
                          
                      <span id="cancel_order_detail" class="status_details" style="width: 100%;float: left;display:<?php if($order['abo_status']=='Cancel'){ echo 'block';}else{ echo 'none'; } ?>" >
                          <ul style="list-style:none;">
                            <li style="float:left;"> 
                              <label style="float:left; padding-top:4px;  width:100px;" >Cancel Order Date<span style="color:#FF0000;">*</span> : </label>&nbsp;
                              <input  type="text" class="abo_get_date_order" name="abo_cancel_order_date" id="abo_cancel_order_date" style="float:left; margin-left:6px;" value="<?php echo $order['abo_cancel_order_date'] == '0000-00-00' ? '' : $order['abo_cancel_order_date']; ?>" >
                            </li>
                          </ul>
                      </span>
                      <span id="return_completed_order_detail" class="status_details" style="width: 100%;float: left;display:<?php if($order['abo_status']=='Return Completed'){ echo 'block';}else{ echo 'none'; } ?>" >
                      <ul style="list-style:none;">
                      	<li style="float:left;"> 
                          <label style="float:left; padding-top:4px;  width:100px;" >Return Completed Order Date<span style="color:#FF0000;">*</span> : </label>&nbsp;
                          <input  type="text" class="abo_get_date_order" name="abo_return_completed_order_date" id="abo_return_completed_order_date" style="float:left; margin-left:6px;" value="<?php echo $order['abo_return_completed_order_date'] == '0000-00-00' ? '' : $order['abo_return_completed_order_date']; ?>" >
                        </li>
                        <li style="float:left; width:100%"> 
                              <label style="float:left; padding-top:4px;  width:100px;" >Notes<span style="color:#FF0000;">*</span> : </label>&nbsp;
                              <textarea name="abo_return_completed_reason" id="abo_return_completed_reason" style="float:left; margin-left:6px;" ><?php echo $order['abo_return_completed_reason']; ?></textarea>
                        </li>
                      </ul>
                      </span>
                      <span id="complete_order_detail" class="status_details" style="width: 100%;float: left;display:<?php if($order['abo_status']=='Complete'){ echo 'block';}else{ echo 'none'; } ?>" >
                      <ul style="list-style:none;">
                      	<li style="float:left;"> 
                          <label style="float:left; padding-top:4px;  width:100px;" >Complete Order Date<span style="color:#FF0000;">*</span> : </label>&nbsp;
                          <input  type="text" class="abo_get_date_order" name="abo_complete_order_date" id="abo_complete_order_date" style="float:left; margin-left:6px;" value="<?php echo $order['abo_complete_order_date'] == '0000-00-00' ? '' : $order['abo_complete_order_date']; ?>" >
                        </li>
                        <li style="float:left; width:100%"> 
                              <label style="float:left; padding-top:4px;  width:100px;" >Notes<span style="color:#FF0000;">*</span> : </label>&nbsp;
                              <textarea name="abo_complete_reason" id="abo_complete_reason" style="float:left; margin-left:6px;" ><?php echo $order['abo_complete_reason']; ?></textarea>
                        </li>
                      </ul>
                      </span>
                      <!-----Seller Payment Status------>
                      <span id="invoice_received_detail" class="seller_payment_status_detail" style="width: 100%;float: left;display:<?php if($order['abo_selelr_payment_status']=='Invoice Generated'){ echo 'block';}else{ echo 'none'; } ?>">
                      <ul style="list-style:none;">
                      	<li style="float:left;"> 
                      	<label style="float:left; padding-top:4px;  width:100px;" >Invoice Generated Date<span style="color:#FF0000;">*</span> : </label>&nbsp;
                          <input  type="text" class="abo_get_date_order" name="abo_seller_invoice_received_date" id="abo_seller_invoice_received_date" style="float:left; margin-left:6px;" value="<?php echo $order['abo_seller_invoice_received_date'] == '0000-00-00' ? '' : $order['abo_seller_invoice_received_date']; ?>" >
                      	</li>
                      </ul>
                      </span>
                      <span id="paid_detail" class="seller_payment_status_detail" style="width: 100%;float: left;display:<?php if($order['abo_selelr_payment_status']=='Paid'){ echo 'block';}else{ echo 'none'; } ?>">
                      <ul style="list-style:none;">
                      	<li style="float:left;"> 
                      	<label style="float:left; padding-top:4px;  width:100px;" >Paid Date<span style="color:#FF0000;">*</span> : </label>&nbsp;
                          <input  type="text" class="abo_get_date_order" name="abo_seller_payment_paid_date" id="abo_seller_payment_paid_date" style="float:left; margin-left:6px;" value="<?php echo $order['abo_seller_payment_paid_date'] == '0000-00-00' ? '' : $order['abo_seller_payment_paid_date']; ?>" >
                      	</li>
                      	<li style="float:left;"> 
                      	<label style="float:left; padding-top:4px;  width:140px;" >Reference Bank Detail<span style="color:#FF0000;">*</span> : </label>&nbsp;
                          <input  type="text" name="abo_ref_bank_detail" id="abo_ref_bank_detail" style="float:left; margin-left:6px;" value="<?php echo $order['abo_ref_bank_detail']; ?>" >
                      	</li>
                      </ul>
                      </span>
                      <!-----Seller Payment Status------>  
                         
                      <span style="width:100%; float:left; padding-top:10px">    
                          <label style="float:left; padding-top:4px;  width:100px;" ></label>
                          <input  style="margin-left:7px;"  type="submit" name="update_order_status" class="btn btn-success"  value="Submit" >       
                      </span>
                      <input type="hidden" value="<?php echo $order['abo_user_id']; ?>" name="abo_user_id" >
                      <input type="hidden" value="<?php echo $order['abo_order_number']; ?>" name="abo_order_number" >
                      <input type="hidden" value="<?php echo $order['abo_order_total']; ?>" name="abo_order_total" >
                  </form>      
              </div>
              
              <!--order shipping details-->
              <?php 
			  	$hide = '';
              	if($order['abo_status']=="Delivered" || $order['abo_status']=="Complete"){
					if($order['abo_status']=="Delivered"){
					$hide = "style='display:none'"; 
					}?>
              	<div class="span12 shipping_detail" style="border:1px solid #dddddd; padding-bottom:10px; display:inline-block;">
					<h4 style="width:150px; margin-top:-10px; padding:0 2px; margin-left:10px; background:white;">Order Status Details</h4>

 					<div class="row-fluid" style="margin-top:25px;">
					<div class="span4 res_edit_span" style="padding-left:25px;">
                     <h5>Shipping Details</h5>
					<table cellpadding="0" cellspacing="0" width="100%" style="margin-top:10px;margin-left:10px;">
                    	<tr>
                        	<td width="30%">Courier Name:</td>
                            <td width="70%" style="text-transform:capitalize;"><?php echo $order['abo_shipped_courier_name']; ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Track Number:</td>
                            <td width="70%" style="text-transform:capitalize;"><?php echo $order['abo_shipped_track_number']; ?></td>
                        </tr>
                        <tr>
                        	<td width="30%">Courier Charge:</td>
                            <td width="70%" style="text-transform:capitalize;"><i class="fa fa-inr " style="font-size:11px;"></i> <?php echo $order['abo_shipped_courier_charge']; ?></td>
                        </tr>
                        <tr>
                        	<td width="30%">Notes:</td>
                            <td width="70%" style="text-transform:capitalize;"><?php echo $order['abo_shipped_notes']; ?></td>
                        </tr>
                        <tr>
                        	<td width="30%">Admin Notes:</td>
                            <td width="70%" style="text-transform:capitalize;"><?php echo $order['abo_shipped_admin_notes']; ?></td>
                        </tr>
                        <tr>
                        	<td width="30%">Shipped Date:</td>
                            <td width="70%" style="text-transform:capitalize;"><?php if($order['abo_shipped_date']!='0000-00-00'){echo date('d/m/Y', strtotime($order['abo_shipped_date']));} ?></td>
                        </tr>
					</table>
					</div><!--span4-->
                    <div class="span4" <?php echo $hide;?>>
                    <h5>Delivered Details</h5>
                    <table cellpadding="0" cellspacing="0" width="100%" style="margin-top:10px;margin-left:10px;">
                    	<tr>
                        	<td width="40%">Delivered Order Date:</td>
                            <td width="60%" style="text-transform:capitalize;"><?php if($order['abo_delivered_order_date']!='0000-00-00'){echo date('d/m/Y',strtotime($order['abo_delivered_order_date']));} ?></td>
                        </tr>
                        <tr>
                            <td width="40%">Notes:</td>
                            <td width="60%" style="text-transform:capitalize;"><?php echo $order['abo_delivered_reason']; ?></td>
                        </tr>
					</table>
                    </div>
 					</div><!--row-fluid-->
			  </div><!--span12-->
              <?php } ?>
              <!--order shipping details-->
              
                      	
              <div class="span12" style="float:left;margin:0;">
              <?php 
					$sel_coupon_code = mysql_query("SELECT abcp_coupon_code FROM ab_coupon WHERE abcp_id = '".$order['abo_coupon_id']."'");
					$row_sel_coupon_code = mysql_num_rows($sel_coupon_code);
					$res_coupon_code = mysql_fetch_assoc($sel_coupon_code);
					if($row_sel_coupon_code > 0){
						?>
                        <span>Coupon Code : <?php echo $res_coupon_code['abcp_coupon_code']; ?><strong>
                        <?php	
					}
			 ?>
              </strong></span> <br>
              <span>Order Number : <strong><?php echo $order['abo_order_number']; ?></strong></span> <br>
              <span>Payment Method : <strong>
			  <?php echo $order['abo_payment_type_txt'] ?></strong></span> <br>
              <span>Added Order From : <strong><?php echo $order['abo_added_from']; ?></strong></span> <br>
              <span>Remarks : <strong><?php echo nl2br($order['aboi_remark']); ?></strong></span> <br>
              <?php 
              	if($order['abo_is_local_store_avail'] == 'Y'){
              		echo "<strong>Local Store Order</strong><br>";
              	}
              ?>
              <?php 
              	if($order['abo_sbiyono_lead_id'] != ''){
              		echo " <strong>SBI YONO Lead Id: ".$order['abo_sbiyono_lead_id']."</strong><br>";
              	}
              ?>
              <?php 
              	if($order['abo_barodakisan_leadid'] != ''){
              		echo " <strong>Baroda Kisan Lead Id: ".$order['abo_barodakisan_leadid']."</strong><br>";
              	}
              ?>
			  <span style="float:right;">Order Date : <strong><?php echo $order['abo_orderdate']; ?></strong></span>
              </div>
              
                <table id="dyntable" style="width:100%;" cellpadding="0" cellspacing="0" class="table table-bordered responsive res_edit_detail" >
                	<colgroup>
                  <col class="con0" style="width:10%;" >
                  <col class="con1" style="width:20%;" >
                  <col class="con0" style="width:10%;" >
                  <col class="con1" style="width:10%;" >
                  <col class="con0" style="width:1%;" >
                  <col class="con1" style="width:10%;" >
                  <col class="con0" style="width:10%;" >
                  <col class="con1" style="width:10%;" >
                  </colgroup>
                  <thead>
                    <tr>
                      <th class="center">Image</th>                      
                      <th>Product</th>
                      <th>Company</th>
                      <th>Seller</th>
                      <th class="center">Quantity</th>
                      <th>Status</th> 
                      <th class="right">Price</th>
                      <th class="right">Total</th>                              
                    </tr>
                  </thead>
                  <tbody>
                  		<?php 
							$price_sub_total = 0;
							
							foreach($order['order_items'] as $rowi){ 
							?>
                            	<tr>
                                	<td class="center"><img onerror="this.src='images/default.png'" style="height:30px; width:30px;" src="images/<?php echo $rowi['abpd_image']; ?>"></td>
                                    <td><?=$rowi['abpd_name'];?></td>
                                    <td><?php echo $rowi['abc_name']; ?></td>
                                    <td><?php echo $rowi['seller_name']; ?></td>
                                    <td class="center"><?=$rowi['product_qty'];?></td>
                                    <td><?php echo $order['abo_status'] == 'Cancel' ? 'Cancelled' : $order['abo_status']; ?></td>
                                    <td class="right"><i class="fa fa-inr " style="font-size:13px;"></i>
									<?=number_format($rowi['product_price'],2,'.','');?>
                                    </td>
                                    <td class="right"><i class="fa fa-inr " style="font-size:13px;"></i>
									<?php 
										
										echo number_format($rowi['line_total'],2,'.','');
									?>
                                    </td>
                                </tr>		
							<?php } ?>
                  </tbody>
                </table>
                
                <div class="right-content-info-thank-you">
                    <p>Sub Total &nbsp;:&nbsp;<span><i class="fa fa-inr" style="font-size:13px;"></i></span>
                    	<?php echo number_format($order['sub_total'],2,'.',''); ?>
                    </p>
                    
                    <?php if($order['item_discount'] > 0){ ?>
                    <p>Item Discount &nbsp;:&nbsp;<span><i class="fa fa-inr " style="font-size:13px;"></i></span>
                    	<?php echo number_format($order['item_discount'],2,'.',''); ?>
                   	</p>
                    <?php } ?>
                     <?php if($order['abo_online_payment_discount'] > 0){ ?>
                    <p>Online Payment Discount &nbsp;:&nbsp;<span><i class="fa fa-inr " style="font-size:13px;"></i></span>
                    	<?php echo number_format($order['abo_online_payment_discount'],2,'.',''); ?>
                   	</p>
                    <?php } ?>

                    <?php if($order['coupon_discount'] > 0){ ?>
                    <p>Coupon Code Discount &nbsp;:&nbsp;<span><i class="fa fa-inr " style="font-size:13px;"></i></span>
                    	<?php echo number_format($order['coupon_discount'],2,'.',''); ?>
                   	</p>
                    <?php } ?>
                    
                    <?php if($order['discount_val'] > 0){ ?>
                    <p><?php echo $order['discount_type'].' &nbsp;:&nbsp;<span><i class="fa fa-inr " style="font-size:13px;"></i></span>'.number_format($order['discount_val'],2,'.',''); ?>
                   	</p>
                    <?php } ?>
                    <?php if($order['referral_dist'] > 0){ ?>
                    <p>Referral Discount(<?php echo $order['abo_user_refcode']; ?>)&nbsp;:&nbsp;<span><i class="fa fa-inr " style="font-size:13px;"></i></span><?php echo number_format($order['referral_dist'],2,'.',''); ?>
                   	</p>
                    <?php } ?>
                    <!--- Manual Discount --->
                    <?php //if($_SESSION['admin_id'] == '1'){ ?>
                    	
                    		<form action="" method="post" id="update_manual_discount_frm">
                    			<input type="hidden" name="abo_id" value="<?php echo $abo_id; ?>">
                    			<input type="hidden" name="abo_manual_discount" value="<?php echo ($order['abo_manual_discount'] == '0.00') ? '' : $order['abo_manual_discount']; ?>" class="decimal_only" >
                    			<?php if(($order['abo_status'] == 'Pending' || $order['abo_status'] == 'Packed') && $_SESSION['admin_id'] == '1'){ ?>
			                    <p>Manual Discount &nbsp;:&nbsp;
			                    	 - <input type="text" name="abo_manual_discount" id="abo_manual_discount" value="<?php echo ($order['abo_manual_discount'] == '0.00') ? '' : $order['abo_manual_discount']; ?>" class="decimal_only" >
			                   	</p>
                               	<p style="display:none;">GST &nbsp;:&nbsp;
			                    	<input type="text" name="abo_manual_GST_charge" id="abo_manual_GST_charge" value="<?php echo ($order['abo_manual_GST_charge'] == '0.00') ? '' : $order['abo_manual_GST_charge']; ?>" class="decimal_only" >
			                   	</p>
                                <?php } ?>
			                   	<p>Courier Charge &nbsp;:&nbsp;
			                    	<input  type="text" name="abo_shipped_courier_charge" id="abo_shipped_courier_charge" value="<?php echo ($order['abo_shipped_courier_charge'] == '0.00') ? '' : $order['abo_shipped_courier_charge']; ?>" class="decimal_only" >
			                   	</p>
			                   
			                   	<input type="submit" name="update_manual_discount" value="Submit" class="btn btn-success">
	                    
                    	</form>
	                <?php //} ?>
	                <?php if($order['abo_status'] != 'Pending' && $order['abo_manual_discount'] != '' && $order['abo_manual_discount'] > 0){ ?>
	                    	<p>Manual Discount &nbsp;:&nbsp;<span><!-- <i class="fa fa-minus" style="font-size:13px;"></i> --> - <i class="fa fa-inr " style="font-size:13px;"></i></span>
		                    	<?php echo $order['abo_manual_discount']; ?>
		                   	</p>
		                   	<p>Courier Charge &nbsp;:&nbsp;<span><i class="fa fa-inr " style="font-size:13px;"></i></span>
		                    	<?php echo $order['abo_shipped_courier_charge']; ?>
		                   	</p>
		                   	<p style="display:none;">GST &nbsp;:&nbsp;<span><i class="fa fa-inr " style="font-size:13px;"></i></span>
		                    	<?php echo $order['abo_manual_GST_charge']; ?>
		                   	</p>
	                    	
	                    <?php } ?>


                    <p>Shipping :
                    	<span><i class="fa fa-inr " style="font-size:13px;"></i></span>
                     	<?php echo $order['shipping_cost']; ?>
                    </p>
                    <p>Net Amount &nbsp;:&nbsp;<span><i class="fa fa-inr " style="font-size:13px;"></i></span>
                    	<?php
							echo '<input type="hidden" name="abo_net_amount" value="'.$net_amt.'" id="abo_net_amount">';
							echo number_format($order['net_amount'],2,'.',''); 
						?>
                    </p>
              </div>
                
                <div class="row-fluid" style="margin-top:25px;">
                	<div class="span12" style="border:1px solid #dddddd; padding-bottom:10px;">
                    	<h4 style="width:115px; margin-top:-10px; padding:0 2px; margin-left:10px; background:white;">Contact Details</h4>

                    	<?php $get_user_data_qry = "SELECT abu_phone, abu_phone_alternative FROM ab_users where abu_id = '".$order['abo_user_id']."'";
                    			$get_user_data_res = mysql_query($get_user_data_qry);
                    			$get_user_data_row = mysql_fetch_array($get_user_data_res);
                    			if($get_user_data_row['abu_phone_alternative']!=''){
                    				$abu_phone_alternative_final = '/ '.$get_user_data_row['abu_phone_alternative'];
                    			}else{
                    				$abu_phone_alternative_final = '';
                    			}

                    		?>
                        <div class="row-fluid" style="margin-top:25px;">
                            <div class="span4 res_edit_span" style="padding-left:25px;">
                                <h5>Billing Address</h5>
                                <table cellpadding="0" cellspacing="0" width="100%" style="margin-top:10px;margin-left:10px;">
                                	<tr>
                                    	<td width="20%">Name :</td>
                                        <td width="80%" style="text-transform:capitalize;"><?php echo $order['abo_bill_firstname'].' '.$order['abo_bill_lastname'].' '.$order['abo_bill_fullname']; ?></td>
                                    </tr>
                                    <tr>
                                    	<td width="20%">Email :</td>
                                        <td width="80%"><?php echo $order['abo_bill_email']; ?></td>
                                    </tr>
                                    <tr>
                                    	<td width="20%">Address :</td>
                                    	<?php
                                    	$abo_bill_address = str_replace('.', ' ', $order['abo_bill_address']);
										$abo_bill_address_final = wordwrap($abo_bill_address,65,"<br>\n");

                                    	?>
                                        <td width="80%" style="text-transform:capitalize;"><?php echo $abo_bill_address_final; ?></td>
                                    </tr>
                                    <tr>
                                    	<td width="20%">Pincode :</td>
                                        <td width="80%" style="text-transform:capitalize;"><?php echo $order['abo_bill_zipcode']; ?></td>
                                    </tr>
                                    <tr>
                                    	<td width="20%">Phone :</td>
                                        <td width="80%" style="text-transform:capitalize;">
                                        <?php
                                        $abu_phone = $get_user_data_row['abu_phone'];
                                		$abu_phone_alternative = $get_user_data_row['abu_phone_alternative'];
                                		$abo_bill_phone = $order['abo_bill_phone'];

                                		$phone_array = array($abu_phone, $abu_phone_alternative, $abo_bill_phone);
                                		
                                		$unique_phone_array = array_unique(array_filter($phone_array));
                               			$final_phone =  implode('/ ', $unique_phone_array);

                                         echo $final_phone; ?>
                                        </td>
                                    </tr>                                    
                                    <tr>
                                    	<td width="20%">City :</td>
                                        <td width="80%" style="text-transform:capitalize;"><?php echo $order['abo_bill_city']; ?></td>
                                    </tr>
                                    <tr>
                                    	<td width="20%">Taluka :</td>
                                        <td width="80%" style="text-transform:capitalize;">
										<?php 
										if($order['abo_bill_taluka'] == 'Other')
										{
											echo "Other";
										}else{
											echo get_name_from_id('ab_taluka','abt_name','abt_id',$order['abo_bill_taluka']); 
										}
										?></td>
                                    </tr>
                                    <tr>
                                    	<td width="20%">District :</td>
                                        <td width="80%" style="text-transform:capitalize;">
										<?php 
										if($order['abo_bill_district'] == 'Other')
										{
											echo "Other";
										}else{
										echo get_name_from_id('ab_districts','abd_name','abd_id',$order['abo_bill_district']); 
										}
										?></td>
                                    </tr>
                                    <tr>
                                    	<td width="20%">State :</td>
                                        <td width="80%" style="text-transform:capitalize;"><?php echo  get_name_from_id('ab_states','abs_name','abs_id',$order['abo_bill_state']); ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="span4">
                                <h5>Shipping Address</h5>
                                <table cellpadding="0" cellspacing="0" width="100%" style="margin-top:10px;margin-left:10px;">
                                	<tr>
                                    	<td width="20%">Name :</td>
                                        <td width="80%" style="text-transform:capitalize;"><?php echo $order['abo_ship_firstname'].' '.$order['abo_ship_lastname'].' '.$order['abo_ship_fullname']; ?></td>
                                    </tr>
                                    <tr>
                                    	<td width="20%">Email :</td>
                                        <td width="80%"><?php echo $order['abo_ship_email']; ?></td>
                                    </tr>
                                    <tr>
                                    	<td width="20%">Address :</td>
                                    	<?php
                                    	$abo_ship_address = str_replace('.', ' ', $order['abo_ship_address']);
										$abo_ship_address_final = wordwrap($abo_ship_address,65,"<br>\n");

                                    	?>
                                        <td width="80%" style="text-transform:capitalize;"><?php echo $abo_ship_address_final; ?></td>
                                    </tr>
                                    <tr>
                                    	<td width="20%">Pincode :</td>
                                        <td width="80%" style="text-transform:capitalize;"><?php echo $order['abo_ship_zipcode']; ?></td>
                                    </tr>
                                    <tr>
                                    	<td width="20%">Phone :</td>
                                        <td width="80%" style="text-transform:capitalize;"><?php echo $order['abo_ship_phone']; ?></td>
                                    </tr>                                    
                                    <tr>
                                    	<td width="20%">City :</td>
                                        <td width="80%" style="text-transform:capitalize;"><?php echo $order['abo_ship_city']; ?></td>
                                    </tr>
                                    <tr>
                                    	<td width="20%">Taluka :</td>
                                        <td width="80%" style="text-transform:capitalize;">
                                        <?php 
										if($order['abo_ship_taluka'] == 'Other')
										{
											echo "Other";
										}else{
											echo get_name_from_id('ab_taluka','abt_name','abt_id',$order['abo_ship_taluka']);
										}
										?>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td width="20%">District :</td>
                                        <td width="80%" style="text-transform:capitalize;">
                                         <?php 
										if($order['abo_ship_district'] == 'Other')
										{
											echo "Other";
										}else{
											echo get_name_from_id('ab_districts','abd_name','abd_id',$order['abo_ship_district']);
										}
										?>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td width="20%">State :</td>
                                        <td width="80%" style="text-transform:capitalize;"><?php echo get_name_from_id('ab_states','abs_name','abs_id',$order['abo_ship_state']); ?></td>
                                    </tr>
                                </table>
                            </div>
                           	<div class="span4">
                                <h5>Seller Details</h5>
                                <table cellpadding="0" cellspacing="0" width="100%" style="margin-top:10px;margin-left:10px;">
                                	<tr>
                                    	<td width="20%">Name :</td>
                                        <td width="80%" style="text-transform:capitalize;"><?php echo $order['seller_name']; ?></td>
                                    </tr>
                                    <tr>
                                    	<td width="20%">Email :</td>
                                        <td width="80%"><?php echo $order['absl_email']; ?></td>
                                    </tr>
                                    <tr>
                                    	<td width="20%">Phone :</td>
                                        <td width="80%" style="text-transform:capitalize;"><?php echo $order['absl_phone']; ?></td>
                                    </tr>                                    
                                    <tr>
                                    	<td width="20%">City :</td>
                                        <td width="80%" style="text-transform:capitalize;"><?php echo $order['absl_b_city']; ?></td>
                                    </tr> 
                                    <tr>
                                    	<td width="20%">Postcode :</td>
                                        <td width="80%" style="text-transform:capitalize;"><?php echo $order['absl_b_pincode']; ?></td>
                                    </tr> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <?php include('Include/footer.php'); ?>
      </div>
    </div>
  </div>
</div>
</body>
<script>
	function validate(){
		if(jQuery('#abo_status').val() == 'Shipped'){
			if(jQuery('#abo_courier_name').val()==""){
				jAlert("Please Enter Courier Name!",'Alert Dialog');
				return false;
			}else if(jQuery('#abo_shipped_track_number').val()=='') {
				jAlert("Please Enter Track Numebr!",'Alert Dialog');
				return false;
			}/*else if(jQuery('#abo_shipped_courier_charge').val()=='') {
				jAlert("Please Enter Courier Charge!",'Alert Dialog');
				return false;
			}*/else if(jQuery("#abo_shipped_notes").val().trim() == ''){	
				jAlert("Please Enter Tracking Link!",'Aler Dailog');	
				return false;			
			}else if(jQuery('#abo_shipped_date').val() == '' || jQuery('#abo_shipped_date').val() == '0000-00-00'){
				jAlert("Please select shipped date!",'Aler Dailog');	
				return false;			
			}else{
				return true;
			}	
		}else if(jQuery('#abo_status').val() == 'Packed'){
			if(jQuery('#abo_packed_date').val()=="" || jQuery('#abo_packed_date').val() == '0000-00-00' ){
				jAlert("Please Select Packed Date!",'Alert Dialog');
				return false;
			}else if(jQuery("#abo_packed_reason").val().trim() == ''){
				jAlert("Please Enter Proper Note For Packed Order!",'Alert Dialog');
				return false;			
			}else{
				return true;
			}	
		}else if(jQuery('#abo_status').val() == 'Return'){
			if(jQuery('#abo_return_order_date').val()=="" || jQuery('#abo_return_order_date').val() == '0000-00-00'){
				jAlert("Please Select Return Date!",'Alert Dialog');
				return false;
			}else if(jQuery("#abo_return_reason").val().trim() == ''){
				jAlert("Please Enter Proper Reason For Return Order!",'Alert Dialog');
				return false;
			}else{
				return true;
			}	
		}else if(jQuery('#abo_status').val() == 'Delivered'){
			if(jQuery('#abo_delivered_order_date').val()=="" || jQuery('#abo_delivered_order_date').val() == '0000-00-00'){
				jAlert("Please Select Delivery Date!",'Alert Dialog');
				return false;
			}else if(jQuery("#abo_delivered_reason").val().trim() == ''){
				jAlert("Please Enter Proper Note For Delivered Order!",'Alert Dialog');
				return false;
			}else{
				return true;
			}	
		}else if(jQuery('#abo_status').val() == 'Deleted'){
			if(jQuery('#abo_delete_reason').val().trim() ==""){
				jAlert("Please Enter Reason For Deleting Order!",'Alert Dialog');
				return false;
			}else{
				return true;
			}	
		}else if(jQuery('#abo_status').val() == 'Complete'){
			if(jQuery('#abo_complete_order_date').val()=="" || jQuery('#abo_complete_order_date').val() == '0000-00-00'){
				jAlert("Please Select Complete Date!",'Alert Dialog');
				return false;
			}else if(jQuery("#abo_complete_reason").val().trim() == ''){
				jAlert("Please Enter Proper Note For Complete Order!",'Alert Dialog');
				return false;
			}else{
				return true;
			}

		}else if(jQuery('#abo_status').val() == 'Return Completed'){
			if(jQuery('#abo_return_completed_order_date').val()=="" || jQuery('#abo_return_completed_order_date').val() == '0000-00-00'){
				jAlert("Please Select Return Completed Date!",'Alert Dialog');
				return false;
			}else if(jQuery("#abo_return_completed_reason").val().trim() == ''){
				jAlert("Please Enter Proper Note For Return Completed Order!",'Alert Dialog');
				return false;
			}else{
				return true;
			}
		
		}else if(jQuery('#abo_selelr_payment_status').val() == 'Invoice Generated'){
			if(jQuery('#abo_seller_invoice_received_date').val()=="" || jQuery('#abo_seller_invoice_received_date').val() == '0000-00-00') {
				jAlert("Please Select Invoice Generated Date!",'Alert Dialog');
				return false;
			}else{
				return true;
			}
		}else if(jQuery('#abo_selelr_payment_status').val() == 'Paid'){
			if(jQuery('#abo_seller_payment_paid_date').val()=="" || jQuery('#abo_seller_payment_paid_date').val() == '0000-00-00'){
				jAlert("Please Select Paid Date!",'Alert Dialog');
				return false;
			}else if(jQuery('#abo_ref_bank_detail').val()==""){
				jAlert("Please Enter Reference Bank Details!",'Alert Dialog');
				return false;
			}else{
				return true;
			}		
		}else{
			
			return true;
		}
	}
</script>
</html>
