<template>
    <!-- SideBar -->
    <div class="bg-primary-400 dark:bg-secondary-dark text-primary-100 w-full space-y-6 px-2 py-4 absolute inset-y-0 left-0
    relative -translate-x-0 transform 
    transition-duration-200 ease-in-out" >
        <a href="" class="flex items-center space-x-2 px-2">
            <span class="hidden md:block text-2xl font-extrabold">ELS</span>
        </a>

        <nav class="space-y-2">
            <Link :href="route('home')" class="group flex items-center space-x-2 py-3 px-4 hover:bg-primary-600 rounded hover:text-primary-300" 
                :class="$page.url =='/' ? 'bg-primary-600':''">
                <icon-fill name="dashboard" class="w-6 h-6" />
                
                <span class="hidden md:block text-white group-hover:text-primary-300">Dashboard</span>
            </Link>

            <Link  :href="route('courses.index')" class="group flex items-center space-x-2 py-3 px-4 hover:bg-primary-600 rounded hover:text-primary-300" 
                :class="$page.url.startsWith('/courses') ? 'bg-primary-600':''">
                <icon-fill name="order" class="w-6 h-6" />
                <span class="hidden md:block text-white group-hover:text-primary-300">Courses</span>
            </Link>

        </nav>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/inertia-vue3'
import IconFill from '../components/icon/IconFill.vue';

let isDropdownActive = ref(false);
let ismenuActive = ref(false);

if(route().current('products.*')) {
    ismenuActive.value = true;
}

if(route().current('categories.*')) {
    ismenuActive.value = true;
}

if(route().current() == 'subcategories.index') {
    ismenuActive.value = true;
}

const sidebarMenuOpen = () => {
    isDropdownActive.value = !isDropdownActive.value;

    if( isDropdownActive.value == false ) {
        ismenuActive.value = false;
    }

}

</script>
