@extends('template')

@section('content')
    <form action="{{ base_url('biodata/store') }}" method="post">
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" value="{{ old("nim") }}">
            @if($errors->has('nim'))
                <p class="text-danger">{{ $errors->first('nim') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="{{ old("nama") }}">
            @if($errors->has('nama'))
                <p class="text-danger">{{ $errors->first('nama') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" value="{{ old("alamat") }}">
            @if($errors->has('alamat'))
                <p class="text-danger">{{ $errors->first('alamat') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
            @if($errors->has('password'))
                <p class="text-danger">{{ $errors->first('password') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Masukkan Password Kembali">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection