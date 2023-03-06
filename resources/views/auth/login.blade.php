@extends(Helpers::file_path("adminLayout"))
@section('content')
<div class="loginpanel">
  <div class="loginpanelinner">
        <div class="logo animate0 bounceIn"><img src="assets/images/logo.png" alt="" /></div>
      <form id="login" action="{{url()->current()}}" method="post">
        {{ csrf_field() }}
              @if (session('Status'))
              <div class="inputwrapper  animate1 bounceIn">
                <div class="alert alert-error">{{ session('Status') }}</div>
            </div>
            @endif
         {{--  <div class="inputwrapper login-alert animate1 bounceIn">
              <div class="alert alert-error">{{ session('Status') }}</div>
          </div> --}}
          <div class="inputwrapper animate1 bounceIn">
              <input type="text" name="name" id="name" placeholder="Name" value="{{old('name')}}" />
          </div>
          <div class="inputwrapper animate2 bounceIn">
              <input type="password" name="password" id="password" placeholder="Password" />
              <label id="password-error"  class="error" for="password">Please Enter Password</label>
          </div>
          <div class="inputwrapper animate3 bounceIn">
              <button name="submit">Sign In</button>
          </div>
          <div class="inputwrapper animate4 bounceIn">
              {{-- <div class="pull-right">Not a member? <a href="registration.html">Sign Up</a></div> --}}
              <label><input type="checkbox" class="remember" name="signin" /> Keep me sign in</label>
          </div>
          
      </form>
  </div><!--loginpanelinner-->
</div><!--loginpanel-->

@endsection

@section('script')
  <script type="text/javascript">
  
    jQuery(document).ready(function($){
      $('#password-error').hide();
     jQuery('#login').submit(function(e){
      // e.preventDefault();
          var u = jQuery('#name').val();
          var p = jQuery('#password').val();

          /* if(p==''){
            $('#password-error').show();
            $(this).find("button[type='submit']").prop('disabled',true);
          }
          else{
            $(this).find("button[type='submit']").prop('enable',true);
          } */

      }); 

         $('#login').validate({ // initialize the plugin
          
                rules: {
                  name: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                },
                messages:{
                  name: {
                        required: 'Please Enter name',
                    },
                    password: {
                        required: 'Please Enter Password',
                    },
                },
                highlight: function(element) {
			            $(element).removeClass("error");
		            }
          });
      });
  </script>
@endsection

