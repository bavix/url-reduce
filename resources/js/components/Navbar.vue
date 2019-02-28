<template>
    <div class="hero-head">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item is-active" href="/">
                        <font-awesome-icon :icon="['fal', 'link']"></font-awesome-icon>
                    </a>
                    <span @click="toggleBurger" class="navbar-burger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </div>
                <div class="navbar-menu" :class="classBurger">
                    <div class="navbar-end">
                        <span class="navbar-item">
                            <a @click="toggleModal" class="button is-white is-outlined" href="#">
                                <span class="icon">
                                    <font-awesome-icon :icon="['fal', 'bug']"></font-awesome-icon>
                                </span>
                                <span>Report</span>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </nav>

        <div class="modal" :class="classModal">
            <div class="modal-background" @click="toggleModal"></div>
            <div class="modal-content">
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <form>
                                    <div class="field">
                                        <div class="control">
                                            <h2>The short URL you wish to report:</h2>
                                        </div>
                                    </div>

                                    <hr />

                                    <div class="field-label is-normal">
                                        <div class="control">
                                            <label for="urlField" class="label">Your short URL here</label>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="control">
                                            <input id="urlField" class="input is-large" type="url" :placeholder="placeholder">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="control">
                                            <button class="button is-warning">Report URL</button>
                                        </div>
                                    </div>

                                    <hr />

                                    <div class="field">
                                        <div class="control has-text-centered">
                                            <label>Powered by Babichev</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close" @click="toggleModal"></button>
        </div>
    </div>
</template>

<script>
    import Swal from 'sweetalert2/dist/sweetalert2.js'

    export default {
        data() {
            return {
                showBurger: false,
                showModal: false,
            }
        },
        computed: {
            classBurger() {
                return {
                    'is-active': this.showBurger
                }
            },
            classModal() {
                return {
                    'is-active': this.showModal
                }
            },
            placeholder() {
                return 'https://' + location.host + '/exmpl'
            }
        },
        methods: {
            toggleBurger() {
                this.showBurger = !this.showBurger;
            },
            toggleModal() {
                this.showModal = !this.showModal;
            },
            report() {
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                )
            }
        }
    }
</script>

<style lang="scss" scoped>
    .hero-head {
        .navbar {
            .navbar-burger {
                color: white;
            }
            .navbar-menu {
                background: transparent;
            }
        }
    }
    @media (max-width: 700px) {
        .modal-background {
            background-color: #fff;
        }
        .modal-content .box {
            box-shadow: none;
        }
        .modal-content {
             margin: 0;
             max-height: 100%;
             overflow: auto;
        }
    }
</style>
