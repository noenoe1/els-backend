<template>
    <h4 class="text-2xl font-bold text-ternary-dark dark:text-ternary-light">
        <slot />
    </h4>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'H4Label',
})
</script>
