@extends('layouts.web.admin')

@section('title')
    <title>Data Siswa</title>
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
                            <li class="breadcrumb-item active" aria-current="page">Data Siswa {{ date('Y') }}</li>
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
                        <div class="add-customer">
                            <div class="row mb-4 mt-4">
                                <div class="col-6 ">
                                    <a href="{{ route('admin.siswa.create') }}" class="button btn btn-primary">
                                        <font class="font-medium">
                                            <i class="icon-Add-User"></i>&nbsp; Siswa
                                        </font>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="siswa_table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas Siswa</th>
                                        <th>Nama Siswa</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Agama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswas as $index => $siswa)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $siswa->kelas }}</td>
                                            {{-- <td>
                                                @if ($siswa->photos != null)
                                                    <img src=" {{ asset('images/' . $siswa->photos) }}" alt=""
                                                        style=" width:50px; height:50px; border-radius:100%;">
                                                @else
                                                    <img src="http://placehold.it/50x50" alt="img-broker"
                                                        style="border-radius:100%;">
                                                @endif
                                            </td> --}}
                                            <td>
                                                <a href="{{ route('admin.siswa.edit', $siswa->id) }}">
                                                    {{ $siswa->nama }} </a>
                                            </td>
                                            <td>{{ $siswa->tempat_lahir }},
                                                {{-- {{ date('d-m-y', strtotime($siswa->tanggal_lahir)) }} --}}
                                                {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d/m/Y') }}
                                            </td>

                                            <td>
                                                @if ($siswa->agama == '1')
                                                    Islam
                                                @elseif ($siswa->agama == '2')
                                                    Kristen
                                                @elseif ($siswa->agama == '3')
                                                    Hindu
                                                @elseif ($siswa->agama == '4')
                                                    Budha
                                                @else
                                                    Konghucu
                                                @endif

                                            </td>

                                            <td>{{ $siswa->jenis_kelamin == '1' ? 'Laki - Laki' : 'Perumpuan' }}</td>
                                            <td>{{ $siswa->alamat }}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
            $('#siswa_table').DataTable();
        });
    </script>
@endsection
