<template>
    <div class="addthis_inline_share_toolbox"></div>
</template>

<script>
    import Post from '../post';
    export default {
        props: {
            post: Post,
        },
        data() {
            return {
                addThis: 'https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53347bb35778c0b9',
                addThisInit: false,
            }
        },
        mounted() {
            if (this.addThisInit) {
                return;
            }

            const e = document.createElement('script');
            e.setAttribute('src', this.addThis);
            document.head.appendChild(e);
            this.addThisInit = true;
        },
    }
</script>
