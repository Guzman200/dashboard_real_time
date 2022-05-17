<template>

    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSucursal">
                Agregar Sucursal</button>
        </div>
        <!-- /.card-header -->

        <div class="modal fade" id="modalSucursal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar Sucursal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre"
                                    placeholder="Ingresa el nombre">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Estado</label>
                                <input type="text" class="form-control" id="estado"
                                    placeholder="Ingresa el estado">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Ciudad</label>
                                <input type="text" class="form-control" id="ciudad"
                                    placeholder="Ingresa la ciudad">
                            </div>
                            <div class="form-group">
                                <label class="form-label">C.P.</label>
                                <input type="text" class="form-control" id="cp"
                                    placeholder="Ingresa el C.P.">
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
            <table class="table table-bordered table-striped" id="sucursales">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sucursal</th>
                        <th>Estado</th>
                        <th>Ciudad</th>
                        <th>C.P.</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="sucursal in sucursales" :key="sucursal.id">
                        <td>{{sucursal.id}}</td>
                        <td>{{sucursal.nombre}}</td>
                        <td>{{sucursal.estado}}</td>
                        <td>{{sucursal.ciudad}}</td>
                        <td>{{sucursal.cp}}</td>
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
            this.getSucursales();
        },
        data() {
            return {
                sucursales: []
            }
        },
        methods: {
            tabla() {
                this.$nextTick(() => {
                    $('#sucursales').DataTable({
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
            getSucursales() {
                axios.get('sucursal_list').then(res => {
                    this.sucursales = res.data
                    this.tabla();
                });
            }
        }

    }

</script>
