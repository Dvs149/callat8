<?php


class Helpers{

	//get addmin prefix from here
	public static function admin_url($uri_path = ''){
		return url('admin/'.$uri_path);
	}
	//get addmin prefix from here
	public static function client_url($uri_path = ''){
		return url($uri_path);
	}

	//for returning file path
	public static function file_path($filePath){

		/*  file path for login  */
		if ($filePath=='login'){
			return "auth.login";
		}
		
		/*  file path for login head */
		else if ($filePath=='admin.head'){
			return "auth.partials.loginhead";
		}
		/*  file path for logn script */
		else if ($filePath=='admin.script'){
			return "auth.partials.loginscript";
		}
		else if ($filePath=='adminLayout'){
			return "auth.layout.adminLayout";
		}
		else if ($filePath=='topbar'){
			return "layout.partials.topbar";
		}
		else if ($filePath=='sidebar'){
			return "layout.partials.sidebar";
		}
		//dashboard
		/*  file path for dashboard*/
		else if ($filePath=='dashboard'){
			return "admin.dashboard.dashboard";
		}
		//dashboard ends

		else if ($filePath== 'howItwWorks'){
			return "admin.cmsPages.howItWorks";
		}
		//mainlayout
		else if ($filePath=='mainLayout'){
			return "layout.mainLayout";
		}
		else if ($filePath=='head'){
			return "layout.partials.head";
		}
		else if ($filePath=='script'){
			return "layout.partials.script";
		}
		else if ($filePath=='sidebar'){
			return "layout.partials.sidebar";
		}
		else if ($filePath=='topbar'){
			return "layout.partials.topbar";
		}
		else if ($filePath=='footer'){
			return "layout.partials.footer";
		}
		//mainlayout ends

		else if ($filePath=='logout'){
			return "layout.partials.logout-module";
		}
		else if ($filePath=='delete'){
			return "layout.partials.delete-module";
		}

		else if ($filePath=='status'){
			return "layout.partials.status-module";
		}
		
		else if ($filePath=='edit_user'){
			return "admin.users-management.edit_user";
		}
		else if ($filePath=='users'){
			return "admin.users-management.users";
		}
		//banner
		/*  file path for order*/
		else if ($filePath=='order'){
			return "admin.order.order";
		}
		//order ends
		//edit
		/*  file path for edit*/
		else if ($filePath=='edit'){
			return "admin.order.edit";
		}
		//edit ends

		//price
		/*  file path for price*/
		else if ($filePath=='price'){
			return "admin.price.price";
		}
		//price ends

		//cities
		/*  file path for cities*/
		else if ($filePath=='cities'){
			return "admin.cities.cities";
		}
		//cities ends
		

		//banner
		/*  file path for banner*/
		else if ($filePath=='banner'){
			return "admin.banner.banner";
		}
		//banner ends

		//customer
		/*  file path for customer*/
		else if ($filePath=='customer'){
			return "admin.customer.customer";
		}
		//customer ends

		//driver
		/*  file path for driver*/
		else if ($filePath=='driver'){
			return "admin.driver.driver";
		}
		//driver ends

		//store
		/*  file path for store*/
		else if ($filePath=='store'){
			return "admin.store.store";
		}
		//store ends
	}
}