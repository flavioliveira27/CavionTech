<?php
/**
 * Template Part: Contact Section
 *
 * @package CavionTech
 */
?>

  <!-- ===== CONTATO ===== -->
  <section class="contact section" id="contact">
    <div class="container">
      <div class="contact-overlap-wrapper reveal">
        <!-- Front card (colored, info side) — left -->
        <div class="contact-card-front">
          <h3>Fale Conosco</h3>
          <div class="contact-items">
            <div class="contact-item">
              <div class="icon-circle"><i class="ri-mail-line"></i></div>
              <span>contato@caviontech.com</span>
            </div>
            <div class="contact-item">
              <div class="icon-circle"><i class="ri-whatsapp-line"></i></div>
              <span>(61) 99442-8479</span>
            </div>
          </div>
          <div class="contact-social">
            <a href="https://www.instagram.com/caviontech/" target="_blank" aria-label="Instagram"><i
                class="ri-instagram-line"></i></a>
            <a href="https://www.linkedin.com/in/fcsoliveira/" target="_blank" aria-label="LinkedIn"><i
                class="ri-linkedin-fill"></i></a>
          </div>
        </div>
        <!-- Back card (white, form side) — right -->
        <div class="contact-card-back">
          <div class="contact-form-header">
            <h2>Vamos iniciar seu <span>projeto?</span></h2>
            <p>Conte-nos sobre o seu projeto e descubra como podemos ajudar sua empresa com a solução mais adequada.</p>
          </div>
          <form class="contact-form-side" id="contactForm">
            <div class="form-group">
              <input type="text" id="name" placeholder="Seu Nome" required>
            </div>
            <div class="form-group">
              <input type="email" id="email" placeholder="Seu E-mail" required>
            </div>
            <div class="form-group">
              <select id="service">
                <option value="" disabled selected hidden>Tipo de Serviço</option>
                <option value="site">Site Profissional</option>
                <option value="landing">Landing Page</option>
                <option value="app">App Mobile</option>
                <option value="sistema">Sistema Customizado</option>
                <option value="erp">Sistema ERP</option>
                <option value="ecommerce">E-Commerce</option>
                <option value="outro">Outro</option>
              </select>
            </div>
            <div class="form-group">
              <textarea id="message" placeholder="Sua Mensagem..." required></textarea>
            </div>
            <button type="submit" class="form-submit-btn">Enviar Mensagem <i class="ri-send-plane-fill"></i></button>
          </form>
        </div>
      </div>
    </div>
  </section>
