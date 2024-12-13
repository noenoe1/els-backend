<template>
    <default-label class="select-none inline-flex items-center">
    <input type="checkbox" class="relative w-5 h-5 aspect-square !appearance-none 
        !bg-none checked:!bg-gradient-to-tr checked:!from-primary-400 checked:!to-white bg-white 
        border border-gray-300 shadow-sm rounded !outline-none !ring-0 !text-transparent 
        !ring-offset-0 checked:!border-primary-400 hover:!border-primary-400 cursor-pointer 
        transition-all duration-300 ease-in-out focus-visible:!outline-offset-2 focus-visible:!outline-2 
        focus-visible:!outline-primary-400/30 focus-visible:border-primary-400 after:w-[35%] after:h-[53%] 
        after:absolute after:opacity-0 after:top-[40%] after:left-[50%] after:-translate-x-2/4 
        after:-translate-y-2/4 after:rotate-[25deg] after:drop-shadow-[1px_0.5px_1px_rgba(56,149,248,0.5)] 
        after:border-r-[0.20em] after:border-r-white after:border-b-[0.20em] after:border-b-white after:transition-all 
        after:duration-200 after:ease-linear checked:after:opacity-100 checked:after:rotate-45 me-2"
        @input="handleInput($event.target.checked)">
    
        {{labelName}}
    </default-label>
</template>

<script lang="js">
import { defineComponent } from 'vue'
import DefaultLabel from '../label/DefaultLabel.vue';

export default defineComponent({
    name: "CheckBox",
    components: {
        DefaultLabel
    },
    props: {
        value: {
            type: Boolean,
        },
        labelName: {
            type: String,
            default: 'label'
        },
    },
    setup(_, { emit }) {
        function handleInput(v) {
            let checkValue;
            if(v == false) {
                checkValue = '0';
            }else{
                checkValue = '1';
            }
            emit("update:value", checkValue);
        }

        return {
            handleInput,
        };
    }
    
})
</script>
