<template>
  <div class="post">
      <div class="card">
          <img :src="'storage/' + post.cover" alt="">
          <div class="card-body">
              <h3>{{post.title}}</h3>
              <a :href="'/posts/'+post.slug" v-if="!isSingle">View Game</a>
          </div>
      </div>
  </div>
</template>

<script>
export default {
props:{
    post:Object
},
mounted(){
    console.log("Component mounted.");
}
}
</script>

<style>

</style>