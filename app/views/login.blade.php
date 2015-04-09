@extends('layouts.master')

@section('content')
<div class="col-md-offset-3 col-md-6">

    <section class="login">
        {{Form::model('User',array())}}
        <dl class="form-group">
            <dt class="info">{{Form::label('user_id', 'ID:')}}</dt>
            <dd>{{Form::text('user_id', '', array('class' => 'form-control'))}}</dd>
        </dl>

        <dl class="form-group">
            <dt>{{Form::label('password', 'パスワード')}}</dt>
            <dd>{{Form::password('password', array('class' => 'form-control'))}}</dd>
        </dl>
            <p>
                {{Form::submit('ログイン', array('class' => 'btn btn-primary' ))}}
            </p>
        {{Form::close()}}
    </section>


</div>

@stop
