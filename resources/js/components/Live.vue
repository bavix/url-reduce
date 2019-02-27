<template>
    <nav>
        <div class="title">
            <span class="tag is-pulled-right is-warning" v-text="total"></span>
            <h3 class="title is-4">Live</h3>
        </div>
        <ul class="live" v-if="links.length">
            <li class="live-item" v-for="link of links">
                <span class="tag is-dark is-rounded" v-text="link.type"></span>
                <img :alt="link.title"
                     class="favicon is-pulled-right"
                     :src="link.icon" />

                <a target="_blank" rel="nofollow" class="link" :href="link.url" :title="link.title" v-text="link.title"></a>

                <div class="tags">
                    <span class="tag is-white" v-for="tag of tags(link.tags)" v-text="tag"></span>
                </div>
            </li>
        </ul>
        <div v-else class="control is-large is-loading"></div>
    </nav>
</template>

<script>
    import shuffle from 'lodash/_arrayShuffle';
    import store from '../store';
    import api from '../api';
    export default {
        store,
        props: {
            count: Number,
        },
        computed: {
            total() {
                return this.$store.state.total;
            },
            links() {
                return this.$store.state.links;
            }
        },
        created() {
            this.$store.commit('setTotal', this.count);
            const links = api.live((res) => {
                this.$store.dispatch('addLinks', res.data.data);
            });
        },
        methods: {
            tags(arr) {
                const data = [...arr.filter(a => a.length > 0 && a.length < 48)];
                const tags = data.sort((a, b) => {
                    return a.length <= b.length ? -1 : 1;
                });

                return shuffle(tags.slice(0, 8));
            },
        }
    }
</script>

<style lang="scss" scoped>
    .favicon {
        width: 24px;
        height: 24px;
        background-color: white;
        border-radius: 2px;
        /*padding: 1px;*/
    }
    .title:not(:last-child) {
        margin-bottom: .5rem;
    }
    .live {
        .tag {
            font-size: .7rem;
            height: 1rem;
            padding-left: .25rem;
            padding-right: .25rem;
        }
        .tags .tag:not(:last-child) {
            margin-right: .2rem;
        }
        .live-item {
            font-size: .9rem;
            word-wrap: break-word;
        }
        .live-item:not(:last-child) {
            border-bottom: 1px solid white;
            padding-bottom: .5rem;
        }
        .live-item:not(:first-child) {
            margin-top: 7px;
        }
        .link:hover {
            opacity: .85;
        }
    }
    .control.is-loading::after {
        left: 0;
    }
</style>
