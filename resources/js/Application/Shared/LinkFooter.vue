<template>
    <template v-if="routeName">
        <a
            class="cursor-pointer inline-block rounded-lg px-2 py-1 text-sm
                text-sun-layout-700 hover:bg-sun-primary-300 hover:text-sun-layout-900
                dark:text-night-layout-700 dark:hover:bg-night-primary-300 dark:hover:text-night-layout-900"
            :href="routeName"
        >
            <span>{{ name }}</span>
        </a>
    </template>
    <template v-else>
        <div
        class="cursor-pointer inline-block rounded-lg px-2 py-1 text-sm
                text-sun-layout-700 hover:bg-sun-primary-300 hover:text-sun-layout-900
                dark:text-night-layout-700 dark:hover:bg-night-primary-300 dark:hover:text-night-layout-900"
        >
            <slot></slot>
        </div>
    </template>
</template>

<script>
//
export default {
    name: 'Shared_LinkFooter',
    //
    props: {
        routeName: {
            type: String,
            default: null
        },
        name: {
            type: String,
            default: 'Starter Eleven'
        },
    }
}
</script>
