@extends('layouts.app')

@section('title', 'Daftar Pengawai')

@section('content')
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                            <h4 class="page-title">Tambah Pengawai</h4>
                            <div class="d-flex gap-1">

                                @include('employee.create-modal')

                            </div><!--end col-->
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div><!--end row-->

                <x-alert-error/>
                <x-alert-status/>

                @if (session('import-failed'))
                    {{-- Error Validation Import Files --}}
                    <div class="alert alert-danger alert-dismissible fade show mt-3" employee="alert">
                        <button type="button" class="btn-sm btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Error Imports:</strong>
                        <ul>
                            @foreach (session('import-failed') as $failure)
                                @foreach ($failure->errors() as $error)
                                    <li>Row {{ $failure->row(). ', ' . $error }}</li>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex gap-2 mb-2">
                                    {{-- <div>
                                        Total  {{ $employees->total() }} <i>employees</i>
                                    </div> --}}
                                    <table>
                                        <tr>
                                            <td class="me-2">Tampilkan </td>
                                            <td>
                                                <form action="{{ route('session.per-page') }}" method="GET">
                                                    @csrf
                                                    <select name="per_page" onchange="this.form.submit()" class="form-select form-select-sm" style="width: 100px">
                                                        <option value="10" @if (session('sessionPerPage') == 10)
                                                            selected
                                                        @endif>10</option>
                                                        <option value="25" @if (session('sessionPerPage') == 25)
                                                        selected
                                                        @endif>25</option>
                                                        <option value="50" @if (session('sessionPerPage') == 50)
                                                        selected
                                                        @endif>50</option>
                                                        <option value="100" @if (session('sessionPerPage') == 100)
                                                        selected
                                                        @endif>100</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td> data/halaman</td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table-light">
                                        <tr>
                                            <th style="width: 16px;">
                                                #
                                            </th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Gaji Pokok</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employees as $employee)
                                            <tr>
                                                <td style="width: 16px;">
                                                    {{ ($employees->currentPage() - 1) * $employees->perPage() + $loop->iteration }}
                                                </td>
                                                <td>{{ $employee->nip }}</td>
                                                <td>{{ $employee->nama }}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ $employee->status_kepegawaian }}</td>
                                                
                                                <td>@rupiah($employee->gaji_pokok)</td>
                                                <td>   
                                                     <div class="d-flex gap-1">
                                                        {{-- @include('role.edit-modal') --}}
                                                        @include('employee.delete-modal')
                                                    </div> <!-- END D-Flex Action -->
                                                </td>
                                            </tr> 
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex align-items-center flex-row-reverse">
                                        {{ $employees->onEachSide(0)->appends(request()->input())->links('layouts.pagination') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div><!-- container -->


        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->
@endsection
