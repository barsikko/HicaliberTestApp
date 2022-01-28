<template>
	<el-row>
  	<el-col :span="12"><div class="grid-content bg-purple"><property-data-list></property-data-list></div></el-col>
  	<el-col :span="12"><div class="grid-content bg-purple-light"><request-data></request-data></div></el-col>
	</el-row>
</template>

<script>
	import PropertyDataList from '../components/PropertyDataList';
	import RequestData from '../components/RequestData';

	export default {
    	components: {
    		PropertyDataList,
    		RequestData
    	}
    }
</script>

<style scoped>
  .el-row {
    margin-bottom: 20px;
    &:last-child {
      margin-bottom: 0;
    }
  }
  .el-col {
    border-radius: 4px;
  }
  .bg-purple-dark {
    background: #99a9bf;
  }
  .bg-purple {
    background: #d3dce6;
  }
  .bg-purple-light {
    background: #e5e9f2;
  }
  .grid-content {
    border-radius: 4px;
    min-height: 36px;
  }
  .row-bg {
    padding: 10px 0;
    background-color: #f9fafc;
  }
</style>