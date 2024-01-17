<template>
    <div id="app">
      <Header />
      <ImageSection />
      <Footer />
    </div>
  </template>
  
  <script>
  import Header from './components/Header.vue';
  import ImageSection from './components/ImageSection.vue';
  import Footer from './components/Footer.vue';
  
  export default {
    components: {
      Header,
      ImageSection,
      Footer,
    },
  };
  </script>
  
  <style>
    /* Estilos globais podem ser definidos aqui */
  </style>
  