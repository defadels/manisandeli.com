
<div>
    
    <div class="card radius-15" style="@if($statusUpdate) display : none  @endif">

        <div class="card-header">
            <div class="row">
                <div class="col-11 align-self-center">
                    <h4>Tabel Metode Pembayaran</h4>
                </div>
                <div class="col-1">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button id="edit" wire:click="getData({{$profil->id}})" onclick="myFunction()" class="btn btn-sm btn-secondary">Edit</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="card-body">

                <div class="form-group">
                    <label for="">Logo Website</label>
                       <p>{{$profil->logo}}</p>  
                </div>

                <div class="form-group">
                    <label for="">Nama Website</label>
                       <p>{{$profil->nama}}</p>  
                </div>

                <div class="form-group">
                    <label for="">URL Website</label>
                       <p>{{$profil->url}}</p>                     
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                      <p>{{$profil->email}}</p>   
                </div>

                <div class="form-group">
                    <label for="">Nomor Handphone</label>
                    <p>{{$profil->nomor_hp}}</p> 
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-md btn-secondary" onclick="window.history.back()">Kembali</button>
                </div>
        </div>
    </div>

       
</div>


