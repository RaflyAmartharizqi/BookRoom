@extends('layouts.app')

@section('content')

<div class="container">
<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Data Ruangan</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>No</th>
                        <th>Kode Ruangan</th>
                        <th>Nama Ruangan</th>
                        @if(Auth::user()->role == 'admin')
                        <th>Aksi</th>
                        @endif
                      </thead>
                      <tbody>
                        @php $no=0; @endphp
                        @foreach($ruang as $k)
                        @php $no++; @endphp
                        <tr>
                          <td>{{$no}}</td>
                          <td>{{$k->kode_ruangan}}</td>
                          <td>{{$k -> nama_ruang}}</td>
                          @if(Auth::user()->role == 'admin')
                          <td class="text-primary">
                          <a href="/ruang/{{$k->id}}/edit" type="button" class="btn btn-warning btn-xs">Edit</a>
                          <a href="/ruang/{{$k->id}}/delete" type="button" class="btn btn-danger btn-xs">Hapus</a>
                          </td>
                          @endif
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @if(Auth::user()->role == 'admin')
          <a href="/create-ruang" type="button" class="btn btn-success">Tambah Ruangan</a>
          @endif
        </div>
</div>

@endsection