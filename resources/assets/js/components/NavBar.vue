<template>
    <nav>
        <div>
            <div>
                <div>
                    <router-link to="/" exact>
                        Home
                    </router-link>
                </div>

                <button @click="logout" v-if="isLogged">
                    Logout
                </button>
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