let actions = {
    fetchCounties( {commit}){
        axios.get('/api/counties')
                .then(res => {                    
                    commit('FETCH_COUNTIES', res.data.results)
                }).catch(err => {
            console.log(err)
            Vue.toasted.error(err,{'position': 'top-center'})            
        })
    },
    setError({commit}, value){
        commit('SET_ERROR',value);
    },
    fetchCities( {commit}, countyId){
        axios.get(`/api/cities/show-by-county-id/${countyId}`).then(res => {
            commit('FETCH_CITIES', res.data.results)            
        }).catch(err => {
            console.log(err)
            Vue.toasted.error(err,{'position': 'top-center'})            
        })
    },
    createCity( {commit}, city){        
        axios.post('/api/cities', city)
                .then(res => {
                    console.log(res.data);
                    commit('CREATE_CITY', res.data.results)
                }).catch(err => {            
            Vue.toasted.error(err,{'position': 'top-center'})            
        })
    },
    modifyCity( {commit}, city){
        const cityId=city.id;        
        axios.put(`/api/cities/${cityId}`, city)
                .then(res => {
                    commit('MODIFY_CITY', res.data.results)
                }).catch(err => {
            console.log(err)
            Vue.toasted.error(err,{'position': 'top-center'})            
        })
    },
    deleteCity( {commit}, cityId) {
        axios.delete(`/api/cities/${cityId}`)
                .then(res => {
                    commit('DELETE_CITY', cityId)
                }).catch(err => {
            console.log(err)
            Vue.toasted.error(err,{'position': 'top-center'})            
        })
    },
    selectCounty( {commit}, id){
        commit('SELECT_COUNTY', id);
    },
    selectCity( {commit}, id){
        commit('SELECT_CITY', id);
    },
}
export default actions