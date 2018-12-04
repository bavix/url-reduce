<template>
    <div class="hero-head">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item is-active" href="/">
                        <icon name="link"></icon>
                    </a>
                    <span class="navbar-burger burger" data-target="navbarMenu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </div>
                <div id="navbarMenu" class="navbar-menu">
                    <div class="navbar-end">
                        <span class="navbar-item">
                            <a class="button is-white is-outlined" href="#">
                                <span class="icon">
                                    <icon name="bug"></icon>
                                </span>
                                <span>Report</span>
                            </a>
                        </span>
                        <span class="navbar-item">
                            <a class="button is-white is-outlined" href="https://docs.ln4.ru" target="_blank">
                                <span class="icon">
                                    <icon name="dev"></icon>
                                </span>
                                <span>Developers</span>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {

    }
</script>

<style lang="scss" scoped>
    .hero-head {
        .navbar {
            .navbar-burger {
                color: white;
            }
        }
    }
</style>
