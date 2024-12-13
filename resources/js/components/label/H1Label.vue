<template>
    <h1 class="text-5xl font-extrabold text-ternary-dark dark:text-ternary-light">
        <slot />
    </h1>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'H1Label',
})
</script>
