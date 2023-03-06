@extends("layout.frontend-default-layout")
@section('content')

    <div class="col-xs-12 col-sm-12 col-md-12 welcome_sec">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <h2>{{$data[0]['main_title']}}</h2>
                        <p style="font-weight:bold;">{{$data[0]['main_title_line']}}</p>
                        {{-- <p></p> --}}
                    </div>


                    @foreach($data as $key => $value)
                        @if($key!=0)
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <p style="font-weight:bold;">{{ $value['sub_title'] }}</p>
                                <p>{{ $value['description'] }}</p>
                                    {{-- <p>Order anything from our app or website we get you your things either from our mentioned stores or even from your desired stores. We deliver within hours or even minutes. Moreover, if you want them at some preferred time, just mention and we do the needful.</p><br> --}}
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="green_shape"></div>
    </div>
@endsection

