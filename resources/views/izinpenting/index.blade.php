@extends('main')

@section('title', 'Data Izin Cuti Penting')
    

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            {{-- <div class="page-title">
                <h1>Data Izin Cuti Tahunan</h1>
            </div> --}}
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Izin Cuti Penting</a></li>
                    <li class="active">Data</li>
                </ol>
            </div>
        </div>
    </div>  
</div>
@endsection

@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label for="label">Tanggal Awal</label>
                    <input type="date" name="tglawal" id="tglawal" class="form-control">
                </div>
    
                <div class="form-group">
                    <label for="label">Tanggal Akhir</label>
                    <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                </div> 
        </div>
        <div class="modal-footer">
            <div class="form-group">
                <a href=""  onclick="this.href='/cetak-periode/'+ document.getElementById('tglawal').value +
                    '/' + document.getElementById('tglakhir').value "target="_blank" class="btn btn-primary">
                    <i class="fa fa-print"></i> Print
                   </a>
            </div>
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>

<div class="content mt-3">
    <div class="animated fadeIn">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{url("izinpenting")}}" class="form-inline" method="GET">

        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Data Izin Cuti Penting</strong>
                </div>
            <div class="pull-right">
                <input value="{{Request::get('keyword')}}" type="text" class="form-control"  name="keyword" placeholder="Search">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-search"></i>Search</button>

                <a href="{{ url('izinpenting/create') }}" class="btn btn-success btn-sm">
                    <i class="fa fa-plus"></i> Add
                </a>
                
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-print"></i>
                    Print
                  </button>

                <a href="{{ url('izinpenting/trash') }}" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Trash
                </a>
            </div>
        </form>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr align="center">
                        <th>No.</th>
                        <th>Tanggal Surat</th>
                        <th>No. Surat</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Selama</th>
                        <th>Jenis Cuti</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($izinpenting as $key => $item)
                    <tr>
                        <td>{{ $izinpenting->firstItem() + $key }}</td>
                        <td>{{ $item->tglsurat }}</td>
                        <td>{{ $item->no_surat}}</td>
                        <td>{{ $item->pegawaiptg->nip }}</td>
                        <td>{{ $item->pegawaiptg->nama_pegawai }}</td>
                        <td>{{ $item->tglmulai }}</td>
                        <td>{{ $item->tglakhir }}</td>
                        <td>{{ $item->selama }}</td>
                        <td>{{ $item->jenis_cuti }}</td>

                        <td class="text-center">
                            <a href="{{ url('izinpenting/cetaksurat') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-file-pdf-o "></i>    
                            </a>
                        </td>
                        
                        <td class="text-center">
                            <a href="{{ url('izinpenting/' .$item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-eye"></i>    
                            </a>

                            <a href="{{ url('izinpenting/' .$item->id.'/edit') }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil"></i>    
                            </a>

                            <form action="{{ url('izinpenting/' .$item->id) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin Ingin Menghapus Data?')">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-close"></i>
                                </button>
                            </form>
                        </td>               
                    </tr>
                        
                    @endforeach
                </tbody>    
            </table>
            <div class="pull-left">
                Showing
                {{ $izinpenting->firstItem() }}
                to
                {{ $izinpenting->firstItem() }}
                of
                {{ $izinpenting->firstItem() }}
                entries
            </div>
            <div class="pull-right">
                {{ $izinpenting->links() }}
            </div>
        </div>
    </div>
</div>
@endsection