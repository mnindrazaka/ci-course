@extends('template')

@section('content')
    <form action="{{ base_url('level/store') }}" method="post">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="{{ old("nama") }}">
            @if($errors->has('nama'))
                <small class="text-danger">{{ $errors->first('nama') }}</small>
            @endif
        </div>

        <div class="form-group">
            <p>Dapat Mengakses Halaman : </p>
            @foreach($modul as $row)
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="id_modul[]" value="{{ $row->id }}" class="custom-control-input" id="{{ $row->id }}">
                    <label class="custom-control-label" for="{{ $row->id }}">{{ $row->label }}</label>
                </div>
            @endforeach
        </div>



        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection