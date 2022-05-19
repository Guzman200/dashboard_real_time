<template>

    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEmpleados">
                Agregar Producto</button>
        </div>
        <!-- /.card-header -->

        <div class="modal fade" id="modalEmpleados">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar Producto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombres" placeholder="Ingresa el nombre"
                                    v-model="newProducto.nombre">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Marca</label>
                                <input type="text" class="form-control" id="a_paterno"
                                    placeholder="Ingresa la marca" v-model="newProducto.marca">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Precio de venta</label>
                                <input type="number" class="form-control" id="a_materno"
                                    placeholder="Ingresa el precio de venta" v-model="newProducto.precio_venta">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Area</label>
                                        <select class="form-control" v-model="newProducto.area_id">
                                            <option v-for="area in areas" :key="area.id"
                                                v-bind:value="area.id">
                                                {{area.nombre}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Categoría</label>
                                        <select class="form-control" v-model="newProducto.categoria_id">
                                            <option v-for="categoria in categorias" :key="categoria.id" v-bind:value="categoria.id">
                                                {{categoria.nombre}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" @click.prevent="createproductos">
                            Guardar</button>
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
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Precio de venta</th>
                        <th>Categoría</th>
                        <th>Area</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="producto in productos" :key="producto.id">
                        <td>{{producto.id}}</td>
                        <td>{{producto.nombre}}</td>
                        <td>{{producto.marca}}</td>
                        <td>${{producto.precio_venta}}</td>
                        <td>{{producto.categoria}}</td>
                        <td>{{producto.area}}</td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-sm" @click="deleteproductos(producto)">
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
            this.getproductos();
            this.getCategorias();
            this.getAreas();
        },
        data() {
            return {
                productos: [],
                areas: [],
                categorias: [],
                newProducto: {
                    nombre: '',
                    a_paterno: '',
                    a_materno: '',
                    categoria_id: '',
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
            getproductos() {
                axios.get('productos_list').then(res => {
                    this.productos = res.data
                    $('#empleados').DataTable().destroy()
                    this.tabla();
                });
            },
            createproductos() {
                axios.post('create_productos', this.newProducto).then(res => {
                    this.getproductos()
                    this.newProducto.nombre = '',
                    this.newProducto.a_paterno = '',
                    this.newProducto.a_materno = '',
                    this.newProducto.sucursal_id = '',
                    this.newProducto.area_id = '',
                    $('#modalEmpleados').modal('hide')
                    Swal.fire({
                        icon: 'success',
                        title: '¡Producto añadido!',
                    })
                });
            },
            deleteproductos(datos) {
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

                        axios.delete('delete_productos/' + datos.id).then(res => {
                            this.getproductos()
                        });

                        Swal.fire(
                            '¡Producto Eliminado!',
                            '',
                            'success'
                        )
                    }
                })
            },
            getCategorias() {
                axios.get('categoria_list').then(res => {
                    this.categorias = res.data
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
