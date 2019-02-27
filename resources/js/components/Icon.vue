<template>
    <!--<svg class="icon">-->
        <!--<use :xlink:href="icon" :src="icon"></use>-->
    <!--</svg>-->
</template>

<script>
    // brands
    // import dev from '@fortawesome/fontawesome-pro/svgs/brands/dev.svg';
    import github from '@fortawesome/fontawesome-pro/svgs/brands/github.svg';
    import telegram from '@fortawesome/fontawesome-pro/svgs/brands/telegram.svg';
    import facebook from '@fortawesome/fontawesome-pro/svgs/brands/facebook-f.svg';
    import twitter from '@fortawesome/fontawesome-pro/svgs/brands/twitter.svg';

    // light
    import paste from '@fortawesome/fontawesome-pro/svgs/light/paste.svg';
    import link from '@fortawesome/fontawesome-pro/svgs/light/link.svg';
    import bug from '@fortawesome/fontawesome-pro/svgs/light/bug.svg';

    const icons = {
        // dev,
        github,
        telegram,
        facebook,
        twitter,
        paste,
        link,
        bug,
    };

    export default {
        props: {
            file: String,
        },
        computed: {
            icon() {
                if (!icons.hasOwnProperty(this.file)) {
                    throw new Error(`Icon '${this.file}' not found`);
                }

                return icons[this.file];
            }
        }
    }
</script>

<style lang="scss" scoped>
    .icon {
        fill: currentColor;
        @for $i from 0 through 9 {
            &.icon-#{$i + 1}x {
                font-size: 1em + $i * .3;
            }
        }
    }
</style>
