<template>
    <div class="container">
        <div class="row" style="margin-top: 25vh;">
            <div class="offset-4 col-md-1">
                <button v-on:click="like" id="curtir" class="btn btn-success" v-bind:disabled="isLikeReadOnly">Curtir</button>
            </div>
            <div class="offset-2 col-md-2">
                <button type="button" class="btn btn-danger" v-bind:disabled="isDLikeReadOnly">Não curtir</button>
            </div>
        </div>
        <div class="row" style="margin-top: 10vh;">
            <div class="offset-4 col-md-4">
                Total Curtidas: 10 <br>
                Total Não Curtidas: 5
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Like",
        data() {
            return {
                isLikeReadOnly: false,
                isDLikeReadOnly: false
            }
        },
        mounted() {
            this.isLiked();
        },
        methods: {
            isLiked: function(){
                this.$http({
                    url: `like/is_liked`,
                    method: 'GET'
                }).then((res) => {

                    if (res.data.status === "success") {
                        this.isLikeReadOnly = false;
                        this.isDLikeReadOnly = false;
                        if ( res.data.isLiked ) {
                            this.isLikeReadOnly = true;
                            this.isDLikeReadOnly = true;
                        }
                    }

                }, () => {
                    this.isLikeReadOnly = true;
                    this.isDLikeReadOnly = true;
                });
            },
            like: function () {
                var app = this
            }
        }
    }
</script>

<style scoped>

</style>