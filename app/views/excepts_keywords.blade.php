@extends('layouts.master')

@section('content')
{{Form::open()}}
<div class="container-fluid">
    <div class="row row_main">
        <div class="col-sm-12">
            <main id="main">
                <!-- <div class="jumbotron">
                    <h1>
                        <span>出稿データCSV生成</span>
                        <span class="pull-right"><a class="btn btn-default" href="https://ad-compass.com/help/">操作マニュアルを見る <i class="fa fa-arrow-right"></i></a></span>
                    </h1>
                </div> -->


                <!-- <section>
                    <ul class="nav nav-pills">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="label label-danger">Yahoo</span> 出稿データ選択 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><span>SS</span></li>
                                <li><a href="./?t=new_ss_ads_y">新規キャンペーン出稿</a></li>
                                <li><a href="./?t=except_ads_keyword_y">除外キーワード</a></li>
                                <li><a href="./?t=add_ads_campaign_y">広告グループ追加出稿</a></li>
                                <li><a href="./?t=add_ss_ads_y">広告追加出稿</a></li>
                                <li class="divider"></li>
                                <li><span>YDN</span></li>
                                <li><a href="./?t=new_ydn_ads_y">新規キャンペーン出稿</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="label label-primary">Google</span> 出稿データ選択 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="./?t=new_ads_g">新規キャンペーン出稿</a></li>
                            </ul>
                        </li>
                    </ul>

                </section> -->

                <article class="entry">
                    <section>
                    </section>


                        <div class="page-header">
                            <h3>
                                <!-- <span class="label label-danger">Yahoo</span>  -->
                                除外キーワード</h3>
                        </div>

                        <!-- <form name="csv_maker" method="post" action="https://ad-compass.com/cms/wp-content/themes/ad-compass/php/listing/csv_listing_new_keyword03.php"> -->
                        {{Form::open()}}
                            <p lingdex="0">
                                <!-- <button type="submit" class="btn btn-primary" name="" value="" autocomplete="off"><i class="fa fa-download"></i> CSVダウンロード</button> -->
                            </p>

                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="panel panel-default col-md-5">
                                        <div class="panel-heading">
                                            出稿タイプ
                                        </div>
                                        <div class="panel-body">
                                            <div class="radio">
                                                <ul class="list-unstyled">
                                                    <li><label><input type="radio" name="ex_keyword_pattern" value="c" checked="">  キャンペーンの対象外キーワード</label></li>
                                                    <li><label><input type="radio" name="ex_keyword_pattern" value="a">  広告グループの対象外キーワード</label></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="panel panel-default col-md-offset-1 col-md-5">
                                        <div class="panel-heading">
                                            キーワード設定
                                        </div>
                                        <div class="panel-body">
                                            <fieldset class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="ad_group_id" class="col-sm-5 control-label">マッチタイプ / 表示URL接尾辞</label>
                                                    <div class="col-sm-7">
                                                        <div class="checkbox"><label class="matchtype_label"><input type="checkbox" name="match_type[]" value="exact"> 完全一致</label></div>
                                                        <div class="checkbox"><label class="matchtype_label"><input type="checkbox" name="match_type[]" value="phrase"> フレーズ一致</label></div>
                                                        <div class="checkbox"><label class="matchtype_label"><input type="checkbox" name="match_type[]" value="broad_plus"> 絞り込み部分一致</label></div>
                                                        <div class="checkbox"><label class="matchtype_label"><input type="checkbox" name="match_type[]" value="broad"> 部分一致</label></div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div> -->

                                    <div class="panel panel-default col-md-offset-1 col-md-5">
                                        <div class="panel-heading">
                                            キャンペーン
                                        </div>
                                        <div class="panel-body">
                                            <fieldset class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="campaign_id" class="col-sm-4 control-label">キャンペーンID</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="campaign_id" name="campaign_id" placeholder="キャンペーンID" value="" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="campaign_name" class="col-sm-4 control-label">キャンペーン名</label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group"><input type="text" class="form-control" id="campaign_name" name="campaign_name" placeholder="キャンペーン名" data-max-input-length="50" value="" required=""><span class="input-group-addon"><span class="count">0</span>/50</span></div><span class="help_nomargin"></span>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="panel panel-default panel-ad_group" style="display: none;">
                                        <div class="panel-heading">
                                            広告グループ
                                        </div>
                                        <div class="panel-body">
                                            <fieldset class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="ad_group_id" class="col-sm-4 control-label">広告グループID</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="ad_group_id" name="ad_group_id" placeholder="広告グループID" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ad_group_name" class="col-sm-4 control-label">広告グループ名</label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group"><input type="text" class="form-control" id="ad_group_name" name="ad_group_name" placeholder="広告グループ名" data-max-input-length="50" value=""><span class="input-group-addon"><span class="count">0</span>/50</span></div><span class="help_nomargin"></span>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

                                <section class="col-sm-12">
                            			<div class="page-header col-md-12 col-lg-12">
                            				<h4>キーワード設定</h4>
                            			</div>
                            		<div id="second" class="col-md-12 col-lg-12">
                            				<div id="keyword_config" class="panel panel-default col-sm-12">
                            					<div class="panel-heading">マッチタイプ設定<strong style="color:red;"></strong></div>
                            					<div class="panel-body">
                            					<table class="table table-bordered">
                            						<tbody>
                            							<tr>
                            								<th class="col-sm-4 text-right" rowspan="4">マッチタイプ / 表示URL接尾辞</th>
                            								<td class="col-sm-4">
                            									<div class="form-inline">
                            										<div class="checkbox">
                            											<label class="matchtype_label">
                            												<input type="checkbox" name="match_type[]" value="exact" checked="checked">
                            												完全一致
                            											</label>
                            										</div>
                            										<br>
                            										<div class="form-group">
                            											<div class="input-group">
                            												<span class="input-group-addon">.</span>
                            												<input type="text" class="form-control matchtype_suffix" name="exact_suffix" value="jp">
                            											</div>
                            										</div>
                            									</div>
                            								</td>
                            							<!-- </tr>
                            							<tr> -->
                            								<td class="col-sm-4">
                            									<div class="form-inline">
                            										<div class="checkbox">
                            											<label class="matchtype_label">
                            												<input type="checkbox" name="match_type[]" value="phrase">
                            												フレーズ一致
                            											</label>
                            										</div>
                            										<br>
                            										<div class="form-group">
                            											<div class="input-group">
                            												<span class="input-group-addon">.</span>
                            												<input type="text" class="form-control matchtype_suffix" name="exact_suffix" value="co.jp">
                            											</div>
                            										</div>
                            									</div>
                            								</td>
                            							</tr>
                            							<tr>
                            								<td class="col-sm-4">
                            									<div class="form-inline">
                            										<div class="checkbox">
                            											<label class="matchtype_label">
                            												<input type="checkbox" name="match_type[]" value="broad_plus">
                            												絞り込み部分一致
                            											</label>
                            										</div>
                            										<br>
                            										<div class="form-group">
                            											<div class="input-group">
                            												<span class="input-group-addon">.</span>
                            												<input type="text" class="form-control matchtype_suffix" name="phrase_suffix" value="co.jp">
                            											</div>
                            										</div>
                            									</div>
                            								</td>
                            							<!-- </tr>
                            							<tr> -->
                            								<td class="col-sm-4">
                            									<div class="form-inline">
                            										<div class="checkbox">
                            											<label class="matchtype_label">
                            												<input type="checkbox" name="match_type[]" value="broad">
                            												部分一致
                            											</label>
                            										</div>
                            										<br>
                            										<div class="form-group">
                            											<div class="input-group">
                            												<span class="input-group-addon">.</span>
                            												<input type="text" class="form-control matchtype_suffix" name="broad_suffix" value="jp">
                            											</div>
                            										</div>
                            									</div>
                            								</td>
                            							</tr>
                            						</tbody>
                            					</table>
                            					</div>
                            				</div><!-- /#keyword_config -->

                            			<div class="panel panel-default">
                            				<div class="panel-heading">
                            					キーワード
                            					<strong style="color:red;"></strong>
                            				</div>
                            				<div class="panel-body">
                            					<p lingdex="1">
                            						<a class="btn btn-info" href="#cross_keyword_area" data-toggle="collapse"><i class="fa fa-plus"></i> キーワード掛け合わせ</a>
                            						<!-- <a class="btn btn-default" href="http://www.related-keywords.com/" target="_blank"><i class="fa fa-share"></i> 関連キーワードを探す（外部サイト）</a> -->
                            					</p>
                            					<div id="cross_keyword_area" class="collapse">
                            						<div class="row">
                            							<div class="col-sm-4 textarea">
                            								<label>キーワードA</label><span class="isright">&nbsp{{ Form::checkbox('isbroad[]', '1', false, array('id' => 'A')) }}部分一致</span>
                            								<p lingdex="2">
                            									<textarea id="keys1" class="form-control" name="cross_keyword01" rows="8" data-count-keyword="true"></textarea>
                            									<span class="help-block">キーワード数：<span class="count">0</span></span>
                            								</p>
                            							</div>
                            							<div class="col-sm-4 textarea">
                            								<label>キーワードB</label><span class="isright">&nbsp{{ Form::checkbox('isbroad[]', '1', false, array('id' => 'B')) }}部分一致</span>
                            								<p lingdex="3">
                            									<textarea id="keys2" class="form-control" name="cross_keyword02" rows="8" data-count-keyword="true"></textarea>
                            									<span class="help-block">キーワード数：<span class="count">0</span></span>
                            								</p>
                            							</div>
                            							<div class="col-sm-4 textarea">
                            								<label>キーワードC</label><span class="isright">&nbsp{{ Form::checkbox('isbroad[]', '1', false, array('id' => 'C')) }}部分一致</span>
                            								<p lingdex="4">
                            									<textarea id="keys3" class="form-control" name="cross_keyword03" rows="8" data-count-keyword="true"></textarea>
                            									<span class="help-block">キーワード数：<span class="count">0</span></span>
                            								</p>
                            							</div>
                            						</div>
                            						<div class="row">
                            							<div class="col-sm-8 col-sm-offset-2">
                            								<p lingdex="5">
                            									<button class="btn btn-primary btn-lg btn-block" type="button" name="crossing_keyword"><i class="fa fa-arrow-circle-down"></i> 変換</button>
                            									<input type="checkbox" id="crossing_keyword_type" value="1">全組み合わせ
                            									<input type="hidden" id="campaign">
                            									<input type="hidden" id="adGroup">
                            									<!-- <label><input type="checkbox" id="keywordsAll"> 順序入れ替えあり</label> -->
                            								</p>
                            							</div>
                            						</div>
                            					</div><!-- /#cross_keyword_area -->

                            					<fieldset class="form-horizontal col-sm-7 textarea">
                            						<div class="form-group">
                            							<div class="col-sm-12">
                            								<textarea id="result" class="form-control" rows="8" name="keyword" required=""></textarea>
                            								<span class="help-block">キーワード数：<span class="count">0</span>{{Form::hidden('keyword_count', '')}}</span>
                            							</div>
                            						</div>
                            					</fieldset>

                            					<fieldset class="form-horizontal col-sm-5 textarea">
                            						<div class="form-group">
                            							<div class="col-sm-12">
                            								<textarea id="encode" class="form-control" rows="8" name="encoded_url" ></textarea>
                            								<span class="help-block">キーワード数：<span class="count">0</span></span>	<span class="btn btn-sm btn-warning encode_btn" data-role="encode">URLエンコード</span>
                            							</div>
                            						</div>
                            					</fieldset>
                            				</div><!-- /.panel-body -->
                            			</div><!-- /.panel-default -->

                            		</div><!-- /#second -->
                            </section>

                                <!-- <div class="col-md-6 col-lg-7">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            キーワード
                                        </div>
                                        <div class="panel-body">
                                            <p lingdex="1">
                                                <a class="btn btn-info" href="#cross_keyword_area" data-toggle="collapse"><i class="fa fa-plus"></i> キーワード掛け合わせ</a>
                                                <a class="btn btn-default" href="http://www.related-keywords.com/" target="_blank"><i class="fa fa-share"></i> 関連キーワードを探す（外部サイト）</a>
                                            </p>
                                            <div id="cross_keyword_area" class="collapse">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label>キーワードA</label>
                                                        <p lingdex="2">
                                                            <textarea id="keys1" class="form-control" name="cross_keyword01" rows="8" data-count-keyword="true"></textarea>
                                                            <span class="help-block">キーワード数：<span class="count">0</span></span>
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>キーワードB</label>
                                                        <p lingdex="3">
                                                            <textarea id="keys2" class="form-control" name="cross_keyword02" rows="8" data-count-keyword="true"></textarea>
                                                            <span class="help-block">キーワード数：<span class="count">0</span></span>
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>キーワードC</label>
                                                        <p lingdex="4">
                                                            <textarea id="keys3" class="form-control" name="cross_keyword03" rows="8" data-count-keyword="true"></textarea>
                                                            <span class="help-block">キーワード数：<span class="count">0</span></span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-8 col-sm-offset-2">
                                                        <p lingdex="5">
                                                            <button class="btn btn-primary btn-lg btn-block" type="button" name="crossing_keyword"><i class="fa fa-arrow-circle-down"></i> 変換</button>
                                                            <input type="hidden" id="campaign">
                                                            <input type="hidden" id="adGroup">
                                                            <input type="checkbox" id="keywordsAll"> 順序入れ替えあり
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <fieldset class="form-horizontal">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <textarea id="result" class="form-control" rows="8" name="keyword" required=""></textarea>
                                                        <span class="help-block">キーワード数：<span class="count">0</span></span>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                            <input type="hidden" name="listing_type" value="y">
                        <!-- </form> -->
                        {{Form::submit('CSVダウンロード',array('class' => 'btn btn-primary'))}}
                        {{Form::close()}}

            </article></main>
        </div>
    </div>
    <!-- <span id="csv" class="btn btn-primary btn-sm">CSVダウンロード</span> -->

</div>
{{Form::close()}}

@stop

@section('foot')
  @parent
 <script type="text/javascript">
 //キーワード配列化
 function toArray(key){
 	key = key.replace(/\n|\r|\r\n/, '\n');
 	key = key.split('\n');
 	if(key[(key.length -1)]==''){ key.pop(); }
 	return key;
 }

 //キーワード掛け合わせ
 function crossKeywords(k1, k2, k3){
 	if(k1=='' && k2!=='' && k3!==''){
 		alert('左のエリアから順に入力してください');return false;
 	}
 	// else if((k1!=='' && k3!=='') && k2==''){
 	// 	alert('右のエリアから順に入力してください');return false;
 	// }
 	//if(k1=='' || (k1!=='' && k2=='')){alert('左のエリアから順に入力してください');return false;}
 	var type = $('input#crossing_keyword_type:checked').val();
 	var a = k1.length; var b = k2.length; var c = k3.length;
 	var keywords = [];
 	if(a==0){ a = 0; k1[0] = ""; }
 	if(b==0){ b = 0; k2[0] = ""; }
 	if(c==0){ c = 0; k3[0] = ""; }

 	if(type=="1" && (a!==0 && b!==0 && c!==0)){
 //		alert('3');
 		for(var i=0; i<a; i++){
 			for(var j=0; j<b; j++){
 				for(var t=0; t<c; t++){
 					keywords.push(k1[i]+" "+k2[j]+" "+k3[t]);
 				}
 			}
 		}
 		for(var i=0; i<a; i++){
 			for(var j=0; j<c; j++){
 				for(var t=0; t<b; t++){
 					keywords.push(k1[i]+" "+k3[j]+" "+k2[t]);
 				}
 			}
 		}
 		for(var i=0; i<b; i++){
 			for(var j=0; j<a; j++){
 				for(var t=0; t<c; t++){
 					keywords.push(k2[i]+" "+k1[j]+" "+k3[t]);
 				}
 			}
 		}
 		for(var i=0; i<b; i++){
 			for(var j=0; j<c; j++){
 				for(var t=0; t<a; t++){
 					keywords.push(k2[i]+" "+k3[j]+" "+k1[t]);
 				}
 			}
 		}
 		for(var i=0; i<c; i++){
 			for(var j=0; j<a; j++){
 				for(var t=0; t<b; t++){
 					keywords.push(k3[i]+" "+k1[j]+" "+k2[t]);
 				}
 			}
 		}
 		for(var i=0; i<c; i++){
 			for(var j=0; j<b; j++){
 				for(var t=0; t<a; t++){
 					keywords.push(k3[i]+" "+k2[j]+" "+k1[t]);
 				}
 			}
 		}
 		return keywords;
 	}
 	else if(type=="1" && (a!==0 && b!==0 && c==0)){
 //		alert('2');
 		for(var i=0; i<a; i++){
 			for(var j=0; j<b; j++){
 				keywords.push(k1[i]+" "+k2[j]);
 			}
 		}
 		// for(var i=0; i<a; i++){
 		// 	for(var j=0; j<b; j++){
 		// 		keywords.push(k1[i]+" "+k2[j]);
 		// 	}
 		// }
 		for(var i=0; i<b; i++){
 			for(var j=0; j<a; j++){
 				keywords.push(k2[i]+" "+k1[j]);
 			}
 		}
 		// for(var i=0; i<b; i++){
 		// 	for(var j=0; j<a; j++){
 		// 		keywords.push(k2[i]+" "+k1[j]);
 		// 	}
 		// }
 		return keywords;
 	}
 	else if(type=="1" && (a!==0 && b==0 && c==0)){
 //		alert('1');
 		for(var i=0; i<a; i++){
 			keywords.push(k1[i]);
 		}
 		return keywords;
 	}
 	else{
 		for(var i=0; i<a; i++){
 			if(a!==0 && b==0 && c==0){keywords.push(k1[i]);}
 			for(var j=0; j<b; j++){
 				if(a!==0 && b!==0 && c==0){keywords.push(k1[i]+" "+k2[j]);}
 				for(var t=0; t<c; t++){
 					keywords.push(k1[i]+" "+k2[j]+" "+k3[t]);
 				}
 			}
 		}
 		// keywords_u = keywords.filter(function (x, i, self) {
         //     return self.indexOf(x) === i;
         // });
 		return keywords;
 	}
 }

 //広告タイトル生成
 function titleGenerator(word, phrase){
 	var a = word.length; var b = phrase.length;
 //console.log(word);
 	var titles = [];
 	for(var i=0; i<b; i++){
 		if(phrase[i].match(/^.*\{\{WORD\}\}.*$/)){
 			for(var j=0; j<a; j++){
 				var title = phrase[i].replace(/\{\{WORD\}\}/g, word[j]);
 				titles.push(title);
 			}
 		}else{
 			titles.push(phrase[i]);
 		}
 	}
 	return titles;
 }

 function addAdsClone(e){
 	var t = e.target;
 //console.log(t);
 	var fields = $(t).next('fieldset');
 //console.log(fields);
 	var clone = fields.clone();
 	clone.slideUp();

 	fields.animate({
 		width: 0, height: 0, opacity: 0
 	}, {
 		duration: 'slow', complete: function(){
 			$(this).closest('div.panel-body').append(clone);
 			clone.slideDown('slow');
 		}
 	});
 }

 function validator($input){
 	$rules = {
 		"ad_ads_title": "15",
 		"ad_ads_title_word": "15",
 		"ad_ads_title_phrase": "15",
 		"ad_ads_name": "50",
 		"ad_ads_note01": "19",
 		"ad_ads_note02": "19",
 		"ad_ads_display_url": "29",
 		"ad_ads_link_url": "1024"
 	}
 	var length = $input.val().length;
 	var type = $input.attr('name').replace(/\[\]/, '');
 	if(length <= $rules[type]){
 		//$input.css('background-color',  'green');
 		//$input.addClass('success');
 		//alert('success');
 		return null;
 	}
 	else if(length > $rules[type]){
 		$input.addClass('danger');
 		//alert('danger');
 		//$('.err_msg').append('');
 		return type;
 	}
 }


 $(function(){

 	//function setCount()
 	$('input.counted, textarea.counted').on('bind keyup', function(){
 console.log($(this).val().length);
 		var cnt = $(this).val().length;
 		$(this).next().find('span.count').text(cnt);
 	});

 	//function setNum()
 	$('td[class^="ad_ads_title"] > input:text').on('keypress', function(){
 		var num = $(this).val().length;
 		$(this).closest('td').next().text(num);
 		$(this).closest('tr').find('input:hidden').val(num);
 	});


 	//function addForm()
 /* ver.01
 	$('#third #title_generator p.add_btn').on('click', function(){
 		var tb = $(this).closest('thead').next('tbody');
 		var d_id = tb.children().filter('tr:last').data('id');
 		var class_name = tb.children('tr').find('td').attr('class');

 		var newtr = tb.children().filter('tr:last').clone(true);
 		newtr = newtr.data('tr', 'id', (d_id+1));
 		newtr.appendTo(tb);
 	});
 */
 	$('#third #title_generator p.add_btn').on('click', function(){
 		if($(this).data('id')=='word'){
 			var tb = $(this).closest('thead').next('tbody');
 			var forms = $('#tab1 > .forms').last();
 			forms = forms.clone(true);

 			$('#tab1').append(forms);
 		}
 		else if($(this).data('id')=='phrase'){
 			var tb = $(this).closest('thead').next('tbody');
 			var d_id = tb.children().filter('tr:last').data('id');
 			var class_name = tb.children('tr').find('td').attr('class');

 			var newtr = tb.children().filter('tr:last').clone(true);
 			newtr = newtr.data('tr', 'id', (d_id+1));
 			newtr.appendTo(tb);
 		}
 	});

 	//function deleteForm()
 	$('span.del_btn').on('click', function(){
 		var forms = $(this).parent('div.forms');
 		var tb = $(this).closest('tbody');
 		if(tb.find('div.forms').length > 1){
 			forms.slideUp();
 			forms.remove();
 		}
 	});

 	//function resetForm()
 	$('span#reset').on('click', function(){
 		$('tbody.ad_ads_titles').children().remove();
 	});

 	//function add_ads_btn
 	$('button[id="add_ads_btn"]').on('click', addAdsClone(this));

 	//function encodedKeyword
 	$('#second span.encode_btn').on('click', function(){
 		var txt = $('#result').val();
 		txt = txt.replace(' ', '');
 		txt = txt.replace(/\n|\r|\r\n/g, '\n');
 		txt = txt.split(/\n/);
 		var cnt = txt.length;
 		txt = encodeURI(txt);

 		var enc_txt = txt.replace(/\,/g, '\n');

 		$('#encode').val(enc_txt);
 		$('#encode+span>span').text(cnt);
 	});

 	//function generateTitle
 	$('#third #title_generator p#generate').on('click', function(){
 		//for Input:Text
 		var word = []; var phrase = [];
 		$('input[name^="ad_ads_title_word"]').each(function(){
 			word.push($(this).val());
 			validator($(this));
 		});
 		//for Textarea
 		var txt = $('#ad_ads_title_text').val();
 		txt = toArray(txt);
 		var title = $.merge(word, txt);

 		$('input[name^="ad_ads_title_phrase"]').each(function(){
 			phrase.push($(this).val());
 			validator($(this));
 		});

 		var titles = titleGenerator(title, phrase);
 		//var ttl = "<tr><td></td><td></td><td></td></tr>";
 		for(i=0; i<titles.length; i++){
 			$('tbody.ad_ads_titles').append('<tr></tr>');
 			var T = $('<input>').attr({
 				type: 'text',
 				name: 'ad_ads_title[]',
 				value: titles[i],
 				class: 'form-control'
 			});
 			validator(T);
 			$('tbody.ad_ads_titles tr:last').append(T);
 			var N = $('<input>').attr({
 				type: 'hidden',
 				name: 'title_num[]',
 				value: titles[i].length
 			});
 			$('tbody.ad_ads_titles tr:last').append(N);

 			T.wrap(function(index){
 				return '<td colspan="3"><div class="forms"></div></td>';
 			});
 			$('<span class="del_btn btn btn-danger btn-sm" onClick="deleteForm();">x</span>').insertAfter(T);
 			//$(TT+' > div.forms').append('<span class="del_btn btn btn-danger btn-sm">x</span>');
 			N.wrap(function(){
 				return '<td>'+titles[i].length+'</td>';
 			});
 		}
 	});


 	//function isbroadCheck
 	$('button[name="crossing_keyword"]').on('click', function(){
 		var ids = [];
 		var flugs = [];
 		var k1 = toArray($('#keys1').val());
 		var k2 = toArray($('#keys2').val());
 		var k3 = toArray($('#keys3').val());
 		var broad = $('input[name^="isbroad"]:checked');
 		//var match = $('input[name^="match_type"]:checked');
 console.log(broad);
 // 		match.each(function(){
 // 			flugs.push($(this)).val();
 // 		});
 // console.log(flugs);
 		//チェックされているIDを抽出
 		broad.each(function(){
 			ids.push($(this).attr('id'));
 		});
 		//絞込み該当グループに '+ 'をアタマに追加
 		if($.inArray('A', ids)!== -1){
 			k1 = $.map(k1, function(n, i){
 				return '+'+n;
 			});
 		}
 		if($.inArray('B', ids)!== -1){
 			k2 = $.map(k2, function(n, i){
 				return '+'+n;
 			});
 		}
 		if($.inArray('C', ids)!== -1){
 			k3 = $.map(k3, function(n, i){
 				return '+'+n;
 			});
 		}
 		$('#keys1+span>span').text(k1.length);
 		$('#keys2+span>span').text(k2.length);
 		$('#keys3+span>span').text(k3.length);

 		var keywords = crossKeywords(k1, k2, k3);
 		$('#result+span>span').text(keywords.length);
 		keywords = keywords.join();
 		keywords = keywords.replace(/\,/g, '\n');
 		$('#result').val(keywords);
 	});

 });

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

 </script>


@stop
