
<div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            <strong>{{session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
        @endif
    <div class="card radius-15">

        <div class="card-header">
            <div class="row">
                <div class="col-11 align-self-center">
                    <h4>Edit Profil Toko</h4>
                </div>
                <div class="col-1">
                        <div class="input-group">
                            <div class="input-group-append">
                                <a href="{{ route('admin.pengaturan.profil-toko.edit', $profil->id) }}" class="btn btn-sm btn-secondary"><i class="lni lni-pencil-alt"></i> Edit</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="card-body">

                <div class="form-group">
                    <h5>Logo Website</h5>
                      <br>
                    <img src="{{Storage::url($profil->logo)}}" alt="{{$profil->nama}}" class="img-fluid"> 
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Nama Website</th>
                            <td>{{$profil->nama}}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi (Bio)</th>
                            <td>{{$profil->deskripsi}}</td>
                        </tr>
                        <tr>
                            <th>URL Website</th>
                            <td>{{$profil->url}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$profil->email}}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{$profil->alamat}}</td>
                        </tr>
                    </table>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-sm btn-secondary" onclick="window.history.back()">Kembali</button>
                </div>
        </div>
    </div>

       
</div>


