{{-- This is slave template --}}
@extends('layouts.app')
@section('title', 'Daftar Lowongan')
@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-danger alert-dismissible fade show d-block" role="alert">
            {{ ucfirst(str_replace('_', ' ', session('success'))) . '.' }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="{{ route('tambah-lowongan') }}" class="btn btn-primary mt-3">{{ __('Tambah Lowongan') }}</a>
    @foreach($daftar_lowongan as $dl)
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">NAMA_MATA_KULIAH {{ $dl->kode_kelas }}</h5>
                <p>{{ __('Gaji') }}: Rp{{ $dl->gaji }}</p>
                <p>{{ $dl->deskripsi }}</p>
                @if (auth()->user()->id == $dl->dosen_id)
                <a href="{{ route('ubah-lowongan', ['lowonganId' => $dl->id]) }}" class="btn btn-primary    ">{{ __('Ubah') }}</a>
                <form method="POST" action="{{ route('hapus-lowongan', ['lowonganId' => $dl->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
