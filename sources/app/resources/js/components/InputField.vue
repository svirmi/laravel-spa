<template>
    <div class="relative pb-4">
        <label :for="name" class="text-blue-500 pt-2 uppercase text-xs font-bold absolute">{{label}}</label>
        <input :id="name" type="text" class="pt-8 text-gray-900 w-full border-b pb-2 focus:outline-none focus:border-blue-400" :placeholder="placeholder">
    </div>
</template>

<script>
    export default {
        name: "InputField",
        props: [
            'name', 'label', 'placeholder'
        ]
    }
</script>

<style scoped>

</style>
