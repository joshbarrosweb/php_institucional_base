$(function(){

	var open = true;
	var windowSize = $(window)[0].innerWidth;

	var targetSizeMenu = (windowSize < 400) ? 200 : 300;

	if(windowSize <= 768){
		$('.menu').css('width','0').css('padding','0');
		open = false;
	}

	$('.menu-btn').click(function(){
		if(open){
			$('.menu').animate({'width':0,'padding':0},function(){
				open = false;
			});
			$('.content,header').css('width','100%');
			$('.content,header').animate({'left':0},function(){
				open = false;
			});
		}else{
			$('.menu').css('display','block');
			$('.menu').animate({'width':targetSizeMenu+'px','padding':'10px'},function(){
				open = true;
			});
			$('.content,header').css('width','calc(100% - 300px)');
			$('.content,header').animate({'left':'300px'},function(){
				open = true;
			});

		}
	})

	$('[formato=data]').mask('99/99/9999');

	$('[actionBtn=delete]').click(function(){
		var r = confirm("Deseja excluir o depoimento?");
		if (r == true) {
			return true;
		} else {
			return false;
		}
	})
})