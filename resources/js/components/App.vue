<template>
    <div>
        <add-product></add-product>
        <hr>
        <div class="row">
            <div class="col-12 col-md-6">
                <h3>Lista 1</h3>
                <list-products></list-products>
            </div>
            <div class="col-12 col-md-6">
                <h2>Lista 2</h2>
                <list-products-dos></list-products-dos>
            </div>
        </div>
        
    </div>
</template>

<script>

import AddProduct from './AddProduct.vue';
import ListProducts from './ListProducts.vue';
import ListProductsDos from './ListProductsDos.vue';

export default {
    components: {
        AddProduct,
        ListProducts,
        ListProductsDos
    }
}
</script>