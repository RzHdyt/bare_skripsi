@extends('layouts.web.admin')

@section('title')
    <title>Penilian Beasiswa</title>
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
                            <li class="breadcrumb-item active" aria-current="page">Data Karyawan</li>
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

                        <form action="{{ route('admin.updatePenilaianAwal', $penilaians->id) }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label for="employee_id">Nama Karyawan</label>
                                <select class="form-control" name="employee_id" id="employee_id">
                                    <option value="">Choose Options</option>
                                    @foreach ($karyawans as $index => $karyawan)
                                        <option value="{{ $karyawan->id }}"
                                            @if ($karyawan->id == $penilaians->employee_id) selected="selected" @endif>
                                            {{ $index + 1 . ' : ' . $karyawan->nama }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('employee_id')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="criteria_id">Kriteria Karyawan</label>
                                <select class="form-control" name="criteria_id" id="criteria_id">
                                    <option value="">Choose Options</option>
                                    @foreach ($kriterias as $index => $kriteria)
                                        <option value="{{ $kriteria->id }}"
                                            @if ($kriteria->id == $penilaians->criteria_id) selected="selected" @endif>
                                            {{ $index + 1 . ' : ' . $kriteria->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('criteria_id')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nilai_awal">Nilai Karyawan</label>
                                <input type="text" class="form-control" name="nilai_awal" id="nilai_awal"
                                    placeholder="Masukan Nilai Karyawan" value="{{ $penilaians->nilai_awal }}">

                                @error('nilai_awal')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-outline-success col-12">Ubah Nilai</button>
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
        </div>
    </div>
@endsection
