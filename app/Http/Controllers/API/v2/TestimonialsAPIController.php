<?php

namespace App\Http\Controllers\API\v2;

use App\dgmodel\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\Controller;
use App\Traits\ConsumesExternalServices;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\API\v2\SubmitTestimonialControllerRequest;

class TestimonialsAPIController extends Controller
{
    use AuthenticatesUsers, ConsumesExternalServices;
    public function listTestimonial()
    {
        $list_testimonial = Testimonial::select('*')->where('status','Y')->orderBy('id', 'DESC')->get();
        return $this->successJson('testimonial fetch succesfully', [
            'list' => $list_testimonial,
        ]);
    }
    
    public function submitTestimonial(SubmitTestimonialControllerRequest $request )
    {
        // dd($request->all());
	    DB::beginTransaction();
        try {
            $submit_testimonial = Testimonial::firstOrNew([
                'user_name' => $request->get('user_name', ''),
                'message' => $request->get('message', ''),
                'date' => date('Y-m-d H:i:s'),
            ]);
            $submit_testimonial->save();
            DB::commit();
        
            return $this->successJson('Submitted succesfully', [
                'list' => $submit_testimonial,
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorJson($e->getMessage());
        }  
    }
}
