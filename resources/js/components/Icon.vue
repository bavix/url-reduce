<template>
    <svg>
        <use :xlink:href="icon"></use>
    </svg>
</template>

<script>
    // brands
    import dev from '@fortawesome/fontawesome-pro/svgs/brands/dev.svg';
    import github from '@fortawesome/fontawesome-pro/svgs/brands/github.svg';
    import telegram from '@fortawesome/fontawesome-pro/svgs/brands/telegram.svg';
    import facebook from '@fortawesome/fontawesome-pro/svgs/brands/facebook-f.svg';
    import twitter from '@fortawesome/fontawesome-pro/svgs/brands/twitter.svg';

    // light
    import paste from '@fortawesome/fontawesome-pro/svgs/light/paste.svg';
    import link from '@fortawesome/fontawesome-pro/svgs/light/link.svg';
    import bug from '@fortawesome/fontawesome-pro/svgs/light/bug.svg';

    const icons = {
        dev,
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
            name: String,
        },
        computed: {
            icon() {
                return icons[this.name];
            }
        }
    }
</script>
