<template>
    <div id="exampleModalLive" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" :style="{display: display}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Detalhes do Pedido {{ order.identify }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeDetails">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" class="form form-inline" @submit.prevent="updateStatus">
                        <label for="status">Status:</label>
                        <select name="status" class="form-control" v-model="status">
                            <option value="open">Aberto</option>
                            <option value="done">Completo</option>
                            <option value="rejected">Rejeitado</option>
                            <option value="working">Andamento</option>
                            <option value="canceled">Cancelado</option>
                            <option value="delivering">Em transito</option>
                        </select> |
                        <button type="submit" class="btn btn-info" :disabled="loading">
                            Atualizar Status
                        </button>
                    </form>
                    <ul>
                        <li>Número do pedido: {{ order.identify }}</li>
                        <li>Total: R$ {{ total }}</li>
                        <li>Status: {{ order.status_label }}</li>
                        <li>Data: {{ order.date_br }}</li>
                         <li>
                            Cliente:
                            <ul>
                                <li>Nome: {{ order.cliente.name}}</li>
                                <li>Contato: {{ order.cliente.email }}</li>
                            </ul>
                        </li>
                        <li>Mesa: {{ order.mesa.nome }}</li>
                        <li>
                            Produtos:
                            <ul>
                                <li v-for="(produto, index) in order.produtos" :key="index">
                                    <img :src="produto.image" :alt="produto.produto" style="max-width: 100px;">
                                    {{ produto.produto }}
                                </li>
                            </ul>
                        </li>
                        <li>
                            Avaliações:
                            <ul>
                                <li v-for="(avaliacao, index) in order.avaliacao" :key="index">
                                    Nota: {{ avaliacao.stars }}/4
                                    <br>Comentário: {{ avaliacao.comentario }}
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        display: {
            required: true
        },
        order: {
            type: Object,
            required: true
        }
    },
    computed: {
        total () {
            return this.order.total.toLocaleString('pt-br', {minimumFractionDigits: 2})
        }
    },
    data() {
        return {
            status: '',
            loading: false,
        }
    },
    methods: {
        closeDetails () {
            this.$emit('closeDetails')
        },
        updateStatus() {
            this.loading = true
            const params = {
                status: this.status,
                identify: this.order.identify
            }

            axios.patch('/api/v1/my-orders', params)
            .then(response => {
                this.$emit('statusUpdated')
            })
            .catch(error =>{
                this.$emit('closeDetails')
            })
            .finally(() => this.loading = false)
        }
    },
    watch: {
        order () {
            this.status = this.order.status
        }
    },
}
</script>
