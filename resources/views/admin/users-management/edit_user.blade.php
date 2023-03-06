@extends(Helpers::file_path("mainLayout"))
@section('dashboard-left')
<div class="span8" style="width: 100%;">
    <form action="{{url(Helpers::admin_url('edit_profile'))}}" class="editprofileform" method="post" id='form'>
         <!-- // CSRF token for securing form field from hacker-->
         {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{isset($user[0]->id) ? $user[0]->id: ''}}">
        <div class="widgetbox personal-information">
            <h4 class="widgettitle">Personal Information</h4>
            <div class="widgetcontent">
               @if (session('updated'))
            <div class="alert alert-success message alert-block">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong> {{ session('updated') }}</strong>
            </div>
            @endif
                <p>
                    <label>Name:<span style="color:red;">*</span></label>
                     @if (session('updated'))
                        <div style="margin-top: 25px;">{{$user[0]->name}}</div>
                     @else
                     <input type="text" name="name"  class="input-xlarge" value="{{ (isset($user)) ? $user[0]->name : old("name") }}" />
                     @endif
                </p>
               
                <p>
                    <label>Email:<span style="color:red;">*</span></label>
                    @if (session('updated'))
                        <div style="margin-top: 25px;">{{isset($user[0]->email)?$user[0]->email: 'NULL'}}</div>
                        
                     @else
                        <input type="email" name="email" class="input-xlarge" value="{{ (isset($user)) ? $user[0]->email : old("email") }}" />
                     @endif
                </p>
               

               {{--  <p>
                    <label>Company:<span style="color:red;">*</span></label>
                    @if (session('updated'))
                        <div style="margin-top: 25px;">{{isset($user[0]->company_name)?$user[0]->company_name: 'NULL'}}</div>
                     @else
                        <input type="text" name="company_name" class="input-xlarge" value="{{ (isset($user)) ? $user[0]->company_name : old("company_name") }}" />
                     @endif
                </p> --}}

               {{--  <p>
                    <label>Address:<span style="color:red;">*</span></label>
                    @if (session('updated'))
                        <div style="margin-top: 25px;">{{isset($user[0]->address)?$user[0]->address: 'NULL'}}</div>
                     @else
                        <textarea type="text" name="address" class="input-xlarge">{{ (isset($user)) ? $user[0]->address : old("address") }}</textarea>
                     @endif
                </p> --}}

                {{-- @if(Auth::user()->id==1) --}}
                <p>
                    <label>Mobile:<span style="color:red;">*</span></label>
                    @if (session('updated'))
                        <div style="margin-top: 25px;">{{isset($user[0]->mobile)?$user[0]->mobile: 'NULL'}}</div>
                     @else
                        <input type="text" pattern="\d*" name="mobile" class="input-xlarge" value="{{ (isset($user)) ? $user[0]->mobile : old("mobile") }}">
                     @endif
                </p>
                {{-- @endif --}}
                @if(Auth::user()->id==1)
                <p>
                    <label>Whatsapp:<span style="color:red;">*</span></label>
                    @if (session('updated'))
                        <div style="margin-top: 25px;">{{isset($user[0]->whatsapp_mobile)?$user[0]->whatsapp_mobile: 'NULL'}}</div>
                     @else
                        <input type="text" pattern="\d*" name="whatsapp_mobile" class="input-xlarge" value="{{ (isset($user)) ? $user[0]->whatsapp_mobile : old("whatsapp_mobile") }}">
                     @endif
                </p>
               {{--  <p>
                    <label>Mobile:<span style="color:red;">*</span></label>
                    @if (session('updated'))
                        <div style="margin-top: 25px;">{{isset($user[0]->mobile)?$user[0]->mobile: 'NULL'}}</div>
                     @else
                        <input type="text" pattern="\d*" name="mobile" class="input-xlarge" value="{{ (isset($user)) ? $user[0]->mobile : old("mobile") }}">
                     @endif
                </p>--}}

                <p>
                    <label>Facebook link:</label>
                    @if (session('updated'))
                        <div style="margin-top: 25px;">
                           <a href="{{isset($user[0]->facebook)?$user[0]->facebook: '#'}}">
                              {{isset($user[0]->facebook)?$user[0]->facebook: 'Not available'}}
                           </a>
                        </div>
                     @else
                        <input type="text" name="facebook" class="input-xlarge" value="{{ (isset($user)) ? $user[0]->facebook : old("facebook") }}" />
                     @endif
                </p>

                <p>
                    <label>Twitter link:</label>
                    @if (session('updated'))
                        <div style="margin-top: 25px;">
                           <a href="{{isset($user[0]->twitter)?$user[0]->twitter: '#'}}">
                              {{isset($user[0]->twitter)?$user[0]->twitter: 'Not available'}}
                           </a>
                        </div>
                     @else
                        <input type="text" name="twitter" class="input-xlarge" value="{{ (isset($user)) ? $user[0]->twitter : old("twitter") }}" />
                     @endif
                </p>
                <p>
                  <label>Instagram link:</label>
                  @if (session('updated'))
                      <div style="margin-top: 25px;">
                        <a href="{{ isset($user[0]->instagram)?$user[0]->instagram: '#' }}">
                           {{isset($user[0]->instagram)?$user[0]->instagram: 'Not available'}}
                        </a>
                     </div>
                   @else
                      <input type="text" name="instagram" class="input-xlarge" value="{{ (isset($user)) ? $user[0]->instagram : old("instagram") }}" />
                   @endif
              </p>
                @endif
                {{-- <p>
                    <label>Pinterest link:</label>
                    @if (session('updated'))
                        <div style="margin-top: 25px;">{{isset($user[0]->pin_link)?$user[0]->pin_link: 'Not available'}}</div>
                     @else
                        <input type="text" name="pin_link" class="input-xlarge" value="{{ (isset($user)) ? $user[0]->pin_link : old("pin_link") }}" />
                     @endif
                </p>
                <p>
                    <label>linkedin link:</label>
                    @if (session('updated'))
                        <div style="margin-top: 25px;">{{isset($user[0]->linked_in_link)?$user[0]->linked_in_link: 'Not available'}}</div>
                     @else
                        <input type="text" name="linked_in_link" class="input-xlarge" value="{{ (isset($user)) ? $user[0]->linked_in_link : old("linked_in_link") }}" />
                     @endif
                </p>

                <p>
                    <label>Youtube link:</label>
                    @if (session('updated'))
                        <div style="margin-top: 25px;">{{isset($user[0]->youtube_link)?$user[0]->youtube_link: 'Not available'}}</div>
                     @else
                        <input type="text" name="youtube_link" class="input-xlarge" value="{{ (isset($user)) ? $user[0]->youtube_link : old("youtube_link") }}" />
                     @endif
                </p> --}}
                <p>
                   @if (session('updated'))
                   {{-- <div style="margin-top: 25px;">{{isset($user[0]->email)?$user[0]->email: 'NULL'}}</div> --}}
                   @else
                     <label>Password:</label>
                      <input type="password" name="password" class="input-xlarge" value="" />
                   @endif
              </p>

                
               
                
                
            </div>
        </div>


        @if(session('updated'))
            <a href="{{url(Helpers::admin_url('edit_profile'))}}" class="btn btn-primary">Edit Profile Information</a>
        @else
        <p>
            <button type="submit" class="btn btn-primary">Update Profile</button> {{-- &nbsp;  --}}
            {{-- <a href="">Deactivate your account</a> --}}
        </p>
        @endif
    </form>
</div><!--span8-->
@endsection
@section('script')
<script type="text/javascript">
 jQuery(document).ready( function ($) {
   $('#form').validate({ // initialize the plugin
        errorElement: "span",
        rules: {
         

            name:{
                required: true,
            },
            email:{
                required: true,
                email:true
            },
            mobile:{
                required: true,
                maxlength: 10,
               minlength: 10
            },
            whatsapp_mobile:{
                required: true,
               maxlength: 10,
               minlength: 10
            },


        },
      });
 });
</script>

@endsection


