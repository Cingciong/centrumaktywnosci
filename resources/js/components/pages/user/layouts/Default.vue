<script setup>

</script>

<template>
    <div class="bg-ss-gray-100 flex flex-col">

        <nav class="grid grid-cols-12 text-ss-gray-300 font-semibold p-10">
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

        <main class="min-h-screen">
            <router-view></router-view>
        </main>
    </div>


        <footer class="grid grid-cols-3 p-10 bg-ss-gray-100 text-ss-gray-300 px-60">
        <div class="">
            <h2 class="font-bold text-xl mb-2">Centrum Aktywności Społecznej</h2>
            <p>Centrum Aktywności  jest miejscem ogniskującym organizacje pozarządowe, przedsiębiorców oraz mieszkańców chcących zaangażować się w działania na rzecz Mikołowa.</p>
        </div>
        <div class="">
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

        <div class="">
            <h2 class="font-bold text-xl mb-2">Działy</h2>
            <ul>
                <li>NGO</li>
                <li>Seniorzy</li>
                <li>Biznes</li>
                <li>Młodzież</li>
                <li>Rodzice</li>
            </ul>
            <p>Regulaminy</p>
            <p>Polityka prywatności</p>
            <p>Deklaracja dostępności</p>
        </div>
    </footer>

</template>

