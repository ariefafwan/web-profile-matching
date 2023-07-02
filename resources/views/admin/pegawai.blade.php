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
                            <div class="col-md-8 mb-3">
                                <!-- Button Import modal -->
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importmodal"><i class="bi bi-arrow-down-circle"></i>&nbspImport Pegawai</button>
                                <!-- Button Exsport-->
                                <a href="{{ route('user.export') }}" class="btn btn-success" target="_blank"><i class="fa fa-download" aria-hidden="true"></i>&nbspDownload/Export Pegawai</a>
                            </div>
                            <div class="col-xs-12">
                                <div class="box">
                                    @include('admin.importpegawai')
                                    <div class="box-body">
                                        <table id="category-table" class="table table-light table-striped table-bordered table-hover">
                                            
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">Nama Pegawai/Member</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                    
                                            <tbody>
                                                @foreach($grup as $index => $row)
                                                <tr align="center">
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td align="center">{{ $row->name }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="javascript:void(0)" class="btn btn-danger btn-flat"
                                                                onclick="event.preventDefault();
                                                                    document.getElementById('pegawai-delete-form-{{$row->id}}').submit();">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </a>
                                                            <form id="pegawai-delete-form-{{$row->id}}" action="{{ route('destroypegawai',$row->id) }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-center">
                                                {{ $grup->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Contend Ends -->
            </div>
            <!-- End Content Row -->
        </div>
        <!-- End Page Content -->
    </section>
@stop
