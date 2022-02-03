<template>
    <section class="posts d-flex flex-wrap">
        <h1>Posts</h1> 
        
        <div class="post" v-for="post in posts" :key="post.slug">
            <div class="card">
                <img :src="'/storage/' + post.cover" alt />
                <div class="card-body">
                    <h3 class="card-title">{{ post.title }}</h3>
                    <h4 class="card-title">{{ post.sub_title }}</h4>
                    <p class="card-text">{{ post.body }}</p>
                    <router-link :to="'/posts/' + post.slug">View post</router-link>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

export default {
    data() {
        return {
            loading: true,
            posts: null,
            meta: null,
            links: null
        };
    },
    mounted() {
        axios.get("api/posts").then((response) => {
            console.log(response);
            this.posts = response.data.data;
            this.meta = response.data.meta;
            this.links = response.data.links;
            this.loading = false;
        });
        console.log("Component mounted.");
    },
};
</script>