@extends('layouts.induk')

@section('css_additional')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('js_additional')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        todayBtn: 'linked',
    });
</script>

@endsection

@section('content-page')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Maklumat Rawatan Pesakit: {{ $pesakit->nama_pesakit }}</h1>
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


<div class="container">
    <form method="POST" action="{{ route('pesakit.rawatan.store', $pesakit->id) }}">
        @csrf
    <div class="card">
        <div class="card-header">
            <p class="card-title">Maklumat Rawatan Pesakit</p>
        </div>
        <div class="card-body">

            <div class="mb-3">
                <label for="nama_doktor" class="form-label">NAMA DOKTOR</label>
                <input type="text" name="nama_doktor" class="form-control">
                @error('nama_doktor')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="id_doktor" class="form-label">ID DOKTOR</label>
                <input type="text" name="id_doktor" class="form-control">
                @error('id_doktor')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="diagnosis" class="form-label">DIAGNOSIS</label>
                <textarea name="diagnosis" class="form-control"></textarea>
                @error('diagnosis')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    </form>


    <hr class="mb-5">

    <h3>SEJARAH RAWATAN PESAKIT</h3>

    <div class="table-responsive">

        <table class="table table-bordered table-hover table-stripped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA PESAKIT</th>
                    <th>MRN</th>
                    <th>NAMA DOKTOR</th>
                    <th>ID DOKTOR</th>
                    <th>DIAGNOSIS</th>
                    <th>TINDAKAN</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($senaraiRawatan as $rawatan)

                    <tr>
                        <td>{{ $rawatan->id }}</td>
                        <td>{{ $rawatan->pesakit->nama_pesakit }}</td>
                        <td>{{ $rawatan->pesakit->mrn }}</td>
                        <td>{{ $rawatan->nama_doktor }}</td>
                        <td>{{ $rawatan->id_doktor }}</td>
                        <td>{{ $rawatan->diagnosis }}</td>
                        <td>

                        </td>
                    </tr>

                @endforeach


            </tbody>

        </table>

    </div>

</div>
@endsection
