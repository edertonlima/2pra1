<?php
/**
 * @package WordPress
 * @subpackage My Web
 * @since My web Site 1.0
 **
 */



/* HABILITAR / DESABILITAR */
// -- * adicionar 
add_theme_support( 'post-thumbnails' );

add_post_type_support( 'post', 'excerpt' );

add_post_type_support( 'page', 'excerpt' );


// remove itens padrões
remove_post_type_support('page', 'editor');
remove_post_type_support( 'page', 'thumbnail' );


add_action( 'init', 'my_custom_init' );
function my_custom_init() {
	//remove_post_type_support( 'post', 'editor' );
	remove_post_type_support('page', 'editor');
	//remove_post_type_support( 'page', 'thumbnail' );
}



// Remove tags
/*function myprefix_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'myprefix_unregister_tags');*/


/* MENUS */
add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'header' ) );
}

/* ADICIONA CLASSE */
add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'page' ) );
} );


// ENCURTADOR DE URL
function gera_url_encurtada($url){
    $url = urlencode($url);
    $xml =  simplexml_load_file("http://migre.me/api.xml?url=$url");
 
    if($xml->error != 0){
        return $xml->errormessage;
    }
    else{
        return $xml->migre;
    }
}


// SIZE IMAGES MIDIA
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'slide', 1440, 450, true ); // (cropped)
    add_image_size( 'slide-funcionamiento', 580, 440, true ); // (cropped)
    add_image_size( 'detalhe-page', 1440, 600, true ); // (cropped)
    add_image_size( 'detalhe-post', 1200, 600, true ); // (cropped)
    
    add_image_size( 'wide-post', 560, 244, true ); // (cropped)
    add_image_size( 'galeria-post', 560, 317, true ); // (cropped)
    add_image_size( 'list-post', 360, 246, true ); // (cropped)
}


function custom_short_excerpt($excerpt){
	$limit = 260;

	if (strlen($excerpt) > $limit) {
		$excerpt = substr($excerpt, 0, strpos($excerpt, ' ', $limit));
		return $excerpt.' […]';
	}

	return $excerpt;
}

add_filter('the_excerpt', 'custom_short_excerpt');



/* BLOQUERAR TAMANHO MINIMO DA IMAGEM EM DESTAQUE */
/*
add_action('transition_post_status', 'check_featured_image_size_after_save', 10, 3);

function check_featured_image_size_after_save($new_status, $old_status, $post){
  $run_on_statuses = array('publish', 'pending', 'future');
  if(!in_array($new_status, $run_on_statuses))
    return;

  $post_id = $post->ID;
  if ( wp_is_post_revision( $post_id ) )
    return; //not sure about this.. but apparently save is called twice when this happens

  $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), "Full" );
  if(!$image_data)
    return; //separate message if no image at all. (I use a plugin for this)

  $image_width = $image_data[1];
  $image_height = $image_data[2];

  // replace with your requirements.
  $min_width = 1200;
  $min_height = 460;
  if($image_width < $min_width || $image_height < $min_height){
    // Being safe, honestly $old_status shouldn't be in $run_on_statuses... it wouldn't save the first time!
    $reverted_status = in_array($old_status, $run_on_statuses) ? 'draft' : $old_status;
    wp_update_post(array(
      'ID' => $post_id,
      'post_status' => $reverted_status,
    ));
    $back_link = admin_url("post.php?post=$post_id&action=edit");
    wp_die("Featured Image not large enough, must be at least ${min_width}x$min_height. Reverting status to '$reverted_status'.<br><br><a href='$back_link'>Go Back</a>");
  }
}*/


 /*

// muda nome post
function change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';
    $submenu['edit.php'][5][0] = 'Todos os posts';
    $submenu['edit.php'][10][0] = 'Adicionar post';
    echo '';
}
function change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Blog';
    $labels->singular_name = 'Blog';
    $labels->add_new = 'Adicionar post';
    $labels->add_new_item = 'Adicionar post';
    $labels->edit_item = 'Editar post';
    $labels->new_item = 'Post';
    $labels->view_item = 'Ver post';
    $labels->search_items = 'Buscar post';
    $labels->not_found = 'Nenhum post encontrado';
    $labels->not_found_in_trash = 'Nenhum post encontrado na lixeira';
    $labels->all_items = 'Todos os posts';
    $labels->menu_name = 'Blog';
    $labels->name_admin_bar = 'Blog';
}
 
add_action( 'admin_menu', 'change_post_label' );
add_action( 'init', 'change_post_object' );
*/

/* PAGINAS CONFIGURAÇÕES */ 
if( function_exists('acf_add_options_page') ) {

	/*acf_add_options_page(array(
		'page_title' 	=> 'Slide Home',
		'menu_title'	=> 'Slide Home',
		'menu_slug' 	=> 'slide-home',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' 		=> 'dashicons-admin-collapse'
	));*/

	/*acf_add_options_page(array(
		'page_title' 	=> 'Formulários',
		'menu_title'	=> 'Formulários',
		'menu_slug' 	=> 'formularios',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' 		=> 'dashicons-admin-comments'
	));*/
	
	acf_add_options_page(array(
		'page_title' 	=> 'Configurações',
		'menu_title'	=> 'Configurações',
		'menu_slug' 	=> 'configuracoes',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Geral',
		'menu_title'	=> 'Geral',
		'parent_slug'	=> 'configuracoes',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Redes Sociais',
		'menu_title'	=> 'Redes Sociais',
		'parent_slug'	=> 'configuracoes',
	));

	/*acf_add_options_sub_page(array(
		'page_title' 	=> 'Projetos',
		'menu_title'	=> 'Projetos',
		'parent_slug'	=> 'configuracoes-geral',
	));*/
}

/* PAGINAÇÃO */
function paginacao() {
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_next' => false,
            'type'  => 'array',
            'prev_next'   => TRUE,
			'prev_text'    => __('<i class="fa fa-2x fa-angle-left"></i>'),
			'next_text'    => __('<i class="fa fa-2x fa-angle-right"></i>'),
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<ul class="paginacao">';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul>';
        }
}

// NOVOS POST TYPES 

// SERVICIOS
add_action( 'init', 'post_type_servicios' );
function post_type_servicios() {

	$labels = array(
	    'name' => _x('Servicios', 'post type general name'),
	    'singular_name' => _x('Servicio', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'Post'),
	    'add_new_item' => __('Addicionar novo Post'),
	    'edit_item' => __('Editar Post'),
	    'new_item' => __('Novo Post'),
	    'all_items' => __('Todos as Posts'),
	    'view_item' => __('Visualizar Post'),
	    'search_items' => __('Procurar Post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Servicios'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,
	    'rewrite' => true,
	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => false,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-businessperson',
	    'supports' => array('title','thumbnail','excerpt')
	  );

    register_post_type( 'servicios', $args );
}


// PROYECTOS
add_action( 'init', 'create_post_type_proyectos' );
function create_post_type_proyectos() {

	$labels = array(
	    'name' => _x('Proyectos', 'post type general name'),
	    'singular_name' => _x('Proyectos', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'Proyecto'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo Proyecto'),
	    'all_items' => __('Todos as Proyectos'),
	    'view_item' => __('Visualizar proyecto'),
	    'search_items' => __('Procurar Proyecto'),
	    'not_found' =>  __('Nenhum proyecto encontrado.'),
	    'not_found_in_trash' => __('Nenhum proyecto encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Proyectos'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'proyectos',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%categoria_proyectos%/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-tag',
	    'supports' => array('title','excerpt','editor','thumbnail')
	  );

    register_post_type( 'proyectos', $args );
}

add_action( 'init', 'create_taxonomy_categoria_proyectos' );
function create_taxonomy_categoria_proyectos() {

	$labels = array(
	    'name' => _x( 'Categoria', 'taxonomy general name' ),
	    'singular_name' => _x( 'Categoria', 'taxonomy singular name' ),
	    'search_items' =>  __( 'Procurar categoria' ),
	    'all_items' => __( 'Todas as categorias' ),
	    'parent_item' => __( 'Categoria pai' ),
	    'parent_item_colon' => __( 'Categoria pai:' ),
	    'edit_item' => __( 'Editar categoria' ),
	    'update_item' => __( 'Atualizar categoria' ),
	    'add_new_item' => __( 'Adicionar nova categoria' ),
	    'new_item_name' => __( 'Nova categoria' ),
	    'menu_name' => __( 'Categoria' ),
	);

    register_taxonomy( 'categoria_proyectos', array( 'proyectos' ), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_tag_cloud' => true,
        'query_var' => true,
		'rewrite' => array(
		    'slug' => 'proyectos',
		    'with_front' => true,
			)
        )
    );
}

/*
// Aporte a la Sociedad
add_action( 'init', 'create_post_type_aporte' );
function create_post_type_aporte() {

	$labels = array(
	    'name' => _x('Aporte a la Sociedad'),
	    'singular_name' => _x('Aporte a la Sociedad'),
	    'add_new' => _x('Adicionar novo'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo'),
	    'all_items' => __('Visualizar Todos'),
	    'view_item' => __('Visualizar'),
	    'search_items' => __('Procurar'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Aporte a la Sociedad'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'aporte-a-la-sociedad',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%categoria_aporte%/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-tag',
	    'supports' => array('title','excerpt','editor','thumbnail')
	  );

    register_post_type( 'aporte-a-la-sociedad', $args );
}

add_action( 'init', 'create_taxonomy_categoria_aporte' );
function create_taxonomy_categoria_aporte() {

	$labels = array(
	    'name' => _x( 'Categoria', 'taxonomy general name' ),
	    'singular_name' => _x( 'Categoria', 'taxonomy singular name' ),
	    'search_items' =>  __( 'Procurar categoria' ),
	    'all_items' => __( 'Todas as categorias' ),
	    'parent_item' => __( 'Categoria pai' ),
	    'parent_item_colon' => __( 'Categoria pai:' ),
	    'edit_item' => __( 'Editar categoria' ),
	    'update_item' => __( 'Atualizar categoria' ),
	    'add_new_item' => __( 'Adicionar nova categoria' ),
	    'new_item_name' => __( 'Nova categoria' ),
	    'menu_name' => __( 'Categoria' ),
	);

    register_taxonomy( 'categoria_aporte', array( 'aporte-a-la-sociedad' ), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_tag_cloud' => true,
        'query_var' => true,
		'rewrite' => array(
		    'slug' => 'aporte-a-la-sociedad',
		    'with_front' => true,
			)
        )
    );
}*/



// FUNCIONAMIENTO
add_action( 'init', 'create_post_type_funcionamiento' );
function create_post_type_funcionamiento() {

	$labels = array(
	    'name' => _x('Funcionamiento', 'post type general name'),
	    'singular_name' => _x('Funcionamiento', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'Funcionamiento'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo'),
	    'all_items' => __('Todos as Post'),
	    'view_item' => __('Visualizar'),
	    'search_items' => __('Procurar'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Funcionamiento'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'funcionamiento',
			"with_front" => true,
		],

		//"cptp_permalink_structure" => "/%postname%/",
		"cptp_permalink_structure" => "/%categoria_funcionamiento%/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-tag',
	    'supports' => array('title','excerpt','thumbnail')
	  );

    register_post_type( 'funcionamiento', $args );
}

add_action( 'init', 'create_taxonomy_categoria_funcionamiento' );
function create_taxonomy_categoria_funcionamiento() {

	$labels = array(
	    'name' => _x( 'Categoria', 'taxonomy general name' ),
	    'singular_name' => _x( 'Categoria', 'taxonomy singular name' ),
	    'search_items' =>  __( 'Procurar categoria' ),
	    'all_items' => __( 'Todas as categorias' ),
	    'parent_item' => __( 'Categoria pai' ),
	    'parent_item_colon' => __( 'Categoria pai:' ),
	    'edit_item' => __( 'Editar categoria' ),
	    'update_item' => __( 'Atualizar categoria' ),
	    'add_new_item' => __( 'Adicionar nova categoria' ),
	    'new_item_name' => __( 'Nova categoria' ),
	    'menu_name' => __( 'Categoria' ),
	);

    register_taxonomy( 'categoria_funcionamiento', array( 'funcionamiento' ), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_tag_cloud' => true,
        'query_var' => true,
		'rewrite' => array(
		    'slug' => 'funcionamiento',
		    'with_front' => true,
			)
        )
    );
}


$producao = false;
if($producao){
	add_action('admin_head', 'my_custom_fonts');

	function my_custom_fonts() {
	  echo '<style>
		#menu-media, #menu-comments, /*#menu-appearance, #menu-plugins, */#menu-tools, #menu-settings, #toplevel_page_edit-post_type-acf, #toplevel_page_edit-post_type-acf-field-group, 
		#toplevel_page_zilla-likes, 
		#screen-options-link-wrap, 
		.acf-postbox h2 a, 
		#the-list #post-94, 
		#the-list #post-65, 
		#commentstatusdiv, 
		#commentsdiv, 
		#toplevel_page_wpglobus_options, 
		.taxonomy-category .form-field.term-parent-wrap, 
		.wp-menu-separator, 
		#menu-appearance li:nth-child(1), 
		#menu-appearance li:nth-child(2), 
		#menu-appearance li:nth-child(3) 
		{
			display: none!important;
		}
	  </style>';

	  echo '
		<script type="text/javascript">
			jQuery.noConflict();

			jQuery("document").ready(function(){
				jQuery("#menu-media").remove();
				jQuery("#menu-comments").remove();
				/*jQuery("#menu-appearance").remove();
				jQuery("#menu-plugins").remove();*/
				jQuery("#menu-tools").remove();
				jQuery("#menu-settings").remove();
				jQuery("#toplevel_page_edit-post_type-acf").remove();
				jQuery("#toplevel_page_edit-post_type-acf-field-group").remove();
				jQuery("#toplevel_page_zilla-likes").html("");
				jQuery(".taxonomy-category .form-field.term-parent-wrap").remove();
				jQuery(".wp-menu-separator").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(1)").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(3)").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(4)").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(5)").remove();
				jQuery("#toplevel_page_wpglobus_options").remove();
				jQuery("#commentstatusdiv").remove();
				jQuery("#commentsdiv").remove();

				jQuery(".user-rich-editing-wrap").remove();
				jQuery(".user-admin-color-wrap").remove();
				jQuery(".user-comment-shortcuts-wrap").remove();
				jQuery(".user-admin-bar-front-wrap").remove();
				jQuery(".user-language-wrap").remove();

				jQuery("#toplevel_page_delete_all_posts").detach().insertBefore("#toplevel_page_pmxi-admin-home");
				jQuery("#toplevel_page_delete_all_posts .wp-menu-name").html("Apagar Lojas");
				jQuery("#toplevel_page_delete_all_posts .wp-first-item .wp-first-item").html("Apagar Todas");
				jQuery("#toplevel_page_delete_all_posts ul").remove();

				jQuery("#menu-appearance li:nth-child(1)").remove();
				//jQuery("#menu-appearance li:nth-child(2)").remove();
				//jQuery("#menu-appearance li:nth-child(3)").remove();
			});
		</script>
	  ';
	}
}

/*
function query_order( $query ) {
    //if ( is_page(10) ) {
        $query->set( 'order', 'ASC' );
    //}
}
add_action( 'pre_get_posts', 'query_order' );*/

?>