/* eslint-disable import/order */
import '@/@iconify/icons-bundle';
import App from '@/App.vue';
import vuetify from '@/plugins/vuetify';
import { loadFonts } from '@/plugins/webfontloader';
import router from '@/router';
import CKEditor from '@ckeditor/ckeditor5-vue';
import '@core/scss/template/index.scss';
import '@layouts/styles/index.scss';
import '@styles/styles.scss';
import { createPinia } from 'pinia';
import { createApp } from 'vue';
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import axios from './plugins/axios';

loadFonts()


// Create vue app
const app = createApp(App)


// Use plugins
app.config.globalProperties.$http = axios;
app.use(vuetify)
app.use(Toast);
app.use(createPinia())
app.use(router)
app.use(CKEditor);

// Mount vue app
app.mount('#app')
