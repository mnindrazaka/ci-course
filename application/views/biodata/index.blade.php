@extends('template')

@section('content')

    <a class="btn btn-primary" href="{{ base_url('biodata/create') }}">Tambah</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="myTable">
            <thead class="thead-default">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            </thead>
        </table>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').dataTable( {
                "columns": [
                    { "data": "id" },
                    { "data": "nim" },
                    { "data": "nama" },
                    { "data": "alamat" },
                    {
                        "data": null,
                        "render": function (data) {
                            return `
                            <div class="btn-group">
                                <a type="a" href="{{ base_url('biodata/show/') }}${data.id}" class="btn btn-primary">Detail</a>
                                <a type="a" href="{{ base_url('biodata/edit/') }}${data.id}" class="btn btn-warning">Ubah</a>
                                <a type="a" href="{{ base_url('biodata/delete/')}}${data.id}" class="btn btn-danger">Hapus</a>
                            </div>`
                        }
                    }
                ],
                "ajax": {
                    "url": "{{ base_url('biodata/getAll')  }}"
                }
            } );
        });
    </script>
@endsection