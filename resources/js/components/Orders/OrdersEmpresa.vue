<template>
    <div>
        <div class="card-header">
            <form action="#" method="POST" class="form form-inline">
                <label for="status">Status:</label>
                <select name="status" class="form-control" v-model="status">
                    <option value="all">Todos</option>
                    <option value="open">Aberto</option>
                    <option value="done">Completo</option>
                    <option value="rejected">Rejeitados</option>
                    <option value="working">Andamento</option>
                    <option value="canceled">Cancelado</option>
                    <option value="delivering">Em transito</option>
                </select> |
                <div class="form-group">
                    <label for="date">Data:</label>
                    <input type="date" class="form-control" v-model="dateFilter">
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Número</th>
                        <th>Status</th>
                        <th>Data</th>
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(order, index) in orders.data" :key="index">
                        <td>{{ order.identify }}</td>
                        <td>{{ order.status_label }}</td>
                        <td>{{ formartDate(order.date) }}</td>
                        <td>
                            <!-- <detail-order :order="order" :display="'none'"></detail-order> -->
                            <a href="#" @click.prevent="openDetails(order)" class="btn btn-info">Detalhes</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div v-if="loadingOrders">Carregando seus pedidos</div>
            <div v-else-if="orders.data.length == 0">Nenhum Pedido</div>
        </div>

        <detail-order :order="order" :display="displayOrder" @closeDetails="closeDetails" @statusUpdated="statusUpdated"></detail-order>
    </div>
</template>

<script>
import Bus from '../../Bus'
import DetailOrder from './_partials/DetailOrder'
export default {
    mounted() {
        this.getOrders()
        Bus.$on('order.created', (order) => {
            this.orders.data.unshift(order)
        })
    },
    data() {
        return {
            orders: {
                data: []
            },
            loadingOrders: false,
            dateFilter: new Date().getFullYear()+'-'+("0"+(new Date().getMonth()+1)).slice(-2)+'-'+("0"+new Date().getDate()).slice(-2),
            status: 'all',
            order: {
                identify: "",
                total: "",
                status: "",
                status_label: "",
                date: "",
                date: "",
                empresa: {
                    name: "",
                    image: "",
                    uuid: "",
                    contact: "",
                },
                cliente: {
                    name: "",
                    email: ""
                },
                mesa: "",
                produtos: [],
                avaliacao: []
            },
            displayOrder: 'none',
        }
    },
    methods: {
        getOrders () {
            this.reset()
            this.loadingOrders = true
            axios.get('/api/v1/my-orders', {params: {
                status: this.status,
                date: this.dateFilter
            }})
                .then(response => this.orders = response.data)
                .catch(error =>  this.$vToastify.error(`Falha ao carregar os pedidos`, 'ERROS!!!'))
                .finally(() => this.loadingOrders = false)
        },
        reset () {
            this.orders = {data: []}
        },
        statusUpdated (params) {
            this.closeDetails()
            this.getOrders()
        },
        openDetails(order) {
            console.log(order);
            this.order = order;
            this.displayOrder = 'block'
        },
        closeDetails() {
            this.order = {
                identify: "",
                total: "",
                status: "",
                status_label: "",
                date: "",
                date: "",
                empresa: {
                    name: "",
                    image: "",
                    uuid: "",
                    contact: "",
                },
                cliente: {
                    name: "",
                    email: ""
                },
                mesa: "",
                produtos: [],
                avaliacao: []
            },
            this.displayOrder = 'none'
        },

        formartDate(value){
            let date = new Date(value),
            day = (date.getDate() + 1).toString(),
            dayF = (day.length == 1) ? '0' + day : day,
            month = (date.getMonth() + 1).toString(),
            monthF = (day.length == 1) ? '0' + month : month,
            yearF = date.getFullYear()

            return dayF + "/" + monthF + "/" + yearF
        }
    },
    watch: {
        status () {
            return this.getOrders()
        },
        dateFilter () {
            return this.getOrders()
        }
    },
    components: {
        DetailOrder
    }
}
</script>
