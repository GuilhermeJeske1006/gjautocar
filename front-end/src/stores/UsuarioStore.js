import router from '@/router';
import axios from 'axios';
import { defineStore } from 'pinia';
import { useToast } from "vue-toastification";


export const useUsuarioStore = defineStore('usuario', {
  state() {
    return {
      isLoading: false,
      cadastro: {
        foto: '',
        name: '',
        email: '',
        password: '',
        privacyPolicies: false
      },
      empresa_id: localStorage.getItem('empresa_id'),
      user_id: localStorage.getItem('usuario_id'),
      name: '',
      email: '',
      password: '',
      remember: false,
      perfil: [],
      password: {
        currentPassword: '',
        newPassword: '',
        confirmPassword: ''
      },
      user: {
        meta: {
        }
      },
      filtrar: '',
      modalExcluir: false,
      usuario_id: 0
    };
  },

  actions: {
    UsuarioLogin() {
      this.isLoading = true

      return new Promise((resolve, reject) => {
        const form = {
          email: this.email,
          password: this.password,
        };

        axios
          .post('login', form)
          .then((res) => {
            localStorage.setItem('token', res.data.token.plainTextToken);
            localStorage.setItem('empresa_id', res.data.user.empresa_id);
            localStorage.setItem('usuario_id', res.data.user.id);
            router.push("/dashboard");
            resolve(); // Resolva a Promise sem nenhum valor adicional
          })
          .catch((error) => {
            console.log(error);
            reject(error); // Rejeite a Promise com o erro
            useToast().error("Error ao fazer o login! Tente novamente!");

          }).finally(() => {
            this.isLoading = false; // Defina o estado isLoading como false após a chamada
          });;
      });
    },
    UsuarioLogout() {
      localStorage.removeItem('token');
      localStorage.removeItem('empresa_id');
      localStorage.removeItem('usuario_id');
       router.push("/login");
    },

    UsuarioCadastro(){
      this.isLoading = true

      return new Promise((resolve, reject) => {
        const form = {
          email: this.cadastro.email,
          password: this.cadastro.password,
          name: this.cadastro.name,
          empresa_id: this.empresa_id,
          foto: this.cadastro.foto
        };

        axios
          .post('usuario/criar', form)
          .then((res) => {
            resolve(); // Resolva a Promise sem nenhum valor adicional
            useToast().success("Usuario cadastrado com sucesso!");

          })
          .catch((error) => {
            console.log(error);
            reject(error); // Rejeite a Promise com o erro
            useToast().error("Erro ao cadastrar o usuario!");

          });
      });
    },

    UsuarioEdicao(){
      this.isLoading = true

      return new Promise((resolve, reject) => {
        axios
          .put(`usuario/editar/${this.user_id}`, this.perfil)
          .then((res) => {
            resolve(); // Resolva a Promise sem nenhum valor adicional
            useToast().success("Usuario cadastrado com sucesso!");

          })
          .catch((error) => {
            console.log(error);
            reject(error); // Rejeite a Promise com o erro
            useToast().error("Erro ao cadastrar o usuario!");

          })
          .finally(() => {
            this.isLoading = false; // Defina o estado isLoading como false após a chamada
          });
      });
    },

    UsuarioEdicaoSenha(){
      this.isLoading = true

      return new Promise((resolve, reject) => {
        axios
          .put(`/usuario/editar/senha/${this.user_id}`, this.password)
          .then((res) => {
            resolve(); // Resolva a Promise sem nenhum valor adicional
            useToast().success(res.response.data.message);

          })
          .catch((error) => {
            reject(error); // Rejeite a Promise com o erro
            useToast().error(error.response.data.message);

          })
          .finally(() => {
            this.isLoading = false; // Defina o estado isLoading como false após a chamada
          });
      });
    },

    UsuarioListar(page) {
      this.isLoading = true

      return new Promise((resolve, reject) => {
        axios
          .get(`usuarios/${this.empresa_id}`
          , { params: { name: this.filtrar, page: page } }
          )
          .then((res) => {
            this.user = res.data;
            resolve();
          })
          .catch((error) => {
            reject(error);
          });
      });
    },

    UsuarioPerfil() {
      this.isLoading = true

      return new Promise((resolve, reject) => {
        axios
          .get(`usuario/${this.user_id}`
          )
          .then((res) => {
            this.perfil = res.data.data;
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
    

    UsuarioDeletar(id){
      this.isLoading = true

      return new Promise((resolve, reject) => {
        axios
          .delete(`usuario/deletar/${id}`)
          .then((res) => {
            resolve(); // Resolva a Promise sem nenhum valor adicional
            useToast().success("Usuario excluido com sucesso!");
          })
          .catch((error) => {
            reject(error); // Rejeite a Promise com o erro
            useToast().error("Erro ao excluir o usuario!");

          })
          .finally(() => {
            this.isLoading = false; // Defina o estado isLoading como false após a chamada
          });
      });
    }

    
  },

  getters: {

  },
});
