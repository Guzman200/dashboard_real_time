<template>

    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCategoria">
                Agregar Categoría</button>
        </div>
        <!-- /.card-header -->

        <div class="modal fade" id="modalCategoria">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar Categoría</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form" @submit.prevent="createCategoria">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Ingresa el nombre"
                                    required v-model="newCategoria.nombre">
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
            <table class="table table-bordered table-striped" id="categorias">
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
                            <button class="btn btn-danger btn-sm" @click="deleteCategoria(area)">
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
            this.getCategorias();
        },
        data() {
            return {
                areas: [],
                newCategoria: {
                    nombre: ''
                }
            }
        },
        methods: {
            tabla() {
                this.$nextTick(() => {
                    $('#categorias').DataTable({
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
            getCategorias() {
                axios.get('categoria_list').then(res => {
                    this.areas = res.data
                    $('#categorias').DataTable().destroy()
                    this.tabla();
                });
            },
            createCategoria() {
                axios.post('create_categoria', this.newCategoria).then(res => {
                    this.getCategorias()
                    this.newCategoria.nombre = '',
                        $('#modalCategoria').modal('hide')
                    Swal.fire({
                        icon: 'success',
                        title: '¡Categoría añadida!',
                    })
                });
            },
            deleteCategoria(datos) {
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

                        axios.delete('delete_categoria/' + datos.id).then(res => {
                            this.getCategorias()
                        });

                        Swal.fire(
                            '¡Categoría Eliminada!',
                            '',
                            'success'
                        )
                    }
                })
            }
        }

    }

</script>
