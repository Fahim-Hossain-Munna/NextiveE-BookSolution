<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h4 class="text-3xl font-bold mb-6 text-blue-600">Welcome to the E-Book Store</h4>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
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
