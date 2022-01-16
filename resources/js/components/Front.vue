<template>
    <div class="container" :class="{'loading': loading}">
        <div class="row">
            <div class="col-lg-5">
                <h1 class="my-4">ToDo List</h1>
                <p>Showing all Todo list retrieved from Restful Api.</p>
            </div> 

            <div class="table-responsive col-lg-10">
                <table class="table table-striped table-sm table-hover" >
                    <thead>
                        <tr>
                        <th>ToDo ID</th>
                        <th>ToDos</th>
                        <th>Status</th>
                        </tr>
                    </thead>
                    <tbody v-for="todo in todos">
                        <tr>
                        <td><p>{{ todo.id }}</p></td>
                        <td>
                            <p>{{ todo.message }}</p>
                        </td>
                        <td>
                            <div v-if="todo.is_complete === 1">
                            <p class="text-success">Completed</p>
                            </div>
                            <div v-else>
                            <p class="text-danger">Incomplete</p>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                todos: [],
                // products: [],
                loading: true
            }
        },

        mounted() {
            this.loadTodos();
            // this.loadProducts();
        },

        methods: {
            loadTodos: function () {
                axios.get('/api/todos')
                    .then((response) => {
                        this.todos = response.data.todos;
                        this.loading = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            // loadProducts: function () {
            //     axios.get('/api/products')
            //         .then((response) => {
            //             this.products = response.data.data;
            //             this.loading = false;
            //         })
            //         .catch(function (error) {
            //             console.log(error);
            //         });
            // }
        }
    }
</script>
