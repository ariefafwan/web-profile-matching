@extends('admin.app')

@section('content')
    <section class="content">
        <!-- Begin Page Content -->
    <div class="container-fluid">

            <!-- Content -->
            <form action="{{ route('updatekriteria', $kriteria->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6 mb-2">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="prodi">Aspek Penilaian</label>
                            <select class="form-control" id="floatingSelect" name="aspek_id" id="aspek_id" aria-label="Floating label select example" required>
                                <option value="{{ $kriteria->aspek_id }}" selected>{{ $kriteria->aspek->name }}</option>
                                @foreach ($aspek as $aspek)
                                <option value="{{ $aspek->id }}">{{ $aspek->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Nama Kriteria</label>
                            <input type="text" name="name" class="form-control" value="{{ $kriteria->name }}" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Jenis</label>
                            <select class="form-select" id="floatingSelect" name="jenis" id="jenis" aria-label="Floating label select example" required>
                                <option value="{{ $kriteria->jenis }}" selected>{{ $kriteria->JenisName }}</option>
                                <option value="cf">Core Factor</option>
                                <option value="sf">Secondary Factor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Nilai Standard (Range 1-5)</label>
                            <input type="number" name="nilai" class="form-control" value="{{ $kriteria->nilai }}" id="nilai" required>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('kriteria') }}" class="btn btn-danger btn-flat">
                        Kembali
                    </a>
                <button type="submit" class="btn btn-success btn-flat">
                    Edit
                </button>
            </div>

            </form>
    </div>
    
    </section>
@stop
