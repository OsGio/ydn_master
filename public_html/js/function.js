<!DOCTYPE HTML>
<html lang="ja">
<head>
  <title>ListingAssistantSystem</title>
     <meta charset="EUC-JP" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css?ver=4.0">
    <link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css?ver=4.0">
    <link rel="dns-prefetch" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css?ver=4.0">
    <link rel="stylesheet" id="bootstrap-theme-style-css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css?ver=4.0" media="all">
    <link rel="stylesheet" id="font-awesome-style-css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css?ver=4.0" media="all">
    <link rel="stylesheet" id="jquery-ui-style-css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css?ver=4.0" media="all">
     <link media="all" type="text/css" rel="stylesheet" href="http://192.168.33.33/css/mystyle.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js?ver=4.0'></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js?ver=4.0"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
     <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
     <![endif]-->
</head>
<body>
	<div class="container">
		<div class="row">
			<header class="col-sm-12">
				<!-- Static navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="./">ListingAssistantSystem</a>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li><a href="./">新規キャンペーン出稿</a></li>
<li><a href="#">除外キーワード</a></li>
<li><a href="#">広告グループ追加出稿</a></li>
<!--<li><a href="./contact">コンタクト</a></li>-->

</ul>
</div><!--/.nav-collapse -->
</div>
</div>
							</header>
		</div><!-- /.row -->
	</div><!-- #container -->

	<div class="container">
		<div class="row">
			<div id="content" class="col-sm-12" style="padding:10px;">
				<form method="POST" action="http://192.168.33.33/preview" accept-charset="UTF-8"><input name="_token" type="hidden" value="haQl8knTk9JYYxoxTUAvO1hJLvi3hUkbDvkBKXCN">

<section class="col-sm-12">
		<strong style="color:red;">※印は全てテスト用の注釈です。</strong>
	<div id="first" class="col-md-12 col-lg-12">

	<div id="campaign" class="panel panel-default col-sm-5">
		<div class="panel-heading">キャンペーン<strong style="color:red;"></strong></div>
		<div class="panel-body">
			<div class="form-group">
				<fieldset class="form-horizontal">
					<label for="campaign_name" class="col-sm-4 control-label">キャンペーン名</label>
					<div class="col-sm-8">
						<div class="input-group">
							<input type="text" class="form-control" id="campaign_name" name="campaign_name" placeholder="キャンペーン名" data-max-input-length="50" value="" required="">
							<span class="input-group-addon">
								<span class="count">0</span>/50
							</span>
						</div>
						<span class="help_nomargin"></span>
					</div>
				</fieldset>
			</div>
			<div class="form-group">
				<fieldset class="form-horizontal">
					<label for="campaign_budget" class="col-sm-4 control-label">キャンペーン予算（日額）</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon">¥</span>
							<input type="number" class="form-control" id="campaign_budget" name="campaign_budget" step="100" min="0" placeholder="キャンペーン予算" value="" required="">
						</div>
					</div>
				</fieldset>
			</div>
		</div>
	</div><!-- /#campaign -->

	<div id="adgroup" class="panel panel-default col-sm-5 col-sm-offset-1">
		<div class="panel-heading">広告グループ<strong style="color:red;"></strong></div>
		<div class="panel-body">
			<fieldset class="form-horizontal">
				<div class="form-group">
					<label for="ad_group_cost" class="col-sm-4 control-label">入札価格</label>
						<div class="col-sm-8">
							<div class="input-group">
							<span class="input-group-addon">¥</span>
							<input type="number" class="form-control" id="ad_group_cost" name="ad_group_cost" placeholder="入札価格" step="1" min="0" value="" required="">
							</div><!-- /.input-group -->
						</div><!-- /.col-sm-8 -->
					</div><!-- /.form-group -->
				</fieldset>
			</div><!-- /.panel-body -->
		</div><!-- /#adgroup -->

	</div><!-- /#first -->
</section>


<!-- ***** .collapseをremoveClassで表示 ***** -->
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
												<input type="checkbox" name="match_type" value="exact" checked="checked">
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
												<input type="checkbox" name="match_type" value="phrase">
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
												<input type="checkbox" name="match_type" value="broad_plus">
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
												<input type="checkbox" name="match_type" value="broad">
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
					<strong style="color:red;">※部分一致仕様確認中</strong>
				</div>
				<div class="panel-body">
					<p lingdex="1">
						<a class="btn btn-info" href="#cross_keyword_area" data-toggle="collapse"><i class="fa fa-plus"></i> キーワード掛け合わせ</a>
						<!-- <a class="btn btn-default" href="http://www.related-keywords.com/" target="_blank"><i class="fa fa-share"></i> 関連キーワードを探す（外部サイト）</a> -->
					</p>
					<div id="cross_keyword_area" class="collapse">
						<div class="row">
							<div class="col-sm-4 textarea">
								<label>キーワードA</label><span class="isright">&nbsp<input id="A" name="isbroad[]" type="checkbox" value="1">部分一致</span>
								<p lingdex="2">
									<textarea id="keys1" class="form-control" name="cross_keyword01" rows="8" data-count-keyword="true"></textarea>
									<span class="help-block">キーワード数：<span class="count">0</span></span>
								</p>
							</div>
							<div class="col-sm-4 textarea">
								<label>キーワードB</label><span class="isright">&nbsp<input id="B" name="isbroad[]" type="checkbox" value="1">部分一致</span>
								<p lingdex="3">
									<textarea id="keys2" class="form-control" name="cross_keyword02" rows="8" data-count-keyword="true"></textarea>
									<span class="help-block">キーワード数：<span class="count">0</span></span>
								</p>
							</div>
							<div class="col-sm-4 textarea">
								<label>キーワードC</label><span class="isright">&nbsp<input id="C" name="isbroad[]" type="checkbox" value="1">部分一致</span>
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
								<span class="help-block">キーワード数：<span class="count">0</span><input name="keyword_count" type="hidden" value=""></span>
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

<section class="col-sm-12">
		<div class="page-header col-md-12 col-lg-12">
			<h4>広告設定</h4>
		</div><!-- /.page-header -->


		<div id="third" class="col-md-12 col-lg-12">
			<div class="col-sm-12">
				<div id="title_generator" class="panel panel-default">
					<div class="panel-heading">
						広告タイトルパターン生成<strong style="color:red;">※タイトルフレーズの挿入したい箇所に{{WORD}}と入力してください。<br><b>必ず広告タイトル生成ボタンを押して広告タイトルを出力してください。</b><br>
													</strong>
													<span class="btn btn-info btn-sm ins_btn">{{WORD}}</span><span>挿入ボタン</span>
					</div>
					<div class="panel-body">
						<div class="col-sm-12">
							<div class="col-sm-6" id="title_words">
								<table class="table table-striped table-bordered table-hover col-sm-6">
									<thead>
										<tr>
											<th colspan="3">タイトルワード<p class="btn btn-sm btn-primary add_btn" data-id="word"><b>+</b></p></th>
											<ul class="nav nav-tabs">
												<li class="active"><a href="#tab1" data-toggle="tab">個別</a></li>
												<li><a href="#tab2" data-toggle="tab">一括</a></li>
											</ul>
										</tr>
									</thead>
									<tbody>
										<tr>
																			<td>
												<div id="title_word_tab" class="tab-content">
													<div class="tab-pane fade in active" id="tab1">
														<div class="forms">
															<input class="ad_ads_title_word form-control" data-role="word" name="ad_ads_title_word[]" type="text" value="">
															<span class="del_btn btn btn-sm btn-danger"><b>x</b></span>
															<input class="title_word_num" data-role="word" name="title_word_num[]" type="hidden" value="0">
														</div>
													</div>
													<div class="tab-pane fade" id="tab2">
														<textarea class="ad_ads_title_word form-control" id="ad_ads_title_text" data-role="word" name="ad_ads_title_word[]" cols="50" rows="10"></textarea>
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-sm-6" id="title_phrases">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th colspan="2">タイトルフレーズ<p class="btn btn-sm btn-primary add_btn" data-id="phrase"><b>+</b></p></th>
										</tr>
									</thead>
									<tbody>
										<tr>
																				<td>
												<div id="tab3">
													<div class="forms">
														<input class="ad_ads_title_phrase form-control" data-role="phrase" name="ad_ads_title_phrase[]" type="text" value="">
														<span class="del_btn btn btn-sm btn-danger"><b>x</b></span>
														<input class="title_phrase_num" data-role="phrase" name="title_phrase_num[]" type="hidden" value="0">
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-sm-12 collapse in" id="titles">
								<p class="btn btn-sm btn-info" id="generate">広告タイトル生成</p><span class="btn btn-danger btn-sm del_btn" id="reset">x&nbspリセット</span>
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<!-- <th>ワードカウント</th><th colspan="2">広告タイトル</th><th>文字数</th> -->
										</tr>
									</thead>
									<tbody class="ad_ads_titles">
										<!-- <tr> -->
											<!-- <td class="ad_ads_title" colspan="3"><input class="as_ads_title" name="ad_ads_title[]" type="text" value=""></td><td class="title_num"></td><input class="title_num" name="title_num[]" type="hidden" value="0"> -->
										<!-- </tr> -->
									</tbody>
								</table>
							</div>
					</div><!-- /.col-sm-12 -->
					</div><!-- /.panel-body -->
				</div><!-- /.panel panel-default -->
			</div><!-- /.col-sm-12 -->
		</div><!-- /#third /.col-md-12 col-lg-11 -->


	<div id="fourth" class="col-md-12 col-lg-12">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					広告追加<strong style="color:red;">※広告追加機能未。広告名/説明文１/説明文２ ともに{{WORD}}置換可能。<br>
														{{WORD}}挿入ワンクリックボタン実装中。</strong>
														<span class="btn btn-info btn-sm ins_btn">{{WORD}}</span><span>挿入ボタン</span>
				</div>
				<div class="panel-body">
					<fieldset class="form-horizontal ad_ads_field">
						<div class="form-group">
							<label class="control-label col-sm-4">広告名</label>
							<div class="col-sm-8">
								<div class="input-group"><input class="form-control" type="text" name="ad_ads_name" data-max-input-length="50" data-check-text="yss"><span class="input-group-addon"><span class="count">0</span>/50</span></div><span class="help_nomargin"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">説明文1</label>
							<div class="col-sm-8">
								<div class="input-group"><input class="form-control" type="text" name="ad_ads_note01" data-max-input-length="19" data-change-insertion="true" data-check-text="yss"><span class="input-group-addon"><span class="count">0</span>/19</span></div><span class="help_nomargin"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">説明文2</label>
							<div class="col-sm-8">
								<div class="input-group"><input class="form-control" type="text" name="ad_ads_note02" data-max-input-length="19" data-change-insertion="true" data-check-text="yss"><span class="input-group-addon"><span class="count">0</span>/19</span></div><span class="help_nomargin"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">表示URL</label>
							<div class="col-sm-8">
								<div class="input-group"><input class="form-control" type="text" name="ad_ads_display_url" data-max-input-length="29"><span class="input-group-addon"><span class="count">0</span>/29</span></div><span class="help_nomargin"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">リンク先URL</label>
							<div class="col-sm-8">
								<div class="input-group"><input class="form-control" type="text" name="ad_ads_link_url" data-max-input-length="1024"><span class="input-group-addon"><span class="count">0</span>/1024</span></div><span class="help_nomargin"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
								<input type="hidden" name="ad_ads_listing_type" value="y">
							</div>
						</div>
					</fieldset>
					<div class="col-sm-offset-4 col-sm-8">
						<button id="add_ads_btn" class="btn btn-primary" type="button" name="ad_ads_data">広告追加</button>
					</div>
					<script>
						ads_data_list = [];
					</script>
				</div>
			</div>
		</div>
	</div><!-- /#fourth -->
</section>



	<div class="err_msg">

	</div>
	<input class="btn btn-large btn-primary" id="postPreview" type="submit" value="出力">
</form>
			</div><!-- /#content -->
		</div><!-- /.row -->
	</div><!-- /.container -->

	<div class="container">
		<div class="row">
			<footer class="col-sm-12" style="margin:10px;background:#eee;">
				<p class="text-muted">
  Powered by <a href="mailto:contact@valis.sakura.ne.jp">
  VALIS</a></p>
			</footer>
		</div><!-- /.row -->
	</div><!-- .container -->

<script src="http://192.168.33.33/js/jquery.selection.js"></script>

<script src="http://192.168.33.33/js/function.js"></script>

<script charset="utf-8" type="text/javascript">
//キーワード配列化
// function toArray(key){
// 	key = key.replace(/\n|\r|\r\n/, '\n');
// 	key = key.split('\n');
// 	if(key[(key.length -1)]==''){ key.pop(); }
// 	return key;
// }
//
// //キーワード掛け合わせ
// function crossKeywords(k1, k2, k3){
// 	var type = $('input#crossing_keyword_type:checked').val();
// 	var a = k1.length; var b = k2.length; var c = k3.length;
// 	var keywords = [];
//
// 	if(type=="1"){
// 		for(var i=0; i<a; i++){
// 			for(var j=0; j<b; j++){
// 				for(var t=0; t<c; t++){
// 					keywords.push(k1[i]+" "+k2[j]+" "+k3[t]);
// 				}
// 			}
// 		}
// 		for(var i=0; i<a; i++){
// 			for(var j=0; j<c; j++){
// 				for(var t=0; t<b; t++){
// 					keywords.push(k1[i]+" "+k3[j]+" "+k2[t]);
// 				}
// 			}
// 		}
// 		for(var i=0; i<b; i++){
// 			for(var j=0; j<a; j++){
// 				for(var t=0; t<c; t++){
// 					keywords.push(k2[i]+" "+k1[j]+" "+k3[t]);
// 				}
// 			}
// 		}
// 		for(var i=0; i<b; i++){
// 			for(var j=0; j<c; j++){
// 				for(var t=0; t<a; t++){
// 					keywords.push(k2[i]+" "+k3[j]+" "+k1[t]);
// 				}
// 			}
// 		}
// 		for(var i=0; i<c; i++){
// 			for(var j=0; j<a; j++){
// 				for(var t=0; t<b; t++){
// 					keywords.push(k3[i]+" "+k1[j]+" "+k2[t]);
// 				}
// 			}
// 		}
// 		for(var i=0; i<c; i++){
// 			for(var j=0; j<b; j++){
// 				for(var t=0; t<a; t++){
// 					keywords.push(k3[i]+" "+k2[j]+" "+k1[t]);
// 				}
// 			}
// 		}
// 		return keywords;
// 	}
// 	else{
// 		for(var i=0; i<a; i++){
// 			for(var j=0; j<b; j++){
// 				for(var t=0; t<c; t++){
// 					keywords.push(k1[i]+" "+k2[j]+" "+k3[t]);
// 				}
// 			}
// 		}
// 		return keywords;
// 	}
// }
//
// //広告タイトル生成
// function titleGenerator(word, phrase){
// 	var a = word.length; var b = phrase.length;
// //console.log(word);
// 	var titles = [];
// 	for(var i=0; i<b; i++){
// 		if(phrase[i].match(/^.*\{\{WORD\}\}.*$/)){
// 			for(var j=0; j<a; j++){
// 				var title = phrase[i].replace(/\{\{WORD\}\}/g, word[j]);
// 				titles.push(title);
// 			}
// 		}else{
// 			titles.push(phrase[i]);
// 		}
// 	}
// 	return titles;
// }
//
// function addAdsClone(e){
// 	var t = e.target;
// //console.log(t);
// 	var fields = $(t).next('fieldset');
// //console.log(fields);
// 	var clone = fields.clone();
// 	clone.slideUp();
//
// 	fields.animate({
// 		width: 0, height: 0, opacity: 0
// 	}, {
// 		duration: 'slow', complete: function(){
// 			$(this).closest('div.panel-body').append(clone);
// 			clone.slideDown('slow');
// 		}
// 	});
// }
//
// function validator($input){
// 	$rules = {
// 		"ad_ads_title": "15",
// 		"ad_ads_title_word": "15",
// 		"ad_ads_title_phrase": "15",
// 		"ad_ads_name": "50",
// 		"ad_ads_note01": "19",
// 		"ad_ads_note02": "19",
// 		"ad_ads_display_url": "29",
// 		"ad_ads_link_url": "1024"
// 	}
// 	var length = $input.val().length;
// 	var type = $input.attr('name').replace(/\[\]/, '');
// 	if(length <= $rules[type]){
// 		//$input.css('background-color',  'green');
// 		//$input.addClass('success');
// 		//alert('success');
// 		return null;
// 	}
// 	else if(length > $rules[type]){
// 		$input.addClass('danger');
// 		//alert('danger');
// 		//$('.err_msg').append('');
// 		return type;
// 	}
// }
//
//
// $(function(){
//
// 	//function setNum()
// 	$('td[class^="ad_ads_title"] > input:text').on('keypress', function(){
// 		var num = $(this).val().length;
// 		$(this).closest('td').next().text(num);
// 		$(this).closest('tr').find('input:hidden').val(num);
// 	});
//
//
// 	//function addForm()
// /* ver.01
// 	$('#third #title_generator p.add_btn').on('click', function(){
// 		var tb = $(this).closest('thead').next('tbody');
// 		var d_id = tb.children().filter('tr:last').data('id');
// 		var class_name = tb.children('tr').find('td').attr('class');
//
// 		var newtr = tb.children().filter('tr:last').clone(true);
// 		newtr = newtr.data('tr', 'id', (d_id+1));
// 		newtr.appendTo(tb);
// 	});
// */
// 	$('#third #title_generator p.add_btn').on('click', function(){
// 		if($(this).data('id')=='word'){
// 			var tb = $(this).closest('thead').next('tbody');
// 			var forms = $('#tab1 > .forms').last();
// 			forms = forms.clone(true);
//
// 			$('#tab1').append(forms);
// 		}
// 		else if($(this).data('id')=='phrase'){
// 			var tb = $(this).closest('thead').next('tbody');
// 			var d_id = tb.children().filter('tr:last').data('id');
// 			var class_name = tb.children('tr').find('td').attr('class');
//
// 			var newtr = tb.children().filter('tr:last').clone(true);
// 			newtr = newtr.data('tr', 'id', (d_id+1));
// 			newtr.appendTo(tb);
// 		}
// 	});
//
// 	//function deleteForm()
// 	$('span.del_btn').on('click', function(){
// 		var forms = $(this).parent('div.forms');
// 		var tb = $(this).closest('tbody');
// 		if(tb.find('div.forms').length > 1){
// 			forms.slideUp();
// 			forms.remove();
// 		}
// 	});
//
// 	//function resetForm()
// 	$('span#reset').on('click', function(){
// 		$('tbody.ad_ads_titles').children().remove();
// 	});
//
// 	//function add_ads_btn
// 	$('button[id="add_ads_btn"]').on('click', addAdsClone(this));
//
// 	//function encodedKeyword
// 	$('#second span.encode_btn').on('click', function(){
// 		var txt = $('#result').val();
// 		txt = txt.replace(' ', '');
// 		txt = txt.replace(/\n|\r|\r\n/g, '\n');
// 		txt = txt.split(/\n/);
// 		var cnt = txt.length;
// 		txt = encodeURI(txt);
//
// 		var enc_txt = txt.replace(/\,/g, '\n');
//
// 		$('#encode').val(enc_txt);
// 		$('#encode+span>span').text(cnt);
// 	});
//
// 	//function generateTitle
// 	$('#third #title_generator p#generate').on('click', function(){
// 		//for Input:Text
// 		var word = []; var phrase = [];
// 		$('input[name^="ad_ads_title_word"]').each(function(){
// 			word.push($(this).val());
// 			validator($(this));
// 		});
// 		//for Textarea
// 		var txt = $('#ad_ads_title_text').val();
// 		txt = toArray(txt);
// 		var title = $.merge(word, txt);
//
// 		$('input[name^="ad_ads_title_phrase"]').each(function(){
// 			phrase.push($(this).val());
// 			validator($(this));
// 		});
//
// 		var titles = titleGenerator(title, phrase);
// 		//var ttl = "<tr><td></td><td></td><td></td></tr>";
// 		for(i=0; i<titles.length; i++){
// 			$('tbody.ad_ads_titles').append('<tr></tr>');
// 			var T = $('<input>').attr({
// 				type: 'text',
// 				name: 'ad_ads_title[]',
// 				value: titles[i],
// 				class: 'form-control'
// 			});
// 			validator(T);
// 			$('tbody.ad_ads_titles tr:last').append(T);
// 			var N = $('<input>').attr({
// 				type: 'hidden',
// 				name: 'title_num[]',
// 				value: titles[i].length
// 			});
// 			$('tbody.ad_ads_titles tr:last').append(N);
//
// 			T.wrap(function(index){
// 				return '<td colspan="3"><div class="forms"></div></td>';
// 			});
// 			$('<span class="del_btn btn btn-danger btn-sm" onClick="deleteForm();">x</span>').insertAfter(T);
// 			//$(TT+' > div.forms').append('<span class="del_btn btn btn-danger btn-sm">x</span>');
// 			N.wrap(function(){
// 				return '<td>'+titles[i].length+'</td>';
// 			});
// 		}
// 	});
//
//
// 	//function isbroadCheck
// 	$('button[name="crossing_keyword"]').on('click', function(){
// 		var ids = [];
// 		var k1 = toArray($('#keys1').val());
// 		var k2 = toArray($('#keys2').val());
// 		var k3 = toArray($('#keys3').val());
// 		var broad = $('input[name^="isbroad"]:checked');
// 		var match = $('input[name^=match_type]:checked').val().is('broad_plus');
// console.log(match);
// 		//チェックされているIDを抽出
// 		broad.each(function(){
// 			ids.push($(this).attr('id'));
// 		});
// 		//絞込み該当グループに '+ 'をアタマに追加
// 		if($.inArray('A', ids)!== -1){
// 			k1 = $.map(k1, function(n, i){
// 				return ' +'+n;
// 			});
// 		}
// 		if($.inArray('B', ids)!== -1){
// 			k2 = $.map(k2, function(n, i){
// 				return ' +'+n;
// 			});
// 		}
// 		if($.inArray('C', ids)!== -1){
// 			k3 = $.map(k3, function(n, i){
// 				return ' +'+n;
// 			});
// 		}
// 		$('#keys1+span>span').text(k1.length);
// 		$('#keys2+span>span').text(k2.length);
// 		$('#keys3+span>span').text(k3.length);
//
// 		var keywords = crossKeywords(k1, k2, k3);
// 		$('#result+span>span').text(keywords.length);
// 		keywords = keywords.join();
// 		keywords = keywords.replace(/\,/g, '\n');
// 		$('#result').val(keywords);
// 	});
//
//
// });

</script>

</body>
</html>
