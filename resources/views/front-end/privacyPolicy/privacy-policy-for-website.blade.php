@extends("layout.frontend-default-layout")
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 welcome_sec" style="padding-top: 0;">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    @if((request()->is('*privacy_policy')) || Request::is('*/privacy_policy')) 
                        <h2>Privacy Policy</h2>
                    @endif
                </div>
                @include('front-end.privacyPolicy.privacy-policy-middle-part')
            </div>
        </div>
    </div>
    <div class="green_shape"></div>
</div>
@endsection

