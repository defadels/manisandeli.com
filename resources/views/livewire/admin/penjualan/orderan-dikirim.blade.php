<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="breadcrumb-title pr-3">Penjualan</div>
        <div class="pl-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Dikirim</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
  
        </div>
    </div>
    <!--end breadcrumb-->
    {{-- <div class="mb-2"><a href="{{ route('admin.pengaturan.pembayaran.create') }}" class="btn btn-md btn-primary">+ Tambah Pembayaran</a></div> --}}
    <div class="card radius-15">

        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h4>Tabel Orderan Dikirim</h4>
                </div>
                <div class="col-4">
                    <form method="get" action="{{ url('admin/pengaturan/pembayaran') }}">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control form-control-sm" value="{{ $req['q'] ?? '' }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-secondary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                @if(count($daftar_orderan) > 0) 
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Nama Konsumen</th>
                            <th scope="col">Nomor Handphone</th>
                            <th scope="col">Tanggal Order</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    
                    
                    @php
                    $no = 1;    
                    @endphp
                    
                    <tbody>
                       @foreach($daftar_orderan as $orderan) 
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{$orderan->invoice}}</td>
                            <td>{{$orderan->nama_lengkap}}</td>
                            <td>{{ $orderan->nomor_hp }}</td>   
                            <td>{{$orderan->created_at}}</td>
                            <td>
                                <button class="btn btn-sm btn-light-success btn-block radius-30">
                                {{$orderan->status}}</button>    
                            </td>
                            <td>
                                <a href="{{ route('admin.orderan.dikirim.detail', ['orderan_id' => $orderan->id]) }}" class="btn btn-sm btn-primary" title="Lihat"><i class="lni lni-eye"></i></a>
                                <button type="button" wire:click.prevent="getOrder({{$orderan->id}})" data-toggle="modal" data-target="#exampleModal3" class="btn btn-sm btn-danger" title="Batal"><i class="lni lni-ban"></i></button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   
                </table>
                @else
                    <h5 class="text-center">Orderan Dikirim Kosong</h5>
                @endif
            </div>
        </div>
    </div>

    

</div>


@section('script')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#exampleModal3').modal('hide');
        });
    </script>
@endsection

