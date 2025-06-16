<template>
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Complete Your Purchase</h1>

        <div class="grid md:grid-cols-2 gap-6 bg-white shadow-lg rounded-xl p-6">
            <!-- Book Info -->
            <div>
                <img :src="book.image" alt="Book Cover" class="rounded-lg mb-4 w-full h-auto object-cover" />
                <h2 class="text-xl font-semibold text-gray-800">{{ book.title }}</h2>
                <p class="text-sm text-gray-600 mb-2">by {{ book.author }}</p>
                <p class="text-gray-700 text-sm mb-4">
                    {{ book.description }}
                </p>
                <div class="text-lg font-bold text-blue-600">${{ book.price }}</div>
            </div>

            <!-- Billing Form -->
            <form @submit.prevent="handlePurchase" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input v-model="form.name" type="text" placeholder="Your full name"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200"
                        required />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input v-model="form.email" type="email" placeholder="you@example.com"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200"
                        required />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Card Number</label>
                    <input v-model="form.cardNumber" type="text" placeholder="1234 5678 9012 3456"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200"
                        required />
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Expiry</label>
                        <input v-model="form.expiry" type="text" placeholder="MM/YY"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200"
                            required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">CVC</label>
                        <input v-model="form.cvc" type="text" placeholder="123"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200"
                            required />
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition">
                    Purchase Now
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { reactive } from 'vue'

const book = {
    title: 'Mastering Vue 3',
    author: 'Fahim Hossain Munna',
    price: 12.99,
    image: 'https://placehold.co/400x300?text=E-Book+Cover',
    description: 'Learn Vue 3 with hands-on examples, Composition API, and modern best practices.',
}

const form = reactive({
    name: '',
    email: '',
    cardNumber: '',
    expiry: '',
    cvc: '',
})

const handlePurchase = () => {
    alert(`Thank you, ${form.name}! You’ve purchased "${book.title}" for $${book.price}.`)
    // You can replace this alert with actual API call or Vue Router redirect
}
</script>
