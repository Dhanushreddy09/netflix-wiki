<template>
<div class="bg-gray-800 h-full min-h-screen w-screen">
    <div id="logo" class="text-center text-red-500 text-4xl md:text-5xl font-black">
    <h1 class="p-8">{{title}}</h1>
    </div>
    <div class="text-center">
<input class=" text-xl rounded-lg p-3 mr-2 focus:outline-none focus:ring focus:border-bg-500" type="text" v-model="search" placeholder="Search a Movie or show"/><a @click="display()" class="bg-blue-500 hover:bg-blue-600 cursor-pointer focus:outline-none text-white font-bold py-2 px-4 rounded-xl text-xl shadow-lg"><i class="fas fa-search"></i></a>
</div>
<img src="../assets/Spinner.svg" v-if="loading" class="bg-gray-800 m-auto"/>
<div class="mt-10 space-y-4 w-5/6  ml-8 md:ml-24" v-if="show">
<h1 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-blue-500">{{name}}</h1>
<h1 class="text-md text-white text-opacity-50 tracking-wide"><span class="text-xl text-white tracking-wide text-opacity-100">Director :</span> {{director}}</h1>
<h1 class="text-md text-white text-opacity-50 tracking-wide text-justify"><span class="text-xl text-white tracking-wide text-opacity-100">Cast :</span> {{cast}}</h1>
<h1 class="text-md text-white text-opacity-50 tracking-wide text-justify"><span class="text-xl text-white tracking-wide text-opacity-100">Genre :</span> {{listed_in}}</h1>
<h1 class="text-md text-white text-opacity-50 tracking-wide"><span class="text-xl text-white tracking-wide text-opacity-100">Release :</span> {{release_year}}</h1>
<h1 class="text-md text-white text-opacity-50 tracking-wide"><span class="text-xl text-white tracking-wide text-opacity-100">Duration :</span> {{duration}}</h1>
<h1 class="text-md text-white text-opacity-50 tracking-wide text-justify"><span class="text-xl text-white tracking-wide text-opacity-100">Description :</span> {{description}}</h1>


</div>
<div class="text-center mt-10" v-if="nomovie">
    <h1 class="text-xl font-black text-opacity-50 text-white">OOPS, No Movie found</h1>
</div>
</div>
</template>

<script>
import axios from 'axios'
import { ScalingSquaresSpinner  } from 'epic-spinners'
export default{
   /* mounted(){
         axios.get("http://localhost/Moviewiki/src/Data.php").then(
             res=>{
                 this.movies=res.data;
             }
         ).catch(err=>console.log(err));
    },*/
    data(){
        return{
            title:'NETFLIX WIKI',
            search:'',
            loading:false,
            show:false,
            nomovie:false,
            name:'',
            director:'N/A',
            release_year:'N/A',
            duration:'N/A',
            listed_in:'N/A',
            cast:'N/A',
            description:'N/A',
            movies:[
                {
                    title:'The Stranger',
                    director:'Orson Welles',
                    release_year:1946,
                    duration:'94 min',
                    listed_in:'Classic Movies, Dramas, Thrillers',
                    cast:'Edward G. Robinson, Loretta Young, Orson Welles, Philip Merivale, Richard Long, Konstantin Shayne, Byron Keith, Billy House',
                    description:'After losing everything, an indolent sad sack impulsively joins the U.S. Army and cajoles his best friend into enlisting, too'
                    
                }
            ]
        }
    },
    methods:{
            display:function(){
                var that=this
                that.show=false
                that.nomovie=false
                that.loading=true
                setTimeout(function(){
                    that.movies.forEach(element => {
                    if(element.title.toLowerCase()==that.search || element.title==that.search){
                        that.show=true
                        that.nomovie=false
                        that.name=element.title
                        if(element.director!=''){
                        that.director=element.director
                        }
                        else{
                            that.director="N/A"
                        }
                        if(element.release_year!=''){
                        that.release_year=element.release_year
                        }
                        else{
                            that.release_year="N/A"
                        }
                        if(element.duration!=''){
                        that.duration=element.duration
                        }
                        else{
                            that.duration="N/A"
                        }
                        if(element.listed_in!=''){
                        that.listed_in=element.listed_in
                        }
                        else{
                            that.listed_in="N/A"
                        }
                        if(element.cast!=''){
                        that.cast=element.cast
                        }
                        else{
                            that.cast="N/A"
                        }
                        if(element.description!=''){
                        that.description=element.description
                        }
                        else{
                            that.description="N/A"
                        }
                    }
                });
                that.loading=false
                that.search=''
                if(that.show==false){
                    that.nomovie=true
                }
                },1000)
            }
    }
}

</script>

