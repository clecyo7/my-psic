<template>
  <div class="mt-12">
    <div class="w-full mx-auto">
      <div v-for="(item, index) in cards2 ? cards2 : [] " :key="index">
        <div v-if="selectedCard === index">
          <div class="relative rounded-lg md:flex items-center justify-center" style="min-height: 19rem;">
  <div class="relative w-full md:w-4/5 h-full overflow-hidden rounded-t-lg md:rounded-t-none md:rounded-l-lg">
    <div class="inset-0 w-full h-full flex items-center justify-center fill-current text-black">
      {{ console.log(item.img) }}
      <img :src="item.img" alt="">
    </div>
  </div>

  <!-- Carousel News-->
  <div class="w-full md:w-3/5 h-full flex flex-col items-center justify-center rounded-lg">
    <div class="p-4 md:pr-24 md:pl-16 md:py-12">
      <h2 class="text-black text-3xl mt-0 w-full text-center">{{ item.titulo }}</h2>
      <div class="bg-[#008a8f] rounded-b-xl w-32 mb-6 mt-4 py-0.5"></div>
      <p class="text-gray-900 text-lg text-center">{{item.summary}}</p>
      <p class="mt-3 text-center">{{item.autor}}</p>
    </div>

    <!-- Botoes ao centro -->
    <div class="flex justify-center space-x-4 mt-4">
      <button @click="pastCard"
        class="bg-white rounded-full shadow-md h-12 w-12 text-2xl text-[#008a8f] hover:text-[#237c80] focus:text-[#0a3b3d] focus:outline-none focus:shadow-outline">
        <span class="block" style="transform: scale(-1);">&#x279c;</span>
      </button>
      <button @click="nextCard"
        class="bg-white rounded-full shadow-md h-12 w-12 text-2xl text-[#008a8f] hover:text-[#237c80] focus:text-[#0a3b3d] focus:outline-none focus:shadow-outline">
        <span class="block">&#x279c;</span>
      </button>
    </div>
  </div>
</div>

        </div>
      </div>
    </div>
  </div>
</template>
<script>
import jsonData from '../../assets/dados/noticias.json';
import jsonData1 from '../../../public/storage/img/net.jpg';
export default {
  data() {
    return {
      cards2: jsonData.Noticias,
      selectedCard: 0,
    };
  },
  created() {
    this.cards2; 
    console.log(this.cards2)
  },
  methods: {
    nextCard() {
      const totalCard = this.cards2.length;
      if (this.selectedCard === totalCard - 1) return;
      this.selectedCard++;
    },
    pastCard() {
      if (this.selectedCard === 0) return;
      this.selectedCard--;
    }
  }
};
</script>

