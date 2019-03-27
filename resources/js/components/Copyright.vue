<template>
    <footer class="footer">
        <div class="content has-text-centered">
            <div class="buttons is-centered">
                <a class="button is-outlined is-light" target="_blank" href="/fbook">
                    <font-awesome-icon :icon="['fab', 'facebook-f']" size="2x"></font-awesome-icon>
                </a>
                <a class="button is-outlined is-light" target="_blank" href="/twitt">
                    <font-awesome-icon :icon="['fab', 'twitter']" size="2x"></font-awesome-icon>
                </a>
                <a class="button is-outlined is-light" target="_blank" href="/teleg">
                    <font-awesome-icon :icon="['fab', 'telegram']" size="2x"></font-awesome-icon>
                </a>
                <a class="button is-outlined is-light" target="_blank" href="/githb">
                    <font-awesome-icon :icon="['fab', 'github']" size="2x"></font-awesome-icon>
                </a>
            </div>
            <div class="links">
                <div class="link">
                    <a target="_blank" href="https://docs.ln4.ru" title="Documentation for developers">API</a>
                </div>
                <div class="link">
                    <a target="_blank" href="/terms" title="Terms of Service">Terms of Service</a>
                </div>
            </div>
            <p>
                Powered by <a href="https://babichev.net" target="_blank"
                              title="Babichev Maxim"><strong>Babichev</strong></a>
            </p>
        </div>
    </footer>
</template>

<script>
  export default {}
</script>

<style lang="scss" scoped>
    .links {
        .link {
            display: inline;
            font-size: .9rem;
        }

        .link + .link:before {
            content: "| ";
            color: #efefef;
        }
    }

    .footer {
        padding-bottom: 1rem;
        background-color: #102;

        .buttons {
            .button {
                width: 48px;
                height: 48px;
            }
        }
    }
</style>
