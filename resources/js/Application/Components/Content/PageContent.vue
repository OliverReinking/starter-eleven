<template>
    <div class="text-layout-sun-800 dark:text-layout-night-800 rounded-lg">
        <slot name="content" />
    </div>
</template>

<script>
export default {
    name: "Content_PageContent",

    props: {
        title: {
            type: String,
            default: "",
        },
    },
};
</script>
