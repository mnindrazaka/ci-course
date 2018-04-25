@extends('template')

@section('content')

    <a class="btn btn-primary" href="{{ base_url('kategori/create') }}">Tambah</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-inverse|thead-default">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($kategori as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->nama }}</td>
                    <td>{{ $value->keterangan }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" onclick="window.location='{{ base_url('kategori/edit/' . $value->id)  }}'" class="btn btn-warning">Ubah</button>
                            <button type="button" onclick="window.location='{{ base_url('kategori/delete/' . $value->id)  }}'" class="btn btn-danger">Hapus</button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection