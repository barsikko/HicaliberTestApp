import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
	state: { 
		propertyData: [],
	}, 
	mutations: {
		setPropertyData(state, payload){
			state.propertyData = payload;
		}
	},
	actions: {
		async loadPropertydata(context, payload){
			const response = await axios.get('/api/property-data');

			const respData = await response.data.data;

			if (response.status !== 200){
				const error = new Error(response.message || 'Something went wrong');
				throw error;
			}

			context.commit('setPropertyData', respData);
		},
		async searchBy(context, payload){
			const response = await axios.post('api/property-data/search-by', {
				value: payload.value,
				text: payload.text,
				int: payload.int ? parseInt(payload.int) : payload.int,
				from: payload.from ? parseInt(payload.from) : payload.from,
				to: payload.to ? parseInt(payload.to) : payload.to
			});
			
			const respData = await response.data.data;

			if (response.status !== 200){
				const error = new Error(response.message || 'Something went wrong');
				throw error;
			}

			context.commit('setPropertyData', respData);
		}		
	},
	getters: {
		getPropertydata(state){
			return state.propertyData;
		}
	}
});


export default store;