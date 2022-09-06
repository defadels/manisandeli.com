<div>
    <!--=====================================
                    BANNER PART START
        =======================================-->
        <section class="inner-section single-banner" style="background: url(images/single-banner.jpg) no-repeat center;">
            <div class="container">
                <h2>Produk</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('website.home')}}">beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">produk</li>
                </ol>
            </div>
        </section>
        <!--=====================================
                    BANNER PART END
        =======================================-->


        <!--=====================================
                    SHOP PART START
        =======================================-->
        <section class="inner-section shop-part">
            <div class="container">

                {{-- Fitur filter  --}}

                {{-- <div class="row">
                    <div class="col-lg-12">
                        <div class="top-filter">
                            <div class="filter-show">
                                <label class="filter-label">Show :</label>
                                <select class="form-select filter-select">
                                    <option value="1">12</option>
                                    <option value="2">24</option>
                                    <option value="3">36</option>
                                </select>
                            </div>
                            <div class="filter-short">
                                <label class="filter-label">Short by :</label>
                                <select class="form-select filter-select">
                                    <option selected>default</option>
                                    <option value="3">trending</option>
                                    <option value="1">featured</option>
                                    <option value="2">recommend</option>
                                </select>
                            </div>
                            <div class="filter-action">
                                <a href="shop-3column.html" title="Three Column"><i class="fas fa-th"></i></a>
                                <a href="shop-2column.html" title="Two Column"><i class="fas fa-th-large"></i></a>
                                <a href="shop-1column.html" title="One Column"><i class="fas fa-th-list"></i></a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-5">
                    @foreach($daftar_produk as $produk)
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-label">
                                    <label class="label-text new">new</label>
                                </div>
                                <button class="product-wish wish">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <a class="product-image" href="product-video.html">
                                    <img src="{{$produk->foto_produk ?? asset('frontend/images/product/01.jpg')}}" alt="product">
                                </a>
                                <div class="product-widget">
                                    <a title="Product Compare" href="compare.html" class="fas fa-random"></a>
                                    <a title="Product Video" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a>
                                    <a title="Product View" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-rating">
                                    <i class="active icofont-star"></i>
                                    <i class="active icofont-star"></i>
                                    <i class="active icofont-star"></i>
                                    <i class="active icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <a href="product-video.html">(3)</a>
                                </div>
                                <h6 class="product-name">
                                    <a href="{{route('website.detail.produk',$produk->id)}}">{{$produk->nama_produk}}</a>
                                </h6>
                                <h6 class="product-price">
                                    {{-- <del>$34</del> --}}
                                    <span>Rp.{{number_format($produk->harga_jual)}}<small>/kg</small></span>
                                </h6>
                                <button class="product-add" wire:click.prevent="store({{$produk->id}},'{{$produk->nama_produk}}',{{$produk->harga_jual}})" title="Add to Cart">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span>tambah ke keranjang</span>
                                </button>
                                {{-- <div class="product-action">
                                    <button class="action-minus" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                    <input class="action-input" title="Quantity Number" type="text" name="quantity" value="1">
                                    <button class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
             
                   
                  
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="bottom-paginate">
                            
                            
                            {{-- <p class="page-info">Showing 12 of 60 Results</p> --}}
                            
                            {{-- <ul class="pagination">
                                {{ $daftar_produk->links() }}
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-long-arrow-alt-left"></i>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">...</li>
                                <li class="page-item"><a class="page-link" href="#">60</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>
                                </li>

                                
                            </ul> --}}
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                    SHOP PART END
        =======================================-->
</div>
