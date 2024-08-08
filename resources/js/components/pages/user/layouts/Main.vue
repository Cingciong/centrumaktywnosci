<script setup>

</script>

<template>

    <div class="bg-ss-gray-100 flex flex-col items-center ">

        <nav class="text-ss-gray-300 font-semibold w-full pt-10 flex justify-evenly px-10 gap-5">
            <div class=" col-span-2 max-xl:col-start-4">
<!--                Current breakpoint: {{ breakpoint }}-->
                            <img class=" " src='../../../../../../public/assets/logo.svg' alt="Logo">
            </div>




            <div class="col-span-8    gap-5 flex flex-row items-center max-xl:hidden">
                    <router-link to="/aktualnosci">Aktualności</router-link>
                    <div class="group relative p-3 ">
                        <router-link class="flex flex-row gap-2 align-bottom" to="/o-nas">
                            <p>O nas</p>
                            <div class="transform rotate-180 mb-[-4px] group-hover:rotate-0 duration-300">
                                <span >v</span>
                            </div>
                        </router-link>
                        <div class="absolute left-0 mt-2 w-fit py-3 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden group-hover:block" role="menu">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Poznaj nasz zespół</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Kim jesteśmy?</a>
                        </div>
                        <div class="absolute left-0 w-fit py-3 h-2 bg-transparent group-hover:block"></div>
                    </div>
                    <div class="group relative p-3 ">
                        <router-link class="flex flex-row gap-2 align-bottom" to="/o-nas">
                            <p>Projekty dofinansowane</p>
                            <div class="transform rotate-180 mb-[-4px] group-hover:rotate-0 duration-300">
                                <span >v</span>
                            </div>
                        </router-link>
                        <div class="absolute left-0 mt-2 w-fit py-3 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden group-hover:block" role="menu">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Poznaj nasz zespół</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Kim jesteśmy?</a>
                        </div>
                        <div class="absolute left-0 w-fit py-3 h-2 bg-transparent group-hover:block"></div>
                    </div>

                    <div class="group relative p-3 ">
                        <router-link class="flex flex-row gap-2 align-bottom" to="/o-nas">
                            <p>Działaj lokalnie</p>
                            <div class="transform rotate-180 mb-[-4px] group-hover:rotate-0 duration-300">
                                <span >v</span>
                            </div>
                        </router-link>
                        <div class="absolute left-0 mt-2 w-fit py-3 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden group-hover:block" role="menu">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Poznaj nasz zespół</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Kim jesteśmy?</a>
                        </div>
                        <div class="absolute left-0 w-fit py-3 h-2 bg-transparent group-hover:block"></div>
                    </div>
                    <router-link to="/zaangazuj-sie">Zaangażuj się</router-link>
                    <router-link to="/do-pobrania">Do pobrania</router-link>
                    <router-link to="/kontakt">Kontakt</router-link>
                </div>


            <button class="max-xl:block hidden text-3xl">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="col-span-2 flex flex-row items-center gap-2 text-xl">
                <i class="fa-regular fa-user "></i>
                <i class="fa-solid fa-magnifying-glass "></i>
                <div class=" rounded-md bg-ss-gray-200 p-2 ">
                    <i class="fa-solid fa-circle-half-stroke"></i>
                </div>
            </div>

        </nav>

        <div class="grid grid-cols-12 px-10">


            <main class="3xl:col-start-4 3xl:col-span-6 2xl:col-start-3 2xl:col-span-8 lg:col-start-2  md:col-start-3 md:col-span-9  col-span-12">
                <router-view></router-view>
            </main>


        </div>
        <section class="min-h-[220px] f-fit pb-[px] w-full bg-ss-green-300 lg:grid lg:grid-cols-3  max-lg:flex max-lg:flex-col max-lg:py-10 relative items-center">

            <img class="h-[276px] lg:absolute left-[12%] " src='../../../../../../public/assets/newsletter.svg' alt="Newsletter">
            <div class=" flex flex-row px-12 col-start-2">
                <div class="flex flex-col gap-2   text-center py-10 px-15">
                    <h1 class="text-3xl font-semibold text-white">Zapisz się na nasz newsletter, aby być z nami na bieżąco!</h1>
                    <p class="text-white text-sm">Dzięki temu nie przegapisz najważniejszych informacji i ciekawych inicjatyw!</p>
                </div>

            </div>
            <button class="border-2 hover:bg-ss-green-500 hover:border-ss-green-200 duration-300 py-2 px-5 h-fit w-fit rounded-md text-white">Zapisz się</button>

        </section>

    </div>


    <footer class="flex flex-col justify-center w-full 2xl:px-[247px] lg:px-[150px] px-10 text-ss-gray-300 text-sm">
        <div  class="lg:grid lg:grid-cols-3 lg:text-left flex flex-col   py-10 text-center gap-5">
            <div class="pr-2">
                <h2 class="font-bold text-xl mb-2">Centrum Aktywności Społecznej</h2>
                <p>Centrum Aktywności  jest miejscem ogniskującym organizacje pozarządowe, przedsiębiorców oraz mieszkańców chcących zaangażować się w działania na rzecz Mikołowa.</p>
            </div>
            <div class="px-2">
                <h2 class="font-bold text-xl mb-2">Kontakt</h2>
                <p>Związek Stowarzyszeń Centrum Aktywności</p>
                <p>Rynek 2, 43-190 Mikołów</p>
                <p>NIP: 6351862747, KRS: 0000985840, REGON: 522750665</p>
                <p>tel. 690 883 218 , 690 883 221</p>
                <p>E-mail:<strong class="text-ss-green-200"> biuro@centrumaktywnosci.eu</strong> </p>
                <i class="fa-brands fa-facebook text-xl "></i>
                <i class="fa-brands fa-instagram text-xl ml-2"></i>
                <i class="fa-brands fa-linkedin text-xl ml-2"></i>
            </div>

            <div class="pl-2">
                <h2 class="font-bold text-xl mb-2">Działy</h2>
                <ul class="list-disc list-inside">
                    <li>NGO</li>
                    <li>Seniorzy</li>
                    <li>Biznes</li>
                    <li>Młodzież</li>
                    <li>Rodzice</li>
                </ul>

            </div>
        </div>
        <div class=" flex justify-between  mb-10">
            <div class="gap-3">
                <button>Regulaminy </button> |
                <button> Polityka prywatności </button> |
                <button> Deklaracja dostępności</button>
            </div>

            <span>Created by <strong class="text-ss-green-300">PESI</strong></span>

        </div>

    </footer>

</template>


