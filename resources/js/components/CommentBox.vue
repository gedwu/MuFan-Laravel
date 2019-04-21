<template>
    <!--@todo:styles-->
    <div class="col-md-9 offset-md-3" style="margin-top:10em; padding-top: 50px;">
        <div class="card paper">
            <details v-if="Number(total)>commentNumberToDisplay">
                <!--@todo:styles-->
                <summary style="padding:1em;" v-on:click="fetchMoreComments()">
                    {{Number(total)-commentNumberToDisplay}} earlier comments
                </summary>
            </details>

            <ul class="list-group comment-group">
                <li class="list-group-item" v-for="(item, index) in list.slice().reverse()" :ref="'comment-'+item.id" v-bind:id="'comment-'+item.id">
                    <div class="comment-item">
                          <span class="circle">
                            <img v-bind:src="image + item.user_id" alt="user">
                          </span>
                        <span class="title ">
                            <span style="width: 100%">
                                <a href="#">{{item.author}} </a>
                                <time> {{item.created_at}}</time>
                                <!--@todo:styles-->
                                <div style="padding-right: 20px; width: 100%;">{{item.text}} </div>
                            </span>
                            <span class="float-left">
                                <!--@todo: styles-->
                                <a @click="prepareReply(item, index)" style="cursor: pointer;">Reply</a>
                            </span>
                            <span v-if="item.replies_count" class="float-right" @click="fetchReplies(item.id, index)" style="cursor: pointer;">
                                (View {{item.replies_count}} Replies)
                            </span>
                        </span>
                        <ul class="list-inline actions comment-actions">
                            <li>
                                <a @click="deleteComment(item.id)" href="#" title="Delete comment" >
                                    <i class="fa fa-trash-o fa-stack-1x delete-icon-size"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!--<div v-if="item.replies.length != 0">-->
                        <!--<ul class="list-group" v-for="reply in item.replies">-->
                            <!--<li class="list-group-item reply-item" :ref="'reply-'+reply.id">-->
                                <!--<span class="reply-img circle">-->
                                    <!--<img v-bind:src="image + reply.user_id" alt="user">-->
                                <!--</span>-->
                                <!--<span class="title">-->
                                  <!--<a href="#"> {{reply.author}} </a> <time> {{item.created_at}}</time>-->
                                    <!--<p>{{reply.text}}</p>-->
                                <!--</span>-->
                                <!--<ul class="list-inline actions reply-actions">-->
                                    <!--<li>-->
                                        <!--<a @click="deleteReply(reply.id)" href="#" title="Delete Reply" >-->
                                            <!--<i class="fa fa-trash-o fa-stack-1x delete-icon-size"></i>-->
                                        <!--</a>-->
                                    <!--</li>-->
                                <!--</ul>-->
                            <!--</li>-->
                        <!--</ul>-->
                    <!--</div>-->

                </li>
            </ul>
            <form action="#" @submit.prevent="replying ? createReply() : createComment()">
                <fieldset class="form-group">
                    <input v-model="comment.text"
                           type="text"
                           class="form-control"
                           id="component-form"
                           :placeholder="replying ? 'Add a Reply' : 'Add a Comment' ">
                </fieldset>
                <button type="submit" class="btn btn-sm btn-success">{{replying ? 'Reply' : 'Comment'}}</button>
                <button type="button" class="btn btn-sm btn-secondary">Cancel</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
          userId: Number,
          articleId: Number
        },
        data: function(){
            return {
                url:'/comments?article_id=21',
                image:'http://lorempixel.com/50/50/people/',
                list:[],
                errors: [],
                success: false,
                total:0,
                selectedIndex: null,
                commentNumberToDisplay:4,
                replying:false,
                focusToComment:0,
                focusToReply:0,
                reply: {
                    user_id:this.$userId,
                    comment_id:'',
                    text:''
                },
                comment: {
                    id:'',
                    user_id:this.$userId,
                    text:'',
                    author:'',
                    created_at:'',
                    replies:[]
                }
            }
        },
        mounted: function(){
            this.fetchCommentsList();
        },
        methods:{
            fetchCommentsList: function(){
                console.log('Fetching Comments');
                axios.get(this.url)
                    .then((response) => {
                        this.list = response.data['data'];
                        this.total = response.data['total_comments'];
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            fetchMoreComments:function(){
                this.commentNumberToDisplay += 20;
                this.fetchCommentsList();
            },
            createComment: function(){
                console.log('Creating Comment');
                this.errors = [];
                let self = this;
                let params = Object.assign({}, self.comment);
                axios.post('api/comment', params)
                    .then(function (response) {
                        if (response.status == 200) {
                            console.log(response.data.success);
                            self.success = response.data.success;
                        }
                    })
                    .then(function(){
                        self.comment.author = '';
                        self.comment.text = '';
                        self.fetchCommentsList();
                    })
                    .catch(function(error){
                        if (error.response.status == 422) {
                            self.errors = error.response.data.errors;
                            console.log(error.response.data.errors);
                        } else {
                            console.log(error);
                        }
                    })
            },
            deleteComment: function(id){
                let self = this;
                console.log('Deleting comment with id: '+id);
                let apiUrl =self.url+id;
                console.log('API URL: '+apiUrl);
                axios.delete(apiUrl)
                    .then(function (response) {
                        console.log(response);
                        if (response.status == 200) {
                            console.log('Yra statusas 200');
                            console.log(response.data.success);
                            self.success = response.data.success;
                            self.fetchCommentsList();
                        } else {
                            console.log('Nera statuso 200');
                        }
                    })
                    .catch(function(error){
                        console.log(error);
                    });
            },
            deleteReply: function(id){
                let self = this;
                console.log('Deleting reply with id: '+id);
                axios.delete('api/replies/'+id)
                    .then(function (response) {
                        console.log(response);
                        if (response.status == 200) {
                            console.log('Yra statusas 200');
                            console.log(response.data.success);
                            self.success = response.data.success;
                            self.fetchCommentsList();
                        } else {
                            console.log('Nera statuso 200');
                        }
                    })
                    .catch(function(error){
                        console.log(error);
                    });
            },
            prepareReply: function(comment, index) {
                document.getElementById('component-form').focus();
                this.replying = true;
                this.selectedIndex = index;
                this.reply.comment_id = comment.id;
            },
            createReply: function() {
                console.log('Creating Reply');
                this.reply.text = this.comment.text;
                let self = this;
                let params = Object.assign({}, self.reply);
                let commentId = self.reply.comment_id;
                console.log(params);
                axios.post('api/reply', params)
                    .then(function (response) {
                        if (response.status == 200) {
                            console.log(response.data.success);
                            self.focusToReply = response.data.reply_id;
                            self.success = response.data.success;
                        } else {
                            console.log('Nera statuso 200');
                        }
                    })
                    .then(function(){
                        self.focusToComment = self.reply.comment_id;
                        self.reply.comment_id = '';
                        self.reply.text = '';
                        self.comment.text = '';
                        self.replying = false;
                        self.fetchReplies(commentId, self.selectedIndex);
                        console.log('FOCUS TO: Comment('+self.focusToComment+') - Reply('+self.focusToReply+')');
                        let target = '#comment-'+self.focusToComment;
                        VueScrollTo.scrollTo(target);
                    })
                    .catch(function(error){
                        console.log('pagavom error createReply()');
                        console.log(error);
                        // @todo
                        // if (error.response.status == 422) {
                        //     self.errors = error.response.data.errors;
                        //     console.log(error.response.data.errors);
                        // } else {
                        //     console.log(error);
                        // }
                    })
            },
            fetchReplies: function(comment_id, index) {
                this.list[this.commentNumberToDisplay-index-1]['replies_count'] = 0;
                console.log('Fetching Replies');
                axios.get('api/replies/'+comment_id)
                    .then((response) => {
                        this.list[this.commentNumberToDisplay-index-1]['replies'] = response.data['data'];
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        }
    }
</script>
