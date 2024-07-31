<template>
    <div class="container  w-screen p-10 justify-center">
      <h2 class="text-2xl font-bold mb-4">Visit These Must-See Attractions in Pantabangan</h2>
      <div v-if="attractions.length" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div v-for="attraction in attractions" :key="attraction.id" class="card card-compact bg-base-100 shadow-xl">
          <figure>
            <img :src="attraction.image" :alt="attraction.title" class="w-full h-48 object-cover" />
          </figure>
          <div class="card-body">
            <h2 class="card-title">{{ attraction.title }}</h2>
            <p>{{ attraction.description }}</p>
            <div class="card-actions justify-end">
              <button class="btn btn-primary">Visit</button>
            </div>
          </div>
        </div>
      </div>
      <div v-else class="text-center">Loading...</div>
    </div>
  </template>
<script setup lang="ts">
import { ref, onMounted } from 'vue';
import axios from 'axios';
import AppLayout from "./../Layouts/AppLayout.vue";

defineOptions({
  layout: AppLayout,
});

const attractions = ref<any[]>([]);

const fetchAttractions = async () => {
  try {
    const response = await axios.get('https://cms.johnben.xyz/items/attractions');
    attractions.value = response.data.data; // Set the attractions array
  } catch (error) {
    console.error('Error fetching attractions:', error);
  }
};

onMounted(() => {
  fetchAttractions();
});
</script>
