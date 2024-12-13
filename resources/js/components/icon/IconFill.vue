<template>

    <div class="flex space-x-2">
        <!-- <svg :class="[textColor]" :style="styleText" :viewBox="viewBox">
            <path fill="currentColor" :d="path" />
        </svg> -->
        <svg xmlns="http://www.w3.org/2000/svg" :style="styleText" :viewBox="viewBox" fill="currentColor">
            <path fill-rule="evenodd" :d="path" clip-rule="evenodd" />
        </svg>
    </div>
    
</template>

<script>
import { defineComponent } from 'vue';
import icons from './Icons.json';

export default defineComponent({
    name : 'IconFill',
    props: {
        name: String,
        styleText : {
            type: String,               
            default: 'width:24px;height:24px',
        },
        viewBox : {
            type: String,               
            default: '0 0 24 24',
        },
        textColor : {
            type: String,               
            default: 'text-white',            
        }        
    },
    computed: {
        path() {
            return icons[this.name];
        },
    },
});
</script>