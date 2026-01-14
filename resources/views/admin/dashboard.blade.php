@extends('layouts.admin')

@section('content')

<!-- TOP BAR -->
<div class="mb-4">
    <input type="text" class="form-control" placeholder="Search...">
</div>

<!-- PERIODE -->
<div class="alert alert-primary">
    <strong>Periode 1 :</strong> wwqqeqwew <br>
    <small>06 Feb 2025 s/d 08 Feb 2025</small>
</div>

<!-- CARD RINGKASAN -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card p-3">
            <h6>Calon Asisten / Programmer</h6>
            <p class="text-primary">Depok</p>
            <strong>0 Orang</strong>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3">
            <h6>Calon Asisten / Programmer</h6>
            <p class="text-primary">Kalimalang</p>
            <strong>2 Orang</strong>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3">
            <h6>Calon Asisten / Programmer</h6>
            <p class="text-primary">Salemba</p>
            <strong>0 Orang</strong>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3">
            <h6>Calon Asisten / Programmer</h6>
            <p class="text-primary">Karawaci</p>
            <strong>0 Orang</strong>
        </div>
    </div>
</div>

<!-- TABEL DATA -->
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No Pend</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Jurusan</th>
                    <th>Region</th>
                    <th>Penempatan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ASJ001</td>
                    <td>joan</td>
                    <td>50421847</td>
                    <td>Informatika</td>
                    <td>Kalimalang</td>
                    <td>Programmer</td>
                </tr>
                <tr>
                    <td>ASJ002</td>
                    <td>shafwan</td>
                    <td>50422074</td>
                    <td>Sistem Informasi</td>
                    <td>Kalimalang</td>
                    <td>Asisten</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
