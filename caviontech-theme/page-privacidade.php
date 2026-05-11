<?php
/**
 * Template Name: Política de Privacidade
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
  <nav class="navbar scrolled" id="navbar">
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
      </div>
      <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="nav-cta">Fale Conosco</a>
      <button class="nav-toggle" id="navToggle" aria-label="Menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>

  <!-- ===== PRIVACY HERO ===== -->
  <section class="terms-hero">
    <div class="container">
      <h1>Política de <span>Privacidade</span></h1>
      <p>Privacidade e Proteção de Dados</p>
    </div>
  </section>

  <!-- ===== PRIVACY CONTENT ===== -->
  <section class="terms-content section">
    <div class="container">
      <div class="terms-wrapper">

        <div class="terms-intro">
          <p>Na Cavion Tech, levamos a sua privacidade e a proteção dos seus dados pessoais a sério.</p>
          <p>Esta Política de Privacidade tem como objetivo explicar, de forma clara e transparente, como coletamos,
            utilizamos, armazenamos, compartilhamos e protegemos as informações dos usuários que acessam nossos sites,
            sistemas, plataformas, aplicações ou contratam nossos serviços.</p>
        </div>

        <div class="terms-section">
          <h2><span class="terms-number">1.</span> Coleta de Dados</h2>
          <p>A Cavion Tech poderá coletar informações necessárias para a prestação adequada de seus serviços, melhoria
            da experiência do usuário, atendimento, suporte técnico e segurança das plataformas.</p>
          <p>Os dados coletados podem incluir:</p>
          <ul>
            <li><strong>Dados cadastrais:</strong> nome, e-mail, telefone, empresa e demais informações de contato
              fornecidas pelo usuário.</li>
            <li><strong>Dados de uso:</strong> endereço IP, tipo de navegador, dispositivo utilizado, páginas acessadas,
              horários de acesso, interações com o sistema e informações relacionadas à navegação.</li>
            <li><strong>Dados técnicos:</strong> registros de acesso, identificadores de sessão, cookies, preferências
              de navegação e informações necessárias para autenticação e funcionamento das plataformas.</li>
          </ul>
          <p>Esses dados são utilizados para:</p>
          <ul>
            <li>permitir o acesso seguro aos sistemas;</li>
            <li>realizar autenticação de usuários;</li>
            <li>prestar suporte técnico;</li>
            <li>melhorar a experiência de navegação;</li>
            <li>aprimorar nossos serviços e soluções digitais;</li>
            <li>garantir a segurança das plataformas;</li>
            <li>cumprir obrigações legais, quando aplicável.</li>
          </ul>
        </div>

        <div class="terms-section">
          <h2><span class="terms-number">2.</span> Uso de Cookies</h2>
          <p>A Cavion Tech utiliza cookies e tecnologias semelhantes para melhorar a experiência do usuário, otimizar a
            navegação, lembrar preferências e compreender como nossos serviços são utilizados.</p>
          <p>Os cookies podem ser utilizados para fins de funcionamento da plataforma, análise de desempenho, segurança
            e personalização da experiência.</p>
          <p>O usuário pode, a qualquer momento, gerenciar ou desativar os cookies diretamente nas configurações do seu
            navegador. No entanto, a desativação de determinados cookies poderá afetar o funcionamento adequado de
            algumas funcionalidades.</p>
        </div>

        <div class="terms-section">
          <h2><span class="terms-number">3.</span> Compartilhamento de Dados</h2>
          <p>A Cavion Tech não vende, aluga ou comercializa dados pessoais dos usuários.</p>
          <p>As informações poderão ser compartilhadas apenas quando necessário para a execução dos serviços, operação
            das plataformas ou cumprimento de obrigações legais.</p>
          <p>O compartilhamento poderá ocorrer com:</p>
          <ul>
            <li>provedores de hospedagem;</li>
            <li>serviços de armazenamento em nuvem;</li>
            <li>gateways de pagamento;</li>
            <li>ferramentas de autenticação;</li>
            <li>plataformas de análise e desempenho;</li>
            <li>parceiros técnicos essenciais para a prestação dos serviços.</li>
          </ul>
          <p>Esse compartilhamento ocorre somente na medida necessária para o funcionamento adequado das soluções
            contratadas ou disponibilizadas pela Cavion Tech.</p>
        </div>

        <div class="terms-section">
          <h2><span class="terms-number">4.</span> Segurança dos Dados</h2>
          <p>A Cavion Tech adota medidas técnicas, administrativas e organizacionais para proteger os dados pessoais
            contra acessos não autorizados, perda, alteração, divulgação indevida ou uso inadequado.</p>
          <p>Entre as medidas de segurança, podem ser utilizadas:</p>
          <ul>
            <li>criptografia de dados;</li>
            <li>firewalls;</li>
            <li>controle de acesso;</li>
            <li>autenticação segura;</li>
            <li>monitoramento de sistemas;</li>
            <li>backups;</li>
            <li>boas práticas de desenvolvimento e segurança da informação.</li>
          </ul>
          <p>Apesar dos esforços para proteger as informações, nenhum sistema é totalmente imune a riscos. Por isso, o
            usuário também deve adotar boas práticas de segurança, como manter suas senhas protegidas e evitar o
            compartilhamento de credenciais.</p>
        </div>

        <div class="terms-section">
          <h2><span class="terms-number">5.</span> Seus Direitos Conforme a LGPD</h2>
          <p>De acordo com a Lei Geral de Proteção de Dados Pessoais — LGPD, o usuário possui direitos relacionados ao
            tratamento de seus dados pessoais.</p>
          <p>Você pode solicitar:</p>
          <ul>
            <li>confirmação da existência de tratamento de dados;</li>
            <li>acesso aos dados pessoais armazenados;</li>
            <li>correção de dados incompletos, inexatos ou desatualizados;</li>
            <li>anonimização, bloqueio ou exclusão de dados desnecessários ou excessivos;</li>
            <li>portabilidade dos dados, quando aplicável;</li>
            <li>informação sobre o compartilhamento de dados;</li>
            <li>revogação do consentimento;</li>
            <li>exclusão dos dados tratados com base no consentimento, quando permitido pela legislação.</li>
          </ul>
          <p>As solicitações serão analisadas conforme os critérios e prazos previstos na legislação aplicável.</p>
        </div>

        <div class="terms-section">
          <h2><span class="terms-number">6.</span> Armazenamento e Retenção dos Dados</h2>
          <p>Os dados pessoais serão armazenados pelo período necessário para cumprir as finalidades descritas nesta
            Política de Privacidade, prestar os serviços contratados, atender obrigações legais, resolver disputas e
            garantir a segurança das plataformas.</p>
          <p>Quando os dados não forem mais necessários, poderão ser excluídos, anonimizados ou mantidos apenas quando
            houver obrigação legal ou legítimo interesse aplicável.</p>
        </div>

        <div class="terms-section">
          <h2><span class="terms-number">7.</span> Alterações nesta Política</h2>
          <p>A Cavion Tech poderá atualizar esta Política de Privacidade a qualquer momento, visando refletir melhorias
            nos serviços, mudanças operacionais, exigências legais ou novas práticas de segurança.</p>
          <p>Recomendamos que o usuário revise esta política periodicamente. O uso contínuo dos serviços após eventuais
            alterações será considerado como ciência e concordância com a versão atualizada.</p>
        </div>

        <div class="terms-section">
          <h2><span class="terms-number">8.</span> Contato</h2>
          <p>Em caso de dúvidas, solicitações ou esclarecimentos relacionados à privacidade e proteção de dados, entre
            em contato com a Cavion Tech por meio do nosso canal oficial de atendimento via
            <a href="https://wa.me/message/4OZZDQTHZIRJI1" target="_blank" class="terms-link">WhatsApp</a>.
          </p>
        </div>

      </div>
    </div>
  </section>

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
