<template>
    <button
            class="btn btn-default"
            v-bind:class="{'btn-primary' : voted}"
            v-on:click="vote"
            v-text="text"
    ></button>
</template>

<script>
    export default {
        props: ['answer', 'count'],
        mounted() {
            axios.get('/api/answer/'+ this.answer +'/votes/users').then(response => {
                this.voted = response.data.voted
            })
        },
        data() {
            return {
                voted : false
            }
        },
        computed: {
            text() {
                return this.count
            }
        },
        methods: {
            vote() {
                axios.post('/api/answer/vote', {'answer': this.answer}).then(response => {
                    this.voted = response.data.voted
                    response.data.voted ? this.count++ : this.count--
                })
            }
        }
    }
</script>
