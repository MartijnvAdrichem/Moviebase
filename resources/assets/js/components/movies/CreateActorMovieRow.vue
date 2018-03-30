<template>
	<div class="form-group row" v-bind:class="{invalid: $v.actor.$error}">
		<div class="col-sm-6">
			<select style="height: 30px" @input="saveRow" @change="saveRow" v-model="actor" class="form-control" name="actor" id="">
			<option v-for="actor in Actors" :value="actor.id">{{actor.firstname}} {{actor.prefix}} {{actor.lastname}}</option>
		</select></div>
		<div class="col-sm-6">
			<input style="height: 30px" @input="saveRow" @change="saveRow" @blur="$v.role.$touch()" type="text" id="role" class="form-control" v-model="role" required>
			<p v-if="!$v.role.required">This field must not be empty</p></div>



	</div>
</template>

<script>
	import axios from 'axios';
	import {eventBus} from '../../app.js'
	import {required, email, numeric, minValue, minLength, sameAs, requiredUnless} from 'vuelidate/lib/validators';
	export default {
		props: ['Actors', 'index'],

		data() {
			return {
				actor: "",
				role: ""

			}
		},
		created(){
		},
		methods: {
			saveRow(){
				eventBus.$emit('actorWasEditted', {id: this.index, actor: this.actor, role: this.role});
			}
		},
		validations: {
			actor: {
				required
			},
			role: {
				required
			}
		},
		name: "create-actor-movie-row"
	}
</script>

<style scoped>

</style>