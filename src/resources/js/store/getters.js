let getters = {     
     counties: state => {
         return state.counties
     },
     cities: state => {
         return state.cities
     },
     selectedCounty: state => state.selectedCounty,
     selectedCity: state => state.selectedCity,     
}
export default  getters