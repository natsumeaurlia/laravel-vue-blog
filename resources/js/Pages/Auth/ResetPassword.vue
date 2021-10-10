<template>
    <authentication-card>
        <template #logo>
            <authentication-card-logo />
        </template>

        <validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <label for="email" value="Email" />
                <input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
            </div>

            <div class="mt-4">
                <label for="password" value="Password" />
                <input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <label for="password_confirmation" value="Confirm Password" />
                <input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Reset Password
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

        props: {
            email: String,
            token: String,
        },

        data() {
            return {
                form: this.$inertia.form({
                    token: this.token,
                    email: this.email,
                    password: '',
                    password_confirmation: '',
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.update'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
