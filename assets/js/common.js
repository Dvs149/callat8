jQuery(document).ready(function(){

jQuery('body').on('input','.phone_number',function(e){
 		
        this.value = this.value
	      .replace(/[^\d]/g, '')             // numbers and decimals only
	      .replace(/(^[\d]{10})[\d]/g, '$1');   // not more than 2 digits at the beginning
	      
	});





    
});

