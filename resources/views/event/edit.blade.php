@extends('layouts.app')

@section('content')

<div class="container">
<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Edit Ruangan</h4>
                </div>
                <div class="card-body">
                <form action="{{ url('events/' . $events->id . '/update') }}" method="POST">
                @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Acara</label>
                          <input type="text" name="event_name" class="form-control" value="{{$events->event_name}}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal Mulai</label>
                          <input type="datetime" name="start_date" class="form-control" value="{{$events->start_date}}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal Selesai</label>
                          <input type="datetime" name="end_date" class="form-control" value="{{$events->end_date}}">
                        </div>
                      </div>
                      <div class="col-md-6">
                            <div class="form-group">
                                <label name="end_date" class="bmd-label-floating">Status</label>
                                <div class="">
                                <select name="status" id="status" class="form-control">
                                <option value="Pending">Pending</option>
                                <option value="Disetujui">Disetujui</option>
                                <option value="Ditolak">Ditolak</option>
                                </select>                             
                                {!! $errors->first('end_date','<p class="alert alert-danger">:message</p>')!!}
                                </div>
                            </div>
                        </div>
                      <div class="col-md-6">
                            <div class="form-group">
                                <label name="end_date" class="bmd-label-floating">Ruangan</label>
                                <div class="">
                                <select name="id_ruang" id="id_ruang" class="form-control">
                                @foreach($ruang as $k)1
                                <option value="{{$k->id}}">{{$k->nama_ruang}}</option>
                                @endforeach
                                </select>                             
                                {!! $errors->first('end_date','<p class="alert alert-danger">:message</p>')!!}
                                </div>
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