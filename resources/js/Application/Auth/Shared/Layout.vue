<template>
    <Head :title="title"></Head>
    <div
        class="flex flex-col bg-layout-sun-100 text-layout-sun-900 dark:bg-layout-night-100 dark:text-layout-night-900"
    >
        <!-- Header -->
        <header class="p-4 w-full bg-layout-sun-200 dark:bg-layout-night-200">
            <nav
                class="container mx-auto md:max-w-6xl px-2 lg:px-8 py-2.5 rounded"
            >
                <div class="flex flex-wrap justify-between items-center">
                    <div class="flex flex-col items-center">
                        <brand-header
                            :route-name="route('home.index')"
                            :brand_1="$page.props.applications.brand_name_1"
                            :brand_2="$page.props.applications.brand_name_2"
                            app-name="für Anwender"
                        ></brand-header>
                    </div>
                    <div>
                        <ul
                            class="flex flex-col items-center md:flex-row md:flex-nowrap md:space-x-8 md:mt-0 md:text-sm md:font-medium"
                        >
                            <li>
                                <link-header
                                    name="Home"
                                    :route-name="route('home.index')"
                                ></link-header>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Content -->
        <div
            class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 md:-mt-24"
        >
            <div>
                <slot name="logo" />
            </div>

            <div
                class="w-full sm:max-w-md mt-6 px-2 py-4 bg-layout-sun-0 dark:bg-layout-night-0 shadow-md overflow-hidden sm:rounded-lg"
            >
                <slot />
            </div>
        </div>

        <!-- Footer -->
        <footer
            class="p-4 w-full bg-layout-sun-100 text-layout-sun-800 dark:bg-layout-night-100 dark:text-layout-night-800"
        >
            <div
                class="container mx-auto md:max-w-6xl px-2 lg:px-8 py-2.5 rounded"
            >
                <div
                    class="flex flex-col md:flex-row flex-wrap justify-center md:justify-center items-center"
                >
                    <div>
                        <ul
                            class="flex flex-col items-center justify-center mt-4 md:flex-row md:flex-nowrap md:space-x-8 md:mt-0 md:text-sm md:font-medium"
                        >
                            <li>
                                <link-footer
                                    name="Datenschutzerklärung"
                                    :route-name="route('home.privacy')"
                                >
                                </link-footer>
                            </li>
                            <li>
                                <link-footer
                                    name="Impressum"
                                    :route-name="route('home.imprint')"
                                >
                                </link-footer>
                            </li>
                            <li>
                                <link-footer
                                    name="Nutzungsbedingungen"
                                    :route-name="route('home.terms')"
                                ></link-footer>
                            </li>
                            <li>
                                <link-footer
                                    name="Login"
                                    :route-name="route('login')"
                                ></link-footer>
                            </li>
                            <li>
                                <link-footer
                                    name="Register"
                                    :route-name="route('register')"
                                ></link-footer>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>
<script>
import { Head } from "@inertiajs/vue3";

import BrandHeader from "@/Application/Shared/BrandHeader.vue";
import LinkHeader from "@/Application/Shared/LinkHeader.vue";

import LinkFooter from "@/Application/Shared/LinkFooter.vue";

export default {
    name: "Auth_Shared_Layout",

    props: {
        title: {
            type: String,
            default: "Authentifizierung",
        },
    },

    components: {
        Head,
        BrandHeader,
        LinkHeader,
        LinkFooter,
    },
};
</script>
