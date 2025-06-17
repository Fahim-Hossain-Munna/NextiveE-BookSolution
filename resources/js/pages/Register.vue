<template>
    <div class="h-screen lg:h-[calc(100vh-120px)] flex fle-col items-center justify-center">
        <div class="py-6 px-4">
            <div class="grid md:grid-cols-1 items-center gap-6 max-w-6xl w-full">
                <div
                    class="border border-slate-300 rounded-lg p-6 max-w-md shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] max-md:mx-auto">
                    <form class="space-y-6" @submit.prevent="handleLogin">
                        <div class="mb-12">
                            <h3 class="text-slate-900 text-3xl font-semibold">Sign Up</h3>
                        </div>

                        <div>
                            <label class="text-slate-800 text-sm font-medium mb-1 block">User name</label>
                            <div class="relative flex items-center">
                                <input name="username" type="text" required
                                    class="w-full text-sm text-slate-800 border border-slate-300 pl-4 pr-10 py-3 rounded-lg outline-blue-600"
                                    placeholder="Enter user name" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                                    <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                    <path
                                        d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                        data-original="#000000"></path>
                                </svg>
                            </div>
                        </div>

                        <div>
                            <label class="text-slate-800 text-sm font-medium mb-1 block">Email Address</label>
                            <div class="relative flex items-center">
                                <input name="email" type="text" required v-model="email"
                                    class="w-full text-sm text-slate-800 border border-slate-300 pl-4 pr-10 py-3 rounded-lg outline-blue-600"
                                    placeholder="Enter your email" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                                    <path
                                        d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 2v.511l-8 5.33-8-5.33V6h16zM4 18v-9.191l8 5.33 8-5.33V18H4z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <div>
                            <label class="text-slate-800 text-sm font-medium mb-1 block">Password</label>
                            <div class="relative flex items-center">
                                <input name="password" type="password" required v-model="password"
                                    class="w-full text-sm text-slate-800 border border-slate-300 pl-4 pr-10 py-3 rounded-lg outline-blue-600"
                                    placeholder="Enter password" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                                    <path
                                        d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"
                                        data-original="#000000"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="!mt-12">
                            <button type="submit"
                                class="w-full shadow-xl py-1.5 px-4 text-[15px] font-medium tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none cursor-pointer">
                                Sign Up
                            </button>
                            <p class="text-sm !mt-3 text-center text-slate-500">Already have an account <a
                                    href="javascript:void(0);"
                                    class="text-blue-600 font-medium hover:underline ml-1 whitespace-nowrap">Login
                                    here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '@/store/authStore'
import axios from 'axios'

const email = ref('')
const password = ref('')
const error = ref(null)
const router = useRouter()
const authStore = useAuthStore()

const handleLogin = async () => {

    const response = await axios.post('login', {
        email: email.value,
        password: password.value
    })

    if (response.data.data.token != null) {
        authStore.login(response.data.data.user, response.data.data.token)
        router.push('/')
    }
}


onMounted(() => {
})
</script>
