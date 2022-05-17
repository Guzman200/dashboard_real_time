<template>

    <table class="table table-bordered table-striped" id="empleados">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Empleado</th>
                <th>Sucursal</th>
                <th>Area</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="employee in employees" :key="employee.id">
                <td>{{employee.id}}</td>
                <td>{{employee.nombre}}</td>
                <td>{{employee.sucursal_id}}</td>
                <td>{{employee.area_id}}</td>
                <td class="text-center">
                    <button class="btn btn-warning btn-sm">
                        <i class="nav-icon fas fa-pencil-alt"></i><span> Editar</span>
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="nav-icon fas fa-trash"></i><span> Eliminar</span>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    import axios from 'axios';

    export default {

        mounted() {
            this.getEmployees();
        },
        data() {
            return {
                employees: []
            }
        },
        methods: {
            tabla() {
                this.$nextTick(() => {
                    $('#empleados').DataTable({
                        language: {
                            "decimal": "",
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                            "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
                            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ Entradas",
                            "loadingRecords": "Cargando...",
                            "processing": "Procesando...",
                            "search": "Buscar:",
                            "zeroRecords": "Sin resultados encontrados",
                            "paginate": {
                                "first": "Primero",
                                "last": "Ultimo",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        }
                    });
                });
            },
            getEmployees() {
                axios.get('employees_list').then(res => {
                    this.employees = res.data
                    this.tabla();
                });
            }
        }

    }

</script>
