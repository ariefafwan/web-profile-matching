@extends('admin.app')

@section('content')
    <section class="content">
        <!-- Begin Page Content -->
    <div class="container-fluid">


            <!-- Content -->
            <form action="{{ route('storekriteria') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6 mb-2">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="prodi">Aspek Penilaian</label>
                            <select class="form-control" id="floatingSelect" name="aspek_id" id="aspek_id" aria-label="Floating label select example" required>
                                <option selected>--Piih Aspek Penilaian--</option>
                                @foreach ($aspek as $aspek)
                                <option value="{{ $aspek->id }}">{{ $aspek->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Nama Kriteria</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Jenis</label>
                            <select class="form-control" id="floatingSelect" name="jenis" id="jenis" aria-label="Floating label select example" required>
                                <option selected>--Piih Jenis--</option>
                                <option value="cf">Core Factor</option>
                                <option value="sf">Secondary Factor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Nilai Standard (Range 1-5)</label>
                            <input type="number" name="nilai" class="form-control" id="nilai" required>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('kriteria') }}" class="btn btn-danger btn-flat">
                        Kembali
                    </a>
                <button type="submit" class="btn btn-primary btn-flat">
                    Tambah
                </button>
            </div>

            </form>
    </div>
    
    </section>
@stop
