<template>
    <label class="lg:text-xs sm:text-xxs text-3xs" :class="textColor"  >
        <slot />
    </label>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
    name : 'LabelCaption',
    props: {
        textColor : {
            type: String,
            default: 'text-secondary-800 dark:text-secondaryDark-grey',
        }
    }
});
</script>