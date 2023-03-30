@extends('user.app')

@section('content')

<section class="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content -->
        <div class="container rounded bg-white">
            <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data" role="form">
                @csrf
                @method('PUT')
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle" width="150px" src="/storage/profil/{{ $user->profile_img }}">
                        <span class="font-weight-bold">{{ $user->name }}</span>
                        <span class="text-black-50">{{ $user->email }}</span>
                    </div>
                    <div class="col-md-12">
                        <input type="file" id="profile_img" name="profile_img" class="form-control align-item center" placeholder="first name" required>
                        *JPG|PNG
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Tambah Profile</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Nama</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="enter your name" value="{{ $user->name }}" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Nomor Handphone</label>
                                <input type="number" name="nmrhp" id="nmrhp" class="form-control" placeholder="enter phone number" value="{{ $user->nmrhp }}" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Jenis Kelamin</label>
                                <select class="form-select" aria-label="Default select example" name="gender" required>
                                    <option value="{{ $user->gender }}" selected>{{ $user->gender }}</option>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="20" rows="2" class="form-control" required>{{ $user->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="p-3 py-5">
                            <div class="mt-2 text-center">
                                <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection