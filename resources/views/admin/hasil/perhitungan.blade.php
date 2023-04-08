@extends('admin.app')

@section('content')
<section class="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">

            <!-- Content -->
                <div class="container">
                    <div class="box-footer mb-3">
                        <a href="{{ route('tambahhasil') }}" class="btn btn-primary">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>  CREATE NEW</a>
                    </div>
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <table class="table table-bordered table-hover" style="font-size: 11px;">
                                    <thead>
                                        <tr>
                                            <th rowspan="3" style='text-align:center;'>Nama Alternatif</th>
                                        </tr>
                                        <tr>
                                            @foreach ($aspek as $aspek)
                                            {{-- <th style='text-align:center;' colspan='3'>Intelektual</th>
                                            <th style='text-align:center;' colspan='3'>Sikap</th>
                                            <th style='text-align:center;' colspan='4'>Perilaku</th>
                                            <th style='text-align:center;' colspan='1'>Cakap</th> --}}
                                            <th style='text-align:center;' colspan='3'>{{ $aspek->name }}</th>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            @foreach ($kriteria as $kriteria)
                                            <th style='text-align:center;'>{{ $kriteria->name }}</th>
                                            @endforeach
                                            {{-- <th style='text-align:center;'>Orientasi Pelayanan</th>
                                            <th style='text-align:center;'>Kerjasama</th>
                                            <th style='text-align:center;'>Kerajinan</th>
                                            <th style='text-align:center;'>Target penjualan offline</th>
                                            <th style='text-align:center;'>Target penjualan COD</th>
                                            <th style='text-align:center;'>Target penjualan kirim paket</th>
                                            <th style='text-align:center;'>Penampilan</th>
                                            <th style='text-align:center;'>Kedisiplinan</th>
                                            <th style='text-align:center;'>Kehadiran</th>
                                            <th style='text-align:center;'>Kehangatan</th>
                                            <th style='text-align:center;'>Bahasa Inggris</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($username as $user)
                                            <td>{{ $user->user->name }}</td>
                                            @endforeach
                                            @foreach ($perhitungan as $hasil)
                                            {{-- <td>{{ $hasil->nilai }}</td> --}}
                                            <td>{{ $hasil->BobotName }}</td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <table id="category-table" class="table table-light table-striped table-bordered table-hover">
                                    
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Aspek</th>
                                        <th class="text-center">Sub Kriteria</th>
                                        <th class="text-center">Nilai</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
        
                                <tbody>
                                    {{-- @foreach($hasil as $index => $row)
                                    <tr align="center">
                                        <th>{{ $loop->iteration }}</th>
                                        <td align="center">{{ $row->user->name }}</td>
                                        <td align="center">{{ $row->aspek->name }}</td>
                                        <td align="center">{{ $row->kriteria->name }}</td>
                                        <td align="center">{{ $row->nilai }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('edithasil', $row->id) }}" class="btn btn-warning btn-flat mr-2"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <hr>
                                                <a href="javascript:void(0)" class="btn btn-danger btn-flat"
                                                    onclick="event.preventDefault();
                                                        document.getElementById('hasil-delete-form-{{$row->id}}').submit();">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                                <form id="hasil-delete-form-{{$row->id}}" action="{{ route('destroyhasil',$row->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        
        <!-- End Content Row -->
        </div>
    <!-- End Page Content -->
    </div>
</section>
@stop