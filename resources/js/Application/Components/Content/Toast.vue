<template>
    <!-- Toast -->
    <div v-if="message && show" class="mx-1 md:mx-4 lg:mx-8 mt-4 mb-4">
        <div
            class="flex items-center w-full p-4 mb-4 rounded-lg shadow text-sun-layout-900 dark:text-night-layout-900"
            :class="alertClass"
            role="alert"
        >
            <div
                v-if="type == 'success'"
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg text-sun-layout-900 bg-sun-layout-0 dark:text-night-layout-900 dark:bg-night-layout-0"
            >
                <icon-done class="w-5 h-5"></icon-done>
            </div>
            <div
                v-if="type == 'error'"
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg text-sun-layout-900 bg-red-500 dark:text-night-layout-900 dark:bg-red-500"
            >
                <icon-exclamation class="w-5 h-5"></icon-exclamation>
            </div>
            <div class="ml-3 text-base font-normal">
                <span v-html="$t(message)"></span>
            </div>
            <button
                type="button"
                class="ml-auto -mx-1.5 -my-1.5 rounded-full p-1.5 inline-flex h-8 w-8 focus:ring-2
                    text-sun-layout-700 hover:text-sun-layout-0 hover:bg-sun-layout-1000
                    focus:ring-sun-layout-300
                    dark:text-night-layout-700 dark:hover:text-night-layout-0 dark:hover:bg-night-layout-1000
                    dark:focus:ring-night-layout-300
                    border border-sun-layout-500 dark:border-sun-layout-500
                    "
                @click.prevent="show = false"
            >
                <span class="sr-only">Close</span>
                <icon-close class="w-5 h-5"></icon-close>
            </button>
        </div>
    </div>
    <!-- ENDS Toast -->
</template>
<script>
import IconDone from '@/Pages/Components/Icons/Done.vue'
import IconExclamation from '@/Pages/Components/Icons/Exclamation.vue'
import IconClose from '@/Pages/Components/Icons/Close.vue'

export default {
    name: 'Content_Toast',

    components: {
        IconDone,
        IconExclamation,
        IconClose
    },

    data () {
        return {
            show: true,
            type: 'success',
            message: null,
            alertClass: ''
        }
    },
    //
    created () {
        this.getMessage()
    },
    //
    watch: {
        '$page.props.flash': {
            handler () {
                this.getMessage()
            },
            deep: true,
            immediate: true
        }
    },
    //
    methods: {
        getMessage () {
            if (this.$page.props.flash.error) {
                this.type = 'error'
                this.message = this.$page.props.flash.error
            }
            //
            if (this.$page.props.flash.warning) {
                this.type = 'warning'
                this.message = this.$page.props.flash.warning
            }
            //
            if (this.$page.props.flash.success) {
                this.type = 'success'
                this.message = this.$page.props.flash.success
            }
            //
            this.show = true

            this.alertClass = this.determineAlertClass(this.type)
        },
        determineAlertClass (type) {
            switch (type) {
                case 'success':
                    return 'border border-green-200 dark:border-green-800'
                case 'warning':
                    return 'border border-orange-200 dark:border-orange-800'
                case 'error':
                    return 'border border-red-200 dark:border-red-800'
                default:
                    return 'border border-sun-layout-200 dark:border-night-layout-200' // return a default class or an empty string
            }
        }
    }
}
</script>
