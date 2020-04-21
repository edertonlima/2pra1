jQuery(document).ready(function($) {

	$('.load-more').click(function(){

		$(this).html('<i class="fas fa-circle-notch fa-spin"></i> mais');

		post_type = $(this).attr('var-post-type');
		paged = parseInt($(this).attr('var-paged'));
		category = parseInt($(this).attr('var-category'));
		taxonomy = $(this).attr('var-taxonomy');
		pesquisa = $(this).attr('var-pesquisa');
		not_category = $(this).attr('var-not-category');

		//alert(taxonomy);

		$.ajax({
			url: $(this).attr('var-url'),//ajaxurl,
			type: 'POST',
			data: {
				'action': 'load_more', // Ação do Ajax
				'post-type': post_type,
				'category': category,
				'taxonomy': taxonomy,
				'paged': paged,
				'pesquisa': pesquisa,
				'not_category': not_category
			},
			success: function( response ){
				max_paged = response.split('max_paged').pop();
				loopHTML  = response.split('max_paged').shift();

				if(paged == max_paged){
					$('.load-more').hide();
				}else{

					paged = paged + 1;
					$('.load-more').attr('var-paged' , paged);
					$('.load-more').attr('var-max-paged' , max_paged);

				}

				$('.row-load-more').append(loopHTML);
				$('.projetos .article').height(proj_height);
				$('.load-more').html('mais');
			},
			
			error: function(){

				$('.row-load-more').append('<div class="col-12 center margin-top-2x"><p>Desculpa, não conseguimos trazer mais conteúdo.</p></div>');
				$('.load-more').html('mais');
				$('.load-more').hide();

			}
		});

	});

});	