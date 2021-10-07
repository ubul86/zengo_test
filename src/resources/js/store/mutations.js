let mutations = {        
    FETCH_COUNTIES(state, counties) {
        return state.counties = counties
    },    
    SELECT_COUNTY(state,countyId){
        return state.selectedCounty=countyId;        
    },    
}
export default mutations