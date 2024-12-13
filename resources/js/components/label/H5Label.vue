<template>
    <h5 class="text-lg font-bold dark:text-ternary-light">
        <slot />
    </h5>
</template>
<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'H5Label',
})
</script>