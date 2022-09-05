<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="breadcrumb-title pr-3">Profil Toko</div>
        <div class="pl-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Testimoni</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
  
        </div>
    </div>
    <!--end breadcrumb-->
    @if(session()->has('message'))
    <div class="alert alert-success">
        <strong>{{session('message')}}</strong>
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @endif
    
    <div class="mb-2"><button data-toggle="modal" data-target="#tambahData" type="button" class="btn btn-md btn-primary">+ Tambah Testimoni</button></div>
    <div class="card radius-15">

        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h4>Testimoni Halaman Depan</h4>
                </div>
                <div class="col-4">
                    <form method="get" action="{{ url('admin/pengaturan/testimoni') }}">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control form-control-sm" value="{{ $req['q'] ?? '' }}">
                            <div class="input-group-append">
                                <button data-toggle="modal" data-target="#exampleModal3" type="submit" class="btn btn-sm btn-secondary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                @if(count($daftar_testimoni) > 0) 
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama Konsumen</th>
                            <th scope="col">keterangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    
                    
                    @php
                    $no = 1;    
                    @endphp
                    
                    <tbody>
                       @foreach($daftar_testimoni as $testimoni) 
                        <tr>
                            <td><img src="{{Storage::url($testimoni->foto_konsumen)}}" style="width: 100" class="img-fluid" alt=""></td>
                            <td>{{$testimoni->nama_konsumen}}</td>
                            <td>{{ $testimoni->keterangan }}</td>   
                            <td>
                                <button type="button" wire:click.prevent="getData({{$testimoni->id}})" data-toggle="modal" data-target="#editModal" class="btn btn-sm btn-primary" title="Lihat"><i class="lni lni-eye"></i></button>
                                <button type="button" wire:click.prevent="getData({{$testimoni->id}})" data-toggle="modal" data-target="#exampleModal3" class="btn btn-sm btn-danger" title="Batal"><i class="lni lni-ban"></i></button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   
                </table>
                @else
                    <h5 class="text-center">Testimoni Kosong</h5>
                @endif
            </div>
        </div>
    </div>

    @if($statusUpdate == true)
    <div  wire:ignore.self class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin untuk menghapus data ini?</div>
                
                <form wire:submit.prevent="deleteData">
                
                    <input type="hidden" wire:model="testimoni_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Ya, hapus!</button>
                    </div>
                </form>
               
    
            </div>
        </div>
    </div>

    <div  wire:ignore.self class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="update">
                    @csrf  
                   <input type="hidden" wire:model="testimoni_id"> 

                  <div class="modal-body">
                      <div class="form-group">
                          <label for="">Foto Konsumen</label>
                          @if($foto_konsumen)
                          <img src="{{ $foto_konsumen->temporaryUrl() }}" style="width: 580px;" class="img-fluid" alt="">
                          @endif
                          @if($fotoUrl && !$foto_konsumen)
                          <img src="{{ Storage::url($fotoUrl) }}" style="width: 580px;" class="img-fluid" alt="">
                          @endif
                          
                          <input type="file" class="form-control @error('foto_konsumen') is-invalid @enderror" wire:model="foto_konsumen">
                          @error('foto_konsumen')
                          <span class="text-danger">
                              <strong>{{$message}}</strong>
                          </span>
                          @enderror
                          <hr>
                          <small>File foto berukuran 580px x 520px</small>
                      </div>
                      <div class="form-group">
                          <label for="">Nama Konsumen</label>
                          <input type="text" class="form-control @error('nama_konsumen') is-invalid @enderror" placeholder="Nama Konsumen Slider" wire:model="nama_konsumen">
                          @error('nama_konsumen')
                              <span class="text-danger">
                                  <strong>{{$message}}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="">Keterangan</label>
                          <textarea name="" wire:model="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="" style="height: 70px;"></textarea>
                          @error('keterangan')
                              <span class="text-danger">
                                  <strong>{{$message}}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                  
                  
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Edit Data</button>
                      </div>
                  </form>
               
    
            </div>
        </div>
    </div>
    @endif

    <div  wire:ignore.self class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="store">
                  @csrf  
        
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Foto Konsumen</label>
                        @if($foto_konsumen)
                        <img src="{{ $foto_konsumen->temporaryUrl() }}" style="width: 580px; height:520px;" class="img-fluid" alt="">
                        @endif
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" wire:model="foto_konsumen">
                        @error('foto')
                        <span class="text-danger">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        <hr>
                        <small>File foto berukuran 580px x 520px</small>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Konsumen</label>
                        <input type="text" class="form-control @error('nama_konsumen') is-invalid @enderror" placeholder="Nama Konsumen Slider" wire:model="nama_konsumen">
                        @error('nama_konsumen')
                            <span class="text-danger">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea name="" wire:model="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="" style="height: 70px;"></textarea>
                        @error('keterangan')
                            <span class="text-danger">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                   
                </div>
                
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Masukkan Data</button>
                    </div>
                </form>
               
    
            </div>
        </div>
    </div>

</div>


@section('script')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#exampleModal3').modal('hide');
            $('#tambahData').modal('hide');
            $('#editData').modal('hide');
        });
    </script>
@endsection

