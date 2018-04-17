<template>
    <nav class="navbar">
        <router-link to="/" exact>
            Home
        </router-link>

        <ul class="nav">
            <li class="nav-item">
                <router-link to="/register" exact v-if="!isLogged" class="nav-link">
                    Register
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/login" exact v-if="!isLogged" class="nav-link">
                    Login
                </router-link>
            </li>
            <li class="nav-item text-nowrap">
                <div @click="logout" v-if="isLogged" class="nav-link">
                    Logout
                </div>
            </li>
        </ul>
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