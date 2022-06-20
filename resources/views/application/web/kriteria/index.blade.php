@extends('layouts.web.admin')

@section('title')
    <title>Data Kriteria</title>
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Data Kriteria Beasiswa</h4>
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
                            <li class="breadcrumb-item active" aria-current="page">Data Kriteria</li>
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
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.kriteria.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nama Kriteria</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Masukan Nama Kriteria" value="{{ old('name') }}">

                                @error('name')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="weight">Bobot Kriteria</label>
                                <input type="number" class="form-control" name="weight" id="weight"
                                    placeholder="Masukan Bobot Kriteria" value="{{ old('weight') }}">

                                @error('weight')
                                    <div class="invalid-feedback" style="display: block !important;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-outline-success col-12">Tambah </button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ route('admin.kriteria.index') }}"
                                            class="Button btn btn-outline-purple col-12">
                                            <i class="icon-picture"></i>
                                            <font class="font-medium">Hapus</font>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
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

                        <div class="table-responsive m-t-20">
                            <table class="table table-bordered table-responsive-lg">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kriteria</th>
                                        <th scope="col">Bobot Kriteria</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($kriterias)
                                        @foreach ($kriterias as $kriteria)
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td>
                                                    <a href="{{ route('admin.kriteria.edit', $kriteria->id) }}">
                                                        {{ $kriteria->name }}
                                                    </a>
                                                </td>
                                                <td>{{ $kriteria->weight / 100 }}</td>
                                                <td>
                                                    <form action="{{ route('admin.kriteria.destroy', $kriteria->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        {{ method_field('DELETE') }}

                                                        <button class="btn btn-outline-danger  ">
                                                            <i class="icon-Recycling"></i> Hapus Profile</button>

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
