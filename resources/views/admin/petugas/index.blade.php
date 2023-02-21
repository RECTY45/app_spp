@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="white-block">
            <div class="text-start px-4 pt-3">
                <section class="about" id="about">
                    <div class="row mb-2">
                        <div class="col-md-12 ">
                            <span>
                                <a href="{{ route('petugas.create') }}"
                                    class="btn btn-primary md:btn-lg btn-sm  float-right">Tambah Data</a>
                                <p class="md:h2 h4">Kelola Data Petugas</p>
                                <p class="font-weight-bold small" style="line-height: 10px">{{ $name }}</p>
                            </span>
                        </div>
                    </div>
                </section>
            </div>
            <div class="card-body white-block">
                <div class="table-responsive">
                    <table class="table users-table-info dt-table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Petugas</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="users-table-info ">
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_petugas ?? '-' }}</td>
                                    <td>{{ $item->username ?? '-' }}</td>
                                    <td>
                                        <p
                                            style=" background-color: rgb(83, 132, 223);  border-radius: 15px; display: inline; color: white; padding: 5px; text-align: center">
                                            {{ $item->level }}</p>
                                    </td>
                                    <td>
                                        <div class="form-control-icon d-flex">
                                            <button type="submit"
                                                class="editBtn bg-success border-0 mb-3 px-2 py-1 rounded mx-1"
                                                data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="icon edit"></i></button>

                                            <form action="{{ @route('petugas.destroy', $item->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="border-0 bg-danger px-2 py-1 rounded mx-1"
                                                    onclick="confirmDelete(event,this)"><i class="icon delete"></i></button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="d-flex justify-content-center">
                <div class="badge bg-warning text-white py-3 px-2" id="loading">
                    <p class="text-white">LOADING...</p>
                </div>
            </div>
            <div class="modal-content " id="modal_dialog">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Edit Data Petugas</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true"><svg
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg></button>
                </div>
                <div class="modal-body">
                    @include('admin.petugas.update')
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $(".editBtn").click(function() {
                let ID = $(this).data("id");
                $('#modal_dialog').hide();
                $('#loading').show();
                $.ajax({
                    url: `data-petugas/${ID}/edit`,
                    method: 'GET',
                    success: (res) => {
                        $('#modal_dialog').show();
                        $('#loading').hide();
                        $('#edit_nama_petugas').val(res.nama_petugas);
                        $('#edit_username').val(res.username);
                        $('#edit_level').val(res.level);
                        $('#formEdit').attr('action', `/dashboard/data-petugas/${ID}`);
                    }
                });
            })
        });
    </script>
@endpush
