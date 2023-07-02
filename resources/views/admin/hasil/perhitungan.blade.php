@extends('admin.app')

@section('content')
<hr>
<section class="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">

            <!-- Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbspHitung Nilai Total & Perankingan</button>
                            <!-- Button Import modal -->
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importmodal"><i class="bi bi-arrow-down-circle"></i>&nbspImport Ranking</button>
                            @include('admin.hasil.importranking')
                            <a href="{{ route('ranking.export') }}" class="btn btn-success" target="_blank"><i class="fa fa-download" aria-hidden="true"></i>&nbspDownload/Export Perankingan</a>
                        </div>
                        @foreach ($aspek as $i =>$value)
                        <div class="col-xs-12">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">Tabel Nilai Total Aspek {{ $value->name }}</h5>
                            </div>
                            <div class="box">
                                <div class="box-body">
                                    <table id="category-table" class="table table-primary table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Username</th>
                                                <th class="text-center">NCF</th>
                                                <th class="text-center">NSF</th>
                                            </tr>
                                        </thead>
                
                                        <tbody>
                                        @foreach ($username as $name => $names)
                                            <tr
                                            <tr align="center">
                                                <td align="center">{{ $names->user->name }}</td>
                                                @foreach($hasil as $index => $row)
                                                @if($row->aspek_id == $i+1)
                                                @if($row->user_id == $names->user_id)
                                                <td align="center">{{ $row->nilai }}</td>
                                                @endif
                                                @endif
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- konten modal-->
                            <div class="modal-content">
                                <!-- heading modal -->
                                <div class="modal-header">
                                    <h5> Hitung Nilai Total </h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- body modal -->
                                <div class="modal-body">
                                    <form action="{{ route('storetotal') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="user_id">User</label>
                                            <select class="form-control" name="user_id" id="user_id" required>
                                                @foreach ($userid as $iduser)
                                                <option value="{{ $iduser->id }}">{{ $iduser->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="aspek_id">Aspek Penilaian</label>
                                            <select class="form-control" name="aspek_id" id="aspek_id" required>
                                                @foreach ($aspek as $aspekid)
                                                <option value="{{ $aspekid->id }}">{{ $aspekid->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="prodi">NCF</label>
                                            <input type="number" step=any name="ncf" class="form-control" id="ncf" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="prodi">NSF</label>
                                            <input type="number" step=any name="nsf" class="form-control" id="nsf" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer modal -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-primary btn-flat">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        
        <!-- End Content Row -->
        </div>
    <!-- End Page Content -->
    </div>
</section>
@stop