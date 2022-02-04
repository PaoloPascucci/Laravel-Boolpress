<template>
    <div class="posts d-flex flex-wrap">
        <h1>Posts Page</h1> 
        <div class="loading text-center" v-if="loading">
            <p class="lead">⚡ Loading ...</p>
        </div>
           <posts-list :posts="posts" v-else></posts-list>
        <div class="pagination d-flex justify-content-center mt-4" v-if="!loading">
            <span class="btn text-secondary" @click="prevPage()" v-if="meta.current_page > 1">Prev</span>
            <!-- <span class="btn" :class="page === meta.current_page ? 'btn-primary' : 'btn-light'" v-for="page in meta.last_page" @click="goToPage(page)">{{page}}</span> -->
            <span class="btn text-secondary" @click="nextPage()" v-if="meta.current_page != meta.last_page ">Next</span>
        </div>
    </div>
</template>

<script>
import PostListComponentVue from "../components/PostsListComponent.vue"
export default {
    components:{PostListComponentVue},
  data() {
        return {
            loading: true,
            posts: [],
            meta: null,
            links: null,
        };
    }, methods: {
        fetchPosts(url) {
            axios.get(url).then((response) => {
                //console.log(response);
                this.posts = response.data.data;
                this.meta = response.data.meta;
                this.links = response.data.links;
                this.loading = false;
            });
        },   nextPage(){
            console.log('Clicked on the next page');
            this.fetchPosts(this.links.next)
        },
        prevPage(){
            console.log('Clicked on prev page');
            this.fetchPosts(this.links.prev)
        },
        goToPage(page_number){
            this.fetchPosts('api/posts?page=' + page_number)
        }
    },
    mounted() {
        //console.log("Component mounted.");
        this.fetchPosts("api/posts");
},
};
</script>



