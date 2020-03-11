<template>
    <div class="h-screen bg-white">
        <div class="flex">
            <nav class="bg-gray-200 w-48 h-screen border-r-2 border-gray-400">
                <router-link to="/">
                    <p class="text-blue-600 text-center text-xl pt-2">Menu</p>
                </router-link>
                <div class="pl-4 flex flex-col">
                    <p class="text-gray-500 uppercase font-bold pt-12 text-xs">Create</p>
                    <router-link to="/contacts/create" class="hover:text-blue-600">
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
            <div class="flex-1 flex flex-col h-screen overflow-y-hidden">
                <div class="h-16 px-6 border-b border-gray-400 flex items-center justify-between">
                    <div class="">
                        Contacts
                    </div>
                    <div class="rounded-full border border-gray-400 text-white bg-blue-400 w-10 h-10 flex justify-center items-center">
                        VG
                    </div>
                </div>

                <div class="flex flex-column overflow-y-hidden flex-1">
                    <router-view class="p-6 overflow-x-hidden"></router-view>
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
