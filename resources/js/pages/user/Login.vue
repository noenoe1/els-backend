<template>
   
    <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
        
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-auto h-10 mx-auto text-primary-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-2.25-1.313M21 7.5v2.25m0-2.25l-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3l2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75l2.25-1.313M12 21.75V19.5m0 2.25l-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" />
            </svg>
            <h-2-label class="mt-10">Sign in to your account</h-2-label>
        </div>

        <Alert v-if="errors.message" :text="errors.message" bgColor="bg-red-100" 
        borderColor="border border-red-400" textColor="text-red-700" class="m-4" />

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" @submit.prevent="form.post(route('auth.login'))">

                <div>
                    <default-label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</default-label>
                    <div class="mt-2">
                        <input v-model="form.email" id="email" name="email" type="email" required class="block w-full 
                        rounded-md border-0 px-4 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                        focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>

                <div>
                    <default-label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</default-label>
                    <div class="mt-2">
                        <input v-model="form.password" id="password" name="password" type="password" required class="block w-full 
                        rounded-md border-0 px-4 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                        focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>

                <div>
                    <button class="flex w-full justify-center rounded-md bg-primary-600 px-3 py-1.5 text-sm
                    font-semibold leading-6 text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2
                    focus-visible:outline-offset-2 focus-visible:outline-primary-600">Login</button>
                </div>
            </form>

            <p class="mt-2 text-center text-sm text-gray-500">
                <Link :href="route('auth.showRegister')" class="flex w-full justify-center rounded-md bg-primary-600 px-3 py-1.5 text-sm
                    font-semibold leading-6 text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2
                    focus-visible:outline-offset-2 focus-visible:outline-primary-600">Register</Link>
            </p>

        </div>
    </div>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3';
import H2Label from '../../components/label/H2Label.vue';
import DefaultLabel from '../../components/label/DefaultLabel.vue';
import Alert from '../../components/alert/Alert.vue';
 
let form = useForm({
    email: '',
    password: '',
    remember: false
});

defineProps({ errors: Object })

</script>
