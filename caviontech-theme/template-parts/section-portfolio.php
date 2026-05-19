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

      <div class="projects-grid">
        <?php
        $delay_counter = 0;
        
        if ($portfolio_query->have_posts()) :
          while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
            
            // Adaptando para os campos ACF
            $image    = get_field('portfolio_image');
            $cat_nome = get_field('portfolio_category');
            $cat_cor  = get_field('portfolio_category_color');
            $title    = get_field('portfolio_title');
            $link     = get_field('portfolio_link');
            $desc     = get_field('portfolio_description');
            
            if (!$desc)  $desc = get_the_excerpt();
            if (!$title) $title = get_the_title();
            if (!$cat_cor) $cat_cor = 'var(--blue)'; // Fallback para azul se não estiver preenchido
            
            $link_final = $link ? $link : get_permalink();
            $link_target = $link ? ' target="_blank" rel="noopener noreferrer"' : '';
            $img_url  = !empty($image) ? esc_url($image['url']) : '';
            $img_alt  = !empty($image) ? esc_attr($image['alt']) : esc_attr($title);

            $delay_class = '';
            if ($delay_counter == 1) $delay_class = 'delay-1';
            if ($delay_counter == 2) $delay_class = 'delay-2';
        ?>
            <!-- Projeto Dinâmico -->
            <div class="project-card reveal-up <?php echo $delay_class; ?>">
                <!-- Link sobreposto para tornar todo o card clicável -->
                <a href="<?php echo esc_url($link_final); ?>" class="card-overlay-link" <?php echo $link_target; ?> aria-label="<?php echo esc_attr($title); ?>"></a>
                
                <div class="project-img">
                    <?php if ($cat_nome): ?>
                        <span class="tag-floating" style="background-color: <?php echo esc_attr($cat_cor); ?>;"><?php echo esc_html($cat_nome); ?></span>
                    <?php endif; ?>

                    <div class="img-placeholder">
                        <?php if ($img_url) : ?>
                            <img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <?php elseif (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: 100%; object-fit: cover;')); ?>
                        <?php else: ?>
                            <span style="color:#64748B;">Sem Capa</span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="project-info">
                    <h3><?php echo esc_html($title); ?></h3>
                    <div class="project-desc-wrapper">
                        <div class="project-desc">
                            <?php echo esc_html($desc); ?>
                        </div>
                        <button class="desc-toggle" type="button">Ver mais <i class="ri-arrow-down-s-line"></i></button>
                    </div>
                    <div class="project-footer">
                        <a href="<?php echo esc_url($link_final); ?>" class="link-cyan" <?php echo $link_target; ?>>Ver Projeto Completo <i class="ri-arrow-right-line"></i></a>
                        <a href="<?php echo esc_url($link_final); ?>" class="icon-link" <?php echo $link_target; ?>><i class="ri-external-link-line"></i></a>
                    </div>
                </div>
            </div>
        <?php
            $delay_counter++;
          endwhile;
          wp_reset_postdata();
        else :
        ?>
          <p style="color: #94A3B8; text-align: center; grid-column: 1 / -1; padding: 40px 0;">
            Nenhum projeto cadastrado ainda.
          </p>
        <?php endif; ?>
      </div>
    </div>
  </section>
