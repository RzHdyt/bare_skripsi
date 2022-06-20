@extends('layouts.web.admin')

@section('title')
    <title>Penilaian Beasiswa</title>
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Penilaian Beasiswa</h4>
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
                            <li class="breadcrumb-item active" aria-current="page">Data Nilai Siswa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Welcome back  -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->

            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card border-light">
                    <div class="card-header">
                        <h3>Penilaian Siswa</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.storePenilaianAwal') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="siswa_id">Nama Siswa</label>
                                <select class="form-control" name="siswa_id" id="siswa_id">
                                    <option value="">Choose Options</option>

                                    @foreach ($siswas as $index => $siswa)
                                        <option value="{{ $siswa->id }}">
                                            {{ $index + 1 . ' : ' . $siswa->nama . ',' }}
                                            {{ 'kelas : ' . $siswa->kelas }}
                                        </option>
                                    @endforeach

                                </select>

                                @error('siswa_id')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kriteria_id">Kriteria Siswa</label>
                                <select class="form-control" name="kriteria_id" id="kriteria_id">
                                    <option value="">Choose Options</option>
                                    @foreach ($kriterias as $index => $kriteria)
                                        <option value="{{ $kriteria->id }}">{{ $index + 1 . ' : ' . $kriteria->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('kriteria_id')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nilai_awal">Nilai Siswa</label>
                                <input type="text" class="form-control" name="nilai_awal" id="nilai_awal"
                                    placeholder="Masukan Nilai Siswa" value="{{ old('nilai_awal') }}">

                                @error('nilai_awal')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-outline-success col-12">Tambah Nilai</button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ route('admin.penilaianAwal') }}"
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
            <!-- ---------------------------------------------------------------------->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card border-light">
                    <div class="card-header">
                        <h3>Nilai Siswa</h3>
                    </div>
                    <div class="card-body">

                        <div>
                            <!-- Message Status -->
                            @if (Session::has('success_message'))
                                <div class="alert alert-success" role="alert">
                                    <i class="ti-user"></i> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span> </button>
                                </div>
                            @endif

                            @if (Session::has('error_message'))
                                <div class="alert alert-danger" role="alert">
                                    <i class="ti-user"></i> {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span> </button>
                                </div>
                            @endif
                            <!--End Message Status -->
                        </div>

                        <div class="table-responsive">
                            <table id="penilaian" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Siswa</th>

                                        @foreach ($kriterias as $kriteria)
                                            <th scope="col">{{ $kriteria->name }}</th>
                                        @endforeach

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($siswas)
                                        @foreach ($siswas as $key => $siswa)
                                            {{-- @if ($penilaian) --}}
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $siswa->nama }}</td>

                                                @foreach ($siswa->penilaian as $penilaian)
                                                    @if ($penilaian['nilai_awal'])
                                                        <td>{{ $penilaian['nilai_awal'] }}</td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                            {{-- @endif --}}
                                        @endforeach
                                    @endif
                                    {{-- <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Siswa</th>

                                        @foreach ($kriterias as $kriteria)
                                            <th scope="col">{{ $kriteria->name }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($siswas))
                                        @foreach ($siswas as $key => $siswa)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $siswa->nama }}</td>
                                                @foreach ($siswa->penilaian as $penilaian)
                                                    @if (!empty($penilaian))
                                                        @if ($penilaian['nilai_awal'])
                                                            <td>
                                                                <a
                                                                    href="{{ route('admin.editPenilaianAwal', $penilaian['id']) }}">
                                                                    {{ $penilaian['nilai_awal'] }}
                                                                </a>
                                                            </td>
                                                        @endif
                                                    @endif
                                                @endforeach

                                            </tr>
                                        @endforeach
                                    @endif --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card border-light">
                    <div class="card-header">
                        <h3>Nilai Inisialisasi</h3>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="penilaian_inisialisasi" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Siswa</th>

                                        @foreach ($kriterias as $kriteria)
                                            <th scope="col">{{ $kriteria->name }}</th>
                                        @endforeach

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($siswas)
                                        @foreach ($siswas as $key => $siswa)
                                            @if (!empty($penilaian))
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $siswa->nama }}</td>

                                                    @foreach ($siswa->penilaian as $penilaian)
                                                        @if ($penilaian['inisialisasi'])
                                                            <td>{{ $penilaian['inisialisasi'] }}</td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6 ">
                                <form action="{{ route('admin.simpan.Normalisasi') }}" method="post">
                                    @csrf
                                    <button class="btn btn-outline-success">Proses Normalisasi</button>
                                </form>
                            </div>
                            <div class="col-6 justify-content-md-end">
                                <div class="row justify-content-md-end">

                                    <a href="{{ route('admin.normalisasi') }}" class="button btn-outline-primary">Hal.
                                        Selanjutnya >>>
                                </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#penilaian').DataTable();
            $('#penilaian_inisialisasi').DataTable();
        });
    </script>
@endsection
