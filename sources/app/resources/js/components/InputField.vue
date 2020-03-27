<template>
    <div class="relative pb-4">
        <label :for="name" class="text-blue-500 pt-2 uppercase text-xs font-bold absolute">{{label}}</label>
        <input
            :id="name"
            :placeholder="placeholder"
            v-model="value"
            @input="updateField()"
            type="text"
            class="pt-8 text-gray-900 w-full border-b pb-2 focus:outline-none focus:border-blue-400"
        >
        <p class="text-red-600 text-sm" v-text="errorMessage(name)">Error</p>
    </div>
</template>

<script>
    export default {
        name: "InputField",
        props: [
            'name', 'label', 'placeholder', 'errors'
        ],
        data: function() {
            return {
                value: ''
            }
        },
        methods: {
            updateField: function () {
                this.$emit('update:field', this.value)
            },
            errorMessage: function (field) {

                field = 'data.' + field;

                if(this.errors && this.errors[field] && this.errors[field].length > 0) {
                    return this.errors[field][0];
                }
            }
        }
    }
</script>

<style scoped>

</style>
