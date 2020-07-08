$(function(){
	$('nav.mobile').click(function(){
		var listaMenu = $('nav.mobile ul');
			/*
			if(listaMenu.is(':hidden') == true)
			listaMenu.fadeIn();
		else
			listaMenu.fadeOut();*/

		/*if(listaMenu.is(':hidden') == true){
			//listaMenu.show();
			listaMenu.css('display','block');
		}
		else{
			//listaMenu.hide();
			listaMenu.css('display','none');
		}
		*/
		if(listaMenu.is(':hidden') == true){
			//fa fa-times
			//fa fa-bars

			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-bars');
			icone.addClass('fa-times');
			listaMenu.slideToggle();
		}
		else{
			//listaMenu.hide();
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-times');
			icone.addClass('fa-bars');
			listaMenu.slideToggle();
		}
	});

	if($('target').length > 0){
		var elemento = '#'+$('target').attr('target');
		var divScroll = $(elemento).offset().top;
		$('html,body').animate({'scrollTop':divScroll},2000);
	}

	carregarDinamico();
	function carregarDinamico(){
		$('[realtime]').click(function(){
			var pagina = $(this).attr('realtime');
			$('.container-principal').hide();
			$('.container-principal').load(include_path+'pages/'+pagina+'.php');
			
			setTimeout(function(){
				initialize();
				addMarker(-22.912869, -43.228963, '', "Encontre-nos!", undefined, false)
			}, 1000);

			$('.container-principal').fadeIn(1000);
			window.history.pushState('','',pagina);
			return false;
		})
	}
})