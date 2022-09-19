@section('style')
    	<!--Data Tables -->
	<link href="{{asset('backend/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('backend/assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
@endsection

<div>
    <div class="page-content">
        <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
            <div class="breadcrumb-title pr-3">Laporan</div>
            <div class="pl-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan Penjualan</li>
                    </ol>
                </nav>
            </div>
            <div class="ml-auto">
      
            </div>
        </div>

        <div class="card radius-15">

            <div class="card-header">
                <div class="row">
                    <div class="col-8 align-self-center">
                        <h4>Laporan Penjualan</h4>
                    </div>
                    <div class="col-4">
                        <form method="get">
                            <div class="input-group">
                                <input type="text"  class="form-control form-control-sm" wire:model="search">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="addon-wrapping"><i class="lni lni-search-alt"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Jumlah Jual</th>
                                <th>@ Satuan Jual</th>
                                <th>Ongkos Kirim</th>
                                <th>@ Total Harga</th>
                                <th></th>
                                <th>@ Harga Modal</th>
                                <th>@ Harga Jual(f*g)</th>
                                <th>Laba / Keuntungan(n-m)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderan as $item)
                            <tr>
                                <td>{{$item->created_at->format('d-M-Y')}}</td>
                                <td>{{$item->item->kode_produk}}</td>
                                <td>{{$item->item->nama_produk}}</td>
                                <td>{{$item->jumlah}}</td>
                                <td>Rp.{{number_format($item->item->harga_jual)}}</td>
                                <td>Rp.{{$item->order->ongkir}}</td>
                                <td>Rp.{{$item->order->total}}</td>
                                <td></td>
                                <td>Rp.{{number_format($item->item->harga_pokok)}}</td>
                                <td>Rp.{{number_format($item->item->harga_jual)}}</td>
                                <td>Rp.{{number_format($item->item->harga_jual - $item->item->harga_pokok)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Jumlah Jual</th>
                                <th>@ Satuan Jual</th>
                                <th>Ongkos Kirim</th>
                                <th>@ Total Harga</th>
                                <th></th>
                                <th>@ Harga Modal</th>
                                <th>@ Harga Jual(f*g)</th>
                                <th>Laba / Keuntungan(n-m)</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
               
            </div>
        </div>
    </div>

 
</div>

@section('scripts')
<script src="{{asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>


<script>
    $(document).ready(function () {
        //Default data table
        $('#example').DataTable();
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });
        table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
    </script>
@endsection
