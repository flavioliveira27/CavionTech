<?php
/**
 * Template Part: Footer
 *
 * @package CavionTech
 */
?>

  <!-- ===== FOOTER ===== -->
  <footer class="footer" id="footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <div class="nav-logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.png" alt="<?php bloginfo('name'); ?>" class="logo-white" style="display:block;">
          </div>
          <p>Transformamos ideias em soluções digitais que impulsionam o crescimento do seu negócio. Inovação e
            qualidade em cada projeto.</p>
          <div class="footer-social">
            <a href="https://www.instagram.com/caviontech/" target="_blank" aria-label="Instagram"><i
                class="ri-instagram-line"></i></a>
            <a href="https://www.linkedin.com/in/fcsoliveira/" target="_blank" aria-label="LinkedIn"><i
                class="ri-linkedin-fill"></i></a>
            <a href="https://wa.me/message/4OZZDQTHZIRJI1" target="_blank" aria-label="WhatsApp"><i
                class="ri-whatsapp-line"></i></a>
          </div>
        </div>
        <div class="footer-col">
          <h4>Empresa</h4>
          <ul>
            <li><a href="<?php echo esc_url(home_url('/#about')); ?>">Sobre Nós</a></li>
            <li><a href="<?php echo esc_url(home_url('/#portfolio')); ?>">Projetos</a></li>
            <li><a href="<?php echo esc_url(home_url('/#why-choose')); ?>">Diferenciais</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Serviços</h4>
          <ul>
            <li><a href="<?php echo esc_url(home_url('/termos/')); ?>">Termos</a></li>
            <li><a href="<?php echo esc_url(home_url('/privacidade/')); ?>">Privacidade</a></li>
            <li><a href="https://wa.me/message/4OZZDQTHZIRJI1" target="_blank">Dúvidas</a></li>
          </ul>
        </div>
        <div class="footer-col footer-newsletter">
          <h4>Newsletter</h4>
          <p>Receba novidades e insights sobre tecnologia.</p>
          <form class="newsletter-form" id="newsletterForm">
            <input type="email" placeholder="Seu e-mail..." required>
            <button type="submit">OK</button>
          </form>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> <span>Cavion Tech</span>. Todos os direitos reservados.</p>
      </div>
    </div>
  </footer>

  <!-- ===== WHATSAPP FLOATING BUTTON ===== -->
  <a href="https://wa.me/message/4OZZDQTHZIRJI1" target="_blank" rel="noopener noreferrer" class="whatsapp-float"
    aria-label="Fale conosco pelo WhatsApp">
    <i class="ri-whatsapp-line"></i>
  </a>

  <?php wp_footer(); ?>
</body>

</html>
