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
                            <a href="{{ route('createkriteria') }}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbspTambah Data</a>
                            <!-- Button Import modal -->
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importmodal"><i class="bi bi-arrow-down-circle"></i>&nbspImport Sub Kriteria</button>
                            @include('admin.kriteria.importkriteria')
                            <a href="{{ route('kriteria.export') }}" class="btn btn-success" target="_blank"><i class="fa fa-download" aria-hidden="true"></i>&nbspDownload/Export Sub Kriteria</a>
                        </div>
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <table id="category-table" class="table table-light table-striped table-bordered table-hover">
                                        
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Aspek</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Jenis</th>
                                                <th class="text-center">Nilai Standard</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                
                                        <tbody>
                                            @foreach($kriteria as $index => $row)
                                            <tr align="center">
                                                <th>{{ $loop->iteration }}</th>
                                                <td align="center">{{ $row->aspek->name }}</td>
                                                <td align="left" style="width: 40%">{{ $row->name }}</td>
                                                <td align="center">{{ $row->JenisName }}</td>
                                                <td align="center">{{ $row->nilai }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        {{-- <a href="" class="btn btn-primary btn-flat"><i class="fa fa-eye"></i></a> --}}
                                                        <a href="{{ route('editkriteria', $row->id) }}" class="btn btn-warning btn-flat mr-2"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                        <hr>
                                                        <a href="javascript:void(0)" class="btn btn-danger btn-flat"
                                                            onclick="event.preventDefault();
                                                                document.getElementById('kriteria-delete-form-{{$row->id}}').submit();">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>
                                                        <form id="kriteria-delete-form-{{$row->id}}" action="{{ route('destroykriteria',$row->id) }}" method="POST" style="display: none;">
                                                            @csrf 
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
    
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {{ $kriteria->links() }}
                                </div>
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
