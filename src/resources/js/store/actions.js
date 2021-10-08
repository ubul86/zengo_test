let actions = {
    fetchCounties( {commit}){
        axios.get('/api/counties')
                .then(res => {
                    commit('FETCH_COUNTIES', res.data.results)
                }).catch(err => {            
            Vue.toasted.error(err.response.data.message, {'position': 'top-center'})
        })
    },
    setError( {commit}, value){
        commit('SET_ERROR', value);
    },
    fetchCities( {commit}, countyId){
        axios.get(`/api/cities/show-by-county-id/${countyId}`).then(res => {
            commit('FETCH_CITIES', res.data.results)
        }).catch(err => {            
            Vue.toasted.error(err.response.data.message, {'position': 'top-center'})
        })
    },
    createCity( {commit}, city){
        axios.post('/api/cities', city)
                .then(res => {
                    console.log(res.data);
                    commit('CREATE_CITY', res.data.results)
                    Vue.toasted.success('You are successfully created a new city!', {'position': 'top-center'})
                }).catch(err => {
            Vue.toasted.error(err.response.data.message, {'position': 'top-center'})
        })
    },
    modifyCity( {commit}, city){
        const cityId = city.id;
        axios.put(`/api/cities/${cityId}`, city)
                .then(res => {
                    commit('MODIFY_CITY', res.data.results)
                }).catch(err => {
            Vue.toasted.error(err.response.data.message, {'position': 'top-center'})
        })
    },
    deleteCity( {commit}, cityId) {
        axios.delete(`/api/cities/${cityId}`)
                .then(res => {
                    Vue.toasted.success('You are successfully deleted a city!', {'position': 'top-center'})
                    commit('DELETE_CITY', cityId)
                }).catch(err => {
            console.log(err)
            Vue.toasted.error(err.response.data.message, {'position': 'top-center'})
        })
    },
    selectCounty( {commit}, id){
        commit('SELECT_COUNTY', id);
    },
    selectCountyName( {commit}, name){
        commit('SELECT_COUNTY_NAME', name);
    },
    selectCity( {commit}, id){
        commit('SELECT_CITY', id);
    },
}
export default actions