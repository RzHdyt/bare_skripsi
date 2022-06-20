@extends('layouts.web.admin')

@section('title')
    <title>Tambah Data Siswa</title>
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="d-flex align-items-center">

                </div>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex no-block justify-content-end align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div>
                        <!-- Message Status -->
                        @if (Session::has('success_message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success_message') }}
                            </div>
                        @endif

                        @if (Session::has('error_message'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error_message') }}
                            </div>
                        @endif
                        <!--End Message Status -->
                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.siswa.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="photos">Photos</label>
                                <input type="file" name="photos" id="photos" class="form-control"
                                    value="{{ old('photos') }}">

                                @error('photos')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama Lengkap Siswa</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    placeholder="Masukan Nama Lengkap" value="{{ old('nama') }}">

                                @error('nama')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin Siswa</label>
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="">Choose Options</option>
                                    <option value="1" @if (old('jenis_kelamin') == '1') selected="selected" @endif>
                                        Laki - Laki
                                    </option>
                                    <option value="0" @if (old('jenis_kelamin') == '0') selected="selected" @endif>
                                        Perumpuan
                                    </option>
                                </select>

                                @error('jenis_kelamin')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                    placeholder="Masukan Tempat Lahir" value="{{ old('tempat_lahir') }}">

                                @error('tempat_lahir')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                    value="{{ old('tanggal_lahir') }}">

                                @error('tanggal_lahir')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat"
                                    placeholder="Masukan Tempat Lahir" value="{{ old('alamat') }}">

                                @error('alamat')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-control" name="agama" id="agama">
                                    <option value="">Choose Options</option>
                                    <option value="1" @if (old('agama') == '1') selected="selected" @endif>
                                        Islam
                                    </option>
                                    <option value="2" @if (old('agama') == '2') selected="selected" @endif>
                                        Kristen
                                    </option>
                                    <option value="3" @if (old('agama') == '3') selected="selected" @endif>
                                        Hindu
                                    </option>
                                    <option value="4" @if (old('agama') == '4') selected="selected" @endif>
                                        Budha
                                    </option>
                                    <option value="5" @if (old('agama') == '5') selected="selected" @endif>
                                        Konghucu
                                    </option>
                                </select>

                                @error('agama')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kelas">Kelas Siswa</label>
                                <input type="text" class="form-control" name="kelas" id="kelas"
                                    placeholder="Masukan Kelas Siswa" value="{{ old('kelas') }}">

                                @error('kelas')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="no_tlp_siswa">No.Hp Siswa</label>
                                <input type="text" class="form-control" name="no_tlp_siswa" id="no_tlp_siswa"
                                    placeholder="Masukan Nomor Telpon Siswa" value="{{ old('no_tlp_siswa') }}">

                                @error('no_tlp_siswa')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" class="form-control" name="nama_ayah" id="nama_ayah"
                                    placeholder="Masukan Nama Ayah" value="{{ old('nama_ayah') }}">

                                @error('nama_ayah')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah"
                                    placeholder="Masukan Pekerjaan Ayah" value="{{ old('pekerjaan_ayah') }}">

                                @error('pekerjaan_ayah')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" class="form-control" name="nama_ibu" id="nama_ibu"
                                    placeholder="Masukan Nama Ibu" value="{{ old('nama_ibu') }}">

                                @error('nama_ibu')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pekerjaan_ibu">Pekerjaan ibu</label>
                                <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu"
                                    placeholder="Masukan Pekerjaan ibu" value="{{ old('pekerjaan_ibu') }}">

                                @error('pekerjaan_ibu')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="no_tlp_ortu">No.Hp Orang Tua</label>
                                <input type="text" class="form-control" name="no_tlp_ortu" id="no_tlp_ortu"
                                    placeholder="Masukan Nomor Telpon Orang Tua" value="{{ old('no_tlp_ortu') }}">

                                @error('no_tlp_ortu')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="nama_wali">Nama Wali</label>
                                <input type="text" class="form-control" name="nama_wali" id="nama_wali"
                                    placeholder="Masukan Nama Ibu" value="{{ old('nama_wali') }}">

                                @error('nama_wali')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pekerjaan_wali">Pekerjaan Wali</label>
                                <input type="text" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali"
                                    placeholder="Masukan Pekerjaan Wali" value="{{ old('pekerjaan_wali') }}">

                                @error('pekerjaan_wali')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="no_tlp_wali">No.Hp Wali</label>
                                <input type="text" class="form-control" name="no_tlp_wali" id="no_tlp_wali"
                                    placeholder="Masukan Nomor Telpon Orang Tua" value="{{ old('no_tlp_wali') }}">

                                @error('no_tlp_wali')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- --------------------------------------------------------------------------------------------- -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-outline-success col-12">Tambah</button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ route('admin.siswa.index') }}"
                                            class="Button btn btn-outline-purple col-12">
                                            <i class="icon-picture"></i>
                                            <font class="font-medium">Batal</font>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
