<script setup>
import ModalExcluir from "@/components/automovel/modalExcluir.vue";
import cardTable from "@/components/cardTable.vue"; // Corrigido o nome do componente para "Tables"
import Filter from "@/components/filter.vue";
import loading from "@/components/geral/LoadingOverlay.vue";
import router from "@/router";
import { useAutomovelStore } from "@/stores/AutomovelStore";

import { computed, onMounted, ref, watch } from "vue";

const auto = useAutomovelStore();

const tableData = ref([]);
const tableColumns = ref([
  "Id",
  "Nome",
  "quilometragem",
  "ano",
  "placa",
  "foto",
  "valor",
  "cambio",
  "tipo_combustivel",
]);
const actions = ref(["Editar", "Excluir"]);

const updateTableData = (items) => {
  return items.map((item) => ({
    Id: item.id,
    nome: item.nome,
    ano: item.ano,
    placa: item.final_placa,
    foto: item.foto_capa,
    valor: item.valor,
    cambio: item.cambio,
    tipo_combustivel: item.tipo_combustivel,
    quilometragem: item.quilometragem,
  }));
};

const handleActionClick = (action, item) => {
  if (action === "Editar") {
    router.push({ path: `/automoveis/edicao/${item.Id}` });
  } else if (action === "Excluir") {
    auto.modalExcluir = true;
    auto.automovel_id = item.Id;
  }
};

onMounted(async () => {
  await auto.AutomovelListar();
  tableData.value = updateTableData(auto.auto.data);
});

const computedTableData = computed(() => {
  return tableData.value;
});

const pageCount = computed(() => {
  return Math.ceil(tableData.value.length / 9);
});

const searchResult = (filterText) => {
  auto.filtrar = filterText;
  auto.AutomovelListar();
};

watch(
  () => auto.auto.meta.current_page,
  (newValue, oldValue) => {
    if (newValue !== oldValue) {
      auto.AutomovelListar(newValue);
    }
  }
);

watch(
  () => auto.auto,
  (newValue) => {
    tableData.value = updateTableData(newValue.data);
  }
);
</script>

<template>
  <ModalExcluir :automovelId="auto.automovel_id" />
  <loading :is-loading="auto.isLoading" />

  <VRow>
    <VCol cols="12">
      <VCard title="Listagem de Automoveis">
        <VCardText>Veja a lista de todos os seus automoveis abaixo</VCardText>
        <VCardText>
          <Filter
            :placeholder="'Busque pelo nome'"
            :label="'Nome'"
            @action-click="searchResult"
            :btn="'Buscar'"
          />
        </VCardText>

        <cardTable
          :items="computedTableData"
          :columns="tableColumns"
          :actions="actions"
          @action-click="handleActionClick"
        />

        <div class="text-center pt-2">
          <v-pagination
            class="my-4"
            v-model="auto.auto.meta.current_page"
            :length="pageCount"
          ></v-pagination>
        </div>
      </VCard>
    </VCol>
  </VRow>
</template>
