<template>
    <h3 class="text-3xl font-bold text-ternary-dark dark:text-ternary-light">
        <slot />
    </h3>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'H3Label',
})
</script>
