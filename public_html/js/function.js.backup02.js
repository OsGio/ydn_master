function toArray(key){
	key = key.replace(/\n|\r|\r\n/, '\n');
	key = key.split('\n');
	if(key[(key.length -1)]==''){ key.pop(); }
	return key;
}

function crossKeywords(k1, k2, k3){
	var a = k1.length; var b = k2.length; var c = k3.length;
//console.log(a);console.log(b);console.log(c);
	var keywords = [];

	for(var i=0; i<3; i++){
		for(var j=0; j<3; j++){
			for(var t=0; t<3; t++){
				//keywords.push(k1[i]+" "+k2[j]+" "+k3[t]);
				console.log(k3[t]);
			}
			console.log(k2[j]);
		}
	}
console.log(keywords);

	return keywords;
}


$(function(){

	//function setNum()
	$('td[class="ad_ads_title"] > input:text').on('keypress', function(){
		var num = $(this).val().length;
		$(this).closest('td').next().text(num);
		$(this).closest('tr').find('input:hidden').val(num);
	});

	//function addForm()
	$('p').data('role', 'add_btn').on('click', function(){
		var tb = $(this).closest('thead').next('tbody');
		var d_id = tb.children().filter('tr:last').data('id');
		var class_name = tb.children('tr').find('td').attr('class');

//console.log(d_id);
		
		var newtr = tb.children().filter('tr:last').clone(true);
//console.log(newtr.data('id'));		
		newtr.data('id', (d_id+1));
		newtr.appendTo(tb);
		//newtr.data('id', (d_id+1));
		//console.log(newtr);
		//newtr.clone(true).appendTo(tb);	
//console.log(newtr.data('id'));


	});

	//function encodedKeyword
	$('#second span.encode_btn').on('click', function(){
		var txt = $('#result').val();
		txt = txt.replace(' ', '');
		txt = txt.replace(/\n|\r|\r\n/g, '\n');
		txt = txt.split(/\n/);
		txt = encodeURI(txt);

		var enc_txt = txt.replace(/\,/g, '\n');
		console.log(txt);

		$('#encode').val(enc_txt);
	});

	//function corossKeyword
	$('button[name="crossing_keyword"]').on('click', function(){
		var k1 = toArray($('#keys1').val());
		var k2 = toArray($('#keys2').val());
		var k3 = toArray($('#keys3').val());
console.log(k1);console.log(k2);console.log(k3);
		var keywords = crossKeywords(k1, k2, k3);
console.log(keywords);
		

	});


});
