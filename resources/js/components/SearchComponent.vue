<template>
    <div>
        <input type="text" class="form-control"
               placeholder="What Are Your Dekte chan?" v-on:keyup="searchJob"
                v-model="keyword">
        <div class="card-footer" v-if="results.length">
            <ul class="list-group">
                <li class="list-group-item" v-for="result in results">
                    <a style="color:black" :href=" '/jobs/'+result.id+'/'+result.slug+'/' ">
                        {{result.title}}<br>
                        <small class="badge badge-success">{{result.position}}</small>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                keyword:'',
                results:[]
            }
        },
        methods:{
            searchJob(){
                this.results=[];
                if(this.keyword.length > 1){
                    axios.get('/jobs/search',this.results).then(response=>{
                            this.results=response.data
                        });
                }
            }
        }
    }
</script>
