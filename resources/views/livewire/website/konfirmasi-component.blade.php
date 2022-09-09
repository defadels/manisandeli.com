@section('style')

    <link rel="stylesheet" href="{{asset('frontend/css/error.css')}}">


@endsection

<div>
     <!--=====================================
                     ERROR PART START
        =======================================-->
        <?php
            $links = "https://api.whatsapp.com/send?phone=6287822838595<&text=Assalamu'alaikum, perkenalkan saya ".Auth::user()->nama." Saya mengirim pesan melalui website manisanputradeli.com.%0A"."%0ASaya sudah melakukan pembayaran dengan %0A"."%0AKode Invoice : ".Session::get('order')['invoice']."%0AApakah bisa diproses?";
        ?>
        <section class="error-part">
            <div class="container">
                <h1>Pembayaran Berhasil !</h1>
                <img class="img-fluid" src="{{asset('frontend/images/error.png')}}" alt="error">
                <h3>Terima kasih sudah belanja</h3>
                <p>Silahkan klik tombol di bawah ini agar mengkonfirmasi pembayaran Anda.</p>
                <a href="{{$links}}" target="_blank">konfirmasi</a>
            </div>
        </section>
        <!--=====================================
                     ERROR PART END
        =======================================-->
</div>
