<script setup>

</script>

<template>
    <div class="bg-ss-gray-100 flex flex-col">

        <nav class="grid grid-cols-12 text-ss-gray-300 font-semibold px-10 pt-10">
            <img class=" col-span-2" src='../../../../../../public/assets/logo.svg' alt="Logo">
            <div class="col-span-8 gap-5 flex flex-row items-center">
                <router-link to="/">Aktualności</router-link>
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
            <div class="col-span-2 flex flex-row items-center gap-2 text-xl">
                <i class="fa-regular fa-user "></i>
                <i class="fa-solid fa-magnifying-glass "></i>
                <div class=" rounded-md bg-ss-gray-200 p-2 ">
                    <i class="fa-solid fa-circle-half-stroke"></i>
                </div>
            </div>
        </nav>

        <main >
            <router-view class="min-h-screen px-[247px]"></router-view>
            <section class="min-h-[220px] max-h-[220px] pb-[px] w-full bg-ss-green-300 grid grid-cols-3 relative items-center">
                <div></div>
                <img class="h-[276px] absolute left-[12%]" src='../../../../../../public/assets/newsletter.svg' alt="Newsletter">
                <div class=" flex flex-row px-12">
                    <div class="flex flex-col gap-2   text-center py-10 px-15">
                        <h1 class="text-3xl font-semibold text-white">Zapisz się na nasz newsletter, aby być z nami na bieżąco!</h1>
                        <p class="text-white text-sm">Dzięki temu nie przegapisz najważniejszych informacji i ciekawych inicjatyw!</p>
                    </div>

                </div>
                <button class="border-2 hover:bg-ss-green-500 hover:border-ss-green-200 duration-300 py-2 px-5 h-fit w-fit rounded-md text-white">Zapisz się</button>

            </section>
        </main>


    </div>


    <footer class="flex flex-col  px-[247px] text-ss-gray-300 text-sm">
        <div  class="grid grid-cols-3 py-10   ">
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

