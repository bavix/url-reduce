<template>
    <form method="post" v-on:submit.prevent="onSubmit">
        <div class="field has-addons">
            <div class="control is-expanded is-large"
                 :class="[submitting || loading ? 'is-loading' : '']">
                <input class="input is-large"
                       v-model="link"
                       :disabled="submitting"
                       type="text" placeholder="Your original URL here">
            </div>
            <div class="control is-large">
                <button class="button is-large is-warning"
                        :disabled="submitting">
                    <icon name="link"></icon>
                </button>
            </div>
        </div>
        <p class="help is-danger" v-show="!submitting" v-text="error"></p>
    </form>
</template>

<script>
    import api from '../api';
    import has from 'lodash/has';

    export default {
        data() {
            return {
                link: '',
                error: '',
                submitting: false,
                loading: false,
            }
        },
        computed: {
            url() {
                return this.link.length && !/^[a-z]+?:\/\//.test(this.link) ?
                    'http://' + this.link :
                    this.link;
            }
        },
        methods: {
            onSubmit() {
                this.loading = true;
                this.submitting = true;
                api.create(this.url, this.onSuccess, this.onError);
            },
            onSuccess({ data }) {
                this.error = '';
                this.submitting = false;
                this.loading = !data.loaded;
            },
            onError(error) {
                this.loading = false;
                this.submitting = false;
                if (has(error.response.data, 'errors.url')) {
                    this.error = error.response.data.errors.url.shift();
                }
            }
        }
    }
</script>
