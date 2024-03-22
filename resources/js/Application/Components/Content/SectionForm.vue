<template>
    <div
        class="p-0.5 rounded-lg bg-layout-sun-50 text-layout-sun-800 dark:bg-layout-night-50 dark:text-layout-night-800"
    >
        <div class="flex flex-col">
            <div
                class="px-1 md:px-1 lg:px-2 py-2 border-t border-r border-l border-layout-sun-100 dark:border-layout-night-100 bg-layout-sun-0 text-layout-sun-800 dark:bg-layout-night-0 dark:text-layout-night-800"
                :class="
                    hasActions
                        ? 'lg:rounded-tl-lg lg:rounded-tr-lg'
                        : 'lg:rounded-lg border-b'
                "
                v-if="hasForm"
            >
                <slot name="form" />
            </div>
            <div
                v-if="hasActions"
                class="px-1 md:px-4 lg:px-8 py-2 border-l border-r border-b border-layout-sun-100 dark:border-layout-night-100 bg-layout-sun-200 dark:bg-layout-night-200 lg:rounded-bl-lg lg:rounded-br-lg"
            >
                <slot name="actions" />
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Content_SectionForm",

    emits: ["submitted"],

    props: {
        fullWidth: {
            type: Boolean,
            default: false,
        },
        withinAccordion: {
            type: Boolean,
            default: false,
        },
    },

    computed: {
        hasForm() {
            return !!this.$slots.form;
        },
        hasActions() {
            return !!this.$slots.actions;
        },
    },
};
</script>
