<template>
    <div class="w-screen p-10 justify-center">
        <div v-if="blog" class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold mb-4">{{ blog.title }}</h1>
            <p class="text-gray-500 mb-4">By {{ blog.writer }} on {{ formattedDate(blog.date_created) }}</p>
            <figure v-if="blog.image" class="mb-4">
                <img :src="blog.image" :alt="blog.title" class="w-full h-auto object-cover rounded" />
            </figure>
            <div v-html="blog.post" class="justify-items-stretch prose max-w-none"></div>
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
const blog = ref<any>(null);
const props = defineProps({
    slug: String
})
const fetchBlog = async () => {
    try {
        const response = await axios.get(`https://cms.johnben.xyz/items/blogs?filter[slug][_eq]=${props.slug}`);
        blog.value = response.data.data[0]; // Set the blog object
    } catch (error) {
        console.error('Error fetching blog:', error);
    }
};

const formattedDate = (dateString: string) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    });
};

onMounted(() => {
    fetchBlog();
});
</script>
