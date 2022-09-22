@extends('layouts.induk')

@section('content-page')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Borang Pendaftaran Pesakit</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
    </div>
    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
    <span data-feather="calendar" class="align-text-bottom"></span>
    This week
    </button>
    </div>
</div>

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
                            <a href="/pesakit/{{ $pesakit->id }}/edit" class="btn btn-info">
                                EDIT
                            </a>
                            <form action="/pesakit/{{ $pesakit->id }}/delete" method="POST">
                                @method("DELETE")
                                @csrf
                                <button class="btn btn-danger">
                                    DELETE
                                </button>
                            </form>
                        </td>
                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
