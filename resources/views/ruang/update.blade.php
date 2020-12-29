@extends('layouts.app')

@section('content')

<div class="container">
<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Tambah Ruangan</h4>
                </div>
                <div class="card-body">
                <form action="{{ url('ruang/' . $ruang->id . '/update') }}" method="POST">
                @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ID Ruangan</label>
                          <input type="text" name="kode_ruangan" class="form-control" value="{{$ruang->kode_ruangan}}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Ruangan</label>
                          <input type="text" name="nama_ruang" class="form-control" value="{{$ruang->nama_ruang}}">
                        </div>
                      </div>
                    </div>
                    
                    <input type="submit" class="btn btn-primary pull-right" value="Update Ruangan"></input>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>

@endsection