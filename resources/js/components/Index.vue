<template>
    <div>
        <div>
            <router-link :to="{ name: 'get.index'}">Get</router-link>
        </div>
        <div>
            <router-link v-if="!token"  :to="{ name: 'user.login'}">Login</router-link>
        </div>
        <div>
            <router-link v-if="token"  :to="{ name: 'user.personal'}">Personal</router-link>
        </div>
        <div>
            <router-link v-if="!token"  :to="{ name: 'user.registration'}">Registration</router-link>
        </div>
        <div>
            <a v-if="token"  href="#" @click.prevent="logout">Logout</a>
        </div>
        <router-view :key="$route.fullPath" ></router-view>
    </div>

</template>

<script>

import axios from "axios";

export default {
    name: "Index",

    data() {
        return {
          token: null
        }
    },

    mounted() {
        this.getToken()
    },

    updated() {
        this.getToken()
    },

    methods: {
        getToken() {
            this.token = localStorage.getItem('x_xsrf_token')
        },

        logout() {
            axios.post('/logout')
            .then( res => {
                localStorage.removeItem('x_xsrf_token')
                this.$router.push({ name: 'user.login'})
            })
        }
    }
}
</script>

<style scoped>

</style>
