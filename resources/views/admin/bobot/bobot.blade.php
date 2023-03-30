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
                        <div class="box">
                            <div class="box-body">
                                <table id="category-table" class="table table-light table-striped table-bordered table-hover">
                                    
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Selisih</th>
                                            <th class="text-center">Bobot Gap</th>
                                            <th class="text-center">Keterangan</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($bobot as $index => $row)
                                        <tr align="center">
                                            <th>{{ $loop->iteration }}</th>
                                            <td align="center">{{ $row->selisih }}</td>
                                            <td align="center">{{ $row->bobot }}</td>
                                            <td align="center">{{ $row->ket }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
    </section>
@stop
