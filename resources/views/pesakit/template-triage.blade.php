@extends('layouts.induk')

@section('css_additional')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('js_additional')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        todayBtn: 'linked',
    });
</script>

@endsection

@section('content-page')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Maklumat Triage Pesakit: {{ $pesakit->nama_pesakit }}</h1>
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


    <form method="POST" action="{{ route('pesakit.triage.store', $pesakit->id) }}">
        @csrf
    <div class="card">
        <div class="card-header">
            <p class="card-title">Assign Triage Pesakit</p>
        </div>
        <div class="card-body">

            <div class="mb-3">
                <label for="bilik_rawatan" class="form-label">BILIK RAWATAN</label>
                <select name="bilik_rawatan" class="form-control">

                    <option value="">-- SILA PILIH --</option>

                    {{-- @foreach ($senaraiBilikRawatan as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach --}}
                    @foreach ($senaraiBilikRawatan as $bilik)
                        <option value="{{ $bilik->nama_bilik }}">{{ $bilik->nama_bilik }}</option>
                    @endforeach

                </select>
                @error('bilik_rawatan')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tarikh_rawatan" class="form-label">TARIKH RAWATAN</label>
                <input type="text" name="tarikh_rawatan" class="form-control datepicker">
                @error('tarikh_rawatan')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="prosedur" class="form-label">PROSEDUR</label>
                <input type="text" name="prosedur" class="form-control">
                @error('prosedur')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Assign Triage</button>
        </div>
    </div>
    </form>


    <hr class="mb-5">

    <h3>SEJARAH TRIAGE PESAKIT</h3>

    <div class="table-responsive">

        <table class="table table-bordered table-hover table-stripped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA PESAKIT</th>
                    <th>MRN</th>
                    <th>BILIK RAWATAN</th>
                    <th>TARIKH RAWATAN</th>
                    <th>PROSEDUR</th>
                    <th>TINDAKAN</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($senaraiTriage as $triage)

                    <tr>
                        <td>{{ $triage->triage_id }}</td>
                        <td>{{ $triage->nama_pesakit }}</td>
                        <td>{{ $triage->mrn }}</td>
                        <td>{{ $triage->bilik_rawatan }}</td>
                        <td>{{ $triage->tarikh_rawatan }}</td>
                        <td>{{ $triage->prosedur }}</td>
                        <td>

                        </td>
                    </tr>

                @endforeach


            </tbody>

        </table>

    </div>



@endsection
