<template>
    <div class="relative max-w-xs">
        <input type="text" name="search" placeholder="Search..."
            :value="value"
            @input="handleInput($event.target.value)"
            class="block w-full p-3 pl-10 text-sm border border-gray-200 rounded-md focus:border-blue-500 
            focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">

        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 text-gray-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                />
            </svg>
        </div>
    </div>
    
</template>

<script lang="js">
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'InputIcon',
    props: {
        value: {
            type: String,
            default: ""
        },
    },
    setup(_, {emit}) {

        function handleInput(v) {
            
            emit('update:value',v);

        }

        return {
            handleInput
        }
    }
})
</script>
