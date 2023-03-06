@extends("layout.frontend-default-layout")
@section('content')

<div class="col-xs-12 col-sm-12 col-md-12 welcome_sec" style="padding-top: 0;">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs IT WOR-12 col-sm-12 col-md-12">
                    <h2>ABOUT US</h2>
                </div>
                {{-- @include('front-end.termsAndCondition.terms-and-condition-middle-part')                 --}}
                @include('front-end.aboutUs.about-us-middle-part')
                
            </div>
        </div>
    </div>
    <div class="green_shape"></div>
</div>
@endsection

