<script setup>
import { useUsuarioStore } from "@/stores/UsuarioStore";
import { computed } from "vue";

const props = defineProps({
  usuarioId: {
    type: Number,
    required: true,
  },
});

const use = useUsuarioStore();

const trocarEmpresa = () => {
  // Chame o método da store para excluir o usuário com base no ID fornecido
  use.TrocarEmpresa();

  // Feche o modal
  use.modalTrocar = false;
};

const empresas = computed(() => {
  let result = [];
  if (Array.isArray(use.empresas)) {
    result = use.empresas.map((element) => {
      return { nome: element.nome, id: element.id };
    });
  }
  console.log(result);
  return result;
});
</script>

<template>
  <div class="text-center">
    <v-dialog v-model="use.modalTrocar" width="500">
      <VCard>
        <VWindow>
          <VWindowItem class="text-center">
            <VCardItem>
              <VCardTitle>Altere a empresa</VCardTitle>
              <VDivider />
            </VCardItem>

            <VCardText>
              <VCol cols="12">
                <VSelect
                  v-model="use.empresas_id"
                  label="Selecione a empresa"
                  :items="empresas"
                  item-title="nome"
                  item-value="id"
                  placeholder="Selecione a empresa"
                />
              </VCol>

              <VBtn @click="trocarEmpresa">Trocar</VBtn>
            </VCardText>
          </VWindowItem>
        </VWindow>
      </VCard>
    </v-dialog>
  </div>
</template>
