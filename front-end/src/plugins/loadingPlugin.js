// plugins/loadingPlugin.js

import LoadingOverlay from '@/components/LoadingOverlay';

export default {
  install(Vue) {
    // Adicione um novo componente Vue chamado `loading-overlay` globalmente
    Vue.component('loading-overlay', LoadingOverlay);

    // Adicione uma propriedade `isLoading` globalmente para todos os componentes Vue
    Vue.mixin({
      data() {
        return {
          isLoading: false,
        };
      },
    });
  },
};
