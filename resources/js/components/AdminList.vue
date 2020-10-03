<template>
    <div class="container">
        <div class="row justify-content-center">

            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in items" :key="item.id">
                    <th scope="row">{{ item.id }}</th>
                    <td>{{ item.name }}</td>
                    <td>{{ item.lastname }}</td>
                    <td>{{ item.email }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>

<script>
export default {
    name: "AdminList",
    data: function () {
        return {
            items: null
        }
    },
    mounted () {
        axios
            .get('/admin/admins/list')
            .then(response => (this.items = response.data.data))
    }
}
</script>

<style scoped>

</style>
