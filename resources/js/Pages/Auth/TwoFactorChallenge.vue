<template>
    <authentication-card>
        <template #logo>
            <authentication-card-logo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            <template v-if="! recovery">
                Please confirm access to your account by entering the authentication code provided by your authenticator application.
            </template>

            <template v-else>
                Please confirm access to your account by entering one of your emergency recovery codes.
            </template>
        </div>

        <validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div v-if="! recovery">
                <label for="code" value="Code" />
                <input ref="code" id="code" type="text" inputmode="numeric" class="mt-1 block w-full" v-model="form.code" autofocus autocomplete="one-time-code" />
            </div>

            <div v-else>
                <label for="recovery_code" value="Recovery Code" />
                <input ref="recovery_code" id="recovery_code" type="text" class="mt-1 block w-full" v-model="form.recovery_code" autocomplete="one-time-code" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer" @click.prevent="toggleRecovery">
                    <template v-if="! recovery">
                        Use a recovery code
                    </template>

                    <template v-else>
                        Use an authentication code
                    </template>
                </button>

                <button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Login
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
            ValidationErrors,
        },

        data() {
            return {
                recovery: false,
                form: this.$inertia.form({
                    code: '',
                    recovery_code: '',
                })
            }
        },

        methods: {
            toggleRecovery() {
                this.recovery ^= true

                this.$nextTick(() => {
                    if (this.recovery) {
                        this.$refs.recovery_code.focus()
                        this.form.code = '';
                    } else {
                        this.$refs.code.focus()
                        this.form.recovery_code = ''
                    }
                })
            },

            submit() {
                this.form.post(this.route('two-factor.login'))
            }
        }
    }
</script>
