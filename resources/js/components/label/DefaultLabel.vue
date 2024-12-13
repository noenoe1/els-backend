<template>
    <label class="block text-sm font-medium leading-6" :class="textColor">
        <slot />
    </label>

</template>

<script lang="js">
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'DefaultLabel',
    props: {
        textColor: {
            type: String,
            default: 'text-ternary-dark dark:text-ternary-light'
        }
    },
    setup() {
        
    },
})
</script>