<div>
    @if(session()->has('message'))
    <div class="alert alert-success">
        <strong>{{session('message')}}</strong>
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @endif

<div class="page-content">


<div class="card radius-15">

    <div class="card-header">
        <div class="row">
            <div class="col-11 align-self-center">
                <h4>Ubah Profil User</h4>
            </div>
            <div class="col-1">
                    <div class="input-group">
                        <div class="input-group-append">
                            {{-- <button type="submit" class="btn btn-sm btn-secondary">Edit</button> --}}
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="card-body">

        <form wire:submit.prevent="update">
            @csrf
            <input type="hidden" name="" wire:model="id">

            <div class="form-group">

                @if($foto_profil)
                    <img src="{{ $foto_profil->temporaryUrl() }}" class="img-fluid" alt="">
                @endif
                @if($fotoUrl && !$foto_profil)
                    <img src="{{ Storage::url($fotoUrl) }}" class="img-fluid" alt="">
                @endif
            </div>

            <div class="form-group">
                <label for="">Foto Profil</label>

                
                <input type="file" name="foto_profil" wire:model="foto_profil" class="form-control" id="">
                
                @error('foto_profil')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" name="nama" wire:model="nama" id="" class="form-control @error('nama') is-invalid @enderror">
                @error('nama')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="" wire:model="email" id="" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Nomor Handphone</label>
                <input type="text" name="nomor_hp" wire:model="nomor_hp" id="" class="form-control @error('nomor_hp') is-invalid @enderror">
                @error('nomor_hp')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <a href="#" class="btn btn-md btn-outline-danger" onclick="window.history.back()">Batal</a>
            <button type="submit" class="btn btn-md btn-primary">Update</button>
        </form>
        
    </div>
</div>
</div>
</div>
