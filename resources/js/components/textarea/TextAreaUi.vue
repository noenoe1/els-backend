<template>
    <textarea :rows="rows" :value="value" @input="handleInput($event.target.value)"
    class="mt-1 block w-full rounded border-gray-300 bg-gray-50 py-3 px-4
                    text-sm placeholder-gray-300 shadow-sm outline-none transition focus:ring-2
                    focus:ring-teal-500"/>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'TextAreaUi',
    props: {
        value: {
            type: String
        },
        rows: {
            type: Number,
            default: 3
        },
    },
    setup(props,{emit}) {
        function handleInput(v) {
            emit('update:value',v)
        }

        return {
            handleInput
        }
    }
})
</script>
