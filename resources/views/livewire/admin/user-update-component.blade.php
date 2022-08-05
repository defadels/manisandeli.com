<div>
    <div class="card radius-15">
        <div class="card-header">
            <h5>Form Tambah User</h5>
        </div>
        <div class="card-body">

    
                <form wire:submit.prevent="updateUser">
                    @csrf
                    <input type="hidden" name="" wire:model="userId">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-2 mb-2">
                                <label>Nama Lengkap</label>

                                <input wire:model="nama" class="form-control @error('nama') is-invalid @enderror" type="text" placeholder="Nama Sosmed" id="">

                                @error('nama')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-md-2 mb-2">
                                <label>Email</label>

                                <input wire:model="email" class="form-control @error('email') is-invalid  @enderror" type="email" placeholder="email" id="">
  
                                @error('email')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-md-6 mb-2">
                                <label>Password</label>

                                <input wire:model="password" class="form-control @error('password') is-invalid  @enderror" type="password" id="">

                                @error('password')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-2 mb-2">
                                <label>Roles</label>
                            <select wire:model="roles" class="form-control @error('roles') is-invalid  @enderror" id="">
                                    <option value="">Pilih Roles</option>
                                    <option @if(isset($statusUpdate))  @if($user->roles == 'admin') checked @endif  @endif value="admin">Admin</option>
                                    <option @if(isset($statusUpdate))  @if($user->roles == 'owner') checked @endif  @endif value="owner">Owner</option>
                            </select>

                            @error('roles')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">+ Update</button>
                </form>
    

        </div>
    </div>
</div>
