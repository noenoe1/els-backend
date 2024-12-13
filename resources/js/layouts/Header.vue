<template>
    <div class="flex h-16 shadow px-2 py-4 justify-between primary-light dark:bg-primary-dark">
        <button @click="onClick()" class="font-extrabold text-primary-600">
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
        </button>

        <div class="flex items-center space-x-4">
            <Link v-if="$page.props.user.id" :href="route('auth.logout')" class="block px-4 py-2  text-primary-600 dark:text-ternary-light hover:bg-primary-500 hover:text-white">Sign Out</Link>
        </div>
    </div>
</template>

<script>
import { defineComponent, ref, onMounted } from 'vue';
import Icon from '../components/icon/Icon.vue';
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
    name: 'Header',
    components: {
        Icon,
    },
    props: {
        showSidebar: {
            type : Boolean,
            default: false
        },
        onClick : Function
    },
    setup() {
        let token = localStorage.getItem('token');
        
        return {
            token
        }
    }
})
</script>
