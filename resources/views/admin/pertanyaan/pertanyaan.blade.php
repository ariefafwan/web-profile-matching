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
                        <a href="{{ route('pertanyaan.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>  CREATE NEW</a>
                    </div>
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <table id="category-table" class="table table-light table-striped table-bordered table-hover">
                                    
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Aspek</th>
                                            <th class="text-center">Sub Kriteria</th>
                                            <th class="text-center">Nilai</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
            
                                    <tbody>
                                        @foreach($pertanyaan as $index => $row)
                                        <tr align="center">
                                            <th>{{ $loop->iteration }}</th>
                                            <td align="center">{{ $row->aspek->name }}</td>
                                            <td align="center">{{ $row->kriteria->name }}</td>
                                            <td align="center">{{ $row->nilai }}</td>
                                            <td align="center">{{ $row->ket }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    {{-- <a href="" class="btn btn-primary btn-flat"><i class="fa fa-eye"></i></a> --}}
                                                    <a href="{{ route('pertanyaan.edit', $row->id) }}" class="btn btn-warning btn-flat mr-2"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <hr>
                                                    <a href="javascript:void(0)" class="btn btn-danger btn-flat"
                                                        onclick="event.preventDefault();
                                                            document.getElementById('pertanyaan-delete-form-{{$row->id}}').submit();">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                    <form id="pertanyaan-delete-form-{{$row->id}}" action="{{ route('pertanyaan.destroy',$row->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                        {{ $pertanyaan->links() }}
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