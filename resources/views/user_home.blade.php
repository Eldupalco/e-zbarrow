@extends('layouts.unknow_master')

@section('title')
    Dashboard of Funda
@endsection
@section('content')

<div class="row">

   @foreach ( $books as $data )
   <div class="card col-md-5 m-1">

    <div class="card-header">
      {{$data->author_name}}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$data->book_name}}</h5>
      <p class="card-text text-justify">{{$data->book_description}}</p>
      {{-- <a href="{{secure_url('request-book/'.$data->id)}}" class="btn btn-primary">Borrow</a> --}}
      <a href="{{url('request-book/'.$data->id)}}" class="btn btn-primary">Borrow</a>
    </div>
  </div>
   @endforeach

</div>
@endsection

@section('scripts')

@endsection
