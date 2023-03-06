@extends(Helpers::file_path("mainLayout"))
@section('dashboard-left')
<div id="dashboard-left" class="span8" style="width: 100%;">
  @if(!isset($manage_user->id))
  <h4 class="widgettitle">Add User</h4>
  @else
  <h4 class="widgettitle">Edit User</h4>
  @endif
  <div class="widgetcontent" >

    <form name="form" class="user_add_main" id="form" action="{{url(Helpers::admin_url('manage_users'))}}" method="post">
      {{ csrf_field() }}
        <input type="hidden" name="u_id" id="u_id" value="{{isset($manage_user->id)?$manage_user->id:old('u_id')}}" >
        <table cellpadding="0" cellspacing="0" align="center">
          <tr>
            <td><label>Status<span style="color:#FF0000;">*</span> :</label></td>
              <td>
                <select name="u_status" id="u_status" class="select-large input-reset">               
                      <option value="Y"  {{ ((isset($manage_user->u_status)) && 'Y'== $manage_user->u_status ) || old('u_status')=='Y' ? 'selected' : '' }} >Active</option>
                      <option value="N" {{ ((isset($manage_user->u_status)) && 'N'== $manage_user->u_status ) || old('u_status')=='N'? 'selected' : '' }} >Inactive</option>  
                      <option value="D" {{ ((isset($manage_user->u_status)) && 'D'== $manage_user->u_status ) || old('u_status')=='D' ? 'selected' : '' }} >Delete</option>
                  </select>
              </td>
          </tr>
          <tr>
              <td width="20%"><label>Name<span style="color:#FF0000;">*</span> :</label></td>
              <td width="80%"><input type="text" name="u_firstname" id="u_firstname" value="{{isset($manage_user->id)?$manage_user->u_firstname:old('u_firstname')}}" class="input-large input-reset"></td>
          </tr>
          <tr>
            <td><label>Email<span style="color:#FF0000;">*</span> :</label></td>
            <td><input type="text" name="u_email" value="{{isset($manage_user->u_email)?$manage_user->u_email:old('u_email')}}" class="input-large input-reset ">
                @if ($errors->has('u_email'))
              <span id="u_email-error" class="error">Email ID All ready exist{{-- {{ $errors->first('u_email') }} --}}</span>
            @endif
            </td>
            {{-- <input type="hidden" id="mail_valid" value="No"> --}}
          </tr>
  
            {{-- <input type="hidden" id="phone_valid" value="No"> --}}
            
          </tr>
          <tr>
            <td><label>Password @if(!isset($manage_user->id))<span style="color:#FF0000;">*</span> @endif :</label></td>
            <td>
            <span class="field eye-filed">
              <input type="Password" name="u_pass" value="" class="input-large input-reset">
              <span>* Minimum 6 Character Required </span>
            </span>
            @if(isset($manage_user->id))
            <span style="color: red; margin: 0 0 5px 0; display: block;">Enter Password if you would like to change your current password
            </span>
            @endif
            </td>


            {{-- <input type="hidden" id="phone_valid" value="No"> --}}
          </tr>
          
          
          
          <tr>
            <td>&nbsp;</td>
            <td>
              {{-- <input type="button" id="reset" class="btn reset" value="Reset" > --}}
              @if(!isset($manage_user->id))
              <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Submit"></td>
              @else
                  <input type="submit" id="update" name="update" class="btn btn-primary" value="Update">
              @endif
          </tr>
        </table>
    </form>
  </div>{{-- widgetcontent --}}
</div><!--dashboard-left-->
@endsection
@section('script')

@endsection