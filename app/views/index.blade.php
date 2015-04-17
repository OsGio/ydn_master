@extends('layouts.master')

@section('content')
{{ Form::open(array('method' => 'post', 'url' => ' ')) }}
<section class="col-sm-12">
	<div class="page-header">
        <h3>新規キャンペーン出稿</h3>
    </div>
		<strong style="color:red;"></strong>
	<div id="first" class="col-md-12 col-lg-12">

	<div id="campaign" class="panel panel-default col-sm-5">
		<div class="panel-heading">キャンペーン<strong style="color:red;"></strong></div>
		<div class="panel-body">
			<div class="form-group">
				<fieldset class="form-horizontal">
					<label for="campaign_name" class="col-sm-4 control-label">キャンペーン名</label>
					<div class="col-sm-8">
						<div class="input-group">
							<input type="text" class="form-control counted" id="campaign_name" name="campaign_name" placeholder="キャンペーン名" data-max-input-length="50" value="" required="">
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
								<th class="col-sm-12 text-left" colspan="3">マッチタイプ / 表示URL接尾辞</th>
							</tr>
							<tr>
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
							<!-- </tr>
							<tr> -->
					{{--
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
					--}}
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

<section class="col-sm-12">
		<div class="page-header col-md-12 col-lg-12">
			<h4>広告設定</h4>
		</div><!-- /.page-header -->


		<div id="third" class="col-md-12 col-lg-12">
			<div class="col-sm-12">
				<div id="title_generator" class="panel panel-default">
					<div class="panel-heading">
						広告タイトルパターン生成
							<span class="btn btn-info btn-sm ins_btn">@{{WORD}}</span><span>挿入ボタン</span>
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
															{{Form::text('ad_ads_title_word[]', '', array('class' => 'ad_ads_title_word form-control counted', 'data-role' => 'word'))}}
															<span><span class="count">0</span>/15</span><span class="del_btn btn btn-sm btn-danger"><b>x</b></span>
															{{Form::hidden('title_word_num[]', '0', array('class' => 'title_word_num', 'data-role' => 'word'))}}
														</div>
													</div>
													<div class="tab-pane fade" id="tab2">
														{{Form::textarea('ad_ads_title_word[]', '', array('class' => 'ad_ads_title_word form-control', 'id' => 'ad_ads_title_text', 'data-role' => 'word'))}}
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
														{{Form::text('ad_ads_title_phrase[]', '', array('id' => 'ad_ads_title_phrase', 'class' => 'ad_ads_title_phrase form-control counted', 'data-role' => 'phrase'))}}
														<span><span class="count">0</span>/15</span><span class="del_btn btn btn-sm btn-danger"><b>x</b></span>
														{{Form::hidden('title_phrase_num[]', '0', array('class' => 'title_phrase_num', 'data-role' => 'phrase'))}}
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
											<!-- <td class="ad_ads_title" colspan="3">{{Form::text('ad_ads_title[]', '', array('class' => 'as_ads_title'))}}</td><td class="title_num"></td>{{Form::hidden('title_num[]', '0', array('class' => 'title_num'))}} -->
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
					広告追加
						{{Form::button('+', array('class' => 'btn btn-sm btn-primary ads_plus'))}}
						<span class="btn btn-info btn-sm ins_btn">@{{WORD}}</span><span>挿入ボタン</span>
				</div>
				<div class="panel-body">
					<fieldset class="form-horizontal ad_ads_field">
						<div class="form-group">
							<label class="control-label col-sm-4">広告名</label>
							<div class="col-sm-8">
								<div class="input-group"><input class="form-control counted" type="text" name="ad_ads_name" data-max-input-length="50" data-check-text="yss"><span class="input-group-addon"><span class="count">0</span>/50</span></div><span class="help_nomargin"></span>
							</div>
						</div>
{{--
						<div class="form-group">
							<label class="control-label col-sm-4">広告タイトル</label>
							<div class="col-sm-8">
								<div class="input-group"><input class="form-control counted" type="text" name="ad_ads_title" data-max-input-length="15" data-change-insertion="true" data-check-text="yss"><span class="input-group-addon"><span class="count">0</span>/15</span></div><span class="help_nomargin"></span>
							</div>
						</div>
--}}
						<div class="form-group">
							<label class="control-label col-sm-4">説明文1</label>
							<div class="col-sm-8">
								<div class="input-group"><input id="ad_ads_note01" class="form-control counted" type="text" name="ad_ads_note01" data-max-input-length="19" data-change-insertion="true" data-check-text="yss"><span class="input-group-addon"><span class="count">0</span>/19</span></div><span class="help_nomargin"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">説明文2</label>
							<div class="col-sm-8">
								<div class="input-group"><input id="ad_ads_note02" class="form-control counted" type="text" name="ad_ads_note02" data-max-input-length="19" data-change-insertion="true" data-check-text="yss"><span class="input-group-addon"><span class="count">0</span>/19</span></div><span class="help_nomargin"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">表示URL</label>
							<div class="col-sm-8">
								<div class="input-group"><input class="form-control counted" type="text" name="ad_ads_display_url" data-max-input-length="29"><span class="input-group-addon"><span class="count">0</span>/29</span></div><span class="help_nomargin"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">リンク先URL</label>
							<div class="col-sm-8">
								<div class="input-group"><input class="form-control counted" type="text" name="ad_ads_link_url" data-max-input-length="1024"><span class="input-group-addon"><span class="count">0</span>/1024</span></div><span class="help_nomargin"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
								<input type="hidden" name="ad_ads_listing_type" value="y">
							</div>
						</div>
					</fieldset>
				{{--
					<div class="col-sm-offset-4 col-sm-8">
						<button id="add_ads_btn" class="btn btn-primary" type="button" name="ad_ads_data">広告追加</button>
					</div>
				--}}
					<script>
						ads_data_list = [];
					</script>
				</div>
			</div>
		</div>
	</div><!-- /#fourth -->
</section>

{{--
		<div class="col-sm-4">
			<div class="panel panel-default ads_pattern">
				<div class="panel-heading">キーワード自動挿入機能</div>
				<div class="panel-body">
					<button class="btn btn-info" type="button" name="insertion_keyword" data-ads_pattern="{KEYWORD:}">キーワード自動挿入 {KEYWORD:}</button>
				</div>
			</div>
			<div class="panel panel-default ads_pattern">
				<div class="panel-heading">
					<div class="form-inline">
						広告文補助機能
						<select id="ads_pattern_select_menu" class="form-control"><option values="数字">数字</option><option values="疑問文">疑問文</option><option values="感嘆符（！、？）">感嘆符（！、？）</option><option values="擬声語">擬声語</option><option values="ボリューム感">ボリューム感</option><option values="焦燥感">焦燥感</option>
							<option values="緊張感">緊張感</option><option values="信頼感">信頼感</option><option values="割安感">割安感</option><option values="クオリティー">クオリティー</option><option values="斬新性">斬新性</option><option values="利便性">利便性</option><option values="専門性">専門性</option>
							<option values="希少性">希少性</option><option values="心地良さ">心地良さ</option><option values="命令形で">命令形で</option><option values="危機感">危機感</option><option values="メソッド">メソッド</option><option values="タイムリー">タイムリー</option><option values="ポジティブ">ポジティブ</option>
							<option values="ネガティブ">ネガティブ</option><option values="手軽感">手軽感</option><option values="理想形">理想形</option><option values="ランキング">ランキング</option><option values="呼びかけ">呼びかけ</option><option values="時代性">時代性</option><option values="対応策">対応策</option>
							<option values="弱みを強みに">弱みを強みに</option><option values="メリット">メリット</option><option values="実は">実は</option><option values="共感形">共感形</option><option values="勧誘形">勧誘形</option><option values="敵・味方を作る">敵・味方を作る</option><option values="有名人のセリフ">有名人のセリフ</option>
							<option values="安心感">安心感</option><option values="クイズ形式">クイズ形式</option><option values="特定する">特定する</option><option values="禁止する">禁止する</option><option values="決意させる">決意させる</option><option values="結論から">結論から</option><option values="怒り">怒り</option>
							<option values="誇張形">誇張形</option><option values="ニュース">ニュース</option><option values="エピソード">エピソード</option><option values="理由を書く">理由を書く</option><option values="想像させる">想像させる</option><option values="情景">情景</option><option values="統計データ">統計データ</option>
							<option values="リピート">リピート</option><option values="権威性">権威性</option></select>
					</div>
				</div>
				<div class="panel-body">
					<ul class="ads_pattern_list">
						<li><button class="btn btn-info" type="button" data-ads_pattern="９０％が満足！">（例）９０％が満足！</button></li>
						<li><button class="btn btn-info" type="button" data-ads_pattern="たった５分で！">（例）たった５分で！</button></li>
						<li><button class="btn btn-info" type="button" data-ads_pattern="なんと１万円！">（例）なんと１万円！</button></li>
					</ul>
				</div>
			</div>
		</div>
--}}


	<div class="err_msg">

	</div>
	{{Form::submit('出力', array('class' => 'btn btn-large btn-primary', 'id' => 'postPreview'))}}
{{Form::close()}}
@stop

@section('foot')
<script charset="utf-8" type="text/javascript">
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

function deleteForm(){
	var forms = $(this).parent('div.forms');
	var tb = $(this).closest('tbody');
	if(tb.find('div.forms').length > 1){
		forms.slideUp();
		forms.remove();
	}
}


$(function(){

	var ins_id;
	var cnt = 0;

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

	//function insBtn
	$('input').on('focus', function(){
		ins_id = $(this).attr('id');
	});
	$('span.ins_btn').on('click', function(e){
		e.preventDefault();
		$('input[id="'+ins_id+'"]').selection('replace', {text: '\{\{WORD\}\}'});
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
		cnt++;
		if($(this).data('id')=='word'){
			var tb = $(this).closest('thead').next('tbody');
			var forms = $('#tab1 > .forms').last();
			forms = forms.clone(true);

			$('#tab1').append(forms);
		}
		else if($(this).data('id')=='phrase'){
			var tb = $(this).closest('thead').next('tbody');
			var forms = $('#tab3 > .forms').last();
			forms = forms.clone(true);
			forms.find('input').attr('id', 'ad_ads_title_phrase'+cnt);

			$('#tab3').append(forms);

			// var d_id = tb.children().filter('tr:last').data('id');
			// var class_name = tb.children('tr').find('td').attr('class');
			//
			// var newtr = tb.children().filter('tr:last').clone(true);
			// newtr = newtr.data('tr', 'id', (d_id+1));
			// newtr.appendTo(tb);
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
	$('tbody.ad_ads_titles').on('click', 'span', function(){
		var forms = $(this).parent('div.forms');
		var td = forms.parent();
		var tr = td.parent();
		var tb = $(this).closest('tbody');
		if(tb.find('div.forms').length > 1){
			tr.slideUp();
			tr.remove();
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
		if($('li.active > a').attr('href')=='#tab1'){
			$('input[name^="ad_ads_title_word"]:text').each(function(){
				word.push($(this).val());
				validator($(this));
			});
			var title = word;
		}else{
			// $('textarea[name^="ad_ads_title_word"]').each(function(){
			// 	word.push($(this).val());
			// 	validator($(this));
			// });

		//for Textarea
		var txt = $('#ad_ads_title_text').val();
		txt = toArray(txt);
		var title = $.merge(word, txt);
		}

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
			//$('<span class="del_btn btn btn-danger btn-sm" onClick="deleteForm();">x</span>').insertAfter(T);
			$('<span class="del_btn btn btn-danger btn-sm">x</span>').insertAfter(T);
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

</script>

@stop
