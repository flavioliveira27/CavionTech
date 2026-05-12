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
              $link     = get_field('portfolio_link');
              $description = get_field('portfolio_description');
              
              if (!$description) {
                  $description = get_the_excerpt();
              }
              if (!$title) {
                  $title = get_the_title();
              }

              $img_url  = !empty($image) ? esc_url($image['url']) : '';
              $img_alt  = !empty($image) ? esc_attr($image['alt']) : esc_attr($title);
              $tag      = $link ? 'a' : 'div';
            ?>
            <<?php echo $tag; ?> class="portfolio-card reveal" <?php echo $link ? 'href="' . esc_url($link) . '" target="_blank" rel="noopener noreferrer"' : ''; ?>>
              <div class="portfolio-image-wrapper">
                <?php if ($img_url) : ?>
                  <img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>">
                <?php else: ?>
                  <!-- Fallback se não houver imagem do ACF -->
                  <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('medium_large'); ?>
                  <?php endif; ?>
                <?php endif; ?>
                
                <?php if ($category) : ?>
                  <span class="portfolio-category-badge"><?php echo esc_html($category); ?></span>
                <?php endif; ?>
              </div>
              
              <div class="portfolio-content">
                <?php if ($title) : ?>
                  <h3 class="portfolio-title"><?php echo esc_html($title); ?></h3>
                <?php endif; ?>
                
                <?php if ($description) : ?>
                  <p class="portfolio-desc"><?php echo esc_html($description); ?></p>
                <?php endif; ?>
              </div>
            </<?php echo $tag; ?>>
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
