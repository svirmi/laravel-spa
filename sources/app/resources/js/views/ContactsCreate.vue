<template>
    <div>
        <form>
            <InputField name="name" label="Contact Name" placeholder="Contact Name" />

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
