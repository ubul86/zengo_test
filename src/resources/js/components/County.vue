<template>
    <div>
        <h4 class="text-left font-weight-bold">Counties</h4>
        <div class="form-group">
            <select class='form-control' v-model='county' @change="selectCounty($event)">
                <option value='0' >Select Country</option>
                <option v-for='data in counties' :value='data.id' >{{ data.name }}</option>
            </select>
        </div>
    </div>

</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        name: "Posts",
         data(){
            return {
                county: 0,
            }
        },
        mounted() {
            this.$store.dispatch('fetchCounties')
        },        
        methods: {
            selectCounty(event) {
                event.preventDefault;
                const index = event.target.selectedIndex;
                const selectedCountyName=event.target[index].text

                this.$store.dispatch('selectCounty',this.county)
                this.$store.dispatch('selectCountyName',selectedCountyName);
            }
        },
        computed: {
            ...mapGetters([
                'counties'
            ])
        }
    }
</script>

<style scoped>

</style>