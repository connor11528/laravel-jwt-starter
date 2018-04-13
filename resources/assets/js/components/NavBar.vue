<template>
    <nav>
        <router-link to="/" exact>
            Home
        </router-link>

        <div class="pull-right ">
            <router-link to="/register" exact v-if="!isLogged">
                Register
            </router-link>
            <router-link to="/login" exact v-if="!isLogged">
                Login
            </router-link>
            <div @click="logout" v-if="isLogged">
                Logout
            </div>
        </div>
    </nav>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
    name: 'Navbar',
    computed: mapGetters([
        'isLogged'
    ]),
    methods: {
        logout () {
            this.$store.dispatch('logout')
        }
    }
}
</script>