<template>

    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalArea">
                Agregar Area</button>
        </div>
        <!-- /.card-header -->

        <div class="modal fade" id="modalArea">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar Area</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Ingresa el nombre"
                                    v-model="newArea.nombre">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" @click.prevent="createArea">
                            Guardar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="card-body">
            <table class="table table-bordered table-striped" id="areas">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Area</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="area in areas" :key="area.id">
                        <td>{{area.id}}</td>
                        <td>{{area.nombre}}</td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-sm" @click="deleteArea(area)">
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
            this.getAreas();
        },
        data() {
            return {
                areas: [],
                newArea: {
                    nombre: ''
                }
            }
        },
        methods: {
            tabla() {
                this.$nextTick(() => {
                    $('#areas').DataTable({
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
            getAreas() {
                axios.get('area_list').then(res => {
                    this.areas = res.data
                    $('#areas').DataTable().destroy()
                    this.tabla();
                });
            },
            createArea() {
                axios.post('create_area', this.newArea).then(res => {
                    this.getAreas()
                    this.newArea.nombre = '',
                    $('#modalArea').modal('hide')
                    Swal.fire({
                        icon: 'success',
                        title: '¡Area añadida!',
                    })
                });
            },
            deleteArea(datos) {
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

                        axios.delete('delete_area/' + datos.id).then(res => {
                            this.getAreas()
                        });

                        Swal.fire(
                            '¡Area Eliminada!',
                            '',
                            'success'
                        )
                    }
                })
            }
        }

    }

</script>
