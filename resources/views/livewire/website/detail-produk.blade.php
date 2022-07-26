@section('style')
<link rel="stylesheet" href="{{asset('frontend/css/product-details.css')}}">
@endsection
<div>
     <!--=====================================
                    BANNER PART START
        =======================================-->
        <section class="single-banner inner-section" style="background: url(images/single-banner.jpg) no-repeat center;">
            <div class="container">
                <h2>Detail Produk</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('website.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('website.produk')}}">produk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">detail produk</li>
                </ol>
            </div>
        </section>
        <!--=====================================
                    BANNER PART END
        =======================================-->


        <!--=====================================
                PRODUCT DETAILS PART START
        =======================================-->
        <section class="inner-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="details-gallery">
                            <div class="details-label-group">
                                {{-- <label class="details-label new">new</label> --}}
                                {{-- <label class="details-label off">-10%</label> --}}
                            </div>
                            <ul class="details-preview"> 
                                <li><img src="{{Storage::url($produk->foto_produk)}}" alt="product"></li>
                                <li><img src="{{asset('frontend/images/product/01.jpg')}}" alt="product"></li>
                                <li><img src="{{asset('frontend/images/product/01.jpg')}}" alt="product"></li>
                                <li><img src="{{asset('frontend/images/product/01.jpg')}}" alt="product"></li>
                                <li><img src="{{asset('frontend/images/product/01.jpg')}}" alt="product"></li>
                            </ul>

                            <!-- THUMBNAIL FOTO PRODUK -->
                            {{-- <ul class="details-thumb">
                                <li><img src="{{asset('frontend/images/product/01.jpg')}}" alt="product"></li>
                                <li><img src="{{asset('frontend/images/product/01.jpg')}}" alt="product"></li>
                                <li><img src="{{asset('frontend/images/product/01.jpg')}}" alt="product"></li>
                                <li><img src="{{asset('frontend/images/product/01.jpg')}}" alt="product"></li>
                                <li><img src="{{asset('frontend/images/product/01.jpg')}}" alt="product"></li>
                            </ul> --}}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="product-navigation">
                            @if(isset($produk_sebelumnya))
                            <li class="product-nav-prev">
                                <a href="{{route('website.detail.produk', $prevId)}}">
                                    <i class="icofont-arrow-left"></i>
                                    produk sebelumnya
                                    <span class="product-nav-popup">
                                        @if(isset($produk_sebelumnya->foto_produk))
                                        <img src="{{Storage::url($produk_sebelumnya->foto_produk)}}" alt="{{$produk_sebelumnya->nama_produk}}">
                                        @else 
                                        <img src="{{asset('frontend/images/product/02.jpg')}}" alt="{{$produk_sebelumnya->nama_produk}}">

                                        @endif
                                        <small>{{$produk_sebelumnya->nama_produk}}</small>
                                    </span>
                                </a>
                            </li>
                            @endif

                            @if(isset($produk_selanjutnya))
                            <li class="product-nav-next">
                                <a href="{{route('website.detail.produk', $nextId)}}">
                                    produk selanjutnya
                                    <i class="icofont-arrow-right"></i>
                                    <span class="product-nav-popup">
                                        @if(isset($produk_selanjutnya->foto_produk))
                                        <img src="{{Storage::url($produk_selanjutnya->foto_produk)}}" alt="{{$produk_selanjutnya->nama_produk}}">
                                        @else 
                                        <img src="{{asset('frontend/images/product/02.jpg')}}" alt="{{$produk_selanjutnya->nama_produk}}">

                                        @endif
                                        <small>{{$produk_selanjutnya->nama_produk}}</small>
                                    </span>
                                </a>
                            </li>
                            @endif

                        </ul>
                        <div class="details-content">
                            <h3 class="details-name"><a href="#">{{$produk->nama_produk}}</a></h3>
                            <div class="details-meta">
                                {{-- <p>SKU:<span>1234567</span></p>
                                <p>BRAND:<a href="#">radhuni</a></p> --}}
                            </div>
                            <div class="details-rating">
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                {{-- <a href="#">(3 reviews)</a> --}}
                            </div>
                            <h3 class="details-price">
                                {{-- <del>$38.00</del> --}}
                                <span>Rp.{{number_format($produk->harga_jual)}}<small>/per kilo</small></span>
                            </h3>
                            <p class="details-desc">{{$produk->deskripsi}}</p>
                            
                            
                            {{-- <div class="details-list-group">
                                <label class="details-list-title">tags:</label>
                                <ul class="details-tag-list">
                                    <li><a href="#">organic</a></li>
                                    <li><a href="#">fruits</a></li>
                                    <li><a href="#">chilis</a></li>
                                </ul>
                            </div> --}}

                            <!-- TOMBOL SHARE KE SOSMED -->

                            {{-- <div class="details-list-group">
                                <label class="details-list-title">Share:</label>
                                <ul class="details-share-list">
                                    <li><a href="#" class="icofont-facebook" title="Facebook"></a></li>
                                    <li><a href="#" class="icofont-twitter" title="Twitter"></a></li>
                                    <li><a href="#" class="icofont-linkedin" title="Linkedin"></a></li>
                                    <li><a href="#" class="icofont-instagram" title="Instagram"></a></li>
                                </ul>
                            </div> --}}

                            <div class="details-add-group">
                                <button class="product-add" wire:click.prevent="store({{$produk->id}},'{{$produk->nama_produk}}',{{$produk->harga_jual}})" title="Tambah ke Keranjang">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span>tambah ke keranjang</span>
                                </button>

                            </div>

                            <!-- DETAIL TOMBOL AKSI -->
                            {{-- <div class="details-action-group">
                                <a class="details-wish wish" href="#" title="Add Your Wishlist">
                                    <i class="icofont-heart"></i>
                                    <span>add to wish</span>
                                </a>
                                <a class="details-compare" href="compare.html" title="Compare This Item">
                                    <i class="fas fa-random"></i>
                                    <span>Compare This</span>
                                </a>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                PRODUCT DETAILS PART END
        =======================================-->


        <!--=====================================
                  PRODUCT TAB PART START
        =======================================-->
        <section class="inner-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-details-frame">
                            <h3 class="frame-title">Konten</h3>
                            <div class="tab-descrip">
                                {!!$produk->konten !!}
                            </div>
                        </div>
                        
                        <!-- SPESIFIKASI PRODUK -->

                        {{-- <div class="product-details-frame">
                            <h3 class="frame-title">Spacification</h3>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Product code</th>
                                        <td>SKU: 101783</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Weight</th>
                                        <td>1kg, 2kg</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Styles</th>
                                        <td>@Girly</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Properties</th>
                                        <td>Short Dress</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --}}


                        <!-- REVIEW PRODUK -->

                        {{-- <div class="product-details-frame">
                            <h3 class="frame-title">Reviews (2)</h3>
                            <ul class="review-list">
                                <li class="review-item">
                                    <div class="review-media">
                                        <a class="review-avatar" href="#">
                                            <img src="{{asset('frontend/images/avatar/01.jpg')}}" alt="review">
                                        </a>
                                        <h5 class="review-meta">
                                            <a href="#">miron mahmud</a>
                                            <span>June 02, 2020</span>
                                        </h5>
                                    </div>
                                    <ul class="review-rating">
                                        <li class="icofont-ui-rating"></li>
                                        <li class="icofont-ui-rating"></li>
                                        <li class="icofont-ui-rating"></li>
                                        <li class="icofont-ui-rating"></li>
                                        <li class="icofont-ui-rate-blank"></li>
                                    </ul>
                                    <p class="review-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus hic amet qui velit, molestiae suscipit perferendis, autem doloremque blanditiis dolores nulla excepturi ea nobis!</p>
                                    <form class="review-reply">
                                        <input type="text" placeholder="reply your thoughts">
                                        <button><i class="icofont-reply"></i>reply</button>
                                    </form>
                                    <ul class="review-reply-list">
                                        <li class="review-reply-item">
                                            <div class="review-media">
                                                <a class="review-avatar" href="#">
                                                    <img src="{{asset('frontend/images/avatar/02.jpg')}}" alt="review">
                                                </a>
                                                <h5 class="review-meta">
                                                    <a href="#">labonno khan</a>
                                                    <span><b>author -</b> June 02, 2020</span>
                                                </h5>
                                            </div>
                                            <p class="review-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus hic amet qui velit, molestiae suscipit perferendis, autem doloremque blanditiis dolores nulla excepturi ea nobis!</p>
                                            <form class="review-reply">
                                                <input type="text" placeholder="reply your thoughts">
                                                <button><i class="icofont-reply"></i>reply</button>
                                            </form>
                                        </li>
                                        <li class="review-reply-item">
                                            <div class="review-media">
                                                <a class="review-avatar" href="#">
                                                    <img src="{{asset('frontend/images/avatar/03.jpg')}}" alt="review">
                                                </a>
                                                <h5 class="review-meta">
                                                    <a href="#">tahmina bonny</a>
                                                    <span>June 02, 2020</span>
                                                </h5>
                                            </div>
                                            <p class="review-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus hic amet qui velit, molestiae suscipit perferendis, autem doloremque blanditiis dolores nulla excepturi ea nobis!</p>
                                            <form class="review-reply">
                                                <input type="text" placeholder="reply your thoughts">
                                                <button><i class="icofont-reply"></i>reply</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <li class="review-item">
                                    <div class="review-media">
                                        <a class="review-avatar" href="#">
                                            <img src="{{asset('frontend/images/avatar/04.jpg')}}" alt="review">
                                        </a>
                                        <h5 class="review-meta">
                                            <a href="#">shipu shikdar</a>
                                            <span>June 02, 2020</span>
                                        </h5>
                                    </div>
                                    <ul class="review-rating">
                                        <li class="icofont-ui-rating"></li>
                                        <li class="icofont-ui-rating"></li>
                                        <li class="icofont-ui-rating"></li>
                                        <li class="icofont-ui-rating"></li>
                                        <li class="icofont-ui-rate-blank"></li>
                                    </ul>
                                    <p class="review-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus hic amet qui velit, molestiae suscipit perferendis, autem doloremque blanditiis dolores nulla excepturi ea nobis!</p>
                                    <form class="review-reply">
                                        <input type="text" placeholder="reply your thoughts">
                                        <button><i class="icofont-reply"></i>reply</button>
                                    </form>
                                </li>
                            </ul>
                        </div> --}}

                        <!-- FORM REVIEW PRODUK -->
                        {{-- <div class="product-details-frame">
                            <h3 class="frame-title">add your review</h3>
                            <form class="review-form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="star-rating">
                                            <input type="radio" name="rating" id="star-1"><label for="star-1"></label>
                                            <input type="radio" name="rating" id="star-2"><label for="star-2"></label>
                                            <input type="radio" name="rating" id="star-3"><label for="star-3"></label>
                                            <input type="radio" name="rating" id="star-4"><label for="star-4"></label>
                                            <input type="radio" name="rating" id="star-5"><label for="star-5"></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Describe"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="btn btn-inline">
                                            <i class="icofont-water-drop"></i>
                                            <span>drop your review</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}
                        
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                    PRODUCT TAB PART END
        =======================================-->


        <!--=====================================
                 PRODUCT RELATED PART START
        =======================================-->
        <section class="inner-section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-heading">
                            <h2>produk berkaitan</h2>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                    @foreach($daftar_produk as $produk)
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label">
                                    {{-- <label class="label-text sale">sale</label> --}}
                                </div>
                                <button class="product-wish wish">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <a class="product-image" href="{{route('website.detail.produk',$produk->id)}}">
                                    <img src="{{ Storage::url($produk->foto_produk)}}" alt="product">
                                </a>
                                <div class="product-widget">
                                    {{-- <a title="Product Compare" href="compare.html" class="fas fa-random"></a> --}}
                                    {{-- <a title="Product Video" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a> --}}
                                    <a title="Product View" href="{{route('website.detail.produk',$produk->id)}}" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating">
                                    <i class="active icofont-star"></i>
                                    <i class="active icofont-star"></i>
                                    <i class="active icofont-star"></i>
                                    <i class="active icofont-star"></i>
                                    <i class="active icofont-star"></i>
                                    {{-- <a href="product-video.html">(3)</a> --}}
                                </div>
                                <h6 class="product-name">
                                    <a href="{{route('website.detail.produk', $produk->id)}}">{{$produk->nama_produk}}</a>
                                </h6>
                                <h6 class="product-price">
                                    {{-- <del>$34</del> --}}
                                    <span>Rp.{{$produk->harga_jual}}<small>/kg</small></span>
                                </h6>
                                <button class="product-add" wire:click.prevent="store({{$produk->id}},'{{$produk->nama_produk}}',{{$produk->harga_jual}})" title="Add to Cart">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span>tambah ke keranjang</span>
                                </button>
                                <div class="product-action">
                                    <button class="action-minus" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                    <input class="action-input" title="Quantity Number" type="text" name="quantity" value="1">
                                    <button class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-btn-25">
                            <a href="{{route('website.produk')}}" class="btn btn-outline">
                                <i class="fas fa-eye"></i>
                                <span>Lihat semua produk</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                 PRODUCT RELATED PART END
        =======================================-->
</div>
