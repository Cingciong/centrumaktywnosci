
<script>
import Pinned from './partials/news/Pinned.vue'
import SmallArticle from './partials/news/SmallArticle.vue'
import axios from 'axios';

export default {
    components: {
        Pinned,
        SmallArticle
    },
    data() {
        return {
            articles: []
        }
    },
    mounted() {
        this.getArticles();
    },
    methods: {
        getArticles() {
            axios.get('/api/aktualnosci')
                .then(response => {
                    console.log(response.data);
                    this.articles = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },

}
</script>

<template>

    <div class="flex flex-col items-center text-ss-gray-300   sm:text-left text-center max-w-7xl mx-auto">

            <section class="gap-10 md:px-0 px-10 sx:px-20 grid w-full xl:grid-cols-6 grid-cols-3 my-20 ">
                <Pinned class="col-span-3 justify-self-center"
                        date="2023-03-01"
                        title="First Pinned News Title"
                        text="First Pinned News Text"
                        :tagNames="['tag1', 'tag2']"
                        :isPinned="true"
                />
                <Pinned class=" col-span-3 justify-self-center"
                        date="2023-03-02"
                        title="Second Pinned News Title"
                        text="Second Pinned News Text"
                        :tagNames="['tag3', 'tag4']"
                        :isPinned="true"
                />
            </section>
            <section class="  w-full grid grid-cols-12 mb-10">

                <SmallArticle v-for="(article, index) in articles" :key="index" :article="article"></SmallArticle>
            </section>
        <nav class="mt-4">
            <ul class="pagination">
                <li v-for="page in articles.links" :key="page.label" class="page-item" :class="{ 'active': page.active }">
                    <a class="page-link" :href="page.url" @click.prevent="goToPage(page.url)">{{ page.label }}</a>
                </li>
            </ul>
        </nav>


</div>




</template>

<style scoped>

</style>


