<template>
	<el-table
	v-loading="loading"
	element-loading-text="Loading..."
	element-loading-spinner="el-icon-loading"
	element-loading-background="rgba(0, 0, 0, 0.8)"
	:data="propertyData"
	style="width: 100%"
	>
	<el-table-column prop="id" label="Id" width="40px"></el-table-column>
	<el-table-column prop="name" label="Name"></el-table-column>
	<el-table-column prop="price" label="Price"> </el-table-column>
	<el-table-column prop="storeys" label="Storeys"> </el-table-column>
	<el-table-column prop="garages" label="Garages"> </el-table-column>
	<el-table-column prop="bedrooms" label="Bedrooms"> </el-table-column>
	<el-table-column prop="bathrooms" label="Bathrooms"> </el-table-column>
</el-table>
</template>

<script>
	export default {
		data() {
			return {
				isLoading: false,
			};
		},
		computed: {
			loading(){
				this.$root.$on('loading', value => {
					this.isLoading = value;
				})

				return this.isLoading;
			},
			propertyData() {
				return this.$store.getters["getPropertydata"];
			},
		},
		created() {
			this.loadPropertyData();
		},
		methods: {
			async loadPropertyData() {
				this.isLoading = true;
				try {
					await this.$store.dispatch("loadPropertydata");
				} catch (error) {
					console.log(error);
				}
				this.isLoading = false;
			},
		},
	};
</script>
