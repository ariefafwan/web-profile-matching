@extends('admin.app')

@section('content')
<section class="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">

            <!-- Content -->
            <div class="container">
                <!-- Tabel NT -->
                <div class="col-xs-12">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary">Tabel Nilai Total</h5>
                    </div>
                    <div class="box">
                        <div class="box-body">
                            <table id="category-table" class="table table-primary table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" rowspan="3">Username</th>
                                    </tr>
                                    <tr>
                                        <th style='text-align:center;' colspan="{{ $counta }}">Aspek</th>
                                    </tr>
                                    <tr>
                                        @foreach ($aspek as $aspeks)
                                        <th style='text-align:center;'>{{ $aspeks->name }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
        
                                <tbody>
                                    @foreach ($username as $name => $names)
                                        <tr align="center">
                                            <td align="center">{{ $names->user->name }}</td>
                                            @foreach($nt as $index => $row)
                                            @if($row->user_id == $names->user_id)
                                            <td align="center">{{ $row->nt }}</td>
                                            @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Tabel Ranking -->
                <div class="col-xs-12">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary">Tabel Ranking</h5>
                    </div>
                    <div class="box">
                        <div class="box-body">
                            <table id="category-table" class="table table-primary table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">HR</th>
                                    </tr>
                                </thead>
        
                                <tbody>
                                    @foreach($ranking as $index => $row)
                                    <tr align="center">
                                        <th>{{ $loop->iteration }}</th>
                                        <td align="center">{{ $row->user->name }}</td>
                                        <td align="center">{{ $row->hr }}</td>
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