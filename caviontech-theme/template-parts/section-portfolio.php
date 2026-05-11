<?php
/**
 * Template Part: Portfolio Section (Dynamic via ACF)
 *
 * @package CavionTech
 */

// Query portfolio projects
$portfolio_query = new WP_Query(array(
    'post_type'      => 'portfolio',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'meta_key'       => 'portfolio_order',
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC',
));
?>

  <!-- ===== PORTFÓLIO ===== -->
  <section class="portfolio section" id="portfolio">
    <div class="container">
      <div class="section-header reveal">
        <h2>Projetos em <span>Destaque</span></h2>
        <p>Conheça alguns dos projetos que desenvolvemos com dedicação e excelência para nossos clientes.</p>
      </div>
      <div class="portfolio-grid">
        <?php if ($portfolio_query->have_posts()) : ?>
          <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
            <?php
              $image    = get_field('portfolio_image');
              $category = get_field('portfolio_category');
              $title    = get_field('portfolio_title');
              $img_url  = !empty($image) ? esc_url($image['url']) : '';
              $img_alt  = !empty($image) ? esc_attr($image['alt']) : esc_attr($title);
            ?>
            <div class="portfolio-card reveal">
              <?php if ($img_url) : ?>
                <img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>">
              <?php endif; ?>
              <div class="portfolio-overlay">
                <?php if ($category) : ?>
                  <span><?php echo esc_html($category); ?></span>
                <?php endif; ?>
                <?php if ($title) : ?>
                  <h3><?php echo esc_html($title); ?></h3>
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <!-- Fallback: nenhum projeto cadastrado -->
          <p style="color: var(--gray); text-align: center; grid-column: 1 / -1; padding: 40px 0;">
            Nenhum projeto cadastrado ainda. Adicione projetos pelo painel administrativo.
          </p>
        <?php endif; ?>
      </div>
    </div>
  </section>
