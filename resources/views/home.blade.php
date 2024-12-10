@extends('master')

@section('konten')
    <h4>Welcome {{ Auth::user()->email }}<b></b></h4>
@endsection
