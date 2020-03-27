<template>
    <div>
        <form @submit.prevent="submitForm">
            <InputField @update:field="form.name = $event" :errors="errors" name="name" label="Contact Name" placeholder="Contact Name" />
            <InputField @update:field="form.email = $event" :errors="errors" name="email" label="Contact Email" placeholder="Contact Email" />
            <InputField @update:field="form.company = $event" :errors="errors" name="company" label="Company" placeholder="Company" />
            <InputField @update:field="form.birthday = $event" :errors="errors" name="birthday" label="Birthday" placeholder="MM/DD/YYYY" />

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
        },
        data: function() {
            return {
                form: {
                    'name': '',
                    'email': '',
                    'company': '',
                    'birthday': ''
                },
                errors: null
            }
        },
        methods: {
            submitForm: function () {
                axios.post('/api/contacts', this.form)
                    .then(response => {

                    })
                    .catch(errors => {
                        this.errors = errors.response.data.errors;
                    });
            }
        }
    }
</script>
