@extends('template')

@section('content')
    <form action="{{ base_url('blog/store') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan Judul" value="{{ old('judul') }}">
            @if($errors->has('judul'))
                <small class="text-danger">{{ $errors->first('judul') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="id_kategori">Kategori</label>
            <select class="custom-select" name="id_kategori" id="id_kategori">
                <option selected value="">Pilih kategori</option>
                @foreach($kategori as $row)
                    <option value="{{ $row->id }}" {{ $row->id == old('id_kategori') ? 'selected':'' }}>
                        {{ $row->nama }}
                    </option>
                @endforeach
            </select>
            @if($errors->has('id_kategori'))
                <small class="text-danger">{{ $errors->first('id_kategori') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" name="penulis" id="penulis" class="form-control" placeholder="Masukkan Penulis" value="{{ old('penulis') }}">
            @if($errors->has('penulis'))
                <small class="text-danger">{{ $errors->first('penulis') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="file">Gambar</label>
            <input type="file" name="file" id="file" class="form-control" placeholder="Masukkan Gambar">
            @if($errors->has('file'))
                <small class="text-danger">{{ $errors->first('file') }}</small>
            @endif
        </div>

        <div class="form-group">
            <textarea class="form-control" id="summernote" name="isi" rows="3" title="isi">{{ old('isi') }}</textarea>
            @if($errors->has('isi'))
                <small class="text-danger">{{ $errors->first('isi') }}</small>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection