<template>
    <form method="post" v-on:submit.prevent="onSubmit">
        <div class="field has-addons">
            <div class="control is-expanded is-large"
                 :class="[submitting || loading ? 'is-loading' : '']">
                <input class="input is-large"
                       :value="url"
                       @change="setUrl"
                       :disabled="submitting"
                       type="text" placeholder="Your original URL here">
            </div>
            <div class="control is-large">
                <button class="button is-large is-warning"
                        :disabled="submitting">
                    <icon file="link"></icon>
                </button>
            </div>
        </div>
        <p class="help is-danger" v-show="!submitting" v-text="error"></p>
    </form>
</template>

<script>
    import store from '../store';
    import api from '../api';

    export default {
        store,
        computed: {
            url() {
                return this.$store.state.url
            },
            error() {
                return this.$store.state.error
            },
            loading() {
                return this.$store.state.loading
            },
            submitting() {
                return this.$store.state.submitting
            },
        },
        methods: {
            setUrl(e) {
                this.$store.commit('setUrl', e.target.value);
            },
            onSubmit() {
                this.$store.commit('onSubmit');
                api.create(this.url, this.onSuccess, this.onError);
            },
            onSuccess({ data }) {
                this.$store.commit('onSuccess', data);
            },
            onError(error) {
                this.$store.commit('onError', error);
            }
        }
    }
</script>
