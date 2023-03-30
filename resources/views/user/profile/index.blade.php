@extends('user.app')

@section('content')
    <section class="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content -->
        <div class="container rounded bg-white mt-3 mb-1">
            <div class="row">
                <div class="col-md-6 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-right">Your Profile</h4>
                        </div>
                        <img class="rounded-circle" width="150px" src="/storage/profil/{{ $user->profile_img }}">
                        <span class="font-weight-bold mt-1">{{ $user->name }}</span>
                        <span class="text-black-50">{{ $user->email }}</span>
                    </div>
                    <div class="btn-group align-items-center d-flex flex-column mb-2">
                        <a href="{{ route('profile.edit', Auth::user()->id) }}" class="btn btn-success profile-button">Edit Profile</a>
                    </div>
                </div>
                <div class="col-md-6 border-right">
                    <div class="p-3 py-5">
                            <div class="col-md-12">
                                <label for="">Gender</label>
                                <input type="text" name="tb" value="{{ Auth::user()->gender }}" id="tb" class="form-control" readonly>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label for="">No Hape</label>
                                <input type="text" name="tb" value="{{ Auth::user()->nmrhp }}" id="tb" class="form-control" readonly>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label for="">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="20" rows="2" class="form-control" readonly>{{ Auth::user()->alamat }}</textarea>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </section>
@stop
