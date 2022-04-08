<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-if="isLoading" id="loader" class="d-flex justify-content-center align-items-center">
                    <div class="spinner-grow text-primary" role="status"></div>
                    <div class="spinner-grow text-primary mx-2" role="status"></div>
                    <div class="spinner-grow text-primary" role="status"></div>
                </div>
                <div v-else>
                    <div class="card mb-3" :key="post.id" v-for='post in posts'>
                        <div class="card-header">{{post.title}}</div>

                        <div class="card-body">
                            <p>{{post.content}}</p>
                        </div>
                        <div class="card-footer">
                            <span v-if="post.category" :style="`background-color:${post.category.color}`">{{post.category.label}}</span>
                            <div v-if="post.tags">
                                <span class="badge" :style="`color:${tag.color}`" :key="tag.id" v-for="tag in post.tags">{{tag.label}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "App",
        data(){
            return{ 
                posts: [],
                isLoading: false,
            };
        },
        methods: {
            getPosts(){
                this.isLoading = true
                axios.get('http://127.0.0.1:8000/api/posts')
                .then( (res) => {
                    this.posts = res.data.posts;
                })
                .catch( () => {

                })
                .then(() => {
                    this.isLoading = false;
                });
            },
        },
        mounted(){
           this.getPosts();
        }, 
    };
</script>
