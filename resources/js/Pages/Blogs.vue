<template>
    <div class="w-screen p-10 justify-center">
      <h2 class="text-3xl font-bold mb-4">Explore Our Latest Blog Posts</h2>
      <div v-if="blogs.length" class="grid grid-cols-1 lg:grid-cols-2   gap-6 justify-center w-full">
        <div v-for="blog in blogs" :key="blog.id" class="card card-compact bg-base-100 shadow-xl">
          <figure>
            <img :src="blog.image" :alt="blog.title" class="w-full h-52	 object-cover" />
          </figure>
          <div class="card-body">
            <h2 class="card-title hover:text-2xl">{{ blog.title }}</h2>
            <p class="text-gray-500">By {{ blog.writer }} on {{ formattedDate(blog.date_created) }}</p>
            <div v-html="blog.post"  class="overflow-ellipsis overflow-hidden max-h-20"></div>
            <div class="card-actions justify-end">
              <a class="btn btn-primary text-white" :href="`/blogs/${blog.slug}`">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden h-6 w-6 transition-transform duration-300 group-hover:translate-x-1 rtl:rotate-180 rtl:group-hover:-translate-x-1 md:inline-block">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"></path>
                </svg>
              </a>
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

  const blogs = ref<any[]>([]);

  const fetchBlogs = async () => {
    try {
      const response = await axios.get('https://cms.johnben.xyz/items/blogs');
      blogs.value = response.data.data; // Set the blogs array
    } catch (error) {
      console.error('Error fetching blogs:', error);
    }
  };

  onMounted(() => {
    fetchBlogs();
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
