jQuery.validator.addMethod("crequired", function(value, element) {
	var cleanval = value.replace(/^\s+/,"");
	if(cleanval == ''){
		jQuery(element).val(cleanval);
		return false;
	}else{
		return true;
	}
}, "This field is required.");

jQuery.validator.addMethod("cemail", function(value, element) {
	var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
	return pattern.test(value);
}, "Please enter a valid email address.");

jQuery.validator.addMethod("cpostcode", function(value, element) {
	//var pattern = /^[0-9]/;
	var pattern = /^[0-9]*$/;
	if(pattern.test(value) && value.length == 6){
		return true;
	}else{
		return false;
	}
	//return (value.length == 6 || !pattern.test(value));
	
}, "Please enter a valid postcode.");

jQuery.validator.addMethod("cusername", function(value, element) {
	var pattern = USERNAME_REGX;
	if(pattern.test(value)){
		return true;
	}else{
		return false;
	}

}, ERR_INVALID_USERNAME);

jQuery.validator.addMethod("alphanumeric", function(value, element) {
	//var pattern = /[\'^£$%&*()}{@#~?><>,|=_+¬-]/;
	var pattern = /[\'^£$%&*()}{@#~?><>,|=_.;:"+¬\s-]/;
	if(pattern.test(value)){
		return false;
	}else{
		return true;
	}

}, "This field allow only alphabets and numbers.");

jQuery.validator.addMethod("alphanumericspace", function(value, element) {
	//var pattern = /[\'^£$%&*()}{@#~?><>,|=_.;:"+¬-]/;
	var pattern = ALPHA_NUMERIC_SPACE_REGX;
	if(pattern.test(value)){
		return true;
	}else{
		return false;
	}

}, ERR_INVALID_ALPHA_NUMERIC_SPACE);


jQuery.validator.addMethod("cphone", function(value, element) {
	var pattern = PHONE_REGX;
	if(value!=''){
		if(pattern.test(value)){
			return true;	
		}else{
			return false;
		}
	}else{
		return true;
	}
}, ERR_INVALID_MOBILE_PHONE);

jQuery.validator.addMethod("cmobile", function(value, element) {
	//var pattern = /[0-9,]{10}$/;
	var pattern = MOBILE_REGX;
	if(pattern.test(value)){
		return true;	
	}else{
		return false;
	}
}, ERR_INVALID_MOBILE_PHONE);

jQuery.validator.addMethod("cpan", function(value, element) {
	var pattern = PAN_REGX;
	if(pattern.test(value)){
		return true;
	}else{
		return false;
	}

}, ERR_INVALID_PAN_NO);

jQuery.validator.addMethod("cgst", function(value, element) {
	var pattern = GST_REGX;
	if(pattern.test(value)){
		return true;
	}else{
		return false;
	}

}, ERR_INVALID_GST_NO);

jQuery.validator.addMethod("chour", function(value, element) {
	var pattern = HOUR_REGX;
	if(pattern.test(value)){
		return true;	
	}else{
		return false;
	}
}, ERR_INVALID_HOUR);

jQuery.validator.addMethod("imageSizeInPixel", function(value, element, param) {

	if (typeof (element.files) != "undefined" && value != '') {
		//Initiate the FileReader object.
		var reader = new FileReader();
		//Read the contents of Image File.
		reader.readAsDataURL(element.files[0]);
		reader.onload = function (e) {
			//Initiate the JavaScript Image object.
			var image = new Image();

			//Set the Base64 string return from FileReader as source.
			image.src = e.target.result;
			//console.log(image.height);
			//Validate the File Height and Width.
			image.onload = function () {
				var height = this.height;
				var width = this.width;

				
				if (parseFloat(height) == parseFloat(CUSTOMER_LOGO_HEIGHT) && parseFloat(width) == parseFloat(CUSTOMER_LOGO_WIDTH)) {
					console.log(height+" ==> "+CUSTOMER_LOGO_HEIGHT+" ==> "+width+" ==> "+CUSTOMER_LOGO_WIDTH);
					return true;
				}else{
					console.log('gdfgdf');
					return false;
				}
			};

		};
	}else if(value != ''){
		//console.log('outer else');
		return false;
	}else{
		return true;	
	}

}, CUSTOMER_LOGO_SIZE_MESSAGE);