@extends("layout.frontend-default-layout")
@section('content')

<div class="col-xs-12 col-sm-12 col-md-12 welcome_sec" style="padding-top: 0;">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs IT WOR-12 col-sm-12 col-md-12">
                    <h2>CUSTOMERS FEEDBACK</h2>
                    @foreach($testimonial as $key => $value)
                        <div class="customer-feedback">
                            <div>
                                <h1>{{$value['user_name']}}</h1>
                                <p>{{$value['message']}}</p>
                                <p>{{$value['date']}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- @include('front-end.termsAndCondition.terms-and-condition-middle-part')                 --}}
            </div>
        </div>
    </div>
    
    <div class="green_shape"></div>
</div>
@endsection

