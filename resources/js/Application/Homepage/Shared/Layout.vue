<template>
    <meta-header :title="headerTitle">
        <template #robots>
            <meta
                head-key="robots"
                name="robots"
                content="noindex, nofollow"
                v-if="noIndexNoFollow"
            />
            <meta
                head-key="robots"
                name="robots"
                content="index, follow"
                v-else
            />
        </template>

        <template #description>
            <meta
                head-key="description"
                name="description"
                :content="headerDescription"
            />
            <link rel="canonical" v-if="headerUrl" :href="headerUrl" />
        </template>

        <template #opengraph>
            <meta
                head-key="og:title"
                property="og:title"
                :content="headerTitle"
            />
            <meta
                property="og:description"
                head-key="og:description"
                :content="headerDescription"
            />
            <meta
                v-if="headerUrl"
                head-key="og:url"
                property="og:url"
                :content="headerUrl"
            />
            <meta
                v-if="headerImage"
                head-key="og:image"
                property="og:image"
                :content="headerImage"
            />
            <meta head-key="og:type" property="og:type" content="website" />
        </template>
    </meta-header>
</template>
<script>
import { ref } from "vue";

import MetaHeader from "@/Application/Homepage/Shared/MetaHeader.vue";

import BrandHeader from "@/Application/Shared/BrandHeader.vue";
import LinkHeader from "@/Application/Shared/LinkHeader.vue";

import BrandFooter from "@/Application/Shared/BrandFooter.vue";
import LinkFooter from "@/Application/Shared/LinkFooter.vue";

import Toast from "@/Application/Components/Content/Toast.vue";

import ButtonChangeMode from "@/Application/Components/ButtonChangeMode.vue";

import Favicon from "@/Application/Components/Logo/Favicon.vue";

import IconMenu from "@/Application/Components/Icons/Menu.vue";
import IconClose from "@/Application/Components/Icons/Close.vue";

import IconFacebook from "@/Application/Components/Icons/SocialMedia/Facebook.vue";
import IconLinkedIn from "@/Application/Components/Icons/SocialMedia/LinkedIn.vue";
import IconYoutube from "@/Application/Components/Icons/SocialMedia/Youtube.vue";

export default {
    name: "Homepage_Shared_Layout",

    components: {
        MetaHeader,
        BrandHeader,
        LinkHeader,
        BrandFooter,
        LinkFooter,
        Toast,
        ButtonChangeMode,
        Favicon,
        IconMenu,
        IconClose,
        IconFacebook,
        IconLinkedIn,
        IconYoutube,
    },

    props: {
        headerTitle: {
            type: String,
            default: "Starter Eleven",
        },
        headerDescription: {
            type: String,
            default:
                "Starter Eleven - Grundlage für SaaS-Anwendungen.",
        },
        headerUrl: {
            type: String,
            default: null,
        },
        headerImage: {
            type: String,
            default: null,
        },
        noIndexNoFollow: {
            type: Boolean,
            default: false,
        },
    },

    setup(props) {
        const mode = ref();
        const isOpen = ref(false);
        const year = ref(new Date().getFullYear());
        //
        if (localStorage.theme) {
            mode.value = localStorage.theme;
        }
        //
        function changeMode(value) {
            //console.log("changeMode: ", value);
            //
            mode.value = value;
            isOpen.value = false;
            //
            localStorage.theme = mode.value;
        }
        //
        function toggleNavbar() {
            //console.log("toggleNavbar: ", this.isOpen);
            this.isOpen = !this.isOpen;
            //console.log("toggleNavbar: ", this.isOpen);
        }
        //
        //
        return {
            mode,
            isOpen,
            year,
            changeMode,
            toggleNavbar,
        };
    },
};
</script>
