<template>
    <div v-if="selectedCounty>0">
        <div>
            <h5>Create New City</h5>
        </div>
        <div class="form-group">
            <input placeholder='example city' type="text" v-model="city.name" class="form-control" />
        </div>
        <div class="form-group">
            <button :disabled="!isValid" class="btn btn-block btn-success" @click='saveCity($event)'>Mentés</button>
        </div>        
    </div>
</template>
   
<script>  
    import {mapGetters,mapActions} from 'vuex'
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
            ...mapActions(["createCity","selectCity"]),
            resetInput(){
                const self=this;
                this.city={
                    name: '',
                    county_id: self.selectedCounty
                };
            },
            saveCity: function(event){ 
                event.preventDefault();
                this.selectCity('selectCity',0) 
                const city = {...this.city};
                this.createCity(city)
                this.resetInput();
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