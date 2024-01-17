<template>
    <div id="app">
      <Header />
    <ImageSection />
    <Footer />
    </div>
  </template>
  
  <script>
  import Header from '@/Components/Header.vue';
  import ImageSection from '@/Components/ImageSection.vue';
  import Footer from '@/Components/Footer.vue';
  
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
  