@extends('main')

@section('title', 'Tambah Data Izin Cuti Sakit')
    

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            {{-- <div class="page-title">
                <h1>Data Izin Cuti</h1>
            </div> --}}
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Data Izin Cuti Sakit</a></li>
                    <li class="active">Add</li>
                </ol>
            </div>
        </div>
    </div>  
</div>
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Tambah Data Izin Cuti Sakit</strong>
                </div>
            <div class="pull-right">
                <a href="{{ url('izinsakit') }}" class="btn btn-secondary btn-sm">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
        <div class="card-body">
           
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('izinsakit') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{-- @csrf --}}
                        <div class="form-group">
                            <label>Tanggal Surat</label>
                            <input type="date" name="tglsurat" class="form-control @error('tglsurat') 
                            is-invalid @enderror" value="{{ old('tglsurat') }}">
                            @error('tglsurat')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>No. Surat</label>
                            <input type="double" name="no_surat" class="form-control @error('no_surat') 
                            is-invalid @enderror" value="{{ old('no_surat') }}">
                            @error('no_surat')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <select name="pegawaiskt_id" class="form-control @error('pegawaiskt_id') 
                            is-invalid @enderror">
                                <option value="">:: Pilih Nama Pegawai ::</option>
                                @foreach ($pegawais as $item)
                                    <option value="{{ $item->id }}" {{ old('pegawaiskt_id') == $item->id ? 'selected' : null }}>{{ $item->nama_pegawai}}</option>  
                                @endforeach                                
                            </select>
                            @error('pegawaiskt_id')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>NIP</label>
                            <select name="pegawaiskt_id" class="form-control @error('pegawaiskt_id') 
                            is-invalid @enderror">
                                <option value=""></option>
                                @foreach ($pegawais as $item)
                                    <option value="{{ $item->id }}" {{ old('pegawaiskt_id') == $item->id ? 'selected' : null }}>{{ $item->nip}}</option>  
                                @endforeach                                
                            </select>
                            @error('pegawaiskt_id')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori" class="form-control @error('kategori') 
                            is-invalid @enderror">
                                <option value="">:: Pilih Kategori Sakit ::</option>
                                {{-- @foreach ($pegawais as $item) --}}
                                    <option value="Sakit Biasa"{{( old('kategori') == 'Sakit Biasa') ? 'selected' : null }}}>Sakit Biasa</option>  
                                    <option value="Sakit Parah"{{( old('kategori') == 'Sakit Parah') ? 'selected' : null }}}>Sakit Parah</option>  
                                    <option value="Kecelakaan"{{( old('kategori') == 'Kecelakaan') ? 'selected' : null }}}>Kecelakaan</option>  
                                {{-- @endforeach                                 --}}
                            </select>
                            @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Jenis Sakit</label>
                            <input type="text" name="jenis_sakit" class="form-control @error('jenis_sakit') 
                            is-invalid @enderror" value="{{ old('jenis_sakit') }}">
                            @error('jenis_sakit')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>                        

                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="tglmulai" class="form-control @error('tglmulai') 
                            is-invalid @enderror" value="{{ old('tglmulai') }}">
                            @error('tglmulai')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tempat</label>
                            <input type="text" name="tempat" class="form-control @error('tempat') 
                            is-invalid @enderror" value="{{ old('tempat') }}">
                            @error('tempat')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>No. Surat Dokter</label>
                            <input type="text" name="no_dokter" class="form-control @error('no_dokter') 
                            is-invalid @enderror" value="{{ old('no_dokter') }}">
                            @error('no_dokter')
                            <div class="invalid-feedback">{{ $message }}</div>     
                            @enderror
                        </div>

                         <div class="form-group">
                             <label>Surat Dokter</label>
                             
                                <input type="file" name="file" class="form-control @error('file') 
                                is-invalid @enderror" id="file" value="{{ old('file') }}">
                                @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>     
                                @enderror
                             
                         </div>

                         {{-- <div class="form-group">
                            <label>Surat Dokter</label>
                            <div class="custom-file">
                               <input type="file" name="gambar" class="custom-file-input @error('gambar') 
                               is-invalid @enderror" id="gambar" value="{{ old('gambar') }}">
                               <label class="custom-file-label" for="customFile">Choose File</label>
                               @error('gambar')
                               <div class="invalid-feedback">{{ $message }}</div>     
                               @enderror
                            </div>
                        </div> --}}

                         {{-- < action="{{route('fileUpload')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <strong>{{ $message }}</strong>
                            </div>
                          @endif

                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif --}}
                            {{-- <form action="/upload" method="post" enctype="multipart/form-data">
                            @csrf --}}
                            {{-- <div class="form-group">
                                <label>Surat Dokter</label>
                                <input type="file" name="image" class="form-control" id="">
                            </div> --}}
                            


         <button type="submit" class="btn btn-success">Save</button>
                            {{-- </form> --}}
                 
    </form>
                </div>
            </div>

        </div>
        
    </div>
</div>

@endsection
