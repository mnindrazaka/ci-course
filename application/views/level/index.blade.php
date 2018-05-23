@extends('template')

@section('content')

    <a class="btn btn-primary" href="{{ base_url('level/create') }}">Tambah</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="myTable">
            <thead class="thead-default">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($level as $key => $row)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" onclick="window.location='{{ base_url('level/edit/' . $row->id) }}'" class="btn btn-warning">Ubah</button>
                            <button type="button" onclick="window.location='{{ base_url('level/delete/' . $row->id) }}'" class="btn btn-danger">Hapus</button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').dataTable();
        });
    </script>
@endsection