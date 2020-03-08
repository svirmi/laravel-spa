<template>
    <div class="h-screen bg-white">

        <div class="flex">
            <nav class="bg-gray-200 w-48 h-screen border-r-2 border-gray-400">
                <router-link to="/">
                    <p class="text-blue-600 text-center text-xl pt-2">Menu</p>
                </router-link>

                <div class="pl-4 flex flex-col">
                    <p class="text-gray-500 uppercase font-bold pt-12 text-xs">Create</p>
                    <router-link to="/" class="hover:text-blue-600">
                        + Add New
                    </router-link>

                    <p class="text-gray-500 uppercase font-bold pt-12 text-xs">General</p>
                    <router-link to="/" class="hover:text-blue-600">
                        Contacts
                    </router-link>
                    <router-link to="/" class="hover:text-blue-600">
                        Birthdays
                    </router-link>

                    <p class="text-gray-500 uppercase font-bold pt-12 text-xs">Settings</p>
                    <router-link to="/" class="hover:text-blue-600">
                        Logout
                    </router-link>
                </div>

            </nav>
            <div>
                <div></div>
                <div>
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "App"
    }
</script>

<style scoped>

</style>
