<template>
    <button class="inline-flex items-center justify-center text-sm font-semibold px-4 py-3" :class="[bgColor,rounded,textColor]">
        <icon :name="iconName" class="pr-2" :textColor="iconColor"/>
        <slot />
  </button>
</template>

<script lang="js">
import { defineComponent } from 'vue'
import Icon from '../icon/Icon.vue'

export default defineComponent({
    name: "ButtonIcon",
    components: {
        Icon
    },
    props: {
        iconName: {
            type: String,
            default: ''
        },
        bgColor: {
            type: String,
            default: 'bg-red-600 hover:bg-red-700'
        },
        rounded: {
            type: String,
            default: 'rounded'
        },
        textColor: {
            type: String,
            default: 'text-white'
        },
        iconColor: {
            type: String,
            default: 'text-white'
        }
    }
})
</script>
