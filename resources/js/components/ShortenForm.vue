<template>
    <form v-on:submit.prevent="onSubmit">
        <div class="field has-addons">
            <div class="control is-expanded is-large"
                 :class="[submitting || loading ? 'is-loading' : '']">
                <input class="input is-large is-warning"
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
        <p class="help is-danger animated fadeIn" v-show="!submitting" v-text="error"></p>
    </form>
</template>

<script>
    import store from '../store';
    import api from '../api';
    import Icon from './Icon';

    export default {
        store,
        components: {
            Icon,
        },
        computed: {
            url() {
                return this.$store.state.url;
            },
            error() {
                return this.$store.state.error;
            },
            loading() {
                return this.$store.state.loading;
            },
            submitting() {
                return this.$store.state.submitting;
            },
        },
        methods: {
            setUrl(e) {
                this.$store.commit('setUrl', e.target.value);
            },
            onSubmit() {
                this.$store.commit('onSubmit');
                api.create(this.$store.getters.getUrl, this.onSuccess, this.onError);
            },
            onSuccess({ data }) {
                this.$store.commit('onSuccess', data);

                if (this.$store.state.loading) {

                    if (!this.$store.state.handle) {
                        this.$store.commit('setHandle', setInterval(this.onSubmit.bind(this), 1500));
                        return;
                    }

                    if (this.$store.getters.getAttempts < 10) {
                        return;
                    }

                } else {
                    this.$store.commit('live', data.data);
                }

                if (this.$store.state.handle) {
                    clearInterval(this.$store.state.handle);
                    this.$store.commit('setHandle', null);
                }
            },
            onError(error) {
                this.$store.commit('onError', error);
            }
        }
    }
</script>

<style lang="scss" scoped>
    .input {
        border: 1px solid currentColor;
    }
</style>
