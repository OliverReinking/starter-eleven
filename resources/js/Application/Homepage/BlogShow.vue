<template>
    <layout
        :header-title="blog.title"
        :header-description="blog.description"
        :header-url="$page.props.saas_url + 'blogs/show/' + blog.slug"
        :header-image="$page.props.saas_url + blog.blog_image.url"
    >
        <blog-show :blog="blog" :blogarticle="blogarticle"></blog-show>
    </layout>
</template>
<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/vue3'
import Layout from '@/Application/Homepage/Shared/Layout.vue'

import BlogShow from '@/Application/Homepage/Shared/BlogShow.vue'

export default defineComponent({
    name: 'Homepage_BlogShow',

    components: {
        Link,
        Layout,
        BlogShow
    },

    props: {
        blog: {
            type: Object,
            default: () => ({})
        },
        blogarticle: {
            type: String,
            default: null
        }
    }
})
</script>
