<template>
    <authentication-card>
        <template #logo>
            <authentication-card-logo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <label for="password" value="Password" />
                <input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Confirm
                </button>
            </div>
        </form>
    </authentication-card>
</template>

<script>
    import AuthenticationCard from '@/Components/AuthenticationCard'
    import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo'
    import Button from '@/Components/Button'
    import Input from '@/Components/Input'
    import Label from '@/Components/Label'
    import ValidationErrors from '@/Components/ValidationErrors'

    export default {
        components: {
            AuthenticationCard,
            AuthenticationCardLogo,
            Button,
            Input,
            Label,
            ValidationErrors
        },

        data() {
            return {
                form: this.$inertia.form({
                    password: '',
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.confirm'), {
                    onFinish: () => this.form.reset(),
                })
            }
        }
    }
</script>
