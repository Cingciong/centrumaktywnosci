<template>
    <article class="xl:col-span-4  lg:col-span-6 col-span-12 flex flex-col relative md:h-fit md:w-[390px] h-fit w-[300px] gap-4 justify-self-center mt-10">
        <div class="h-[290px] w-full group rounded-2xl overflow-hidden  bg-cover bg-no-repeat relative bg-center transform group-hover:scale-110 transition-transform duration-200 origin-center" :style="{ backgroundImage: 'url(' + article.image + ')' }">
            <div class="absolute rounded-2xl inset-0 bg-ss-green-300 bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-200"></div>
        </div>
        <time>{{ article.created_at }}</time>
        <h1 class="text-ss-lg font-semibold text-ss-gray-400">{{ article.title }}</h1>
        <p class="text-ss-base">{{ article.text }}</p>
        <div class="flex flex-row gap-2">
            <a v-for="(tag, index) in article.tags" :key="index" href="/" class="text-gray-400 bg-ss-gray-200 px-2 py-1 font-bold text-ss-sm  rounded-xl uppercase">{{ tag.name }}</a>
        </div>
        <a href="#" class="text-ss-green-500 uppercase tracking-wide font-bold">Czytaj dalej
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </article>
</template>

<script>
export default {
    props: {
        article: {
            type: Object,
            required: true
        }
    }
}
</script>
