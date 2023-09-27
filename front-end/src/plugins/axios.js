import axios from 'axios';

axios.defaults.baseURL = 'https://autocar.backend.gjdesenvolvimento.com.br/api/';

axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;

export default axios;
