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
                        <h4>Edit Profil User</h4>
                    </div>
                    <div class="col-1">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <a href="{{ route('admin.profile-user.update', $user->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
    
                    <div class="form-group">
                        <label for="">Foto Profil</label>
                           <p></p>  
                    </div>
    
                    <div class="form-group">
                        <label for="">Nama</label>
                           <p>{{$user->nama}}</p>  
                    </div>

    
                    <div class="form-group">
                        <label for="">Email</label>
                          <p>{{$user->email}}</p>   
                    </div>
    
                    <div class="form-group">
                        <label for="">Nomor Handphone</label>
                        <p>{{$user->nomor_hp}}</p> 
                    </div>
                    
                    <div class="form-group">
                        <label for="">Hak AKses</label>
                        <p>{{$user->roles}}</p> 
                    </div>
    
                    <div class="form-group">
                        <button type="button" class="btn btn-md btn-secondary" onclick="window.history.back()">Kembali</button>
                    </div>
            </div>
        </div>
    </div>
</div>
