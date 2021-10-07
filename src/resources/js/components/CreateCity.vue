<template>
    <div v-if="selectedCounty>0">
        <div>
            <h5>Create New City</h5>
        </div>
        <div class="form-group">
            <input placeholder='example city' class="form-control" @keyup="city.name = $event.target.value"/>
        </div>
        <div class="form-group">
            <button :disabled="!isValid" class="btn btn-block btn-success" @click='saveCity'>Mentés</button>
        </div>        
    </div>
</template>
   
<script>  
    import {mapGetters} from 'vuex'
    export default {  
        data(){
            return {
                city:{  
                    name: '',
                    id: 0,
                    county_id: 0,
                }
            }
        },
        mounted() {            
            
        },        
        methods:{            
            saveCity: function(){
                let self=this;
                if(this.city.name.length>0){
                    self.$store.dispatch('selectCity',0) 
                    self.$store.dispatch('createCity',self.city)                                         
                }
            },            
        },        
        watch: {
            selectedCounty(newValue, oldValue) {
              console.log(`Updating from ${oldValue} to ${newValue}`);
              this.city.county_id=newValue;
            },
        },
        beforeDestroy() {
            this.unwatch();
        },
        computed: {            
            ...mapGetters([                
                'selectedCounty',                
            ]),
            isValid() {
                return this.city.name !== ''
            }
        }
    }
</script>