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
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
              viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>

        <!-- Desktop menu -->
        <div class="hidden md:flex space-x-6">
          <a href="#" class="text-gray-700 hover:text-blue-600">Home</a>
          <a href="#" class="text-gray-700 hover:text-blue-600">About</a>
          <a href="#" class="text-gray-700 hover:text-blue-600">Services</a>
          <a href="#" class="text-gray-700 hover:text-blue-600">Contact</a>
        </div>
      </div>

      <!-- Mobile menu -->
      <div v-if="isOpen" class="md:hidden pt-2 pb-4 space-y-2">
        <a href="#" class="block text-gray-700 hover:text-blue-600">Home</a>
        <a href="#" class="block text-gray-700 hover:text-blue-600">About</a>
        <a href="#" class="block text-gray-700 hover:text-blue-600">Services</a>
        <a href="#" class="block text-gray-700 hover:text-blue-600">Contact</a>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { ref } from 'vue';

const isOpen = ref(false);

const toggleMenu = () => {
  isOpen.value = !isOpen.value;
};
</script>
