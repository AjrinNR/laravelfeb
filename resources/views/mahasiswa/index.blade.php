@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        @if (session('message'))
                            <div class="alert alert-dark" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        Data Dosen
                        <a href="{{route('mahasiswa.create')}}" class = "float-right">
                            Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>NIM</th>
                                        <th>Dosen</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($mhs as $data)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$data->nama}}</td>
                                            <td>{{$data->nim}}</td>
                                            <td>{{$data->dosen->nama}}</td>
                                            <td>
                                                <form action="{{route('mahasiswa.destroy',$data->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{route('mahasiswa.show',$data -> id)}}" class="btn btn-outline-dark">Lihat</a>
                                                    <a href="{{route('mahasiswa.edit',$data -> id)}}" class="btn btn-outline-dark">Edit</a>
                                                    <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-outline-dark">Hapus</button>
                                                </form>
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
