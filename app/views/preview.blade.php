@extends('layouts.master')

@section('header')
  @parent

@stop

@section('content')
<!DOCTYPE HTML>
<html lang="ja">
<table class="table table-bordered">
<thead>
    <tr>{{HTML::header($header)}}</tr>
</thead>
<tbody>
    @for($i = 0; $i < count($Cam); $i++)
    <tr>
        {{HTML::toCsv($Cam)}}
    </tr>
        <tr>
        @for($j = 0; $j < count($Cam->AdGroup); $j++)
        {{HTML::toCsv($Cam->AdGroup[$j])}}
        </tr>
            <tr>
            @for($q = 0; $q < count($Cam->AdAds); $q++)
            {{HTML::toCsv($Cam->AdAds[$q])}}
            @endfor
            </tr>
{{--
    <tr>{{var_dump($Cam->AdAds)}}</tr>
--}}
        <tr>
        {{HTML::toCsv($Cam->Keyword[$j])}}
        </tr>
        @endfor
    @endfor
</tbody>
</table>
</html>
@stop

@section('footer')
  @parent
@stop
