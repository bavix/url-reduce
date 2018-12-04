<template>
    <div class="columns is-centered animated fadeIn">
        <div class="column is-11">
            <div class="field has-addons">
                <label class="control is-expanded is-medium">
                    <input class="input is-medium" readonly value="https://ln4.ru/v6Ql4" type="text">
                </label>
                <div class="control is-medium">
                    <button class="button is-medium is-danger">
                        <icon name="paste"></icon>
                    </button>
                </div>
            </div>
            <div class="columns has-text-left">
                <div class="column is-one-third">
                    <figure class="image">
                        <img class="is-square"
                             alt="QR-code"
                             src="https://ln4.ru/qr/v6Ql4"
                             onerror="this.src=logo" />
                    </figure>
                </div>
                <div class="column">
                    <h3 class="title is-3">Einstein Telescope: детектор гравитационных волн нового поколения</h3>
                    <p>Длиннее, мощнее, точнее — Европа собирается построить
                        гравитационно-волновой детектор нового поколения под
                        названием Einstein Telescope. Einstein Telescope...</p>
                    <div class="tags">
                        <span class="tag">ОТО</span>
                        <span class="tag">LIGO</span>
                        <span class="tag">Advanced LIGO</span>
                        <span class="tag">Advanced</span>
                        <span class="tag">Einstein Telescope</span>
                        <span class="tag">черные дыры</span>
                        <span class="tag">нейтронные звезды</span>
                        <span class="tag">гравитационные волны</span>
                        <span class="tag">детектор гравитационных волн</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                logo: 'https://ds.bavix.ru/svg/logo.svg',
            }
        }
    }
</script>

<style lang="scss" scoped>
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
</style>
