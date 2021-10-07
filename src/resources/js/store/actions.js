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
    selectCounty( {commit}, id){
        commit('SELECT_COUNTY', id);
    },    
}
export default actions