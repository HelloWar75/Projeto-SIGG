<template>
    <div class="container">

        <div class="row" style="margin-top: 25vh;">
            <div class="offset-4 col-md-1">
                <button v-on:click="like" id="curtir" class="btn btn-success" v-bind:disabled="isLikeReadOnly">Curtir</button>
            </div>
            <div class="offset-2 col-md-2">
                <button v-on:click="dlike" class="btn btn-danger" v-bind:disabled="isDLikeReadOnly">Não curtir</button>
            </div>
        </div>
        <div class="row" style="margin-top: 10vh;">
            <div class="offset-4 col-md-4">
                Total Curtidas: {{likedNum}} <br>
                Total Não Curtidas: {{dlikedNum}}
            </div>
        </div>
        <div class="row" style="margin-top: 5vh;">
            <div class="offset-4 col-md-4">
                <button class="btn btn-warning" v-on:click="$auth.logout()">Sair</button>
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
                isDLikeReadOnly: false,
                likedNum: 0,
                dlikedNum: 0
            }
        },
        mounted() {
            this.isLiked();
            this.countLikes();
            this.timeout();

        },
        methods: {
            timeout: function(){
                setTimeout(() => {
                    this.countLikes();
                    this.timeout();
                }, 2000);
            },
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
                    this.isLiked();
                });
            },
            like: function () {
                this.$http({
                    url: "like",
                    method: 'GET'
                }).then((res) => {
                    if ( res.data.status === "success" ) {
                        this.isLikeReadOnly = true;
                        this.isDLikeReadOnly = true;
                        this.likedNum += 1;
                    }

                }, () => {
                    console.log("ERRO")
                });
            },
            dlike: function () {
                this.$http({
                    url: "dlike",
                    method: 'GET'
                }).then((res) => {
                    if ( res.data.status === "success" ) {
                        this.isLikeReadOnly = true;
                        this.isDLikeReadOnly = true;
                        this.dlikedNum += 1;
                    }
                }, () => {
                    console.log("ERRO")
                });
            },
            countLikes: function() {
                this.$http({
                    url: "likes",
                    method: "GET"
                }).then((res) => {
                    if ( res.data.status === "success" ) {
                        this.dlikedNum = res.data.dlikedNum;
                        this.likedNum = res.data.likedNum;
                    }
                }, () => {
                    console.log("ERRO NA CONTAGEM!");
                })
            }
        }
    }
</script>

<style scoped>

</style>