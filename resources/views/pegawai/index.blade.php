@extends('main')

@section('title', 'Data Pegawai')


@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            {{-- <div class="page-title">
                <h1>Data</h1>
            </div> --}}
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    
                    <li><a href="#">Pegawai</a></li>
                    <li class="active">Data</li>
                    {{-- <li class="active"><i class="fa fa-dashboard"></i></li> --}}
                </ol>
            </div>
        </div>
    </div>  
</div>
@endsection

@section('content')

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak Data Berdasarkan Periode</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <div class="form-group">
                    <label for="label">Pangkat</label>
                    <input type="text" name="pangkat" id="pangkat" class="form-control">
                </div>
        </div>

        <div class="modal-footer">
            <div class="form-group">
                <a href=""  onclick="this.href='/cetak-filter/'+ document.getElementById('pangkat').value 
                "target="_blank" class="btn btn-primary">
                    <i class="fa fa-print"></i> Print
                   </a>
            </div> --}}
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> --}}
        {{-- </div>
      </div>
    </div>
  </div> --}}

  <!-- Modal ADD -->
{{-- <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pegawai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <form action="{{ url('datapegawai') }}" method="post" enctype="multipart/form-data"> --}}
                    {{-- @csrf --}}
                    {{-- {{csrf_field()}}
                <label>Nama Pegawai</label>
                <input type="text" name="nama_pegawai" class="form-control @error('nama_pegawai') 
                is-invalid @enderror" value="{{ old('nama_pegawai') }}" autofocus>
                @error('nama_pegawai')
                <div class="invalid-feedback">{{ $message }}</div>     
                @enderror
            </div>

            <div class="form-group">
                <label>NIP</label>
                <input type="double" name="nip" class="form-control @error('nip') 
                is-invalid @enderror" value="{{ old('nip') }}">
                @error('nip')
                <div class="invalid-feedback">{{ $message }}</div>     
                @enderror
            </div>

            <div class="form-group">
                <label>NRP</label>
                <input type="double" name="nrp" class="form-control @error('nrp') 
                is-invalid @enderror" value="{{ old('nrp') }}">
                @error('nrp')
                <div class="invalid-feedback">{{ $message }}</div>     
                @enderror
            </div>

            <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" name="tempatlahir" class="form-control @error('tempatlahir') 
                is-invalid @enderror" value="{{ old('tempatlahir') }}">
                @error('tempatlahir')
                <div class="invalid-feedback">{{ $message }}</div>     
                @enderror
            </div>

            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgllahir" class="form-control @error('tgllahir') 
                is-invalid @enderror" value="{{ old('tgllahir') }}">
                @error('tgllahir')
                <div class="invalid-feedback">{{ $message }}</div>     
                @enderror
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') 
                is-invalid @enderror" value="{{ old('alamat') }}">
                @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>     
                @enderror
            </div>
   

            <div class="form-group">
                <label>No. Hp</label>
                <input type="double" name="hp" class="form-control @error('hp') 
                is-invalid @enderror" value="{{ old('hp') }}">
                @error('hp')
                <div class="invalid-feedback">{{ $message }}</div>     
                @enderror
            </div>
     
            <div class="form-group">
                <label>Pangkat</label>
                <input type="text" name="pangkat" class="form-control @error('pangkat') 
                is-invalid @enderror" value="{{ old('pangkat') }}">
                @error('pangkat')
                <div class="invalid-feedback">{{ $message }}</div>     
                @enderror
            </div>


            <div class="form-group">
                <label>Golongan</label>
                <input type="text" name="golongan" class="form-control @error('golongan') 
                is-invalid @enderror" value="{{ old('golongan') }}">
                @error('golongan')
                <div class="invalid-feedback">{{ $message }}</div>     
                @enderror
            </div>


            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="jabatan" class="form-control @error('jabatan') 
                is-invalid @enderror" value="{{ old('jabatan') }}">
                @error('jabatan')
                <div class="invalid-feedback">{{ $message }}</div>     
                @enderror
            </div>


            <div class="form-group">
                <label>Unit/Bagian</label>
                <input type="text" name="bagian" class="form-control @error('bagian') 
                is-invalid @enderror" value="{{ old('bagian') }}">
                @error('bagian')
                <div class="invalid-feedback">{{ $message }}</div>     
                @enderror
            </div>

            <div class="form-group">
                <label>TMT</label>
                <input type="date" name="tmt" class="form-control @error('tmt') 
                is-invalid @enderror" value="{{ old('tmt') }}">
                @error('tmt')
                <div class="invalid-feedback">{{ $message }}</div>     
                @enderror
            </div>

            <div class="form-group">
                <label>File Dokumen</label>
                
                   <input type="file" name="file" class="form-control @error('file') 
                   is-invalid @enderror" id="file" value="{{ old('file') }}">
                   @error('file')
                   <div class="invalid-feedback">{{ $message }}</div>     
                   @enderror
                
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        </div> --}}

        {{-- <div class="modal-footer">
            <div class="form-group">
               --}}

                {{-- <a href=""  onclick="this.href='/cetak-filter/'+ document.getElementById('pangkat').value 
                "target="_blank" class="btn btn-primary">
                    <i class="fa fa-print"></i> Print
                   </a> --}}
            {{-- </div> --}}
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> --}}
        {{-- </div>
      </div>
    </div>
  </div> --}}

<div class="content mt-3">
    <div class="animated fadeIn">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{url("datapegawai")}}" class="form-inline" method="GET">
        <div class="card">
            
            <div class="card-header">
                <div class="pull-left">
                    <strong>Data Pegawai</strong>
                </div>
             <div class="pull-right">
                    
                <input value="{{Request::get('keyword')}}" type="text" class="form-control"  name="keyword" placeholder="Search">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-search"></i>Search</button>
  

  
                        @if (auth()->user()->level=="admin")
                            <a href="{{ url('datapegawai/cetak') }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-print"></i> Print
                            </a>
                            {{-- <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-print"></i>
                                Print
                                </button> --}}

                            <a href="{{ url('datapegawai/trash') }}" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> Trash
                            </a>
                            
                            @endif
                            {{-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#testModal">
                                <i class="fa fa-plus"></i>
                                Add
                                </button> --}}

                            <a href="{{ url('datapegawai/create') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Add
                            </a>      
                </div>
            </form>
            </div>
        
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr align="center">
                        <th>No.</th>
                        <th>Nama Pegawai</th>
                        <th>NIP</th>
                        <th>NRP</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>No. Hp</th>
                        <th>Pangkat</th>
                        <th>Golongan</th>
                        <th>Jabatan</th>
                        <th>Unit/Bagian</th>
                        <th>TMT</th>
                        <th>File Dokumen</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datapegawai as $key => $item)
                    <tr>
                        <td>{{ $datapegawai->firstItem() + $key }}</td>
                        <td>{{ $item->nama_pegawai }}</td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->nrp }}</td>
                        <td>{{ $item->tempatlahir }}</td>
                        <td>{{ $item->tgllahir }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>0{{ $item->hp }}</td>
                        <td>{{ $item->pangkat }}</td>
                        <td>{{ $item->golongan }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->bagian }}</td> 
                        <td>{{ $item->tmt }}</td>
                        
                        <td class="text-center">
                            <a href="{{ url('storage/'.$item->file) }}" target="_blank" class="btn btn-success btn-sm">
                                <i class="fa fa-file-pdf-o "></i>    
                            </a>
                        </td>

                        <td class="text-center">
                        @if (auth()->user()->level=="admin")
                        
                        <form action="{{ url('datapegawai/' .$item->id) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin Ingin Menghapus Data?')">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-close"></i>
                            </button>
                        </form>
                        
                        @endif

                        <a href="{{ url('datapegawai/' .$item->id. '/edit') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i>    
                        </a>
                            <a href="{{ url('datapegawai/' .$item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-eye"></i>    
                            </a>
                           
                        </td>               
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
            <div class="pull-left">
                Showing
                {{ $datapegawai->firstItem() }}
                to
                {{ $datapegawai->firstItem() }}
                of
                {{ $datapegawai->firstItem() }}
                entries
            </div>
            <div class="pull-right">
                {{ $datapegawai->links() }}
            </div>
        </div>
    </div>
  
</div>
@endsection