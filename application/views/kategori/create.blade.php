@extends('template')

@section('content')
    <form action="{{ base_url('kategori/store') }}" method="post">

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="{{ old("nama") }}">
            @if($errors->has('nama'))
                <p class="text-danger">{{ $errors->first('nama') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan" value="{{ old("keterangan") }}">
            @if($errors->has('keterangan'))
                <p class="text-danger">{{ $errors->first('keterangan') }}</p>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection