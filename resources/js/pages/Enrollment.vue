<template>
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Complete Your Purchase</h1>

        <div class="grid md:grid-cols-2 gap-6 bg-white shadow-lg rounded-xl p-6">
            <!-- Book Info -->
            <div>
                <img :src="book.thumbnail" alt="Book Cover" class="rounded-lg mb-4 w-full h-72 object-cover" />
                <h2 class="text-xl font-semibold text-gray-800">{{ book.title }}</h2>
                <p class="text-sm text-gray-600 mb-2">by {{ book.author?.name }}</p>
                <div class="text-lg font-bold text-blue-600">${{ book.price }}</div>
            </div>

            <!-- Billing Form -->
            <form @submit.prevent="handlePurchase" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input v-model="form.full_name" type="text" placeholder="Your full name"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input v-model="form.email" type="email" placeholder="you@example.com"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Card Number</label>
                    <input v-model="form.card_number" type="text" placeholder="1234 5678 9012 3456"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200" />
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Expiry</label>
                        <input v-model="form.expiry" type="text" placeholder="MM/YY" @input="formatExpiry"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">CVC</label>
                        <input v-model="form.cvc" type="text" placeholder="123"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200" />
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
import { onMounted, reactive, ref } from 'vue'
import { useRoute } from 'vue-router';
import Swal from 'sweetalert2';
import { useAuthStore } from '@/store/authStore';

const route = useRoute();
const book = ref({});
const authStore = useAuthStore();

onMounted(async () => {
    try {
        const response = await axios.get(`/book/${route.params.id}`, {
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                Authorization: `${authStore.token}`,
            },
        });
        book.value = response.data?.data;
    } catch (error) {
        console.error('Error fetching book details:', error);
    }
});

const form = reactive({
    full_name: '',
    email: '',
    card_number: '',
    expiry: '',
    cvc: '',
})

const formatExpiry = (event) => {
    let value = event.target.value.replace(/\D/g, '');
    if (value.length >= 2) {
        value = value.slice(0, 2) + '/' + value.slice(2, 4);
    }
    form.expiry = value;
};

const handlePurchase = async () => {
    try {
        const response = await axios.post('/transaction', {
            ...form,
            book_id: book.value.id,
        }, {
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                Authorization: `${authStore.token}`,
            },
        });
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: "Payment successful! Your purchase is complete. Thank you!",
        });

    } catch (error) {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "error",
            title: "Error processing payment. Please try again.",
        });

    }
}
</script>
