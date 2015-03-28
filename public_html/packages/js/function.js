function toArray(key){
	key = key.replace(/\n|\r|\r\n/, '\n');
	key = key.split('\n');
	if(key[(key.length -1)]==''){ key.pop(); }
	return key;
}

function crossKeywords(k1, k2, k3){
	var a = k1.length; var b = k2.length; var c = k3.length;
	var keywords = [];

	for(var i=0; i<a; i++){
		for(var j=0; j<b; j++){
			for(var t=0; t<c; t++){
				keywords.push(k1[i]+" "+k2[j]+" "+k3[t]);
			}
		}
	}
	return keywords;
}

function titleGenerator(word, phrase){
	var a = word.length; var b = phrase.length;
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
console.log(titles);
	return titles;
}


function formValidator(){

}



$(function(){

	//function setNum()
	$('td[class^="ad_ads_title"] > input:text').on('keypress', function(){
		var num = $(this).val().length;
		$(this).closest('td').next().text(num);
		$(this).closest('tr').find('input:hidden').val(num);
	});

	//function addForm()
	$('#third #title_generator p.add_btn').on('click', function(){
		var tb = $(this).closest('thead').next('tbody');
		var d_id = tb.children().filter('tr:last').data('id');
		var class_name = tb.children('tr').find('td').attr('class');

		var newtr = tb.children().filter('tr:last').clone(true);
		newtr = newtr.data('tr', 'id', (d_id+1));
		newtr.appendTo(tb);
	});

	//function deleteForm()
	$('span.del_btn').on('click', function(){
		var tr = $(this).closest('tr');
		tr.slideUp();
		tr.remove();
	});

// 	//function insWord()
// 	$('span.ins_btn').on('click', function(){
// // 		var it = document.focus();
// // console.log(it);
// 		$('input.ad_ads_title').selection('insert', {
// 				text: '{{WORD}}',
// 				mode: 'after'
// 		});
// 	});


	function insert(text){
var str = text;
//テキストエリア位置取得
document.getElementById("phrase").focus();
var selection = document.selection.createRange();
//テキストエリアの位置に取得した内容をセット
selection.text = str+selection.text;
}

$('span.ins_btn').on('click', function(){
	console.log('ins');
	insert('{{WORD}}');
});




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
		var word = []; var phrase = [];
		$('input[name^="ad_ads_title_word"]').each(function(){
			word.push($(this).val());
		});
		$('input[name^="ad_ads_title_phrase"]').each(function(){
			phrase.push($(this).val());
		});

		var titles = titleGenerator(word, phrase);
		var ttl = "<tr><td></td><td></td><td></td></tr>";
console.log(titles);
		for(i=0; i<titles.length; i++){
			$('tbody.ad_ads_titles').append('<tr></tr>');
			var T = $('<input>').attr({
				type: 'text',
				name: 'ad_ads_title[]',
				value: titles[i]
			});
			$('tbody.ad_ads_titles tr:last').append(T);
			var N = $('<input>').attr({
				type: 'hidden',
				name: 'title_num[]',
				value: titles[i].length
			});
			$('tbody.ad_ads_titles tr:last').append(N);

			T.wrap(function(){
				return '<td colspan="3"></td>';
			});
			N.wrap(function(){
				return '<td>'+titles[i].length+'</td>';
			});
//			$('tbody.ad_ads_titles td').wrapAll('<tr />');
//			TN.wrap('<tr></tr>').appendTo('tbody.ad_ads_titles');
//			$('tbody.ad_ads_titles').append(TN);
		}

	});


	//function corossKeyword
	$('button[name="crossing_keyword"]').on('click', function(){
		var k1 = toArray($('#keys1').val());
		var k2 = toArray($('#keys2').val());
		var k3 = toArray($('#keys3').val());
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
