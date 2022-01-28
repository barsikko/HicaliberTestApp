<template>
	<el-card class="box-card">
		<el-form
			@submit.native.prevent
			:inline="true"
			:model="formInline"
			class="demo-form-inline"
		>
			<el-form-item label="Search by">
				<el-select
					v-model="formInline.value"
					placeholder="Search value"
				>
					<el-option label="By name" value="name"></el-option>
					<el-option label="By bedrooms" value="bedrooms"></el-option>
					<el-option
						label="By bathrooms"
						value="bathrooms"
					></el-option>
					<el-option label="By storeys" value="storeys"></el-option>
					<el-option label="By garages" value="garages"></el-option>
					<el-option label="By price" value="price"></el-option>
				</el-select>
			</el-form-item>
			<el-form-item label="Search type" >
				<el-input v-if="formInline.value == 'price'"
				v-model="formInline.from"
				placeholder="from"
				type="number"
				class="price"
				>			
				</el-input>
				<el-input v-if="formInline.value == 'price'"
				v-model="formInline.to"
				placeholder="to"
				type="number"
				class="price"
				>
				</el-input>
				<el-input
					v-else-if="formInline.value == 'name'"
					v-model="formInline.text"
					placeholder="text"
				></el-input>
				<el-input
					v-else
					v-model="formInline.int"
					:placeholder="formInline.value"
					type="number"
				></el-input>
			</el-form-item>
			<el-form-item>
				<el-button type="primary" @click="onSubmit">Search</el-button>
			</el-form-item>
		</el-form>
	</el-card>
</template>

<script>
export default {
	data() {
		return {
			formInline: {
				value: "",
				text: undefined,
				int: undefined,
				from: undefined,
				to: undefined,
			},
		};
	},
	methods: {
		async onSubmit() {
			this.$root.$emit('loading', true);
			try {
				await this.$store.dispatch("searchBy", this.formInline);
			} catch (error) {
				console.log(error);
			}
			this.$root.$emit('loading', false);
		},
	},
};
</script>

<style scoped>
	.price {
		display: block;
	}
</style>
