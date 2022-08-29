@section('style')
<link rel="stylesheet" href="{{asset('frontend/css/contact.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/about.css')}}">
@endsection

<div>
    <!--=====================================
                    BANNER PART START
        =======================================-->
        <section class="inner-section single-banner" style="background: url(images/single-banner.jpg) no-repeat center;">
            <div class="container">
                <h2>tentang kami</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('website.home')}}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                </ol>
            </div>
        </section>
        <!--=====================================
                    BANNER PART END
        =======================================-->

         <!--=====================================
                     ABOUT PART START
        =======================================-->
        <section class="inner-section about-company">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-content">
                            <h2>Our Motive is to Provide Best for Those Who Deserve</h2>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis exercitationem commodi aliquam necessitatibus vero reiciendis quaerat illo est fuga ea temporibus natus doloremque ipsum voluptas quod deserunt expedita reprehenderit pariatur quidem quisquam, recusandae animi non! Voluptas totam repudiandae rerum molestiae possimus quis numquam sapiente sunt architecto quisquam Aliquam odio optio</p>
                        </div>
                        <ul class="about-list">
                            <li>
                                <h3>34785</h3>
                                <h6>registered users</h6>
                            </li>
                            <li>
                                <h3>2623</h3>
                                <h6>per day visitors</h6>
                            </li>
                            <li>
                                <h3>189</h3>
                                <h6>total products</h6>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="{{asset('frontend/images/about/01.jpg')}}" alt="about">
                            <img src="{{asset('frontend/images/about/02.jpg')}}" alt="about">
                            <img src="{{asset('frontend/images/about/03.jpg')}}" alt="about">
                            <img src="{{asset('frontend/images/about/04.jpg')}}" alt="about">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                    ABOUT PART END
        =======================================-->


        <!--=====================================
                    CONTACT PART START
        =======================================-->
        <section class="inner-section contact-part">
            <div class="container">


                {{-- KONTAK REGULAR TOKO --}}
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-card">
                            <i class="icofont-location-pin"></i>
                            <h4>head office</h4>
                            <p>{{$profil->alamat ?? ''}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-card active">
                            <i class="icofont-phone"></i>
                            <h4>phone number</h4>
                            <p>
                                {{-- <a href="#">009-215-5596 <span>(toll free)</span></a> --}}
                                <a href="#">{{$profil->alamat ?? ''}}</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-card">
                            <i class="icofont-email"></i>
                            <h4>Support mail</h4>
                            <p>
                                {{-- <a href="#">contact@example.com</a> --}}
                                <a href="#">{{$profil->email ?? ''}}</a>
                            </p>
                        </div>
                    </div>
                </div>


                {{-- SOSMED TOKO --}}
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-card">
                            <i class="icofont-location-pin"></i>
                            <h4>head office</h4>
                            <p>1Hd- 50, 010 Avenue, NY 90001 United States</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-card active">
                            <i class="icofont-phone"></i>
                            <h4>phone number</h4>
                            <p>
                                <a href="#">009-215-5596 <span>(toll free)</span></a>
                                <a href="#">009-215-5595</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-card">
                            <i class="icofont-email"></i>
                            <h4>Support mail</h4>
                            <p>
                                <a href="#">contact@example.com</a>
                                <a href="#">info@example.com</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3654.3406974350205!2d90.48469931445422!3d23.663771197998262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b0d5983f048d%3A0x754f30c82bcad3cd!2sJalkuri%20Bus%20Stop!5e0!3m2!1sen!2sbd!4v1605354966349!5m2!1sen!2sbd" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form class="contact-form">
                            <h4>Beri Kami Kritik dan Saran</h4>
                            <div class="form-group">
                                <div class="form-input-group">
                                    <input class="form-control" type="text" placeholder="Your Name">
                                    <i class="icofont-user-alt-3"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-input-group">
                                    <input class="form-control" type="text" placeholder="Your Email">
                                    <i class="icofont-email"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-input-group">
                                    <input class="form-control" type="text" placeholder="Your Subject">
                                    <i class="icofont-book-mark"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-input-group">
                                    <textarea class="form-control" placeholder="Your Message"></textarea>
                                    <i class="icofont-paragraph"></i>
                                </div>
                            </div>
                            <button type="submit" class="form-btn-group">
                                <i class="fas fa-envelope"></i>
                                <span>send message</span>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- BRANCH -->

                {{-- <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="branch-card">
                            <img src="images/branch/01.jpg" alt="branch">
                            <div class="branch-overlay">
                                <h3>dhaka</h3>
                                <p>kawran bazar, 1100 east tejgaon, dhaka.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="branch-card">
                            <img src="images/branch/02.jpg" alt="branch">
                            <div class="branch-overlay">
                                <h3>Narayanganj</h3>
                                <p>west jalkuri, 1420 shiddirganj, narayanganj.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="branch-card">
                            <img src="images/branch/03.jpg" alt="branch">
                            <div class="branch-overlay">
                                <h3>chandpur</h3>
                                <p>east lautuli, 2344 faridganj, chandpur.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="branch-card">
                            <img src="images/branch/04.jpg" alt="branch">
                            <div class="branch-overlay">
                                <h3>noakhli</h3>
                                <p>begumganj, 3737 shonaimuri, noakhli.</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
        <!--=====================================
                    CONTACT PART END
        =======================================-->
</div>
