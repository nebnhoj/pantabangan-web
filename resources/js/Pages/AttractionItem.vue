<template>
    <div class="w-screen mx-auto p-10">
      <div class="max-w-10xl mx-auto bg-white p-5 shadow-lg  rounded item-center">
        <h1 class="text-3xl font-bold mb-4">{{ attractions.title }}</h1>
        <img :src="attractions.image" :alt="attractions.title" class="w-full max-w-5xl rounded mb-4" />
        <p class="text-lg">{{ attractions.description }}</p>
      </div>
    </div>
  </template>
<script setup lang="ts">
import { ref, onMounted } from 'vue';
import axios from 'axios';
import AppLayout from "./../Layouts/AppLayout.vue";

defineOptions({
  layout: AppLayout,
});

const attractions = ref<any>({});
const props = defineProps({
    slug: String
})
const fetchAttractions = async () => {
  try {
    const response = await axios.get('https://cms.johnben.xyz/items/attractions?filter[slug][_eq]='+props.slug);
    attractions.value = response.data.data[0]; // Set the attractions array
  } catch (error) {
    console.error('Error fetching attractions:', error);
  }
};

onMounted(() => {
  fetchAttractions();
});
</script>
