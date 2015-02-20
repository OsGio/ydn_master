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
    @foreach(json_decode(json_encode($Cam), true) as $group)
    <tr>
        {{var_dump($group)}}
    </tr>
    @endforeach
{{--
    @foreach($Cam->AdAds as $adads)
    <tr>
        {{implode(',', $adads)}}
    </tr>
    @endforeach
    @foreach($Cam->Keyword as $key)
    <tr>
        {{implode(',', $key)}}
    </tr>
    @endforeach
--}}
</tbody>
</html>
@stop

@section('footer')
  @parent
@stop
