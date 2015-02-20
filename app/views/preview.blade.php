@extends('layouts.master')

@section('header')
  @parent

@stop

@section('content')
<!DOCTYPE HTML>
<html lang="ja">
<thead>
    <tr>{{implode(',', $header)}}</tr>
</thead>
<tbody>
</tbody>
</html>
@stop

@section('footer')
  @parent
@stop
