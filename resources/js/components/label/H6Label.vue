<template>
    <h6 class="text-lg font-bold dark:text-ternary-light">
        <slot />
    </h6>
</template>
<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'H6Label',
})
</script>