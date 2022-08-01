
 

    <div>    
       
        @if($statusUpdate)
        <livewire:admin.sosmed-toko-update />
        @else
        <livewire:admin.sosmed-toko-create />
        @endif
        
        <div class="card radius-15">

            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 mb-4 align-self-center">
                        <h5>Tabel Sosial Media Toko</h5>
                    </div>
                    <div class="col-md-4">
                        <form method="get" action="">
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
                    @if(count($sosmed_toko) > 0) 
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Url</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        
                        
                        @php
                        $no = 1;    
                        @endphp
                        
                        <tbody>
                        @foreach($sosmed_toko as $sosmed) 
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{$sosmed->nama}}</td>
                                <td>{{$sosmed->username}}</td>
                                <td><a href="{{ $sosmed->url }}" target="_blank" class="btn btn-sm btn-secondary">Klik URL</a></td>
                                <td>{{$sosmed->status}}</td>
                                <td>
                                    <button wire:click="getData({{$sosmed->id}})" class="btn btn-md btn-primary">Edit</button>
                                    <button wire:click="destroy({{$sosmed->id}})" class="btn btn-md btn-danger">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    
                    </table>
                    @else
                        <h5 class="text-center">Sosmed Toko Kosong</h5>
                    @endif
                </div>
            </div>
        </div>

    </div>
    
