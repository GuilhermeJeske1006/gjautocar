import axios from 'axios';
import { defineStore } from 'pinia';
import { useToast } from "vue-toastification";


export const useBlogStore = defineStore('blog', {
  state() {
    return {
      isLoading: false,
      modalExcluir: false,
      blog_id: '',
      filtrar: '',
      edicao: {
        titulo: '',
        foto: '',
        subtitulo: '',
        texto: '',
        empresa_id: localStorage.getItem('empresa_id'),
      },
      blogs: {
        meta: {}
      },
      cadastro: {
        titulo: '',
        foto: '',
        subtitulo: '',
        texto: '',
        empresa_id: localStorage.getItem('empresa_id'),

      },
      empresa_id: localStorage.getItem('empresa_id'),

    };
  },

  actions: {
    BlogListar(page) {
      this.isLoading = true

      return new Promise((resolve, reject) => {
        axios
          .get(`blogs/${this.empresa_id}`
          , { params: { name: this.filtrar, page: page } }
          )
          .then((res) => {
            this.blogs = res.data;
            resolve();
          })
          .catch((error) => {
            reject(error);
          })
          .finally(() => {
            this.isLoading = false; // Defina o estado isLoading como false após a chamada
          });
      });
    },
    BlogMostrar(id) {
      this.isLoading = true

      return new Promise((resolve, reject) => {
        axios
          .get(`/blog/${id}`)
          .then((res) => {
            this.edicao = res.data.data
            
            resolve(); // Resolva a Promise sem nenhum valor adicional
          })
          .catch((error) => {
            reject(error); // Rejeite a Promise com o erro
          })
          .finally(() => {
            this.isLoading = false; // Defina o estado isLoading como false após a chamada
          });
      });
    },

    BlogCadastro(){
      this.isLoading = true

      return new Promise((resolve, reject) => {
        axios
          .post('blog/criar', this.cadastro)
          .then((res) => {
            resolve(); // Resolva a Promise sem nenhum valor adicional
            useToast().success("Blog cadastrado com sucesso!");
            this.cadastro = {}

          })
          .catch((error) => {
            console.log(error);
            reject(error); // Rejeite a Promise com o erro
            useToast().error("Erro ao cadastrar o Blog!");

          })
          .finally(() => {
            this.isLoading = false; // Defina o estado isLoading como false após a chamada
          });
      });
    },
    
    BlogDeletar(id){
      this.isLoading = true

      return new Promise((resolve, reject) => {
        axios
          .delete(`blog/deletar/${id}`)
          .then((res) => {
            resolve(); // Resolva a Promise sem nenhum valor adicional
            useToast().success("Blog excluido com sucesso!");
          })
          .catch((error) => {
            reject(error); // Rejeite a Promise com o erro
            useToast().error("Erro ao excluir o Blog!");

          })
          .finally(() => {
            this.isLoading = false; // Defina o estado isLoading como false após a chamada
          });
      });
    },

    BlogEditar(id){
      this.isLoading = true

      return new Promise((resolve, reject) => {

        axios
          .put(`/blog/editar/${id}`, this.edicao)
          .then((res) => {
            resolve(); // Resolva a Promise sem nenhum valor adicional
            useToast().success("Blog editado com sucesso!");

          })
          .catch((error) => {
            console.log(error);
            reject(error); // Rejeite a Promise com o erro
            useToast().error("Erro ao editar o Blog!");

          })
          .finally(() => {
            this.isLoading = false; // Defina o estado isLoading como false após a chamada
          });
      });
    },

    
  },

  getters: {

  },
});
