// AppIcon.vue
// https://materialdesignicons.com/
<template>

  <svg v-if="default" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" :class="widthHeight">
    <path :d="path" />
  </svg>

  <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none" :viewBox="viewBox" stroke-width="1.5" stroke="currentColor" :class="widthHeight">
      <path stroke-linecap="round" stroke-linejoin="round" :d="path" />
  </svg>

</template>

<script lang="js">
import icons from './Icons.json';

export default {
  name: 'AppIcon',
  props: {
    name: String,
    widthHeight : {
        type : String,
        default : "w-6 h-6"
    },
    viewBox : {
      type : String,
      default : "0 0 24 24"
    },
    default: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    path() {
      return icons[this.name];
    },
   
  },
};
</script>
