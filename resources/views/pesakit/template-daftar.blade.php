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

    <form method="POST" action="">
        @csrf
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="mb-3">
          <label for="nama_pesakit" class="form-label">Nama Pesakit</label>
          <input type="text" class="form-control" name="nama_pesakit">
        </div>

        <div class="mb-3">
          <label for="nokp_pesakit" class="form-label">Jenis Pengenalan</label>
          <select name="jenis_pengenalan" class="form-control">
            <option value="">-- Sila Pilih --</option>
            <option value="no_kp_baru">No KP Baru</option>
            <option value="no_kp_lama">No KP Lama</option>
            <option value="no_passport">No Passport</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="nokp_pesakit" class="form-label">No. KP/Passport</label>
          <input type="text" class="form-control" name="nokp_pesakit">
        </div>

        <div class="mb-3">
          <label for="nokp_pesakit" class="form-label">Kewarganegaraan</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="kewarganegaraan" value="warganegara">
            <label class="form-check-label">
              Warganegara
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="kewarganegaraan" value="bukan_warganegara">
            <label class="form-check-label">
              Bukan Warganegara
            </label>
          </div>
        </div>

        <div class="mb-3">
            <label for="nokp_pesakit" class="form-label">Minat</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="minat[]" value="makan">
              <label class="form-check-label">
                Makan
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="minat[]" value="minum">
              <label class="form-check-label">
                Minum
              </label>
            </div>
          </div>

        <div class="mb-3">
          <label for="nokp_pesakit" class="form-label">Jenis Appointment</label>
          <select name="jenis_appointment" class="form-control">
            <option value="">-- Sila Pilih --</option>
            <option value="appointment">Appointment</option>
            <option value="walkin">Walk-In</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Maklumat</button>

      </form>



@endsection
