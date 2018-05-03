@extends('template')

@section('content')
    <div class="mb-5">
        <a class="btn btn-primary" href="{{ base_url('blog/create') }}">Tulis artikel baru</a>
        <a class="btn btn-success" href="{{ base_url('blog') }}">Tampilan Card</a>
    </div>

    <table class="table table-hover table-striped" id="myTable">
        <thead class="thead-inverse|thead-default">
        <tr>
            <th>Tanggal</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Penulis</th>
            <th>Aksi</th>
        </tr>
        </thead>
    </table>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').dataTable( {
                "columns": [
                    { "data": "tanggal" },
                    { "data": "judul" },
                    { "data": "kategori.nama" },
                    { "data": "penulis" },
                    {
                        "data": null,
                        "render": function (data) {
                            return `
                            <div class="btn-group">
                                <a type="a" href="{{ base_url('blog/show/') }}${data.id}" class="btn btn-primary">Detail</a>
                                <a type="a" href="{{ base_url('blog/edit/') }}${data.id}" class="btn btn-warning">Ubah</a>
                                <a type="a" href="{{ base_url('blog/delete/')}}${data.id}" class="btn btn-danger">Hapus</a>
                            </div>`
                        }
                    }
                ],
                "ajax": {
                    "url": "{{ base_url('blog/getAll')  }}"
                }
            } );
        });
    </script>
@endsection