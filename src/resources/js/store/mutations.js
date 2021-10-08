let mutations = {        
    FETCH_COUNTIES(state, counties) {
        return state.counties = counties
    },
    FETCH_CITIES(state,cities){
        return state.cities=cities;
    },
    SELECT_COUNTY(state,countyId){
        return state.selectedCounty=countyId;        
    },
    SELECT_COUNTY_NAME(state,name){
        return state.selectedCountyName=name;        
    },
    SELECT_CITY(state,cityId){
        return state.selectedCity=cityId;        
    },    
    CREATE_CITY(state,city){
        state.cities.push(city);        
    },
    MODIFY_CITY(state,city){
        let index = state.cities.findIndex(item => item.id === city.id)
        Vue.set(state.cities, index, city)        
    },
    DELETE_CITY(state,cityId){
        let index = state.cities.findIndex(item => item.id === cityId)
        state.cities.splice(index, 1)
    }    
}
export default mutations