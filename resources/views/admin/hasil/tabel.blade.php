@extends('admin.app')

@section('content')
<section class="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">

            <!-- Content -->
                <div class="container">

                    <div class="col-xs-12">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Tabel Nilai Standard</h5>
                        </div>
                        <div class="box">
                            <div class="box-body">
                                <table class="table table-bordered table-hover" style="font-size: 11px;">
                                    <thead>
                                        <tr>
                                            @foreach ($aspek as $aspeks)
                                            <th style='text-align:center;' colspan="{{ $aspeks->kriteria()->count() }}">{{ $aspeks->name }}</th>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            @foreach ($kriteria as $kriterias)
                                            <th style='text-align:center;'>{{ $kriterias->name }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($kriteria as $kriterias)
                                            <td align="center">{{ $kriterias->nilai }}</td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Tabel Hasil Nilai</h5>
                        </div>
                        <div class="box">
                            <div class="box-body">
                                <table class="table table-bordered table-hover" style="font-size: 11px;">
                                    <thead>
                                        <tr>
                                            <th rowspan="3" style='text-align:center;'>Username</th>
                                        </tr>
                                        <tr>
                                            @foreach ($aspek as $aspeks)
                                            <th style='text-align:center;' colspan="{{ $aspeks->kriteria()->count() }}">{{ $aspeks->name }}</th>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            @foreach ($kriteria as $kriterias)
                                            <th style='text-align:center;'>{{ $kriterias->name }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($username as $index => $row)
                                        <tr align="center">
                                            <td align="center">{{ $row->user->name }}</td>
                                            @foreach ($hasil as $ha)
                                            @if($ha->user_id == $row->user_id)
                                            <td align="center">{{ $ha->nilai }}</td>
                                            @endif
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Tabel Selisih Nilai</h5>
                        </div>
                        <div class="box">
                            <div class="box-body">
                                <table class="table table-bordered table-hover" style="font-size: 11px;">
                                    <thead>
                                        <tr>
                                            <th rowspan="3" style='text-align:center;'>Username</th>
                                        </tr>
                                        <tr>
                                            @foreach ($aspek as $aspeks)
                                            <th style='text-align:center;' colspan="{{ $aspeks->kriteria()->count() }}">{{ $aspeks->name }}</th>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            @foreach ($kriteria as $kriterias)
                                            <th style='text-align:center;'>{{ $kriterias->name }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($username as $index => $row)
                                        <tr align="center">
                                            <td align="center">{{ $row->user->name }}</td>
                                            @foreach ($hasil as $ha)
                                            @if($ha->user_id == $row->user_id)
                                            <td align="center">{{ $ha->bobot->selisih }}</td>
                                            @endif
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Tabel Pembobotan Nilai</h5>
                        </div>
                        <div class="box">
                            <div class="box-body">
                                <table class="table table-bordered table-hover" style="font-size: 11px;">
                                    <thead>
                                        <tr>
                                            <th rowspan="3" style='text-align:center;'>Username</th>
                                        </tr>
                                        <tr>
                                            @foreach ($aspek as $aspeks)
                                            <th style='text-align:center;' colspan="{{ $aspeks->kriteria()->count() }}">{{ $aspeks->name }}</th>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            @foreach ($kriteria as $kriterias)
                                            <th style='text-align:center;'>{{ $kriterias->name }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($username as $index => $row)
                                        <tr align="center">
                                            <td align="center">{{ $row->user->name }}</td>
                                            @foreach ($hasil as $ha)
                                            @if($ha->user_id == $row->user_id)
                                            <td align="center">{{ $ha->n_bobot }}</td>
                                            @endif
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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