<template>

    <div class="container  p-10 justify-center	">
        <h1 class="text-3xl font-bold mb-4">About Pantabangan</h1>
        <p class="text-lg mb-4">
            Pantabangan, officially the Municipality of Pantabangan, is a 1st class municipality in the province of Nueva Ecija, Philippines. According to the 2020 census, it has a population of 31,763 people.
        </p>
        <div class=" mx-10">
            <p class="text-lg font-bold">List of Barangays in Pantabangan</p>
        <ul>
            <li v-for="barangay in barangays">
                <p class="text-base">- {{ barangay }}</p>
            </li>
        </ul>
        </div>

        <p class="text-lg mb-4 mt-4">
            This is the site of the Pantabangan Dam and Lake, located in the northern part of Nueva Ecija, at the foot of Mt. Mabilog and Mt. Dalimanok. Pantabangan is home to the Pantabangan–Carranglan Watershed Forest Reserve.
        </p>
        <p class="text-lg mb-4">
            The place was settled on November 30, 1645, by Fr. Juan Alonzo de Abarca, an Augustinian priest. The village grew into a settlement and was officially included in the map of the Philippines in 1747. In 1900, Pantabangan formally became a town.
        </p>
        <p class="text-lg mb-4">
            The Pantabangan Dam, completed in August 1974, is a significant infrastructure that supplies irrigation and hydroelectric power. The town has evolved significantly over the years and is known for its rich history and cultural heritage.
        </p>

        <!-- Disclaimer Section -->
        <div class="mt-8 p-4 border-t border-gray-300">
            <p class="text-sm text-gray-600">
                <strong>Disclaimer:</strong> This website is not the official website of Pantabangan, Nueva Ecija. The content provided here is for informational purposes only and may not represent the views or information of the official municipality of Pantabangan.
            </p>
        </div>
    </div>

  </template>

<script setup lang="ts">
import AppLayout from "./../Layouts/AppLayout.vue";
const props = defineProps<{
  barangays: string[];
}>();
defineOptions({
    layout: AppLayout,
});
</script>
