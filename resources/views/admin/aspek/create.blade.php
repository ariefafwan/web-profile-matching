@extends('admin.app')

@section('content')
    <section class="content">
        <!-- Begin Page Content -->
    <div class="container-fluid">


            <!-- Content -->
            <form action="{{ route('storeaspek') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6 mb-2">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Nama Aspek Penilaian</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="cf">Nilai CF (%)</label>
                            <input type="number" name="cf" class="form-control" id="cf" required>
                        </div>
                        <div class="form-group">
                            <label for="sf">Nilai SF (%)</label>
                            <input type="number" name="sf" class="form-control" id="sf" required>
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot Aspek (%)</label>
                            <input type="number" name="bobot" class="form-control" id="bobot" required>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('seluruhaspek') }}" class="btn btn-danger btn-flat">
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
