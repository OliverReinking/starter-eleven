<template>
    <Layout title="Login">
        <template #logo>
            <Favicon class="h-16" />
        </template>

        <PageContent v-if="isAlert">
            <template #content>
                <Alert
                    :type="alertType"
                    :title="alertTitle"
                    :description="alertText"
                ></Alert
            ></template>
        </PageContent>

        <PageContent v-if="loading">
            <template #content>
                <InputLoading
                    :loading="loading"
                    :loadingText="loadingText"
                ></InputLoading
            ></template>
        </PageContent>

        <div>
            status: {{ status }}
            <br />
            errors: {{ errors }}
            <br />
            isAlert: {{ isAlert }}
            <br />
            alertText: {{ alertText }}
        </div>

        <SectionForm>
            <template #form>
                <!-- Liste der Fehler -->
                <error-list :errors="errors" />

                <input-group>
                    <input-container :full-width="true">
                        <input-label
                            name="email"
                            label="Mailadresse"
                        ></input-label>
                        <input-element
                            type="email"
                            name="email"
                            v-model="form.email"
                            placeholder="Mailadresse"
                            ref="email"
                        ></input-element>
                        <input-error :message="errors.email" />
                    </input-container>

                    <input-container :full-width="true">
                        <input-label
                            name="password"
                            label="Kennwort"
                        ></input-label>
                        <input-element
                            type="password"
                            name="password"
                            v-model="form.password"
                            ref="password"
                        ></input-element>
                        <input-error :message="errors.password" />
                    </input-container>
                </input-group>

                <div class="my-4">
                    <input-hyperlink
                        :href="route('password.request')"
                        display_type="display"
                    >
                        Kennwort vergessen?</input-hyperlink
                    >
                </div>
            </template>
            <template #actions>
                <!-- Befehle -->
                <button-group>
                    <input-button type="button" @click.prevent="loginUser">
                        Anmelden
                    </input-button>
                </button-group>
            </template>
        </SectionForm>
    </Layout>
</template>
<script>
import { defineComponent } from "vue";

import Layout from "@/Application/Auth/Shared/Layout.vue";

import PageContent from "@/Application/Components/Content/PageContent.vue";
import SectionForm from "@/Application/Components/Content/SectionForm.vue";

import Favicon from "@/Application/Components/Logo/Favicon.vue";
import Alert from "@/Application/Components/Content/Alert.vue";

import InputLoading from "@/Application/Components/Form/InputLoading.vue";
import ErrorList from "@/Application/Components/Form/ErrorList.vue";
import InputGroup from "@/Application/Components/Form/InputGroup.vue";
import InputContainer from "@/Application/Components/Form/InputContainer.vue";
import InputLabel from "@/Application/Components/Form/InputLabel.vue";
import InputElement from "@/Application/Components/Form/InputElement.vue";
import InputError from "@/Application/Components/Form/InputError.vue";
import InputHyperlink from "@/Application/Components/Form/InputHyperlink.vue";

import ButtonGroup from "@/Application/Components/Form/ButtonGroup.vue";
import InputButton from "@/Application/Components/Form/InputButton.vue";

export default defineComponent({
    name: "Auth_Login",

    components: {
        Layout,
        PageContent,
        SectionForm,
        Favicon,
        Alert,
        InputLoading,
        ErrorList,
        InputGroup,
        InputContainer,
        InputLabel,
        InputElement,
        InputError,
        InputHyperlink,
        ButtonGroup,
        InputButton,
    },

    props: {
        status: {
            type: String,
            default: null,
        },
        errors: {
            type: Object,
            default: () => ({}),
        },
    },

    data() {
        return {
            loading: false,
            loadingText: null,
            //
            isAlert: this.status ? true : false,
            alertText: this.status,
            alertType: "warning",
            alertTitle: "Achtung!",
            //
            form: {
                email: "",
                password: "",
                remember: false,
            },
        };
    },

    methods: {
        loginUser() {
            let routeLogin = "login";
            //
            this.loading = true;
            this.loadingText = "Die Anmeldung wird durchgeführt!";
            //
            this.$inertia.post(this.route(routeLogin), this.form, {
                onSuccess: () => {
                    this.loading = false;
                },
                onError: () => {
                    this.loading = false;
                },
            });
        },
    },
});
</script>
