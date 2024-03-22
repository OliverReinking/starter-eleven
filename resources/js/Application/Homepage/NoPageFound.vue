<template>
    <layout
        header-title="Seite nicht gefunden"
        :header-url="$page.props.saas_url + '/no_page_found'"
    >
        <h1
            class="font-logo text-4xl font-bold tracking-tight sm:text-5xl sm:leading-none"
        >
            Seite nicht gefunden!
        </h1>
    </layout>
</template>
<script>
import { defineComponent } from "vue";
import Layout from "@/Application/Homepage/Shared/Layout.vue";

export default defineComponent({
    name: "Homepage_NoPageFound",

    components: {
        Layout,
    },
});
</script>
