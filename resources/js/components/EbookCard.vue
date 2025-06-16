<template>
    <div class="max-w-xs bg-white shadow-lg rounded-lg overflow-hidden transition hover:shadow-xl">
        <!-- Book Cover -->
        <img :src="book.image" alt="E-Book Cover" class="w-full h-60 object-cover" />

        <!-- Book Details -->
        <div class="p-5">
            <h3 class="text-xl font-semibold text-gray-800">{{ book.title }}</h3>
            <p class="text-sm text-gray-500 mb-2">by {{ book.author }}</p>

            <p class="text-gray-700 text-sm mb-4">
                {{ book.description }}
            </p>

            <div class="flex items-center justify-between">
                <span class="text-lg font-bold text-blue-600">${{ book.price }}</span>
                <button @click="purchaseBook"
                    class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition">
                    Purchase
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useRouter } from 'vue-router';
const router = useRouter();

const book = {
    title: 'Mastering Vue 3',
    author: 'Fahim Hossain Munna',
    price: 12.99,
    image: 'https://placehold.co/400x300?text=E-Book+Cover',
    description:
        'A complete guide to modern Vue.js development, covering composition API, Vue Router, and best practices.',
};

const purchaseBook = () => {
    router.push('/enrollment');
    // alert(`Purchased "${book.title}" for $${book.price}`);
};
</script>
