<template>
    <div v-if="display_type == 'button'">
        <a
            :href="href"
            :target="target"
            class="
                inline-flex
                items-center
                px-2
                py-1.5
                md:px-4
                md:py-2
                h-6
                md:h-8
                rounded-md
                font-medium
                text-xs
                tracking-widest
                disabled:opacity-25
                transition
                cursor-pointer
                focus:ring
                focus:outline-none

                button_bg
                button_text_case_bg
            "
        >
            <div class="flex items-center whitespace-nowrap">
                <slot name="icon"></slot>
                <slot></slot>
            </div>
        </a>
    </div>
    <div v-if="display_type == 'table'">
        <a
            :href="href"
            :target="target"
            class="
                inline-flex items-center px-1.5 py-0.5 h-8 rounded-md font-medium text-xs tracking-widest disabled:opacity-25
                transition cursor-pointer
                focus:ring focus:outline-none
                button_border
                button_text_case_border
                "
        >
                <slot name="icon"></slot>
                <slot></slot>
        </a>
    </div>
    <div v-if="display_type == 'table_danger'">
        <a
            :href="href"
            :target="target"
            class="
                inline-flex items-center px-1.5 py-0.5 h-8 rounded-md font-medium text-xs tracking-widest disabled:opacity-25
                transition cursor-pointer
                focus:ring focus:outline-none
                button_danger_border
                button_danger_text_case_border
                "
        >
                <slot name="icon"></slot>
                <slot></slot>
        </a>
    </div>
    <div v-if="display_type == 'display'">
        <a
            :href="href"
            :target="target"
            class="
                inline-flex items-center px-0 py-1 h-6 rounded-md font-medium text-xs tracking-widest disabled:opacity-25
                transition cursor-pointer
                focus:ring focus:outline-none
                border border-transparent
                button_text_case_border"
        >
            <div class="flex items-center whitespace-nowrap">
                <slot name="icon"></slot>
                <slot></slot>
            </div>
        </a>
    </div>
</template>

<script>
export default {
    name: 'Form_InputIconlink',

    props: {
        href: {
            type: String,
            required: true
        },
        target: {
            type: String,
            default: ''
        },
        display_type: {
            type: String,
            default: 'button'
        }
    }
}
</script>
