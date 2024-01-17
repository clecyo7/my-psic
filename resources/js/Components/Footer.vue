<template>
  <div>
    <!-- Seu conteúdo principal aqui -->

    <footer class="footer">
      <div class="footer-content">
        <div class="footer-section">
          <h3>Contato</h3>
          <p>Email: contato@psicologosistema.com</p>
          <p>Telefone: (123) 456-7890</p>
        </div>
        <div class="footer-section">
          <h3>Redes Sociais</h3>
          <ul>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">LinkedIn</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h3>Endereço</h3>
          <p>Rua Psicólogo, 123</p>
          <p>Cidade Psicologia, PS</p>
          <p>CEP: 12345-678</p>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2024 Sistema para Psicólogos. Todos os direitos reservados.</p>
      </div>
    </footer>
  </div>
</template>

<style scoped>
/* Adicione seu estilo conforme necessário */

html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}

#app {
  min-height: 100%;
  position: relative;
}

.footer {
  background-color: #333;
  color: #fff;
  padding: 20px 0;
  position: absolute;
  bottom: 0;
  width: 100%;
}

.footer-content {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

.footer-section {
  max-width: 300px;
}

h3 {
  color: #fff;
}

ul {
  list-style-type: none;
  padding: 0;
}

a {
  color: #fff;
  text-decoration: none;
}

.footer-bottom {
  text-align: center;
  padding-top: 10px;
  border-top: 1px solid #555;
}
</style>
