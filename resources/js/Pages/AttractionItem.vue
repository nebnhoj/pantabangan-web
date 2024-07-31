<template>
    <div class="w-screen   p-10">
        <div class="max-w-10xl bg-white   p-10 shadow-lg  rounded item-center">
            <div class="flex justify-between">
                <h1 class="text-3xl font-bold">{{ attractions.title }}</h1>
                <div class=" flex gap-2">
                    <a v-if="attractions.facebook_page" class="btn btn-circle btn-primary"
                        :href="attractions.facebook_page" target="_blank">
                        <span class="[&>svg]:h-5 [&>svg]:w-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 320 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                <path
                                    d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                            </svg>
                        </span>
                    </a>

                    <a v-if="attractions.website" class="btn btn-circle btn-primary font-bold text-center"
                        :href="attractions.website" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25">
                            </path>
                        </svg></a>
                </div>


            </div>
            <p class="text-base  mb-4">{{ attractions.address ?? '' }}</p>

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
        const response = await axios.get('https://cms.johnben.xyz/items/attractions?filter[slug][_eq]=' + props.slug);
        attractions.value = response.data.data[0]; // Set the attractions array
    } catch (error) {
        console.error('Error fetching attractions:', error);
    }
};

onMounted(() => {
    fetchAttractions();
});

</script>
