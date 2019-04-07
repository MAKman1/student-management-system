@extends('user.userparent')
@section('header')
  <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}"/>
@endsection
  
@section('scripts')
  <script>
        $('#datepicker').datepicker({
            autoclose: true
        })
  </script>
@endsection

@section('content')
        <h1>Arham</h1>
@endsection