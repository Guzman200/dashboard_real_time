<template>
    <div>
        <!-- DETALLE GENERAL DE LA VENTA -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Sucursal</label>
                            <select
                                v-model="venta.sucursal_id"
                                class="form-control"
                            >
                                <option
                                    v-for="sucursal in sucursales"
                                    :key="sucursal.id"
                                    :value="sucursal.id"
                                >
                                    {{ sucursal.nombre }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Empleado</label>
                            <select
                                v-model="venta.empleado_id"
                                class="form-control"
                            >
                                <option
                                    v-for="empleado in empleados"
                                    :key="empleado.id"
                                    :value="empleado.id"
                                >
                                    {{ empleado.nombre }}
                                    {{ empleado.a_paterno }}
                                    {{ empleado.a_materno }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Cliente</label>
                            <select
                                v-model="venta.cliente_id"
                                class="form-control"
                            >
                                <option
                                    v-for="cliente in clientes"
                                    :key="cliente.id"
                                    :value="cliente.id"
                                >
                                    {{ cliente.nombre }}
                                    {{ cliente.a_paterno }}
                                    {{ cliente.a_materno }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Forma de pago</label>
                            <select
                                v-model="venta.forma_pago_id"
                                class="form-control"
                            >
                                <option
                                    v-for="forma in formas_pago"
                                    :key="forma.id"
                                    :value="forma.id"
                                >
                                    {{ forma.descripcion }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Producto</label>
                            <select v-model="producto_id" class="form-control">
                                <option
                                    v-for="producto in productos"
                                    :key="producto.id"
                                    :value="producto.id"
                                >
                                    {{ producto.nombre }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Cantidad</label>
                            <input
                                class="form-control"
                                type="number"
                                v-model="cantidad"
                                min="1" 
                            />
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Agregar</label>
                            <button
                                class="form-control btn btn-primary"
                                @click="agregarProducto"
                            >
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table
                    class="table table-bordered table-striped"
                    id="empleados"
                >
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="producto in productosAgregados"
                            :key="producto.producto_id"
                        >
                            <td>{{ producto.nombre }}</td>
                            <td>${{ producto.precio_venta }}</td>
                            <td>{{ producto.cantidad }}</td>
                            <td>${{ producto.total }}</td>
                            <td class="text-center">
                                <button
                                    class="btn btn-danger btn-sm"
                                    @click="deleteProducto(producto)"
                                >
                                    <i class="nav-icon fas fa-trash"></i
                                    ><span> Eliminar</span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-body">
            <button v-if="loading == false" class="btn btn-primary btn-block" @click="generarVenta">Generar venta</button>
             <button v-if="loading" class="btn btn-primary btn-block">Generando venta ...</button>
        </div>
        
    </div>
</template>

<script>

import Swal from 'sweetalert2'

export default {
    data() {
        return {
            sucursales: [],
            empleados: [],
            clientes: [],
            formas_pago: [],
            productos: [],
            venta: {
                sucursal_id: 1,
                empleado_id: 1,
                cliente_id: 1,
                forma_pago_id: 1,
                total: 0,
            },
            producto_id: 1,
            cantidad: 1,
            productosAgregados: [],
            loading : false
        };
    },
    mounted() {
        this.getSucursales();
        this.getEmpleados();
        this.getClientes();
        this.getFormasPago();
        this.getProductos();
    },
    methods: {
        getSucursales() {
            axios.get("sucursal_list").then((res) => {
                this.sucursales = res.data;
            });
        },
        getEmpleados() {
            axios.get("employees_list").then((res) => {
                this.empleados = res.data;
            });
        },
        getClientes() {
            axios.get("clients_list").then((res) => {
                this.clientes = res.data;
            });
        },
        getFormasPago() {
            axios.get("formaspago_list").then((res) => {
                this.formas_pago = res.data;
            });
        },
        getProductos() {
            axios.get("productos_list").then((res) => {
                this.productos = res.data;
            });
        },
        deleteProducto(producto_delete) {
            console.log(producto_delete);
            this.productosAgregados = this.productosAgregados.filter((producto) => producto.producto_id != producto_delete.producto_id)
            this.calcularTotalProductos();

        },
        agregarProducto() {

            let producto = this.productos.filter((producto) => producto.id == this.producto_id)[0];

            let productoAgregado = this.productosAgregados.filter((producto) => producto.producto_id == this.producto_id)[0];

            if(productoAgregado){
                this.deleteProducto(productoAgregado)
            }

            this.productosAgregados.push({
                producto_id : producto.id,
                precio_venta : producto.precio_venta,
                precio_compra : producto.precio_venta - 20,
                cantidad  : this.cantidad,
                nombre : producto.nombre,
                total : producto.precio_venta * this.cantidad
            });     
            
            this.calcularTotalProductos();
            
        },
        generarVenta(){
            
            if(this.productosAgregados.length > 0){

                let venta = this.venta;

                venta.detalles = this.productosAgregados;
                
                this.loading = true;
                axios.post('ventas', venta).then(res => {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Venta generada!',
                    })
                    this.loading = false;

                    this.productosAgregados = []
                    this.venta.total = 0;

                });
                

            }else{
                Swal.fire({
                    icon: 'warning',
                    title: 'Para generar un venta necesitas agregar minimo 1 producto a la lista',
                })
            }
            
        },
        calcularTotalProductos(){
            this.venta.total = 0;
            for(let item of this.productosAgregados){
                this.venta.total = this.venta.total + item.total;
            }
        }
    },
};
</script>