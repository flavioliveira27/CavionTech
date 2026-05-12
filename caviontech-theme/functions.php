<?php
/**
 * Cavion Tech Theme Functions
 *
 * @package CavionTech
 */

// ===== THEME SETUP =====
function caviontech_setup() {
    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable featured images
    add_theme_support('post-thumbnails');

    // Register navigation menu
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'caviontech'),
    ));

    // HTML5 support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'caviontech_setup');

// ===== ENQUEUE STYLES & SCRIPTS =====
function caviontech_scripts() {
    // Google Fonts - Inter
    wp_enqueue_style(
        'google-fonts-inter',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap',
        array(),
        null
    );

    // Remix Icon CDN
    wp_enqueue_style(
        'remixicon',
        'https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css',
        array(),
        '4.1.0'
    );

    // Main stylesheet
    wp_enqueue_style(
        'caviontech-style',
        get_stylesheet_uri(),
        array('google-fonts-inter', 'remixicon'),
        wp_get_theme()->get('Version')
    );

    // Main script
    wp_enqueue_script(
        'caviontech-script',
        get_template_directory_uri() . '/assets/js/script.js',
        array(),
        wp_get_theme()->get('Version'),
        true // Load in footer
    );
}
add_action('wp_enqueue_scripts', 'caviontech_scripts');

// ===== CUSTOM POST TYPE: PORTFOLIO =====
function caviontech_register_portfolio_cpt() {
    $labels = array(
        'name'               => 'Portfólio',
        'singular_name'      => 'Projeto',
        'menu_name'          => 'Portfólio',
        'add_new'            => 'Adicionar Novo',
        'add_new_item'       => 'Adicionar Novo Projeto',
        'edit_item'          => 'Editar Projeto',
        'new_item'           => 'Novo Projeto',
        'view_item'          => 'Ver Projeto',
        'search_items'       => 'Buscar Projetos',
        'not_found'          => 'Nenhum projeto encontrado',
        'not_found_in_trash' => 'Nenhum projeto no lixo',
        'all_items'          => 'Todos os Projetos',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'portfolio'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'thumbnail'),
        'show_in_rest'       => true,
    );

    register_post_type('portfolio', $args);
}
add_action('init', 'caviontech_register_portfolio_cpt');

// ===== ACF FIELD GROUP REGISTRATION =====
function caviontech_register_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key'      => 'group_portfolio_fields',
        'title'    => 'Dados do Projeto',
        'fields'   => array(
            array(
                'key'           => 'field_portfolio_image',
                'label'         => 'Imagem do Projeto',
                'name'          => 'portfolio_image',
                'type'          => 'image',
                'instructions'  => 'Imagem de capa do projeto que será exibida no card do portfólio. Tamanho recomendado: 800x560px.',
                'required'      => 1,
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
                'mime_types'    => 'jpg,jpeg,png,webp',
            ),
            array(
                'key'           => 'field_portfolio_category',
                'label'         => 'Categoria',
                'name'          => 'portfolio_category',
                'type'          => 'text',
                'instructions'  => 'Categoria do projeto. Ex: E-Commerce, App Mobile, Sistema ERP, Landing Page, Site.',
                'required'      => 1,
                'placeholder'   => 'Ex: E-Commerce',
            ),
            array(
                'key'           => 'field_portfolio_category_color',
                'label'         => 'Cor da Categoria',
                'name'          => 'portfolio_category_color',
                'type'          => 'color_picker',
                'instructions'  => 'Escolha a cor de fundo da etiqueta da categoria.',
                'required'      => 0,
                'default_value' => '#0d47ff',
            ),
            array(
                'key'           => 'field_portfolio_title',
                'label'         => 'Título do Projeto',
                'name'          => 'portfolio_title',
                'type'          => 'text',
                'instructions'  => 'Título exibido no card. Ex: Loja Virtual Premium.',
                'required'      => 1,
                'placeholder'   => 'Ex: Loja Virtual Premium',
            ),
            array(
                'key'           => 'field_portfolio_link',
                'label'         => 'Link do Projeto',
                'name'          => 'portfolio_link',
                'type'          => 'url',
                'instructions'  => 'URL externa do projeto para onde o usuário será redirecionado ao clicar. Deixe em branco se não houver.',
                'required'      => 0,
                'placeholder'   => 'https://',
            ),
            array(
                'key'           => 'field_portfolio_description',
                'label'         => 'Descrição do Projeto',
                'name'          => 'portfolio_description',
                'type'          => 'textarea',
                'instructions'  => 'Descrição curta do projeto que aparecerá no card. (Máx: 3 linhas recomendadas).',
                'required'      => 0,
                'rows'          => 4,
            ),
            array(
                'key'           => 'field_portfolio_order',
                'label'         => 'Ordem de Exibição',
                'name'          => 'portfolio_order',
                'type'          => 'number',
                'instructions'  => 'Número para controlar a ordem dos projetos. Menor = aparece primeiro.',
                'required'      => 0,
                'default_value' => 0,
                'min'           => 0,
                'max'           => 100,
                'step'          => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'portfolio',
                ),
            ),
        ),
        'style'              => 'default',
        'label_placement'    => 'top',
        'instruction_placement' => 'label',
        'active'             => true,
    ));
}
add_action('acf/init', 'caviontech_register_acf_fields');

// ===== HELPER: REMOVE WORDPRESS EMOJI SCRIPTS =====
function caviontech_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
}
add_action('init', 'caviontech_disable_emojis');

// ===== HELPER: CLEAN WP_HEAD =====
function caviontech_clean_head() {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
}
add_action('after_setup_theme', 'caviontech_clean_head');
