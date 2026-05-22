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

    // Main stylesheet (filemtime garante cache-bust automático)
    wp_enqueue_style(
        'caviontech-style',
        get_stylesheet_uri(),
        array('google-fonts-inter', 'remixicon'),
        filemtime(get_stylesheet_directory() . '/style.css')
    );

    // Main script (filemtime garante cache-bust automático)
    wp_enqueue_script(
        'caviontech-script',
        get_template_directory_uri() . '/assets/js/script.js',
        array(),
        filemtime(get_template_directory() . '/assets/js/script.js'),
        true // Load in footer
    );

    wp_localize_script('caviontech-script', 'caviontech_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('caviontech_contact_nonce'),
    ));
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

// ===== SMTP EMAIL CONFIGURATION =====
function caviontech_smtp_setup($phpmailer) {
    // Get values from environment variables or fallback to constants/defaults
    $smtp_host = getenv('SMTP_HOST') ?: (defined('SMTP_HOST') ? SMTP_HOST : '');
    $smtp_port = getenv('SMTP_PORT') ?: (defined('SMTP_PORT') ? SMTP_PORT : '');
    $smtp_encryption = getenv('SMTP_ENCRYPTION') ?: (defined('SMTP_ENCRYPTION') ? SMTP_ENCRYPTION : '');
    $smtp_user = getenv('SMTP_USER') ?: (defined('SMTP_USER') ? SMTP_USER : '');
    $smtp_password = getenv('SMTP_PASSWORD') ?: (defined('SMTP_PASSWORD') ? SMTP_PASSWORD : '');
    $smtp_from = getenv('SMTP_FROM') ?: (defined('SMTP_FROM') ? SMTP_FROM : '');
    $smtp_from_name = getenv('SMTP_FROM_NAME') ?: (defined('SMTP_FROM_NAME') ? SMTP_FROM_NAME : 'Cavion Tech');

    // Only configure SMTP if the host and user are defined
    if (!empty($smtp_host) && !empty($smtp_user)) {
        $phpmailer->isSMTP();
        $phpmailer->Host       = $smtp_host;
        $phpmailer->SMTPAuth   = true;
        $phpmailer->Port       = intval($smtp_port);
        $phpmailer->Username   = $smtp_user;
        $phpmailer->Password   = $smtp_password;
        $phpmailer->SMTPSecure = $smtp_encryption; // 'ssl' or 'tls'

        // Set from email and name
        if (!empty($smtp_from)) {
            $phpmailer->From     = $smtp_from;
            $phpmailer->FromName = $smtp_from_name;
        }
    }
}
add_action('phpmailer_init', 'caviontech_smtp_setup');

// ===== AJAX CONTACT FORM HANDLER =====
function caviontech_handle_contact_form() {
    // Check nonce for security
    check_ajax_referer('caviontech_contact_nonce', 'nonce');

    // Get and sanitize inputs
    $name    = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email   = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $service = isset($_POST['service']) ? sanitize_text_field($_POST['service']) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';

    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(array('message' => 'Por favor, preencha todos os campos obrigatórios.'));
    }

    if (!is_email($email)) {
        wp_send_json_error(array('message' => 'Por favor, insira um e-mail válido.'));
    }

    // Map service options to readable labels
    $services_map = array(
        'site'      => 'Site Profissional',
        'landing'   => 'Landing Page',
        'app'       => 'App Mobile',
        'sistema'   => 'Sistema Customizado',
        'erp'       => 'Sistema ERP',
        'ecommerce' => 'E-Commerce',
        'outro'     => 'Outro'
    );
    $service_label = isset($services_map[$service]) ? $services_map[$service] : 'Não especificado';

    // Email recipient
    $to = getenv('SMTP_FROM') ?: 'contato@caviontech.com';

    // Email subject
    $subject = 'Novo contato recebido pelo site - ' . $name;

    // Email body (HTML)
    $body = "
    <html>
    <head>
        <title>Novo Contato - Cavion Tech</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { padding: 20px; border: 1px solid #eee; border-radius: 5px; max-width: 600px; }
            .header { background: #0d47ff; color: #fff; padding: 15px; border-radius: 5px 5px 0 0; text-align: center; }
            .content { padding: 20px 10px; }
            .field { margin-bottom: 15px; }
            .label { font-weight: bold; color: #0d47ff; }
            .footer { font-size: 12px; color: #777; margin-top: 20px; border-top: 1px solid #eee; padding-top: 10px; text-align: center; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>Novo Lead de Projeto</h2>
            </div>
            <div class='content'>
                <div class='field'><span class='label'>Nome:</span> {$name}</div>
                <div class='field'><span class='label'>E-mail:</span> {$email}</div>
                <div class='field'><span class='label'>Serviço de Interesse:</span> {$service_label}</div>
                <div class='field'><span class='label'>Mensagem:</span><br/>" . nl2br($message) . "</div>
            </div>
            <div class='footer'>
                Este e-mail foi enviado automaticamente a partir do formulário de contato do site Cavion Tech.
            </div>
        </div>
    </body>
    </html>
    ";

    // Email headers
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );

    // Send email using WordPress wp_mail
    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(array('message' => 'Sua mensagem foi enviada com sucesso! Entraremos em contato em breve.'));
    } else {
        wp_send_json_error(array('message' => 'Ocorreu um erro ao enviar seu e-mail. Por favor, tente novamente mais tarde ou envie diretamente para contato@caviontech.com.'));
    }
}
add_action('wp_ajax_submit_contact_form', 'caviontech_handle_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'caviontech_handle_contact_form');
