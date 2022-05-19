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
                    <form class="form" @submit.prevent="createSucursal">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Ingresa el nombre"
                                    required v-model="newSucursal.nombre">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Estado</label>
                                <input type="text" class="form-control" id="estado" placeholder="Ingresa el estado"
                                    required v-model="newSucursal.estado">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Ciudad</label>
                                <input type="text" class="form-control" id="ciudad" placeholder="Ingresa la ciudad"
                                    required v-model="newSucursal.ciudad">
                            </div>
                            <div class="form-group">
                                <label class="form-label">C.P.</label>
                                <input type="text" class="form-control" id="cp" placeholder="Ingresa el C.P."
                                    maxlength="5" pattern="(\d{5})"
                                    required v-model="newSucursal.cp">
                                <small class="form-text text-muted">5 digitos.</small>
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
                            <button class="btn btn-danger btn-sm" @click="deleteSucursal(sucursal)">
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
            this.getSucursales();
        },
        data() {
            return {
                sucursales: [],
                newSucursal: {
                    nombre: '',
                    estado: '',
                    ciudad: '',
                    cp: ''

                }
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
                    $('#sucursales').DataTable().destroy()
                    this.tabla();
                });
            },
            createSucursal() {
                axios.post('create_sucursal', this.newSucursal).then(res => {
                    this.getSucursales()
                    this.newSucursal.nombre = '',
                        this.newSucursal.estado = '',
                        this.newSucursal.ciudad = '',
                        this.newSucursal.cp = '',
                        $('#modalSucursal').modal('hide')
                    Swal.fire({
                        icon: 'success',
                        title: '¡Sucursal añadida!',
                    })
                });
            },
            deleteSucursal(datos) {
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

                        axios.delete('delete_sucursal/' + datos.id).then(res => {
                            this.getSucursales()
                        });

                        Swal.fire(
                            '¡Sucursal Eliminada!',
                            '',
                            'success'
                        )
                    }
                })
            }
        }

    }

</script>
