$(function(){
	$('td[class^="ad_ads_title"] > :text').on('keyup', function(){
		var num = $(this).val().length;
		var d_id = $('td[class^="ad_ads_title"]').data('id');
		$('td[class^="title_num"]').text(num);
		$('input[class^="title_num"]').val(num);


		console.log(d_id);

	});
});





function test(){
	console.log('test');
}
