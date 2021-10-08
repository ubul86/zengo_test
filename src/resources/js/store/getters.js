let getters = {     
     counties: state => {
         return state.counties
     },
     cities: state => {
         return state.cities
     },
     selectedCounty: state => state.selectedCounty,
     selectedCity: state => state.selectedCity,
     selectedCountyName: state => state.selectedCountyName
}
export default  getters