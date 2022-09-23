@extends('layouts.induk')

@section('content-page')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
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

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <h1>SENARAI PESAKIT</h1>
                </div>
                <div class="card-footer">
                    <div class="d-grid gap-2">
                        <a href="{{ route('pesakit.index') }}" class="btn btn-primary">LIHAT SENARAI</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <h1>DAFTAR PESAKIT</h1>
                </div>
                <div class="card-footer">
                    <div class="d-grid gap-2">
                        <a href="{{ route('pesakit.create') }}" class="btn btn-primary">BUKA BORANG</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection
