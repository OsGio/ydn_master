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
				var title = phrase[i].replace(/\{\{WORD\}\}/, word[j]);
				titles.push(title);
			}
		}else{
			titles.push(phrase[i]);
		}
	}
console.log(titles);
	return titles;
}



$(function(){

	//function setNum()
	$('td[class^="ad_ads_title"] > input:text').on('keypress', function(){
		var num = $(this).val().length;
		$(this).closest('td').next().text(num);
		$(this).closest('tr').find('input:hidden').val(num);
	});

	//function addForm()
	$('p').data('role', 'add_btn').on('click', function(){
		var tb = $(this).closest('thead').next('tbody');
		var d_id = tb.children().filter('tr:last').data('id');
		var class_name = tb.children('tr').find('td').attr('class');

		var newtr = tb.children().filter('tr:last').clone(true);
		newtr = newtr.data('tr', 'id', (d_id+1));
		newtr.appendTo(tb);
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
	$('p').data('role', 'generate').on('click', function(){
		var word = []; var phrase = [];
		$('input[name^="ad_ads_title_word"]').each(function(){
			word.push($(this).val());
		});
		$('input[name^="ad_ads_title_phrase"]').each(function(){
			phrase.push($(this).val());
		});

		var title = titleGenerator(word, phrase);
console.log(title);

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
