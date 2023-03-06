<?php

namespace App\DbQueries;

use App\User;
use App\dgmodel\City;
use App\dgmodel\Order;
use App\dgmodel\Price;
use App\dgmodel\Driver;
use App\dgmodel\CmsPages;
use App\dgmodel\Customer;
use App\dgmodel\HowItWorks;
use App\dgmodel\GuestCustumer;
use App\DoubleGoogleOrderModel;
use Illuminate\Support\Facades\DB;
use App\dgmodel\GlobalSettingModel;
use Illuminate\Database\Eloquent\Model;

// this class contains all the queries of the projects
class DGDatabase extends Model
{

    public function get_price()
    {
        $data = Price::select('*')->get();
        return $data;
    }
    public function get_cities()
    {
        $data = City::select('*')->get();
        return $data;
    }
    // g
    public function get_customer($sender_email = '')
    {
        $data = Customer::select('*');

        if ($sender_email) {
            $data->where('sender_email', $sender_email);
        }

        return $data->get();
    }
    public function get_admin_details($id)
    {
        $data = User::select('*')->where('id', $id)->get();
        return $data;
    }
    public function get_users_data()
    {
        $data = DB::table('users')->select('*', DB::raw("CONCAT('row_', id) as DT_RowId"))->get();
        return $data;
    }
    // get data for listing
    public function get_order_listing_data($keyword = '', $from_date = '', $to_date = '',  $status = '', $mobile = '')
    {
        /* $data = DB::table('double_google_order as dgo')->select('*', DB::raw("CONCAT('row_', id) as DT_RowId"))
        ->join('customer as c','c.id','=','dgo.user_id')->get(); */
        $data = DB::table('double_google_order as dgo')
            ->select(
                'dgo.id as id',
                'dgo.order_status as order_status',
                'dgo.order_number as order_number',
                'dgo.created_at as created_at',
                'c.sender_name as sender_name',
                'c.sender_mobile as sender_mobile',
                'dgo.driver_id as driver_id',
                // 'ot.name as order_type_name',
                'dgo.order_type as order_type',
                'dgo.delivery_fee as delivery_fee',
                // 'store.type as store_type',
                // 'rmk.remark as remark',
                DB::raw("CONCAT('row_', dgo.id) as DT_RowId"),
            )
            ->leftJoin('customer as c', 'c.id', '=', 'dgo.user_id');
            // ->leftJoin('order_type as ot', 'ot.id', '=', 'dgo.order_type_id')
            // ->leftJoin('store_or_restaurant as store', 'store.id', '=', 'dgo.store_id')
            // ->leftJoin('remarks as rmk', 'rmk.double_google_order_id', '=', 'dgo.id')
            // ->where('order_status', '<>', 'Deleted')
            
            
        if (!empty($keyword)) {
            //keyword used in Dashboard
            $data->where(function ($query) use ($keyword) {
                $query->where('dgo.created_at', $keyword)
                ->orWhere('c.sender_name', $keyword)
                    ->orWhere('c.sender_mobile', $keyword)
                    ->orWhere('dgo.order_status', $keyword)
                    ->orWhere('dgo.order_number', $keyword);
            });
            //  dd($data->get());
        }
        if (!empty($from_date)) {
            //it will fetch from_dates with time 00:00:00 
            $data->where('dgo.created_at', '>=', $from_date . ' 00:00:00');
        }

        if (!empty($to_date)) {
            //it will fetch to_dates with time 23:59:59 
            $data->where('dgo.created_at', '<=', $to_date . ' 23:59:59');
        }
        
        if (!empty($status)) {
            $data->where('dgo.order_status', $status);
        }
        if (!empty($mobile)) {
            $data->where('c.sender_mobile', 'like', '%' . $mobile . '%');
        }
        
        
        /* if (Auth::user()->user_role == "manager") {
            $data->where('dgo.user_id', '=', Auth::user()->id);
        } */
        // dd($data);
        return $data->get()->toArray();
    }
    // get data for listing
    /* public function get_order_listing_data(){
        $data = DB::table('order')->select('*', DB::raw("CONCAT('row_', id) as DT_RowId"));
            return $data;
    } */
    public function get_price_listing_data()
    {
        $data = DB::table('price')->select('*', DB::raw("CONCAT('row_', id) as DT_RowId"))->get();
        return $data;
    }
    public function get_banners_listing_data()
    {
        $data = DB::table('banner')->select('*', DB::raw("CONCAT('row_', id) as DT_RowId"));

        return $data;
    }

    public function get_store_listing_data()
    {
        $data = DB::table('store_or_restaurant')->select('*', DB::raw("CONCAT('row_', id) as DT_RowId"))->get();

        return $data;
    }

    public function get_customer_listing_data()
    {
        $data = DB::table('customer')->select('*', DB::raw("CONCAT('row_', id) as DT_RowId"));

        return $data;
    }
    public function get_cities_listing_data($active = '', $fetured = '', $cat_id = '')
    {
        $data = DB::table('cities')->select('*', DB::raw("CONCAT('row_', id) as DT_RowId"))->get();

        return $data;
    }
    public function get_driver_listing_data()
    {
        $data = DB::table('driver')->select('*', DB::raw("CONCAT('row_', id) as DT_RowId"));

        return $data;
    }

    public function get_global_setting()
    {
        $data = GlobalSettingModel::select('*')->get();
        return $data;
    }
    public function how_it_works()
    {
        $data = HowItWorks::select('*', DB::raw("CONCAT('row_', id) as DT_RowId"))->whereNotIn('id',[1])->get();
        return $data;
    }
    public function cms_pages()
    {
        $data = CmsPages::select('*', DB::raw("CONCAT('row_', id) as DT_RowId"))->get();
        return $data;
    }
    public function get_phone_number_data ()
    {
        $data = GuestCustumer::select('*', DB::raw("CONCAT('row_', id) as DT_RowId"))->get();
        return $data;
    }
}
