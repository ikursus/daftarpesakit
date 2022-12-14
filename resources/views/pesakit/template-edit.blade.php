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

<div class="container">
    <form method="POST" action="">
        @method('PATCH')
        <input type="hidden" name="_method" value="PATCH">

        @include('pesakit.form')

        <button type="submit" class="btn btn-primary">Kemaskini Maklumat</button>

    </form>
</div>
@endsection
