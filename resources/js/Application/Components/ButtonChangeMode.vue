<template>
    <button
        type="button"
        @click="changeMode"
        class="flex items-center flex-nowrap cursor-pointer rounded-md px-4 py-2 border border-transparent leading-4 font-medium bg-transparaent transition focus:outline-none"
        :class="class"
    >
        <span v-if="mode == 'light'">
            <icon-night class="w-4 h-4"></icon-night>
        </span>
        <span v-else>
            <icon-sun class="w-4 h-4"></icon-sun>
        </span>
    </button>
</template>
<script>
import { defineComponent } from 'vue'

import IconNight from '@/Pages/Components/Icons/Night.vue'
import IconSun from '@/Pages/Components/Icons/Sun.vue'

export default defineComponent({
    name: 'Component_ButtonChangeMode',

    components: {
        IconNight,
        IconSun
    },

    emits: ['changeMode'],

    props: {
        mode: {
            type: String,
            default: 'light'
        },
        class: {
            type: String,
            default:
                `cursor-pointer inline-block rounded-lg px-2 py-1 text-sm
                text-sun-layout-700 hover:bg-sun-layout-100 hover:text-sun-layout-900
                dark:text-night-layout-700 dark:hover:bg-night-layout-100 dark:hover:text-night-layout-900`
        }
    },

    setup (props) {
        function changeMode () {
            let value = 'light'
            if (props.mode == 'light') {
                value = 'dark'
            }
            this.$emit('changeMode', value)
        }

        return {
            changeMode
        }
    }
})
</script>
