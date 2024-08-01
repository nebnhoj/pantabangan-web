<template>
    <div class="w-screen p-10 justify-center">
      <h2 class="text-3xl font-bold mb-4">Latest News</h2>
      <div v-if="news.length" class="grid grid-cols-1 lg:grid-cols-2 gap-6 justify-center w-full">
        <div v-for="article in news" :key="article.id" class="card card-compact bg-base-100 shadow-xl">
          <figure>
            <img :src="article.image" :alt="article.title" class="w-full h-52 object-cover" />
          </figure>
          <div class="card-body">
            <h2 class="card-title hover:text-2xl">{{ article.title }}</h2>
            <p class="text-gray-500">By {{ article.author }} on {{ formattedDate(article.published_at) }}</p>
            <div v-html="article.summary" class="overflow-ellipsis overflow-hidden max-h-20"></div>
            <div class="card-actions justify-end">
              <a class="btn btn-primary text-white" :href="`/news/${article.slug}`">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden h-6 w-6 transition-transform duration-300 group-hover:translate-x-1 rtl:rotate-180 rtl:group-hover:-translate-x-1 md:inline-block">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div v-else class="text-center"> No news available today!</div>
    </div>
  </template>
<script setup lang="ts">
import { ref, onMounted } from 'vue';
import axios from 'axios';
import AppLayout from "./../Layouts/AppLayout.vue";

defineOptions({
  layout: AppLayout,
});

const news = ref<any[]>([]);

const fetchNews = async () => {
  try {
    const response = await axios.get('https://cms.johnben.xyz/items/news');
    news.value = response.data.data; // Set the news array
  } catch (error) {
    console.error('Error fetching news:', error);
  }
};

onMounted(() => {
  fetchNews();
});

const formattedDate = (dateString: string) => {
  const date = new Date(dateString);
  return date.toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
  });
}
</script>
