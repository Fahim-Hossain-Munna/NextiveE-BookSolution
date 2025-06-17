<template>
    <div class="max-w-xs bg-white shadow-lg rounded-lg overflow-hidden transition hover:shadow-xl">
        <!-- Book Cover -->
        <img :src="book.thumbnail" alt="E-Book Cover" class="w-full h-60 object-cover" />

        <!-- Book Details -->
        <div class="p-5">
            <h3 class="text-xl font-semibold text-gray-800">{{ book.title }}</h3>
            <p class="text-sm text-gray-500 mb-2">by {{ book.author.name }}</p>

            <p class="text-gray-700 text-sm mb-4" v-html="book.description">
            </p>

            <div class="flex items-center justify-between">
                <span class="text-lg font-bold text-blue-600">${{ book.price }}</span>
                <button @click="purchaseBook(book.slug, book.id)"
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

let props = defineProps({
    book: 'Object'
});


const purchaseBook = ($slug, $id) => {
    router.push(`/enrollment/${$slug}/${$id}`);
};
</script>
