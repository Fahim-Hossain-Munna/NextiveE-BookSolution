<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h4 class="text-3xl font-bold mb-6 text-blue-600">Welcome to the E-Book Store</h4>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <!-- Skeletons shown when loading -->
            <template v-if="books.length === 0">
                <div v-for="n in 8" :key="n" class="animate-pulse bg-white shadow rounded-lg p-4">
                    <div class="bg-gray-300 h-40 w-full rounded mb-4"></div>
                    <div class="h-4 bg-gray-300 rounded w-3/4 mb-2"></div>
                    <div class="h-4 bg-gray-300 rounded w-1/2 mb-2"></div>
                    <div class="h-6 bg-gray-300 rounded w-1/3"></div>
                </div>
            </template>

            <EbookCard v-for="book in books" :key="book" :book="book" />
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import EbookCard from '../components/EbookCard.vue';

const books = ref([]);

onMounted(async () => {

    try {
        const response = await axios.get('/books');
        books.value = response.data?.data;
    } catch (error) {
        console.error('Error fetching books:', error);
    }
});

</script>
