<template>
    <div>
        <div class="card card-body">
            <form>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Producto</label>
                <div class="col-sm-10">
                    <input v-model="nombre" type="text" class="form-control" id="staticEmail">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Precio</label>
                <div class="col-sm-10">
                <input v-model="precio" type="number" class="form-control" id="inputPassword">
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <button type="button" @click="addProduct" class="btn btn-success">Agregar</button>
            </div>
        </form>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            nombre : '',
            precio : ''
        }
    },
    methods : {
        addProduct(){
            this.$store.dispatch('addProductAction', {
                nombre : this.nombre,
                precio : this.precio
            });
        }
    }
}
</script>