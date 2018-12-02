<template>
    <nav>
        <div class="title">
            <span class="tag is-pulled-right is-warning">999999</span>
            <h3 class="is-4">Live</h3>
        </div>
        <ul class="live">
            <li class="live-item" v-for="i in [1,2,3,4,5]">
                <span class="tag is-dark is-rounded">link</span>
                <img alt="В Японии началось телевещание в формате 8K"
                     class="favicon is-pulled-right"
                     src="https://habr.com/images/apple-touch-icon.png" />

                <a href="#">В Японии началось телевещание в формате 8K</a>
                <div class="tags">
                    <span class="tag is-white">NHK</span>
                    <span class="tag is-white">4K</span>
                    <span class="tag is-white">8K</span>
                    <span class="tag is-white">Япония</span>
                    <span class="tag is-white">NHK</span>
                    <span class="tag is-white">4K</span>
                    <span class="tag is-white">8K</span>
                </div>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
    .favicon {
        width: 24px;
        height: 24px;
    }
    .title:not(:last-child) {
        margin-bottom: .5rem;
    }
    .live .tag {
        height: 1rem;
        padding-left: .3rem;
        padding-right: .3rem;
    }
    .live .live-item:not(:last-child) {
        border-bottom: 1px solid white;
        padding-bottom: .5rem;
    }
    .live .live-item:not(:first-child) {
        margin-top: 7px;
    }
</style>
