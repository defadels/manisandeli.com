<div>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Penting!</h4>
        <p class="mb-o">Kamu harus mengisi data profil toko dengan lengkap!</p>
    </div>
    <div class="card radius-15">

        <div class="card-header">
            <div class="row">
                <div class="col-11 align-self-center">
                    <h4>Edit Profil Toko</h4>
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

            <form wire:submit.prevent="store">
                @csrf

                <div class="form-group">
                    @if($logo)
                        <img src="{{$logo->temporaryUrl()}}" class="img-fluid" alt="{{$profil->nama}}" srcset="">
                    @endif
                    
                    <label for="">Logo Website</label>
                    <input type="file" name="logo" wire:model="logo" class="form-control" id="">
                    @error('logo')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    
                </div>

                <div class="form-group">
                    <label for="">Nama Website</label>
                    <input type="text" name="nama" wire:model="nama" id="" class="form-control @error('nama') is-invalid @enderror">
                    @error('nama')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">URL Website</label>
                    <input type="url" name="url" wire:model="url" id="" class="form-control @error('url') is-invalid @enderror">
                    @error('url')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <input type="text" wire:model="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">
                    @error('deskripsi')
                        <span class="text-danger">
                            <strong>{{$message}}</strong>
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
                    <label for="">Alamat</label>
                    <textarea wire:model="alamat" id="" cols="30" rows="10" class="form-control @error('alamat') is-invalid @enderror"></textarea>
                    @error('alamat')
                        <span class="text-danger">
                            <strong>{{$message}}</strong>
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

                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
            </form>
            
        </div>
    </div>
</div>
