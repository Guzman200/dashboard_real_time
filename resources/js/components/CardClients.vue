<template>

    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalClientes">
                Agregar Cliente</button>
        </div>
        <!-- /.card-header -->

        <div class="modal fade" id="modalClientes">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar Cliente</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form" @submit.prevent="createClient">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombres" placeholder="Ingresa el nombre"
                                    required v-model="newClient.nombre">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="a_paterno"
                                    placeholder="Ingresa el apellido paterno" required v-model="newClient.a_paterno">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="a_materno"
                                    placeholder="Ingresa el apellido materno" required v-model="newClient.a_materno">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Telefono</label>
                                <input type="tel" class="form-control" id="telefono" placeholder="Ingresa el telefono"
                                    maxlength="10" pattern="(\d{10})" required v-model="newClient.telefono">
                                <small class="form-text text-muted">Numero a 10 digitos.</small>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary"> Guardar</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="card-body">
            <table class="table table-bordered table-striped" id="clientes">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Cliente</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="client in clients" :key="client.id">
                        <td>{{client.id}}</td>
                        <td>{{client.nombre}} {{client.a_paterno}} {{client.a_materno}}</td>
                        <td>{{client.telefono}}</td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-sm" @click="deleteClient(client)">
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
            this.getClients();
        },
        data() {
            return {
                clients: [],
                newClient: {
                    nombre: '',
                    a_paterno: '',
                    a_materno: '',
                    telefono: ''

                }
            }
        },
        methods: {
            tabla() {
                this.$nextTick(() => {
                    $('#clientes').DataTable({
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
            getClients() {
                axios.get('clients_list').then(res => {
                    this.clients = res.data
                    $('#clientes').DataTable().destroy()
                    this.tabla();
                });
            },
            createClient() {
                axios.post('create_client', this.newClient).then(res => {
                    this.getClients()
                    this.newClient.nombre = '',
                        this.newClient.a_paterno = '',
                        this.newClient.a_materno = '',
                        this.newClient.telefono = '',
                        $('#modalClientes').modal('hide')
                    Swal.fire({
                        icon: 'success',
                        title: '¡Cliente añadido!',
                    })
                });
            },
            deleteClient(datos) {
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

                        axios.delete('delete_client/' + datos.id).then(res => {
                            this.getClients()
                        });

                        Swal.fire(
                            '¡Cliente Eliminado!',
                            '',
                            'success'
                        )
                    }
                })
            }
        }

    }

</script>
