<template>
    <input type="text" class="form-control" placeholder="Channel Name" v-model="channelName" @keyup.enter="add" @blur="add">
</template>
<script>
 export default {
     data () {
	 return {
	     channelName: ''
	 }
     },
     methods: {
	 add () {
	     if (this.channelName) {
		 this.$emit('channelEntered', this.channelName)
	     }
	 }
     }
 }
</script>
<style scoped>
 input {
     width: 90%;
     margin: 2px auto;
 }
</style>
