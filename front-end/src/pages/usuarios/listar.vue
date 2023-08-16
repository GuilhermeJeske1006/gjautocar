<script setup>
import Filter from "@/components/filter.vue";
import Tables from "@/components/tables.vue"; // Corrigido o nome do componente para "Tables"
import ModalExcluir from "@/components/usuario/modalExcluir.vue";
import { useUsuarioStore } from "@/stores/UsuarioStore";
import { computed, onMounted, ref, watch } from "vue";

const use = useUsuarioStore();

const tableData = ref([]);
const tableColumns = ref(["Id", "Nome", "Email"]);
const actions = ref(["Editar", "Excluir"]);

const updateTableData = (items) => {
  return items.map((item) => ({
    Id: item.id,
    Nome: item.name,
    Email: item.email,
  }));
};

const handleActionClick = (action, item) => {
  if (action === "Editar") {
    // Lógica para editar o usuário
  } else if (action === "Excluir") {
    use.modalExcluir = true;
    use.usuario_id = item.Id;
  }
};

onMounted(async () => {
  await use.UsuarioListar();
  tableData.value = updateTableData(use.user.data);
});

const computedTableData = computed(() => {
  return tableData.value;
});

const pageCount = computed(() => {
  return Math.ceil(tableData.value.length);
});

const searchResult = (filterText) => {
  use.filtrar = filterText;
  use.UsuarioListar();
};

watch(
  () => use.user.meta.current_page,
  (newValue, oldValue) => {
    if (newValue !== oldValue) {
      use.UsuarioListar(newValue);
    }
  }
);

watch(
  () => use.user,
  (newValue) => {
    tableData.value = updateTableData(newValue.data);
  }
);
</script>

<template>
  <ModalExcluir :usuarioId="use.usuario_id" />
  <VRow>
    <VCol cols="12">
      <VCard title="Listagem de Usuarios">
        <VCardText>Veja a lista de todos os seus Usuarios abaixo</VCardText>
        <VCardText>
          <Filter
            :placeholder="'Busque pelo nome'"
            :label="'Nome'"
            @action-click="searchResult"
            :btn="'Buscar'"
          />
        </VCardText>

        <Tables
          :items="computedTableData"
          :columns="tableColumns"
          :actions="actions"
          @action-click="handleActionClick"
        />

        <div class="text-center pt-2">
          <v-pagination
            v-model="use.user.meta.current_page"
            :length="pageCount"
          ></v-pagination>
        </div>
      </VCard>
    </VCol>
  </VRow>
</template>
