var vueApp= new Vue({
	el:'#app',
	data: {
		jogadores: []
	},
	methods: {
		pushJogador:function() {
			this.jogadores.push({nome: '', id: null});
		}
	}
});