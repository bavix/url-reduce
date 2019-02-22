<template>
    <div v-if="link" class="columns is-centered animated fadeIn">
        <div class="column is-11">
            <div class="field has-addons">
                <label class="control is-expanded is-medium">
                    <input ref="input" class="input is-medium" readonly :value="link.url" type="text">
                </label>
                <div class="control is-medium">
                    <button class="button is-medium is-danger"
                            :class="{tooltip: show}"
                            data-tooltip="Copied!"
                            v-clipboard:copy="link.url"
                            v-clipboard:success="onCopy"
                            v-clipboard:error="onError">
                        <icon file="paste"></icon>
                    </button>
                </div>
            </div>
            <div class="columns has-text-left">
                <div class="column is-one-third">
                    <figure class="image">
                        <img class="is-square"
                             alt="QR-code"
                             :src="link.qr" />
                    </figure>
                </div>
                <div v-if="link.title" class="column is-two-thirds">
                    <h3 class="title is-5" v-text="link.title"></h3>
                    <p class="words words--wrap" v-text="link.description"></p>
                    <div class="tags">
                        <span class="tag" v-for="tag of link.tags" v-text="tag"></span>
                    </div>
                </div>
                <div v-else class="column">
                    <div class="control is-large is-loading"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VueClipboard from 'vue-clipboard2';
    import store from '../store';
    import Vue from 'vue';

    Vue.use(VueClipboard);

    export default {
        store,
        data() {
            return {
                handle: null,
                show: false,
            };
        },
        methods: {
            onCopy() {
                const { input } = this.$refs;
                input.select();
                this.show = true;

                if (this.handle) {
                    clearTimeout(this.handle);
                }

                this.handle = setTimeout(() => {
                    this.show = false;
                    this.handle = null;
                }, 750);
            },
            onError(e) {
                alert('Failed to copy texts');
            },
        },
        computed: {
            link() {
                return this.$store.state.link;
            },
        }
    }
</script>

<style lang="scss" scoped>
    .words {}
    .words.words--wrap {
        word-wrap: break-word;
    }
    .title:not(:last-child) {
        margin-bottom: 1rem;
    }
    .input[readonly] {
        background-color: #e9ecef;
    }
    .image, .image .is-square {
        background-color: white;
        border-radius: 4px;
        height: 150px;
        width: 150px;
    }
    .control.is-loading::after {
        left: 0;
    }
</style>
