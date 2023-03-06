@extends(Helpers::file_path("mainLayout"))
@section('dashboard-left')
 <h4 class="widgettitle">{{$data->page_name}}</h4>
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
                
                <form action="{{url(Helpers::admin_url('cms_pages'))}}" method="post" id="form" enctype="multipart/form-data">
                <!-- // CSRF token for securing form field from hacker-->
                {{ csrf_field() }}
                
                    <input type="hidden" name="cms_pages_id" id="cms_pages_id" value="{{old('cms_pages_id',isset($data->id)? $data->id : '')}}">

                    <label class="control-label">Title:<span style="color:red;">*</span></label>
                    <div class="chatsearch">
                    <input type="text" id="page_name" name="page_name" class="input-block-level" placeholder="Title" value="{{old('page_name',isset($data->page_name) ? $data->page_name : '')}}{{-- {{isset($banner->id)?$banner->page_name:old('page_name')}} --}}" />
                    @if ($errors->has('page_name'))
                    <span id="page_name-error" class="error">{{ $errors->first('page_name') }}{{-- The field may not be greater than 25 characters. --}}</span>
                    @endif 
                </div>

                <label class="control-label">content_of_page:<span style="color:red;">*</span></label>
                    <div class="chatsearch">
                    <textarea type="text" id="content_of_page" name="content_of_page" class="input-block-level" placeholder="content_of_page" >{!!old('content_of_page',isset($data->content_of_page) ? $data->content_of_page : '')!!}</textarea>
                    @if ($errors->has('content_of_page'))
                        {{-- {{ $errors->first('content_of_page') }} --}}
                        <span id="content_of_page-error" class="error">The field may not be greater than 25 characters.</span>
                    @endif 
                </div>

                {{--  <label class="control-label">Whatsapp content_of_page:<span style="color:red;">*</span></label>
                    <div class="chatsearch">
                    <input type="text" id="whatsapp_content_of_page" name="whatsapp_content_of_page" class="input-block-level" placeholder="Password" value="{{old('whatsapp_content_of_page')}}" />
                    @if ($errors->has('whatsapp_content_of_page'))
                    <span id="whatsapp_content_of_page-error" class="error"> {{ $errors->first('whatsapp_content_of_page') }}The field may not be greater than 25 characters.</span>
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

<script src="{!! asset('assets/ckeditor/styles.js') !!}">
{{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> --}}
</script>

<script type="text/javascript">
    CKEDITOR.replace('content_of_page', {
        allowedContent:true,
    });

    jQuery(document).ready( function ($) {
        $('#delete-msg').hide();
    });

   </script>
@endsection
