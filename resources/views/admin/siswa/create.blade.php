@extends('layouts.main')
@include('partials.css')
@section('content')
    <div class="container">
        <div class="white-block">
            <div class="text-start px-4 pt-3">
                <section class="about" id="about">
                    <div class="row mb-2">
                        <div class="col-md-12 ">
                            <span>
                                <p class="h2">Kelola Data Siswa</p>
                                <p class="font-weight-bold" style="line-height: 10px">Dashboard/Data Siswa/{{ $name }}</p>
                            </span>
                        </div>
                    </div>
                </section>
            </div>
            <div class="card-body white-block">
                @if (session()->has('success'))
                    <div class="alert-success p-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert-success p-3 rounded">
                        {{ session('error') }}
                    </div>
                @endif
                <form class="sign-up-form form" action="{{ route('siswa.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NISN</label>
                                <input type="text" name="nisn"
                                    class="form-control form-input @error('nisn')is-invalid  @enderror"
                                    placeholder="Masukkan Nisn Anda">
                                @error('nisn')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama"
                                    class="form-control form-input @error('nama')is-invalid @enderror"
                                    placeholder="Masukkan Nama Anda">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat"
                                    class="form-control form-input @error('alamat')is-invalid @enderror"
                                    placeholder="Masukkan Alamat Anda">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label>SPP</label>
                                <select name="id_spp" class="form-control form-input @error('id_spp')is-invalid @enderror">
                                    <option value="">Nominal Spp</option>
                                    @foreach($dataSpp as $spp)
                                    <option value="{{ $spp->id }}">Rp. {{ $spp->nominal }}</option>
                                    @endforeach
                                </select>
                                @error('id_spp')
                                    <div class="invalid-feedbabck">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIS</label>
                                <input id="nis" type="nis" name="nis"
                                    class="form-control form-input @error('nis')is-invalid @enderror"
                                    placeholder="Masukkan NIs Anda">
                                @error('nis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Kelas</label>
                                <select name="id_kelas" class="form-control form-input @error('id_kelas')is-invalid @enderror">
                                    <option value="">Pilih Kelas</option>
                                    @foreach($dataKelas as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                    @endforeach
                                </select>
                                @error('level')
                                    <div class="invalid-feedbabck">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No Telp</label>
                                <input type="text" name="no_telp"
                                    class="form-control form-input @error('no_telp')is-invalid @enderror"
                                    placeholder="Masukkan No Telp Anda">
                                @error('no_telp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group px-3">
                            <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                            <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-success">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
