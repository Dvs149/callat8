@extends(Helpers::file_path("mainLayout"))
@section('dashboard-left')
 <h4 class="widgettitle">{{$BreadCrumbPageHeader['table_name']}}</h4>
    <div class="widgetcontent">


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
                        <strong id="msg-remark">Deleted Successfully</strong>
                    </div>

           
                
                <form action="{{url(Helpers::admin_url('how_it_works'))}}" method="post" id="form" enctype="multipart/form-data">
                <!-- // CSRF token for securing form field from hacker-->
                {{ csrf_field() }}
                
                    <input type="hidden" name="how_it_works_id" id="how_it_works_id" value="{{old('how_it_works_id',isset($data->id)? $data->id : '')}}">

                    <label class="control-label">Status:<span style="color:red;">*</span></label>
                    <div class="chatsearch">
                        <select id="status" class="input-block-level" name="status">
                            <option value="">- - - Select Status - - - </option>
                            <option value="Y" {{ old('status',isset($data->status)? $data->status : '')=='Y' ? 'selected' : '' }}>Active</option>
                            <option value="N" {{  old('status',isset($data->status)? $data->status : '')=='N' ? 'selected' : '' }}>Inactive</option>
                        </select>   
                        @if ($errors->has('name'))
                            {{-- {{ $errors->first('name') }} --}}
                            <span id="name-error" class="error">The field may not be greater than 25 characters.</span>
                        @endif 
                    </div>

                    <label class="control-label">Title:<span style="color:red;">*</span></label>
                    <div class="chatsearch">
                    <input type="text" id="sub_title" name="sub_title" class="input-block-level" placeholder="Title" value="{{old('sub_title',isset($data->sub_title) ? $data->sub_title : '')}}{{-- {{isset($banner->id)?$banner->sub_title:old('sub_title')}} --}}" />
                    @if ($errors->has('sub_title'))
                    <span id="sub_title-error" class="error">{{ $errors->first('sub_title') }}{{-- The field may not be greater than 25 characters. --}}</span>
                    @endif 
                </div>

                <label class="control-label">Description:<span style="color:red;">*</span></label>
                    <div class="chatsearch">
                    <textarea type="text" id="description" name="description" class="input-block-level" placeholder="Description" >{!!old('description',isset($data->description) ? $data->description : '')!!}</textarea>
                    @if ($errors->has('description'))
                        {{-- {{ $errors->first('description') }} --}}
                        <span id="description-error" class="error">The field may not be greater than 25 characters.</span>
                    @endif 
                </div>

                {{--  <label class="control-label">Whatsapp description:<span style="color:red;">*</span></label>
                    <div class="chatsearch">
                    <input type="text" id="whatsapp_description" name="whatsapp_description" class="input-block-level" placeholder="Password" value="{{old('whatsapp_description')}}" />
                    @if ($errors->has('whatsapp_description'))
                    <span id="whatsapp_description-error" class="error"> {{ $errors->first('whatsapp_description') }}The field may not be greater than 25 characters.</span>
                    @endif 
                </div> --}}


            <div class="chatsearch" style="margin-top: 10px;" >
                <span class="field">
                {{-- <input type="reset" id="reset" class="btn" value="Reset" > --}}
                <input type="submit" id="submit"  name="submit" class="btn btn-primary" value="Submit">
                
                </span>
            </div>
            </form>
            
    </div>
@endsection
@section('script')
<script type="text/javascript">

    jQuery(document).ready( function ($) {
    
    $('#delete-msg').hide();
    
   });

   </script>
@endsection
