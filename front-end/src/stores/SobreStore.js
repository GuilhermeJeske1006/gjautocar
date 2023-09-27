import axios from 'axios';
import { defineStore } from 'pinia';
import { useToast } from "vue-toastification";


export const useSobreStore = defineStore('sobre', {
  state() {
    return {
      isLoading: false,
      edicao: {
        titulo: '',
        texto: '',
        foto: '',
      },
      empresa_id: localStorage.getItem('empresa_id'),


    };
  },

  actions: {
    SobreMostrar() {
      this.isLoading = true

      return new Promise((resolve, reject) => {
        axios
          .get(`/sobre/${this.empresa_id}`)
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

    SobreEditar(){
      this.isLoading = true

      return new Promise((resolve, reject) => {

        axios
          .put(`/sobre/editar/${this.empresa_id}`, this.edicao)
          .then((res) => {
            resolve(); // Resolva a Promise sem nenhum valor adicional
            useToast().success("Sobre editado com sucesso!");

          })
          .catch((error) => {
            console.log(error);
            reject(error); // Rejeite a Promise com o erro
            useToast().error("Sobre ao editar o Blog!");

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
