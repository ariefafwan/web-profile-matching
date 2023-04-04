@extends('admin.app')

@section('content')
    <section class="content">
        <!-- Begin Page Content -->
    <div class="container-fluid">

            <!-- Content -->
            <form action="{{ route('pertanyaan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 mb-2">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="aspek_id">Aspek Penilaian</label>
                            <select class="form-select" id="floatingSelect" name="aspek_id" id="aspek_id" aria-label="Floating label select example" required>
                                <option selected>--Piih Aspek Penilaian--</option>
                                @foreach ($aspek as $key => $value)
	                                <option value="{{ $key }}">{{ $value }}</option>
	                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Nama Kriteria</label>
                            <select class="form-control" name="kriteria_id" id="subkriteria"></select>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Nilai</label>
                            <input type="number" name="nilai" class="form-control" id="nilai" required>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Keterangan</label>
                            <textarea name="ket" id="ket" cols="20" rows="2" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('pertanyaan.index') }}" class="btn btn-danger btn-flat">
                        Kembali
                    </a>
                <button type="submit" class="btn btn-primary btn-flat">
                    Tambah
                </button>
                </div>
            </div>
            </form>
    </div>
    </section>
@stop
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="aspek_id"]').on('click', function() {
            var aspekID = $(this).val();
            if(aspekID) {
                $.ajax({
                    url: '/getkriteria/'+aspekID,
                    type: "GET",
                    dataType: "JSON",
                    success:function(data) {                      
                        $('select[name="kriteria_id"]').empty();
                        $('select[name="kriteria_id"]').append('<option>---Pilih Sub Kriteria---</option>');
                        $.each(data, function(key, value) {
                        $('select[name="kriteria_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="kriteria_id"]').empty();
            }
        });
    });
</script>
@stop