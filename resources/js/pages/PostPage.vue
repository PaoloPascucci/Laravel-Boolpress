<template>
    <div class="page">
        <div class="loading" v-if="loading">
            <p class="lead">
                ⚡ Loading ...
            </p>
        </div>
        <div class="post" v-else>
            <img class="post_cover img-fluid" :src="'/storage/' + post.cover" alt />
            <div class="card-body">
                <h3>{{ post.title }}</h3>
                <h5 v-if="post.category">Category: {{ post.category.name }}</h5>
            </div>
        </div>
        <div class="back">
            <!-- <router-link :to="prevRoute.fullPath">Back</router-link> -->
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            prevRoute: null,
            error: false,
            loading: true,
            post: {}
        }
    },
    methods: {
        fetchPost() {
            axios.get('/api/posts/' + this.$route.params.slug).then(response => {
                //console.log(response);
                this.post = response.data.data
                this.loading = false
            }).catch(error => {
                console.error(error);
                this.error = true
            })
        }
    },
    beforeRouteEnter (to, from, next) {
        next(vm =>{
            vm.prevRoute = from
        })
    },
    mounted() {
        this.fetchPost();
        console.log();
    }
}
</script>

<style lang="scss">
.post_cover {
    width: 50%;
    height: 400px;
    object-fit: cover;
}
</style>