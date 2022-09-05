@section('style')
<link rel="stylesheet" href="{{asset('frontend/css/coming-soon.css')}}">
@endsection

<div>
    <section class="coming-part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="coming-content">
                        <h1 class="coming-title">coming soon...</h1>
                        {{-- <div class="countdown coming-clock" data-countdown="2021/12/31">
                            <span class="countdown-time"><span>00</span><small>days</small></span>
                            <span class="countdown-time"><span>00</span><small>hours</small></span>
                            <span class="countdown-time"><span>00</span><small>minutes</small></span>
                            <span class="countdown-time"><span>00</span><small>seconds</small></span>
                        </div> --}}
                        <h3 class="coming-subtitle">Saat ini kami belum melakukan penambahan untuk fitur ini.</h3>
                        {{-- <form class="coming-form">
                            <input type="text" placeholder="enter your email">
                            <button><i class="icofont-paper-plane"></i></button>
                        </form> --}}
                        <div class="coming-social">
                            @foreach($sosmed_toko as $sosmed)
                            <a class="icofont-{{strtolower($sosmed->nama)}}" href="{{$sosmed->url}}"></a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    @if(isset($profil_toko->logo))
                    <img class="img-fluid" src="{{Storage::url($profil_toko->logo)}}" alt="coming-soon">
                    @else 
                    <img class="img-fluid" src="{{asset('frontend/images/coming-soon.png')}}" alt="coming-soon">

                    @endif 
                </div>
            </div>
        </div>
    </section>
</div>
