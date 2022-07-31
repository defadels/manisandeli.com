<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="">
            <img src="{{asset('backend/assets/images/logo-icon.png')}}" class="logo-icon-2" alt="" />
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
                </li>
                <li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Sales</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Penjualan</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-12"> <i class="bx bx-cart"></i>
                </div>
                <div class="menu-title">Pesanan</div>
            </a>
            <ul>
                <li> <a href="icons-line-icons.html"><i class="bx bx-right-arrow-alt"></i>Masuk</a>
                </li>
                <li> <a href="icons-boxicons.html"><i class="bx bx-right-arrow-alt"></i>Proses</a>
                </li>
                <li> <a href="icons-feather-icons.html"><i class="bx bx-right-arrow-alt"></i>Dikirim</a>
                </li>
                <li> <a href="icons-feather-icons.html"><i class="bx bx-right-arrow-alt"></i>Batal</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="emailbox.html">
                <div class="parent-icon icon-color-3"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">Pelanggan</div>
            </a>
        </li>
        
        <li>
            <a href="{{route('admin.produk')}}">
                <div class="parent-icon icon-color-2"><i class="bx bx-shopping-bag"></i>
                </div>
                <div class="menu-title">Produk</div>
            </a>
        </li>

        
        <li class="menu-label">Pengaturan</li>
        <li>
            <a href="{{route('admin.pengaturan.pembayaran')}}">
                <div class="parent-icon icon-color-9"><i class="bx bx-credit-card-front"></i>
                </div>
                <div class="menu-title">Metode Pembayaran</div>
            </a>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-10"><i class="bx bx-store-alt"></i>
                </div>
                <div class="menu-title">Profil Toko</div>
            </a>
            <ul>
                <li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Profil Umum</a>
                </li>
                <li> <a href="{{route('admin.pengaturan.sosmed-toko')}}"><i class="bx bx-right-arrow-alt"></i>Sosmed Toko</a>
                </li>
                </li>
            </ul>
        </li>
       

    </ul>
    <!--end navigation-->
</div>