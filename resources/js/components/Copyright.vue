<template>
    <footer class="footer">
        <div class="content has-text-centered">
            <div class="buttons is-centered">
                <a class="button is-outlined is-light" target="_blank" href="/fbook">
                    <font-awesome-icon :icon="['fab', 'facebook-f']" size="2x" />
                </a>
                <a class="button is-outlined is-light" target="_blank" href="/twitt">
                    <font-awesome-icon :icon="['fab', 'twitter']" size="2x" />
                </a>
                <a class="button is-outlined is-light" target="_blank" href="/teleg">
                    <font-awesome-icon :icon="['fab', 'telegram']" size="2x" />
                </a>
                <a class="button is-outlined is-light" target="_blank" href="/githb">
                    <font-awesome-icon :icon="['fab', 'github']" size="2x" />
                </a>
            </div>
            <p>
                Powered by <a href="https://babichev.net" target="_blank" title="Babichev Maxim"><strong>Babichev</strong></a>
            </p>
        </div>
    </footer>
</template>

<script>
    export default {

    }
</script>

<style scoped>
    .footer {
        padding-bottom: 1rem;
    }
</style>
