<template>
   
    <main class="flex flex-col h-screen">
        <div class="flex flex-1 overflow-hidden primary-light dark:bg-primary-dark">
            <div class="w-20 md:w-64 flex bg-gray-100 " v-if="showSidebar">
                <SideBar />
            </div>
   
            <div class="flex flex-1 flex-col">
                <!-- Header -->
                <Header :showSidebar="showSidebar" :onClick="toggleSidebar"/>

                <!-- Content -->
                <div class="overflow-y-auto px-4 mt-10">
                    <slot name="breadcrumb"></slot>
                    <slot />

                </div>

            </div>

        </div>
    </main>
    
</template>

<script setup>
import { ref } from 'vue'
import SideBar from './SideBar.vue';
import Header from './Header.vue';

const showSidebar = ref(true);

const toggleSidebar = () => {
    showSidebar.value = !showSidebar.value;
}

</script>