<template>
    <button type="button" :class="[bgColor,rounded,textColor,padding,borderStyle]"
    class="inline-flex items-center justify-center   
            text-center text-sm text-base font-bold text-ternary-dark dark:text-ternary-light transition-all duration-200 ease-in-out focus:shadow"
    >
        <slot />
  </button>
</template>

<script lang="js">
import { defineComponent } from 'vue'

export default defineComponent({
    name: "ButtonUi",
    props: {
        bgColor: {
            type: String,
            default: 'bg-gray-900 hover:bg-gray-800'
        },
        rounded: {
            type: String,
            default: 'rounded-md'
        },
        textColor: {
            type: String,
            default: 'text-primary-300 dark:primary-light'
        },
        padding: {
            type: String,
            default: 'px-4 py-2'
        },
        borderStyle: {
            type: String,
            default: 'border-2 border-transparent'
        }
    },
    components: {
    }
})
</script>
