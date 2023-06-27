@extends('layouts.app')
@section('content')


<div class="container-fluid " style="font-family: 'Roboto', sans-serif;">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 shadow-sm p-3 mb-5 bg-body-tertiary rounded bg-dark"  data-bs-theme="dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 icon-link icon-link-hover">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-3 d-none d-sm-inline"><b>Menu</b></span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start icon-link icon-link-hover" id="menu">
                        <li class="nav-item" >
                            <a href="{{ url('home') }}" class="nav-link align-middle px-0 text-white btn-hover">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Data Pengguna</span>
                            </a> 
                        </li>
                        <li>
                            <a href="{{ url('barang') }}" class="nav-link px-0 align-middle text-white">
                                <i class="fs-4 bi-book"></i> <span class="ms-1 d-none d-sm-inline">Daftar Barang</span> </a>

                                <hr>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-left">
                        <div class="col-md-10">
                                <div class="shadow-sm p-3 mb-5 bg-body-tertiary rounded ">
                                    <h2 align="center bg-dark"><b>DATA BARANG</b></h2>
                                </div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Tambah Data
                                </button>
                                <hr>

                                <div class="card-body text-center">
                                    <div class="table table-responsive">
                                        <table class="table table-responsive table-bordered table-striped table-hover data-table">
                                            <thead class="table-success">
                                                    <th>No</th>
                                                    <th>Kode Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga Beli</th>
                                                    <th>Harga Jual</th>
                                                    <th>Aksi</th>
                                                
                                            </thead>
                                            <tbody>
                                            @foreach($data as $row)
                                                <tr>
                                                    <td>{{++$i}}</td>
                                                    <td>{{$row->kode_barang}}</td>
                                                    <td>{{$row->nama_barang}}</td>
                                                    <td>{{$row->harga_beli}}</td>
                                                    <td>{{$row->harga_jual}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal{{$row->id}}">
                                                        Edit
                                                        </button>
                                                        <a href="{{url('hapus')}}/{{$row->id}}">
                                                        <button class="btn btn-danger">Hapus</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                <!-- The Modal -->
                <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <form action="{{url('simpan')}}" method="POST">
                        @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Barang</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                            <label>Kode Barang</label>
                            <input type="text" name="kode_barang" class="form-control" value="{{ old('kode_barang') }}">
                            @error('kode_barang')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" value="{{ old('nama_barang') }}">
                            @error('nama_barang')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label>Harga Beli</label>
                            <input type="number" name="harga_beli" class="form-control" value="{{ old('harga_beli') }}">
                            @error('harga_beli')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label>Harga Jual</label>
                            <input type="number" name="harga_jual" class="form-control" value="{{ old('harga_jual') }}">
                            @error('harga_jual')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>

                <!-- The Modal -->
                @foreach($data as $row)
                <div class="modal" id="myModal{{$row->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <form action="{{url('update')}}/{{$row->id}}" method="GET">
                        @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data Barang</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                            <label>Kode Barang</label>
                            <input type="text" name="kode_barang" class="form-control" value="{{$row->kode_barang}}">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" value="{{$row->nama_barang}}">
                            <label>Harga Beli</label>
                            <input type="number" name="harga_beli" class="form-control" value="{{$row->harga_beli}}">
                            <label>Harga Jual</label>
                            <input type="number" name="harga_jual" class="form-control" value="{{$row->harga_jual}}">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                @endforeach
                @endsection

