@extends('layouts.app')

@section('content')

<div class="container">
<div class="container-fluid">
    <form action="/tambah-events" method="POST" files="true">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Booking Ruangan</h4>
                </div>
                <div class="card-body">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @elseif (Session::has('warning'))
                    <div class="alert alert-danger">{{Session::get('warning')}}</div>
                @endif
                @csrf
                    <div class="row">
                        <input type="hidden"  name="status" value="Pending">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label name="event_name" class="bmd-label-floating">Nama Acara</label>
                                <div class="">
                                <input type="text" name="event_name" class="form-control">
                                {!! $errors->first('event_name','<p class="alert alert-danger">:message</p>')!!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label name="start_date" class="bmd-label-floating">Tanggal Mulai</label>
                                <div class="">
                                <input type="datetime-local" name="start_date" class="form-control">
                                {!! $errors->first('start_date','<p class="alert alert-danger">:message</p>')!!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label name="end_date" class="bmd-label-floating">Tanggal Selesai</label>
                                <div class="">
                                <input type="datetime-local" name="end_date" class="form-control">
                                {!! $errors->first('end_date','<p class="alert alert-danger">:message</p>')!!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label name="end_date" class="bmd-label-floating">Ruangan</label>
                                <div class="">
                                <select name="id_ruang" id="id_ruang" class="form-control">
                                @foreach($ruang as $k)
                                <option value="{{$k->id}}">{{$k->nama_ruang}}</option>
                                @endforeach
                                </select>                             
                                {!! $errors->first('end_date','<p class="alert alert-danger">:message</p>')!!}
                                </div>
                            </div>
                        </div>
                        </div> &nbsp;<br/>
                        
                        <input type="submit" name="Add Event" class="btn btn-primary pull-right">
                    <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        </form>
<div class="row">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Kalender Booking</h4>
        </div>
        <div class="body" style="padding:20px;">
        {!! $calendar_details->calendar() !!}
        </div>
    </div>
</div>

</div>
</div>

@endsection
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar_details->script() !!}
