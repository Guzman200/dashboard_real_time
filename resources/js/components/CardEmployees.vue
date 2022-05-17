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
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombres"
                                    placeholder="Ingresa el nombre">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="aPaterno"
                                    placeholder="Ingresa el apellido paterno">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="aMaterno"
                                    placeholder="Ingresa el apellido materno">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Sucursal</label>
                                        <select class="form-control">
                                            <option>Sucursal 1</option>
                                            <option>Sucursal 2</option>
                                            <option>Sucursal 3</option>
                                            <option>Sucursal 4</option>
                                            <option>Sucursal 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Area</label>
                                        <select class="form-control">
                                            <option>Area 1</option>
                                            <option>Area 2</option>
                                            <option>Area 3</option>
                                            <option>Area 4</option>
                                            <option>Area 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar cambios</button>
                    </div>
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
        </div>
        <!-- /.card-body -->
    </div>
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
