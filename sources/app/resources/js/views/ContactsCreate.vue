<template>
    <div>
        <form>
            <InputField></InputField>
            <div class="relative pb-4">
                <label for="name" class="text-blue-500 pt-2 uppercase text-xs font-bold absolute">Contact Name</label>
                <input id="name" type="text" class="pt-8 text-gray-900 w-full border-b pb-2 focus:outline-none focus:border-blue-400" placeholder="Contact Name">
            </div>
            <div class="relative pb-4">
                <label for="name" class="text-blue-500 pt-2 uppercase text-xs font-bold absolute">Contact Name</label>
                <input id="name" type="text" class="pt-8 text-gray-900 w-full border-b pb-2 focus:outline-none focus:border-blue-400" placeholder="Contact Name">
            </div>
            <div class="relative pb-4">
                <label for="name" class="text-blue-500 pt-2 uppercase text-xs font-bold absolute">Contact Name</label>
                <input id="name" type="text" class="pt-8 text-gray-900 w-full border-b pb-2 focus:outline-none focus:border-blue-400" placeholder="Contact Name">
            </div>

            <div class="flex justify-end mb-4 pb-2">
                <button class="rounded-full py-2 px-4 hover:border-red-500 border border-gray-400 text-red-500 mr-2">Cancel</button>
                <button class="rounded-full bg-blue-500 py-2 px-4 hover:bg-blue-700 border border-gray-400 text-white">Add New Contact</button>
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from "../components/InputField";
    export default {
        name: "ContactsCreate",
        components: {
            InputField
        }
    }
</script>
