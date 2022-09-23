@extends('layouts.induk')

@section('content-page')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Borang Pendaftaran Pesakit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
    <a href="{{ route('download.pesakit.excel') }}" class="btn btn-sm btn-outline-secondary">EXCEL</a>
    <a href="{{ route('download.pesakit.json') }}" class="btn btn-sm btn-outline-secondary">JSON</a>
    </div>
    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
    <span data-feather="calendar" class="align-text-bottom"></span>
    This week
    </button>
    </div>
</div>

<div class="container">
<div class="row my-5">

    <div class="col-12">

        <div class="table-responsive">

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>MRN</th>
                        <th>NAMA PESAKIT</th>
                        <th>JENIS PENGENALAN</th>
                        <th>ID PENGENALAN</th>
                        <th>KEWARGANEGARAAN</th>
                        <th>JENIS APPOINTMENT</th>
                        <th>TINDAKAN</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($senaraiPesakit as $pesakit)

                    <tr>
                        <td>{{ $pesakit->id }}</td>
                        <td>{{ $pesakit->mrn }}</td>
                        <td>{{ $pesakit->nama_pesakit }}</td>
                        <td>{{ $pesakit->jenis_pengenalan }}</td>
                        <td>{{ $pesakit->id_pengenalan ?? NULL }}</td>
                        <td>{{ $pesakit->kewarganegaraan }}</td>
                        <td>{{ $pesakit->jenis_appointment }}</td>
                        <td>
                            <a href="{{ route('pesakit.triage.create', $pesakit->id) }}" class="btn btn-primary">
                                TRIAGE
                            </a>
                            <a href="/pesakit/{{ $pesakit->id }}/edit" class="btn btn-info">
                                EDIT
                            </a>


                            <form action="/pesakit/{{ $pesakit->id }}/delete" method="POST">
                                @method("DELETE")
                                @csrf
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $pesakit->id }}">
                                DELETE
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal-delete-{{ $pesakit->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">PENGESAHAN</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Adakah anda bersetuju untuk menghapuskan data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">YA</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </form>
                        </td>
                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        {{ $senaraiPesakit->links() }}

    </div>

</div>
</div>
@endsection
