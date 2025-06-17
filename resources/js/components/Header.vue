<template>
    <nav class="bg-gray-100 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="#" class="text-xl font-bold text-blue-600">MySite</a>
                </div>

                <!-- Toggle button (mobile) -->
                <div class="md:hidden">
                    <button @click="toggleMenu" class="text-gray-700 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Desktop menu -->
                <div class="hidden md:flex space-x-6">
                    <RouterLink to="/" class="text-gray-700 hover:text-blue-600">Home</RouterLink>
                    <RouterLink v-for="category in categories" :key="category.id" to="/"
                        class="text-gray-700 hover:text-blue-600 capitalize">{{ category.title }}</RouterLink>
                </div>
            </div>

            <!-- Mobile menu -->
            <div v-if="isOpen" class="md:hidden pt-2 pb-4 space-y-2">
                <RouterLink to="/" class="block text-gray-700 hover:text-blue-600">Home</RouterLink>
                <RouterLink v-for="category in categories" :key="category.id" href="/"
                    class="text-gray-700 hover:text-blue-600 capitalize">{{ category.title }}</RouterLink>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { RouterLink } from 'vue-router';

const isOpen = ref(false);
const categories = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get('/categories');
        categories.value = response.data?.data;
    } catch (error) {
        console.error('Error fetching categories:', error);
    }
});

const toggleMenu = () => {
    isOpen.value = !isOpen.value;
};
</script>
