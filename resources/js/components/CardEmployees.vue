<template>

    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEmpleados">
                Agregar Empleado</button>
        </div>
        <!-- /.card-header -->

        <div class="modal fade" id="modalEmpleados">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar Empleado</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form" @submit.prevent="createEmployee">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control " id="nombres" placeholder="Ingresa el nombre"
                                    required v-model="newEmployee.nombre">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="a_paterno"
                                    placeholder="Ingresa el apellido paterno" required v-model="newEmployee.a_paterno">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="a_materno"
                                    placeholder="Ingresa el apellido materno" required v-model="newEmployee.a_materno">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Sucursal</label>
                                        <select class="form-control custom-select" required
                                            v-model="newEmployee.sucursal_id">
                                            <option value="">Selecciona una sucursal</option>
                                            <option v-for="sucursal in sucursales" :key="sucursal.id"
                                                v-bind:value="sucursal.id">
                                                {{sucursal.nombre}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Area</label>
                                        <select class="form-control custom-select" required
                                            v-model="newEmployee.area_id">
                                            <option value="">Selecciona un area</option>
                                            <option v-for="area in areas" :key="area.id" v-bind:value="area.id">
                                                {{area.nombre}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="card-body">
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
                        <td>{{employee.nombre}} {{employee.a_paterno}} {{employee.a_materno}}</td>
                        <td>{{employee.sucursal}}</td>
                        <td>{{employee.area}}</td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-sm" @click="deleteEmployee(employee)">
                                <i class="nav-icon fas fa-trash"></i><span> Eliminar</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</template>

<script>
    import axios from 'axios';
    import Swal from 'sweetalert2'

    export default {

        mounted() {
            this.getEmployees();
            this.getSucursales();
            this.getAreas();
        },
        data() {
            return {
                employees: [],
                sucursales: [],
                areas: [],
                newEmployee: {
                    nombre: '',
                    a_paterno: '',
                    a_materno: '',
                    sucursal_id: '',
                    nombre: '',
                    area_id: ''

                }
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
                    $('#empleados').DataTable().destroy()
                    this.tabla();
                });
            },
            createEmployee() {
                axios.post('create_employee', this.newEmployee).then(res => {
                    this.getEmployees()
                    this.newEmployee.nombre = '',
                        this.newEmployee.a_paterno = '',
                        this.newEmployee.a_materno = '',
                        this.newEmployee.sucursal_id = '',
                        this.newEmployee.area_id = '',
                        $('#modalEmpleados').modal('hide')
                    Swal.fire({
                        icon: 'success',
                        title: '¡Empleado añadido!',
                    })
                });
            },
            deleteEmployee(datos) {
                Swal.fire({

                    title: '¿Estas Seguro?',
                    text: "¡Esta accion no podra ser revertida!",
                    icon: 'warning',
                    cancelButtonText: 'Cancelar',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, eliminar!'

                }).then((result) => {
                    if (result.isConfirmed) {

                        axios.delete('delete_employee/' + datos.id).then(res => {
                            this.getEmployees()
                        });

                        Swal.fire(
                            '¡Empleado Eliminado!',
                            '',
                            'success'
                        )
                    }
                })
            },
            getSucursales() {
                axios.get('sucursal_list').then(res => {
                    this.sucursales = res.data
                });
            },
            getAreas() {
                axios.get('area_list').then(res => {
                    this.areas = res.data
                });
            }
        }

    }

</script>
