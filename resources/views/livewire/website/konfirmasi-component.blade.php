@section('style')

    <link rel="stylesheet" href="{{asset('frontend/css/error.css')}}">


@endsection

<div>
     <!--=====================================
                     ERROR PART START
        =======================================-->
       
        <section class="error-part">
            <div class="container">
                <h1>Pembayaran Berhasil !</h1>
                @if(isset($profil_toko->logo))
                <img class="img-fluid" src="{{Storage::url($profil_toko->logo)}}" alt="{{$profil_toko->nama}}">
                @else 
                <img class="img-fluid" src="{{asset('frontend/images/error.png')}}" alt="error">
                
                @endif 
                <h3>Terima kasih sudah belanja</h3>
                <p>Kami akan proses pesanan Anda.</p>
                <a href="{{route('website.produk')}}">Belanja lagi</a>
            </div>
        </section>
        <!--=====================================
                     ERROR PART END
        =======================================-->
</div>
