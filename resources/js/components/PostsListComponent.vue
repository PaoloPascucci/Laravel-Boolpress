<template>
    <div class="posts container">
        <div class="row">
            <div class="col-md-4 mb-3" v-for="post in posts" :key="post.slug">
                <div class="post card">
                    <img :src="'/storage/' + post.cover" alt />
                    <div class="card-body">
                        <h3>{{ post.title }}</h3>
                        <h4>{{ post.sub_title }}</h4>
                        <p>{{ post.body }}</p>
                        <h5 v-if="post.category">Category: {{ post.category.name }}</h5>
                        <router-link :to="'/posts/' + post.slug">View post</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        posts: Array
    }
};
</script>