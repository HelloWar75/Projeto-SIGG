<template>
    <div id="content">
        <!--<Menu></Menu>-->
        <router-view></router-view>
    </div>
</template>

<script>
    import Menu from './Menu.vue'
    export default {
        name: "Index",
        components: {
            Menu
        }
    }
</script>

<style scoped>

</style>