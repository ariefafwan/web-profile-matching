@extends('admin.app')

@section('content')
    <section class="content">
        <!-- Begin Page Content -->
        <div class="container">
            <form action="" method="POST" role="form">
                <div class="row">
                    <div class="box rounded bg-white">
                        <div class="box-body">
                            <div class="row">
                                <form action="{{ route('storehasil', $hasil->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="col-md-6 border-left border-right">
                                    <div class="card text-white bg-primary ml-4 mb-3 mt-4" style="width: 28rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">Pilih User</h5>
                                            <select class="form-select" id="floatingSelect" name="user_id" id="user_id" aria-label="Floating label select example" required>
                                                <option selected>{{ $hasil->user->name }}</option>
                                                @foreach ($grup as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 border-right">
                                    <div class="card text-white bg-success ml-4 mt-4 mb-4" style="width: 28rem;">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="aspek_id">Aspek Penilaian</label>
                                                <select class="form-control" name="aspek_id" id="aspek_id" required>
													<option selected>{{ $hasil->aspek->name }}</option>
                                                    @foreach ($aspek as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="prodi">Nama Kriteria</label>
                                                <select class="form-control" name="kriteria_id" id="subkriteria" required>
													<option selected>{{ $hasil->kriteria->name }}</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="prodi">Bobot</label>
                                                <select class="form-control" name="nilai" id="nilai" required>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer ml-4 mt-3 mb-4">
                                        <a href="{{ route('hasil') }}" class="btn btn-danger btn-flat">
                                            Kembali
                                        </a>
                                        <button type="submit" class="btn btn-primary btn-flat">
                                            Tambah
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
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
            var aspekID = document.getElementById("aspek_id").value;
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
        $('select[name="kriteria_id"]').on('click', function() {
            var kriteriaID = $(this).val();
            if(kriteriaID) {
                $.ajax({
                    url: '/getpertanyaan/'+kriteriaID,
                    type: "GET",
                    dataType: "JSON",
                    success:function(data) {
                        $('select[name="nilai"]').empty();
                        $('select[name="nilai"]').append('<option>---Pilih Sub Kriteria---</option>');
                        $.each(data, function(key, value) {
                        $('select[name="nilai"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="nilai"]').empty();
            }
        });
    });
</script>
@stop