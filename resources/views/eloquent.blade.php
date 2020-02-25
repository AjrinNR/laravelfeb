@extends('layouts.template')
@section('konten')
    @foreach ($mhs as $data)
        <h3> {{$data->nama}} <small> [  {{$data->nim}} ] </small></h3>
        <h4>Hobi</h4>
            @foreach ($data->hobi as $val)
                <small>{{$val->hobi}}</small>
            @endforeach
        <h4>
            <li>
                Nama Wali : <strong> {{$data->wali->nama}} <br>
                Dosen Pembingbing :  {{$data->dosen->nama}} </strong>
            </li>
        </h4><hr>
    @endforeach
@endsection
