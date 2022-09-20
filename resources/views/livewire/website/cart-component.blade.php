    
<aside wire:ignore.self class="cart-sidebar">
        <div  class="cart-header">
            <div class="cart-total">
                <i class="fas fa-shopping-basket"></i> 
                <span>total item ({{Cart::count()}})</span>
            </div>
            <a href="#" class="cart-close"><i class="icofont-close"></i></a>
        </div>
        
        <ul class="cart-list">
            
            @if(Cart::count() > 0)
            
            @foreach(Cart::content() as $item)
            <li class="cart-item">
                <div class="cart-media">
                    <a href="#">
                        @if(isset($item->model->foto_produk))
                        <img src="{{ Storage::url($item->model->foto_produk) }}" alt="{{$item->model->nama_produk}}"></a>
                        @else
                        <img src="{{  asset('frontend/images/product/01.jpg')}}" alt="{{$item->model->nama_produk}}"></a>
                        @endif
                        <button wire:click.prevent="hapusItem('{{$item->rowId}}')" class="cart-delete"><i class="far fa-trash-alt"></i></button>
                </div>
                <div class="cart-info-group">
                    <div class="cart-info">
                        <h6><a href="{{route('website.detail.produk',$item->model->id)}}">{{$item->model->nama_produk}}</a></h6>
                        <p>Rp.{{number_format($item->model->harga_jual)}}</p>
                    </div>
                    <div class="cart-action-group">
                        <div class="product-action">
                            <button class="action-minus" wire:click.prevent="kurangJumlah('{{$item->rowId}}')" title="Quantity Minus"><i class="icofont-minus"></i></button>
                            <input class="action-input" title="Quantity Number" type="number" pattern="[0-9]*" value="{{$item->qty}}">
                            <button class="action-plus" wire:click.prevent="tambahJumlah('{{$item->rowId}}')" max="120" title="Quantity Plus"><i class="icofont-plus"></i></button>
                        </div>
                        <h6>Rp.{{number_format($item->subtotal)}}</h6>
                    </div>
                </div>
            </li> 
            @endforeach
            
        </ul>
        
        <div class="cart-footer">
            {{-- <button class="coupon-btn">Do you have a coupon code?</button>
            <form class="coupon-form">
                <input type="text" placeholder="Enter your coupon code" disabled>
                <button type="button"><span>apply</span></button>
            </form> --}}
            <a class="cart-checkout-btn" wire:click.prevent="checkout()">
                <span class="checkout-label">Proses Pembayaran</span>
                <span class="checkout-price">Rp.{{number_format(Cart::subtotal())}}</span>
            </a>

        </div>
        
        @else
        <div class="cart-footer">
            <h5 class="text-center">Keranjang Kosong</h5>
            <a href="{{route('website.produk')}}" class="cart-checkout-btn">
                <span class="checkout-label">Belanja Sekarang</span>
            </a>
        </div>
            
         @endif

</aside>

