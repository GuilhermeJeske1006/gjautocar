import axios from 'axios';
import { defineStore } from 'pinia';
import { useToast } from "vue-toastification";


export const useAutomovelStore = defineStore('automovel', {
  state() {
    return {
      isLoading: true,
      empresa_id: localStorage.getItem('empresa_id'),
      auto: {
        meta: {}
      },
      cadastro: {
        empresa_id: localStorage.getItem('empresa_id'),
        foto_capa: "",
        nome: '',
        especificacao_modelo: null,
        valor: null,
        tipo_automovel_id : null,
        categoria_id: null,
        ano: null,
        quilometragem: null,
        cambio: null,
        tipo_combustivel: null,
        qtd_portas: null,
        cor: null,
        final_placa: null,
        modelo_id: null,
        marca_id: null,
        observacao: null,
        ir_para_site: true,
        automovel_destaque: true,
        motor: null,
        itens: [],
        fotos: [],

      },

      edicao: {
        empresa_id: localStorage.getItem('empresa_id'),
        foto_capa: "",
        nome: '',
        valor: null,
        tipo_automovel_id : null,
        especificacao_modelo: null,
        categoria_id: null,
        ano: null,
        quilometragem: null,
        cambio: null,
        tipo_combustivel: null,
        qtd_portas: null,
        cor: null,
        final_placa: null,
        modelo_id: null,
        marca_id: null,
        observacao: null,
        ir_para_site: true,
        automovel_destaque: true,
        tipo_automovel: [{
          id: 0
        }],
        nome_categoria: [{
          id: 0
        }],
        marca_automovel: [{
          id: 0
        }],
        nome_modelo: [{
          id: 0
        }],
        motor: null,
        itens: [],
        fotos: [{
          foto: ''
        }],
      },
      activeTab: '',
      tipo: [],
      categoria: [],
      marca: [],
      modelo: [],
      filtar: '',
      modalExcluir: false,
      automovel_id: 0
    };
  },

  actions: {
    AutomovelListar(page) {
      this.isLoading = true
      return new Promise((resolve, reject) => {
        axios
          .get(`/automoveis/${this.empresa_id}`
          , { params: { name: this.filtrar, page: page } })
          .then((res) => {
            this.auto = res.data
          
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
    AutomovelMostrar(id) {
      this.isLoading = true

      return new Promise((resolve, reject) => {
        axios
          .get(`/automovel/${id}`)
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
    AutomovelDeletar(id){
      this.isLoading = true

      return new Promise((resolve, reject) => {
        axios
          .delete(`automovel/deletar/${id}`)
          .then((res) => {
            resolve(); // Resolva a Promise sem nenhum valor adicional
            useToast().success("Automovel excluido com sucesso!");
            reload();
          })
          .catch((error) => {
            reject(error); // Rejeite a Promise com o erro
            useToast().error("Erro ao excluir o automovel! Tente novamente!");

          })
          .finally(() => {
            this.isLoading = false; // Defina o estado isLoading como false após a chamada
          });
      });
    },
    TipoListar() {
      this.isLoading = true

      return new Promise((resolve, reject) => {
        axios
          .get(`tipos`)
          .then((res) => {
            this.tipo = res.data.data
          
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
    CategoriaListar() {
      this.isLoading = true

      return new Promise((resolve, reject) => {
        axios
          .get(`categorias`)
          .then((res) => {
            this.categoria = res.data.data
          
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
    MarcasListar() {
      this.isLoading = true

      return new Promise((resolve, reject) => {
        axios
          .get(`marcas`)
          .then((res) => {
            this.marca = res.data.data
          
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
    ModeloListar(id) {
      return new Promise((resolve, reject) => {
        axios
          .get(`modelos/${id}`)
          .then((res) => {
            this.modelo = res.data.data
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

    AutomovelCadastro(){
      this.isLoading = true

      return new Promise((resolve, reject) => {
        axios
          .post('automovel/criar', this.cadastro)
          .then((res) => {
            resolve(); // Resolva a Promise sem nenhum valor adicional
            useToast().success("Automovel cadastrado com sucesso!");
            this.cadastro = {}

          })
          .catch((error) => {
            console.log(error);
            reject(error); // Rejeite a Promise com o erro
            useToast().error("Erro ao cadastrar o Automovel!");

          })
          .finally(() => {
            this.isLoading = false; // Defina o estado isLoading como false após a chamada
          });
      });
    },

    AutomovelEdicao(id){
      this.isLoading = true

      return new Promise((resolve, reject) => {

        axios
          .put(`/automovel/editar/${id}`, this.edicao)
          .then((res) => {
            resolve(); // Resolva a Promise sem nenhum valor adicional
            useToast().success("Automovel editado com sucesso!");

          })
          .catch((error) => {
            console.log(error);
            reject(error); // Rejeite a Promise com o erro
            useToast().error("Erro ao editar o Automovel!");

          })
          .finally(() => {
            this.isLoading = false; // Defina o estado isLoading como false após a chamada
          });
      });
    },
  },

  getters: {},
});
