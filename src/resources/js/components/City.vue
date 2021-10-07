<template>
    <div v-if="selectedCounty!=0">
        <h4 class="text-left font-weight-bold">Cities</h4>
        <ul v-if="cities.length>0">            
            <li v-for='(city,index) in cities' @click='modifyCity(city.id)' :class="city.id==selectedCity?'active':''">        
                <div v-if='selectedCity!==0 && selectedCity===city.id'>
                    <div>
                        <input class="form-control" :value="city.name" @keyup="name = $event.target.value"/>
                    </div>
                    <div>
                        <a href="javascript:void(0)" @click.stop='saveCity()'>Mentés</a>
                        <a href="javascript:void(0)" @click.stop='deleteCity(city.id)'>Törlés</a>
                        <a href="javascript:void(0)" @click.stop='cancelModifyCity'>Mégsem</a>
                    </div>
                </div>
                <div v-else>{{ city.name }}</div>
            </li>        
        </ul>
        <div v-if="cities.length==0">            
            Nem található város az adott megyében
        </div>
    </div>
</template>
   
<script>  
    import {mapGetters} from 'vuex'
    export default {  
        data(){
            return {    
                name: ''                
            }
        },
        mounted() {            
            
        },        
        methods:{
            modifyCity: function(cityId){     
                this.$store.dispatch('selectCity',cityId)                
            },
            saveCity: function(){
                let self=this;
                if(this.name.length>0){
                    self.$store.dispatch('modifyCity',{name: self.name,id: self.selectedCity})                     
                    self.$store.dispatch('selectCity',0) 
                }
            },
            cancelModifyCity: function(event){   
                this.$store.dispatch('selectCity',0) 
            },
            deleteCity: function(cityId){                
                this.$store.dispatch('deleteCity',cityId)                     
                this.$store.dispatch('selectCity',0) 
            }
        },        
        watch: {
            selectedCounty(newValue, oldValue) {
              console.log(`Updating from ${oldValue} to ${newValue}`);
              this.$store.dispatch('fetchCities',newValue)
            },
        },
        beforeDestroy() {
            this.unwatch();
        },
        computed: {            
            ...mapGetters([
                'cities',
                'selectedCounty',
                'selectedCity',
            ]),
            
        }
    }
</script>