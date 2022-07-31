<div>
    <div class="card radius-15">
        <div class="card-header">
            <h5>Form Tambah Sosmed Toko</h5>
        </div>
        <div class="card-body">

       
                <form wire:submit.prevent="store">
                    @csrf
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-2 mb-2">
                                <label>Nama Sosmed</label>

                                <input wire:model="nama" class="form-control @error('nama') is-invalid @enderror" type="text" placeholder="Nama Sosmed" id="">

                                @error('nama')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-md-2 mb-2">
                                <label>Username</label>

                                <input wire:model="username" class="form-control @error('username') is-invalid  @enderror" type="text" placeholder="username" id="">
                                {{ $username }}
                                @error('username')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-md-6 mb-2">
                                <label>URL Sosmed</label>

                                <input wire:model="url" class="form-control @error('url') is-invalid  @enderror" type="url" id="">

                                @error('url')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-2 mb-2">
                                <label>Status</label>
                            <select wire:model="status" class="form-control @error('status') is-invalid  @enderror" id="">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Nonaktif">Nonaktif</option>
                            </select>

                            @error('status')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">+ Tambah</button>
                </form>
       

        </div>
    </div>
</div>
