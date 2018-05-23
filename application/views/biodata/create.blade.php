@extends('template')

@section('content')
    <form action="{{ base_url('biodata/store') }}" method="post">
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" value="{{ old("nim") }}">
            @if($errors->has('nim'))
                <small class="text-danger">{{ $errors->first('nim') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="{{ old("nama") }}">
            @if($errors->has('nama'))
                <small class="text-danger">{{ $errors->first('nama') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" value="{{ old("alamat") }}">
            @if($errors->has('alamat'))
                <small class="text-danger">{{ $errors->first('alamat') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="id_level">Level</label>
            <select class="custom-select" name="id_level" id="id_level">
                <option selected value="">Pilih level</option>
                @foreach($level as $row)
                    <option value="{{ $row->id }}" {{ $row->id == old('id_level') ? 'selected':'' }}>
                        {{ $row->nama }}
                    </option>
                @endforeach
            </select>
            @if($errors->has('id_level'))
                <small class="text-danger">{{ $errors->first('id_level') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
            @if($errors->has('password'))
                <small class="text-danger">{{ $errors->first('password') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Masukkan Password Kembali">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection