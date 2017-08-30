<template>
    <div class="level">
	<div class="form-group">
	<label style="" for="channel">Choose a Channel:</label>
	<div :class="dropdownClass" style="">
	    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-Xtoggle="dropdown" aria-haspopup="true" aria-expanded="true" @click="open = true"><span v-text="tmpChannelName"></span>
		<span class="caret"></span>
	    </button>
	    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
		<li><channel-input @channelEntered="addChannel"></channel-input></li>
		<li v-for="channel in this.items"><a href="#" @click.prevent="setSelect(channel.name)" v-text="channel.name"></a></li>
	    </ul>
	</div>
	</div>
	<input type="hidden" v-model="channelName" name="channel"/>
    </div>
</template>
<script>
 import collection from '../mixins/collection';
 import ChannelInput from './ChannelInput.vue';
 export default {
     props: ['channels', 'old'],
     mixins: [collection],
     components: {
	 ChannelInput
     },
     mounted () {
	 this.channels.forEach(channel => this.add(channel));
     },
     data () {
	 return {
	     open: false,
	     channelName: this.old ? this.old : '',
	     tmpChannelName: this.old ? this.old : 'Select Channel'
	 };
     },
     methods: {
	 setSelect(channelName) {
	     this.channelName = channelName;
	     this.tmpChannelName = channelName;
	     this.open = false;
	 },
	 addChannel (channelName)  {
	     this.setSelect(channelName);
	 }
     },
     computed: {
	 dropdownClass () {
	     return this.open ? 'dropdown open' : 'dropdown';
	 }
     }
 }
</script>
<style scoped>
</style>
