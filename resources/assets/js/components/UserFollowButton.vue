<template>
    <button
            class="btn btn-default"
            v-bind:class="{'btn-success' : followed}"
            v-on:click="follow"
            v-text="text"
    ></button>
</template>

<script>
    export default {
        props: ['user'],
        mounted() {
            axios.get('/api/user/followers/' + this.user).then(response => {
                this.followed = response.data.followed
            })
        },
        data() {
            return {
                followed : false
            }
        },
        computed: {
            text() {
                return this.followed ? '已关注' : '关注Ta'
            }
        },
        methods: {
            follow() {
                axios.post('/api/user/follow', {'user': this.user}).then(response => {
                    this.followed = response.data.followed
                })
            }
        }
    }
</script>
