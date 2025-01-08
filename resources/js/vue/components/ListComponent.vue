<template>
    <!-- <router-link :to="{ name:'save'}">Nuevo registro</router-link> -->

    <o-modal v-model:active="confirmDeleteAction">
        <div class="p-4">
            <p>Seguro que quieres eliminar el registro?</p>
        </div>
        <div>
            <div class="flex flex-row-reverse gap-2 bg-gray-100 p-3">
                <o-button variant="danger" @click="deletePost">Delete</o-button>
                <o-button variant='primary' @click="confirmDeleteAction=false">Cancel</o-button>
            </div>
        </div>
    </o-modal>
        
    <h1>Post List</h1>
        <o-button iconLeft="plus" variant='primary' @click="$router.push({name:'save'})">Nuevo registro</o-button>
        
        <div class="mb-5"></div>

        <o-table :data="posts.data" :loading="isLoading">
            <o-table-column field="id" label="ID" v-slot="p">
                {{ p.row.id }}
            </o-table-column>
            <o-table-column field="title" label="Título" v-slot="p">
                {{ p.row.title }}
            </o-table-column>
            <o-table-column field="posted" label="Posted" v-slot="p">
                {{ p.row.posted }}
            </o-table-column>
            <o-table-column field="category" label="Categoría" v-slot="p">
                {{ p.row.category.title }}
            </o-table-column>
            <o-table-column field="category" label="Actions" v-slot="p">
                <router-link class='mr-3' :to="{ name:'save', params:{ 'slug': p.row.slug } }">Editar</router-link>
                <o-button iconLeft='delete' variant='danger'size='small' rounded @click="deletePostRow = p; confirmDeleteAction = true">Eliminar</o-button>
            </o-table-column>
        </o-table>
        <div class="mb-5"></div>
        <o-pagination
            v-if="posts.data && posts.data.length > 0"
            @change="updatePage"
            :total="posts.total"
            v-model:current="currentPage"
            :range-before="2"
            :range-after="2"
            size="small"
            :simple="false"
            :rounded="true"
            :per-page="posts.per_page"
        >

        </o-pagination>
</template>

<script>
    export default {

        data() {
            return {
                posts: [],
                isLoading: true,
                currentPage: 1,
                confirmDeleteAction: false,
                deletePostRow: ''
            }
        },
        mounted(){
            this.listPage()
        },
        methods: {
            updatePage(){
                setTimeout(() => {
                    this.listPage()
                }, 100)
                
            },
            listPage() {
                console.log(this.currentPage)
                this.isLoading = true
                this.$axios.get(this.$root.urls.postPaginate + '?page='+this.currentPage).then((res) => {
                    this.posts = res.data
                    this.isLoading = false
                })
            },
            deletePost(row){
                this.confirmDeleteAction = false
                this.$axios.delete(this.$root.urls.postDelete + this.deletePostRow.row.id)
                this.posts.data.splice(this.deletePostRow.index, 1)
                this.$oruga.notification.open({
                    message: 'Delete successfull',
                    position: 'bottom-right',
                    variant: 'danger',
                    duration: 4000,
                    closable: true
                })
            }
        }
    }
</script>