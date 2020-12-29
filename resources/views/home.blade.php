@extends('layouts.app')

@section('content')

<div class="container">
        <div class="card bg-warning text-white" style="margin-top:0px;">
            <div class="card-body">
            <input type="hidden" value="{{date_default_timezone_set('Asia/Jakarta')}}">
            <h1 style="margin-bottom:0px; text-align:center;">{{date('H:i')}}</h1>
            <h3 style="margin-top:0px; text-align:center;">{{date('l, d F Y')}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Ruangan yang Dibooking</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>No</th>
                        <th>Nama Acara</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Status</th>
                        <th>Ruang</th>
                        @if(Auth::user()->role == 'admin')
                        <th>Aksi</th>
                        @endif
                      </thead>
                      <tbody>
                        @php $no=0; @endphp
                        @foreach($datas as $k)
                        @php $no++; @endphp
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$k->event_name}}</td>
                            <td>{{$k -> start_date}}</td>
                            <td>{{$k -> end_date}}</td>
                            <td>{{$k -> status}}</td>
                            <td>{{$k -> nama_ruang}}</td>
                            @if(Auth::user()->role == 'admin')
                            <td class="text-primary">
                            <a href="/events/{{$k -> id}}/edit" type="button" class="btn btn-warning btn-xs">Edit</a>
                            <a href="/events/{{$k->id}}/delete" type="button" class="btn btn-danger btn-xs">Hapus</a>
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
          <a href="/events" type="button" class="btn btn-success">Booking Ruangan</a>
</div>

@endsection
