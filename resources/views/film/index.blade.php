@extends('layout/template')

@section('breadcrumb')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Film</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Film</a></li>
              <li class="breadcrumb-item active">Index</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
<div class="row">
    @forelse ($datas as $item)
    <div class="col-4">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('poster/'. $item->poster)}}" style="height:100px;">
            <div class="card-body">
                <h3 style="line-height: 0.8em;"> <b> {{ $item->judul }} </b> </h3>
                <span class="badge badge-info mb-3">{{ $item -> genre -> nama }}</span>
                <!-- <p>{{ Str::limit($item->ringkasan, 50, $end='....') }}</p> -->
                <p>{{ Str::limit($item->ringkasan, 50) }}</p>
                <form action="{{ url('film/'.$item->id) }}" method="POST">
                  @csrf
                  <input type="hidden" name="_method" value="Delete">
                  <a href="/film/{{ $item->id }}" class="btn btn-success btn-sm">Detail</a>
                  <a href="{{ url( 'film/' .$item->id. '/edit' ) }}" class="btn btn-warning btn-sm">Edit</a>
                  <button class="btn btn-danger btn-sm" type="submit">Delete</button>
              </form> 
            </div>
        </div>
    </div>
    <div>
      
    </div>
    @empty
        <div class="ml-3">
        <h5>Data Film Belum Ada</h5>
            <a href="{{ url('film/create') }}" class="btn btn-primary">Tambah</a>
        </div>
    @endforelse
</div>

@endsection