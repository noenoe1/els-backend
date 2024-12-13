<template>
    <button class="text-sm font-medium rounded" :class="[padding,bgColor,textColor]">
        <svg v-show="isLoading" class="w-5 h-5 text-white animate-spin" fill="none"
            viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75"
                d="M4 12a8 8 0 018-8V0C5.353 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                fill="currentColor"></path>
        </svg>
        <span v-if="!isLoading">
            <slot></slot>
        </span>
    </button>
</template>

<script lang="js">
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'ButtonLoading',
    props: {
        bgColor: {
            type: String,
            default: 'bg-gray-900 bg-none hover:bg-gray-800'
        },
        rounded: {
            type: String,
            default: 'rounded-md'
        },
        textColor: {
            type: String,
            default: 'text-white'
        },
        padding: {
            type: String,
            default: "px-4 py-2"
        },
        isLoading: {
            type: Boolean,
            default: false
        }
    },
})
</script>
