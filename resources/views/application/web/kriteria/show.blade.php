@extends('layouts.web.admin')

@section('title')
<title>Ubah Data Kriteria</title>
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
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.kriteria.index') }}">Data Kriteria</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Kriteria</li>
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div>
                        <!-- Message Status -->
                        @if(Session::has('success_message'))
                        <div class="alert alert-success" role="alert">
                            <i class="ti-user"></i> {{ Session::get('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span> </button>
                        </div>
                        @endif

                        @if(Session::has('error_message'))
                        <div class="alert alert-danger" role="alert">
                            <i class="ti-user"></i> {{ Session::get('error_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span> </button>
                        </div>
                        @endif
                        <!--End Message Status -->
                    </div>

                    <!-- content -->
                    <div class="row">
                        <div class="col-lg-12 col-xlg-12 col-md-12">

                            <form action="{{ route('admin.kriteria.update',  $kriterias->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="form-group">
                                    <label for="name">Nama Kriteria</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Masukan Nama Kriteria" value="{{ $kriterias->name }}">

                                    @error('name')
                                    <div class="invalid-feedback" style="display: block !important;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="weight">Bobot Kriteria</label>
                                    <input type="number" class="form-control" name="weight" id="weight"
                                        placeholder="Masukan Bobot Kriteria" value="{{ $kriterias->weight }}">

                                    @error('weight')
                                    <div class="invalid-feedback" style="display: block !important;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-outline-success col-12">Ubah
                                                Kriteria</button>
                                        </div>
                                        <div class="col-6 text-right">
                                            <a href="{{ route('admin.kriteria.index') }}"
                                                class="Button btn btn-outline-purple col-12">
                                                <i class="icon-picture"></i>
                                                <font class="font-medium">Batal</font>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="row">
                                <div class="col-12">
                                    <form action="{{ route('admin.kriteria.destroy', $kriterias->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}

                                        <button class="btn btn-outline-danger col-12 ">Hapus Kriteria</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection