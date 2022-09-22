@csrf
{{ csrf_field() }}
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="mb-3">
    <label for="nama_pesakit" class="form-label">Nama Pesakit</label>
    <input type="text" class="form-control" name="nama_pesakit" value="{{ isset($pesakit) ? $pesakit->nama_pesakit : old('nama_pesakit') }}">
    @error('nama_pesakit')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="jenis_pengenalan" class="form-label">Jenis Pengenalan</label>
    <select name="jenis_pengenalan" class="form-control">
    <option value="">-- Sila Pilih --</option>
    <option value="no_kp_baru" {{ isset($pesakit) && $pesakit->jenis_pengenalan == 'no_kp_baru' ? 'selected="selected' : NULL }}>No KP Baru</option>
    <option value="no_kp_lama" {{ isset($pesakit) && $pesakit->jenis_pengenalan == 'no_kp_lama' ? 'selected="selected' : NULL }}>No KP Lama</option>
    <option value="no_passport" {{ isset($pesakit) && $pesakit->jenis_pengenalan == 'no_passport' ? 'selected="selected' : NULL }}>No Passport</option>
    </select>
</div>

<div class="mb-3">
    <label for="id_pengenalan" class="form-label">No. KP/Passport</label>
    <input type="text" class="form-control" name="id_pengenalan" value="{{ isset($pesakit) ? $pesakit->id_pengenalan : old('id_pengenalan') }}">
</div>

<div class="mb-3">
    <label for="nokp_pesakit" class="form-label">Kewarganegaraan</label>
    <div class="form-check">
    <input class="form-check-input" type="radio" name="kewarganegaraan" value="warganegara" {{ isset($pesakit) && $pesakit->kewarganegaraan == 'warganegara' ? 'checked="checked"' : NULL }}>
    <label class="form-check-label">
        Warganegara
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="radio" name="kewarganegaraan" value="bukan_warganegara" {{ isset($pesakit) && $pesakit->kewarganegaraan == 'bukan_warganegara' ? 'checked="checked"' : NULL }}>
    <label class="form-check-label">
        Bukan Warganegara
    </label>
    </div>
</div>

<div class="mb-3">
    <label for="nokp_pesakit" class="form-label">Jenis Appointment</label>
    <select name="jenis_appointment" class="form-control">
    <option value="">-- Sila Pilih --</option>
    <option value="appointment" {{ isset($pesakit) && $pesakit->jenis_appointment == 'appointment' ? 'selected="selected' : NULL }}>Appointment</option>
    <option value="walkin" {{ isset($pesakit) && $pesakit->jenis_appointment == 'walkin' ? 'selected="selected' : NULL }}>Walk-In</option>
    </select>
</div>
