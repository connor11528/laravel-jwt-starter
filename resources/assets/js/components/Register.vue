<template>
    <div class="row">
        <div class="">
            <div v-if="error" class="" role="alert">
                <span class="">{{ error.message }}</span>
            </div>

            <h3>Register</h3>

            <form @submit.prevent="register" @keydown="form.errors.clear($event.target.name)" class="">
                <div class="">
                    <label class="" for="name">Name</label>

                    <input v-focus v-model="form.name" class="form-control" id="name" type="text" :class="{ 'border-red mb-3' : form.errors.has('name') }" name="name" placeholder="Name">
                    <p v-if="form.errors.has('name')" class="">{{ form.errors.get('name') }}</p>
                </div>

                <div class="">
                    <label class="" for="username">Email</label>

                    <input v-model="form.email" class="form-control" :class="{ 'border-red mb-3' : form.errors.has('email') }" id="username" type="email" name="email" placeholder="Email">
                    <p v-if="form.errors.has('email')" class="">{{ form.errors.get('email') }}</p>
                </div>

                <div class="">
                    <label class="" for="password">Password</label>

                    <input v-model="form.password" class="form-control" :class="{ 'border-red mb-3' : form.errors.has('password') }" id="password" type="password" name="password" placeholder="Password">
                    <p v-if="form.errors.has('password')" class="">{{ form.errors.get('password') }}</p>
                </div>

                <div class="">
                    <label class="" for="password_confirmation">Password confirmation</label>

                    <input v-model="form.password_confirmation" class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Password confirmation">
                </div>

                <div class="">
                    <button class="btn btn-primary" type="submit" :disabled="this.isDisabled" :class="{ 'opacity-50 cursor-not-allowed': this.isDisabled }">
                        <i v-if="isLoading" class="fa fa-spinner fa-spin fa-fw"></i>
                        Register
                    </button>
                </div>

                <div class="">
                    Already have an account ?

                    <router-link class="inline-block font-bold text-indigo hover:text-indigo-darker" to="/login" exact>
                        Log in now
                    </router-link>
                </div>
            </form>

        </div>
    </div>
</template>

<script>
import Form from '../utils/Form'

export default {
    data () {
        return {
            form: new Form({
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            }),
            isLoading: false,
            error: false
        }
    },

    computed: {
        isDisabled () {
            return this.form.incompleted() || this.isLoading
        }
    },

    methods: {
        register () {
            if (this.isDisabled) {
                return false
            }

            this.isLoading = true
            this.error = null

            this.form.post('auth/register')
                .then(data => this.$store.dispatch('login', data))
                .catch(error => {
                    this.isLoading = false
                    this.error = error

                    this.form.password = ''
                    this.form.password_confirmation = ''
                })
        }
    }
}
</script>
