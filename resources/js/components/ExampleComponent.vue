<template>
    <div>
        <div class="container mx-auto text-center" ref="imageUpload">
            <div class="py-3 my-2 text-center bg-blue-900" >DROP IMAGE(S) HERE</div>
        </div>
    </div>
</template>

<script>
import Dropzone from 'dropzone';

    export default {
        data: function() {
            return {
                dropzone: null,
            }
        },

        mounted() {
            this.dropzone = new Dropzone(this.$refs.imageUpload, {
                url: '/images'
            });
        }
    }
</script>


<style lang="scss" scoped>

</style>
