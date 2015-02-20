function toArray(key){
	key = key.replace(/\n|\r|\r\n/, '\n');
	key = key.split('\n');
	return key;
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

		console.log(d_id);
		
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
		var k1 = $('#keys1').val();
		k1 = k1.replace(/\n|\r|\r\n/, '\n');
		var k2 = $('#keys2').val();
		var k3 = $('#keys3').val();

		

//		var keyword = 
	});


});
