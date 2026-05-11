<?php
/**
 * Template Part: Header & Navbar
 *
 * @package CavionTech
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png" type="image/png">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <!-- ===== NAVBAR ===== -->
  <nav class="navbar" id="navbar">
    <div class="container">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.png" alt="<?php bloginfo('name'); ?>" class="logo-white">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-black.png" alt="<?php bloginfo('name'); ?>" class="logo-black">
      </a>
      <div class="nav-links" id="navLinks">
        <a href="<?php echo esc_url(home_url('/#hero')); ?>">Início</a>
        <a href="<?php echo esc_url(home_url('/#about')); ?>">Sobre</a>
        <a href="<?php echo esc_url(home_url('/#services')); ?>">Serviços</a>
        <a href="<?php echo esc_url(home_url('/#why-choose')); ?>">Diferenciais</a>
        <a href="<?php echo esc_url(home_url('/#portfolio')); ?>">Portfólio</a>
        <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="nav-cta-mobile">Fale Conosco</a>
      </div>
      <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="nav-cta">Fale Conosco</a>
      <button class="nav-toggle" id="navToggle" aria-label="Menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>
