<template>
    <div>
        <ul class="list-group">
            <li v-for="(producto, index) in $store.state.products" :key="index" class="list-group-item d-flex justify-content-between align-items-center">
                {{producto.nombre}}
                <span class="badge badge-primary badge-pill">{{producto.precio}}</span>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    
}
</script>