@extends('layouts.master')

@section('header')
  @parent

@stop

@section('content')
<!-- <!DOCTYPE HTML>
<html lang="ja"> -->
<div id="preview">

<table class="table table-bordered table-condensed index">
{{Form::open(array('url' => '/saved'))}}
<thead>
    <tr>{{HTML::header($header)}}</tr>
</thead>

@if(Session::get('exec')==1)
<tbody>
{{HTML::all($Campaign)}}
    @foreach($match_type as $m)

    @for($i=0; $i < count($AdGroup); $i++)

        {{$AdGroup[$i]->setAdgmatch($m)}}
        {{HTML::all($AdGroup[$i])}}

        @for($j=0; $j < count($AdAds); $j++)
            {{$AdAds[$j]->setAdgroup($AdGroup[$i])}}
            {{$AdAds[$j]->setEncoded($Keyword[$i])}}
            {{HTML::all($AdAds[$j])}}
        @endfor

        {{--$Keyword[$i]->modifyKeyword($m)--}}
        {{$Keyword[$i]->setMatchtype($m)}}
        {{$Keyword[$i]->setAdgroup($AdGroup[$i])}}
        {{$Keyword[$i]->setCost($AdGroup[$i])}}
        {{HTML::all($Keyword[$i])}}

    @endfor

@endforeach

</tbody>
@endif

@if(Session::get('exec')==2)
<tbody>
    @foreach($Ex->match_type as $m)

        @for($i=0; $i < count($Ex->keywords); $i++)

        {{HTML::ex_keywords($Ex, $m, $i)}}

        @endfor

    @endforeach
</tbody>
@endif

</div>
{{--Session::get('valid')--}}
</table>
    <span id="csv" class="btn btn-primary btn-sm">CSVダウンロード</span>
    {{    Form::submit('保存する', array('class' => 'btn btn-info btn-sm'))  }}
    <!-- <span id="save" class="btn btn-info btn-sm">保存する</span> -->
{{Form::close()}}
    {{Form::open(array('url' => '/csv', 'method' => 'post'))}}
    {{Form::hidden('exec', '')}}
        {{Form::hidden('pre_csv')}}
        {{Form::submit('', array('id' => 'pre_submit', 'style' => 'display:none;'))}}
    {{Form::close()}}

<!-- </html> -->
@stop

@section('foot')
  @parent
 <script type="text/javascript">

//------ numbering -----

// $(function () {
//     var input = $('table tr td').find('input');
//     //numbering
//     if(input){
//         input.each(function(){
//             var id = $('tr').index(this.closest('tr'));
//             var val = $(this).val();
//             var name = $(this).attr('name');
//             $(this).attr('name', name+"["+id+"]");
// console.log($(this).attr('name'));
//         });
//     }
// });




//------ csvBtn ------
 var CSV = '';
    $('span#csv').on('click', function(){
        $('table tr:has(td)').each(function(){
            var row = $(this).children('td');
                    row.each(function(){
                            var word = $(this).text();
//    console.log(word);
                            word = word.replace(/\r|\n|\r\n/g, '');
                            CSV = CSV + word + ',';
                    });
                CSV = CSV + '\r\n';
        });
    $('input[name="pre_csv"]').val(CSV);
    $('input[name="exec"]').val("1");
    $('input[id="pre_submit"]').click();
    });


//----- saveBtn -----
//         var vals = [];
//     $('span#save').on('click', function(){
//
//             vals = $('table tr:has(td)').each(function(){
//                 var row = $(this).children('td');
//                 if(row.has('div')){
//                     vaals = $(this).find('input').val();
//                     vals.push(vaals);
//                 }
// console.log(vals);
// //                    return vals;
//         });
//         $('input[name="pre_csv"]').val(CSV);
// //        $('input[id="pre_submit"]').click();
// });
//
//         //header('http://192.168.33.33/public_html/')


//----- save2 ------
    $('span#save').on('click', function(){
//            var url = $(location).attr('href');
//            $(this).closest('div').load(url table tr td div input);
//            location.reload();

            // var html = $('html');
            // var result = $.parseHTML(html);
            // console.log(result);

//         $('input[name="exec"]').val("0");
//         var input = $('table tr td').find('input');
//         var inputs = {};
// //        var posts = [];
//         input.each(function(){
//             var key = input.attr('name');
//             var val = input.val();
//             var index = $('input').index(this);
//             inputs[index] = val;
//             $('input[name="pre_csv"]').val(inputs);
//         });
//         $('input[id="pre_submit"]').click();


//         var input = $('table tr td').find('input');
//         var data = {};
//         var datas = [];
//         if(input){
//             input.each(function(){
//                 data.id = $(this).attr('name');
//                 data.val = $(this).val();
//                 datas.push(data);
//             });
//         }
// console.log(datas.val);
//         var urls = '<?php echo URL::to('preview'); ?>';
//         $.ajax({
//             type: 'POST',
//             url: urls,
//             data: datas,
//             success: function(){
// console.log(urls);console.log(datas);
//                 alert('success');
//             }
//         });
//
    });




 </script>


@stop
