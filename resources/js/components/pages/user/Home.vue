<script setup>

import Button from "@/components/pages/user/partials/button.vue";

</script>


<template>

    <section class="grid grid-cols-2 max-lg:grid-cols-1 gap-2 h-fit my-[30px] md:my-[10px]  ">

        <div class="pr-2 flex flex-col sm:col-span-1 col-span-2 gap-3 align-middle  lg:my-10 md:mt-32 lg:text-left text-center lg:px-10 md:px-20 3xl:mt-48">
            <h1 class="text-5xl font-semibold text-ss-gray-400 pr-3">Centrum Aktywności w Mikołowie</h1>
            <hr class="w-20 max-lg:hidden h-4 bg-ss-green-200">
            <p class=" text-ss-gray-300 text-sm" >Centrum Aktywności Społecznej prowadzi działania związane z pobudzaniem aktywności mieszkańców Mikołowa i powiatu mikołowskiego. Wspieramy oddolne inicjatywy społeczne i działania organizacji pozarządowych, tworzymy przyjazną przestrzeń dla społeczników, rodzin z dziećmi, grup senioralnych i młodzieżowych oraz przedsiębiorców. W Centrum Aktywności Społecznej można realizować swoje działania łącząc je z pozytywnym oddziaływaniem na społeczność lokalną.</p>
            <div class="flex 2xl:flex-row max-xl:flex-col max-lg:justify-center pt-5 gap-3">
                <Button buttonText="ZAREZERWUJ SALĘ KONFERENCYJNĄ" link="/o-nas"></Button>
                <Button buttonText="PROGRAM NIKOLAJA" link="/o-nas"></Button>
            </div>

        </div>
        <div class="   grid-rows-3 mb-10 relative 3xl:w-[600px] 3xl:h-[678.7680px] md:w-[450px] md:h-[509.0760px]    mx-auto text-white font-semibold max-sm:text-xs md:block sm:hidden">
            <div class="grid-cols-2 ">
                <div class="absolute w-1/2 hover:right-[53.5%]  hover:top-[-4%] top-0 right-[51%] duration-500 shadow-ss-green-200 ">
                    <img    src='../../../../../public/assets/hexagon/ngo.png'>
                    <h1 class="   top-[44%] right-[33%] absolute ">NGO</h1>
                </div>
                <div class="absolute w-1/2 hover:left-[53.5%]  hover:top-[-4%] top-0 left-[51%] duration-500 shadow-ss-green-200 ">
                    <img    src='../../../../../public/assets/hexagon/seniorzy.png'>
                    <h1 class="   top-[44%] left-[33%] absolute ">SENIORZY</h1>
                </div>
            </div>
            <div class="grid-cols-2">
                <div class="absolute w-1/2 hover:right-[55%] hover:top-[27.5%] right-[51%] top-[27.5%] duration-500 shadow-ss-green-200 ">
                    <img    src='../../../../../public/assets/hexagon/mlodziez.png'>
                    <h1 class="   top-[44%] left-[33%] absolute ">MŁODZIEŻ</h1>
                </div>
                <div class="absolute w-1/2 hover:left-[55%] hover:top-[27.5%] left-[51%] top-[27.5%] duration-500 shadow-ss-green-200 ">
                    <img    src='../../../../../public/assets/hexagon/biznes.png'>
                    <h1 class="   top-[44%] right-[33%] absolute ">BIZNES</h1>
                </div>

            </div>
            <div class="grid-cols-2">
                <div class="absolute w-1/2 hover:right-[53.5%] hover:top-[59%] right-[51%] top-[55%] duration-500 shadow-ss-green-200 ">
                    <img    src='../../../../../public/assets/hexagon/rodzice.png'>
                    <h1 class="   top-[44%] right-[33%] absolute ">RODZICE</h1>
                </div>

                <div class="absolute w-1/2 hover:left-[53.5%] hover:top-[59%] left-[51%] top-[55%] duration-500 shadow-ss-green-200 ">
                    <img    src='../../../../../public/assets/hexagon/sklep-z-gadzetami.png'>
                    <h1 class="   top-[44%] left-[33%] absolute ">SKLEP</h1>
                </div>
            </div>
        </div>
    </section>


</template>

<style scoped>



</style>
