@extends('template')

@section('content')
    <form action="{{ base_url('biodata/update/' . $biodata->id) }}" method="post">

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="{{ old('nama', $biodata->nama) }}">
            @if($errors->has('nama'))
                <p class="text-danger">{{ $errors->first('nama') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" value="{{ old('alamat', $biodata->alamat) }}">
            @if($errors->has('alamat'))
                <p class="text-danger">{{ $errors->first('alamat') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="id_level">Level</label>
            <select class="custom-select" name="id_level" id="id_level">
                <option selected value="">Pilih level</option>
                @foreach($level as $row)
                    <option value="{{ $row->id }}" {{ $row->id == old('id_level', $biodata->id_level) ? 'selected':'' }}>
                        {{ $row->nama }}
                    </option>
                @endforeach
            </select>
            @if($errors->has('id_level'))
                <small class="text-danger">{{ $errors->first('id_level') }}</small>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection