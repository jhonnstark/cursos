<template>
    <div class="container">
        <div class="row justify-content-center">

            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Alumnos</th>
                    <th scope="col">Profesor</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in items" :key="item.id">
                    <th scope="row">{{ item.id }}</th>
                    <td>{{ item.name }}</td>
                    <td>{{ item.id }}</td>
                    <td>{{ item.name }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>

<script>
export default {
    name: "CourseList",
    props: ['role'],
    data: function () {
        return {
            items: null
        }
    },
    mounted () {
        axios
            .get('/admin/' + this.role + '/list')
            .then(response => (this.items = response.data.data))
    }
}
</script>

<style scoped>

</style>
