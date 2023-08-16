<script setup>
import loading from "@/components/geral/LoadingOverlay.vue";
import arquivoAutomovel from "@/pages/automoveis/cadastro/arquivoAutomovel.vue";
import InformacoesBasicas from "@/pages/automoveis/cadastro/informacaoBasica.vue";
import ItemAutomovel from "@/pages/automoveis/cadastro/itemAutomovel.vue";
import siteAutomovel from "@/pages/automoveis/cadastro/siteAutomovel.vue";
import { useAutomovelStore } from "@/stores/AutomovelStore";
import { computed, onMounted } from "vue";

import { useRoute } from "vue-router";

const auto = useAutomovelStore();
const route = useRoute();
const activeTab = ref(route.params.tab);

onMounted(() => {
  auto.TipoListar();
  auto.CategoriaListar();
  auto.MarcasListar();
});

const tipos = computed(() => {
  let result = [];
  if (Array.isArray(auto.tipo)) {
    result = auto.tipo.map((element) => {
      return { tipo_automovel: element.tipo_automovel, id: element.id };
    });
  }
  return result;
});

const categorias = computed(() => {
  let result = [];
  if (Array.isArray(auto.categoria)) {
    result = auto.categoria.map((element) => {
      return { nome_categoria: element.nome_categoria, id: element.id };
    });
  }
  return result;
});

const marcas = computed(() => {
  let result = [];
  if (Array.isArray(auto.marca)) {
    result = auto.marca.map((element) => {
      return { nome_modelo: element.nome_modelo, id: element.id };
    });
  }
  return result;
});

const modelos = computed(() => {
  let result = [];
  if (Array.isArray(auto.modelo)) {
    result = auto.modelo.map((element) => {
      return { nome_modelo: element.nome_modelo, id: element.id };
    });
  }
  return result;
});

const addItemToArray = (item) => {
  auto.cadastro.itens.push(item);
};

// tabs
const tabs = [
  {
    title: "Informações basicas",
    icon: "bx-user",
    tab: "account",
  },
  {
    title: "Arquivos",
    icon: "bxs-file",
    tab: "security",
  },
  {
    title: "Item",
    icon: "bx-bell",
    tab: "item",
  },
  {
    title: "Site",
    icon: "bx-sitemap",
    tab: "site",
  },
  // {
  //   title: "Resumo",
  //   icon: "bx-list-check",
  //   tab: "resumo",
  // },
];

const goToTab = (item) => {
  activeTab.value = item;
};

const goToPass = (item) => {
  activeTab.value = item;
};

const submit = () => {
  auto.AutomovelCadastro();
};
</script>

<template>
  <div>
    <loading :is-loading="auto.isLoading" />

    <VTabs v-model="activeTab" show-arrows>
      <VTab disabled v-for="item in tabs" :key="item.icon" :value="item.tab">
        <VIcon size="20" start :icon="item.icon" />
        {{ item.title }}
      </VTab>
    </VTabs>
    <VDivider />

    <VWindow v-model="activeTab" class="mt-5 disable-tab-transition">
      <!-- Account -->
      <VWindowItem value="account">
        <InformacoesBasicas
          :item="auto.cadastro"
          :tipo="tipos"
          :categoria="categorias"
          :marca="marcas"
          :modelo="modelos"
          @next="goToTab('security')"
        />
      </VWindowItem>

      <!-- Security -->
      <VWindowItem value="security">
        <arquivoAutomovel
          @next="goToTab('item')"
          @pass="goToPass('account')"
          :item="auto.cadastro.fotos"
        />
      </VWindowItem>

      <!-- Notification -->
      <VWindowItem value="item">
        <ItemAutomovel
          @next="goToTab('site')"
          @pass="goToPass('security')"
          @item-added="addItemToArray"
          :item="auto.cadastro.itens"
        />
      </VWindowItem>

      <VWindowItem value="site">
        <siteAutomovel
          @submit="submit()"
          @pass="goToPass('item')"
          :item="auto.cadastro"
        />
      </VWindowItem>

      <!-- <VWindowItem value="resumo">
        <Resumo
          @pass="goToPass('site')"
          @submit="submit()"
          :item="auto.cadastro"
        />
      </VWindowItem> -->
    </VWindow>
  </div>
</template>
