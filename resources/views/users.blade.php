@extends('layouts.app')

@section('content')

<div class="container">
<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Data User</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Aksi</th>
                      </thead>
                      <tbody>
                        @php $no=0; @endphp
                        @foreach($users as $u)
                        @php $no++; @endphp
                        <tr>
                          <td>{{$no}}</td>
                          <td>{{$u -> name}}</td>
                          <td>{{$u -> email}}</td>
                          <td>{{$u -> role}}</td>
                          <td>
                          <a href="/users/{{$u->id}}/delete" type="button" class="btn btn-danger btn-xs">Hapus</a>
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
          <button type="button" class="btn btn-success">Tambah User</button>
        </div>
</div>

@endsection