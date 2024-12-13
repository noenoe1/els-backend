<template>
    <h2 class="text-4xl font-bold text-ternary-dark dark:text-ternary-light">
        <slot />
    </h2>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'H2Label',
})
</script>
