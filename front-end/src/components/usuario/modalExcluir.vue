<script setup>
import { useUsuarioStore } from "@/stores/UsuarioStore";

const props = defineProps({
  usuarioId: {
    type: Number,
    required: true,
  },
});

const use = useUsuarioStore();

const excluirUsuario = () => {
  // Chame o método da store para excluir o usuário com base no ID fornecido
  use.UsuarioDeletar(props.usuarioId);

  // Feche o modal
  use.modalExcluir = false;
};
</script>

<template>
  <div class="text-center">
    <v-dialog v-model="use.modalExcluir" width="500">
      <VCard>
        <VWindow>
          <VWindowItem class="text-center">
            <VCardItem>
              <VCardTitle>Você tem certeza disso?</VCardTitle>
              <VDivider />
            </VCardItem>
            <VCardText
              >Você ira excluir permanentemente o Usuario
              {{ props.usuarioId }}</VCardText
            >

            <VCardText>
              <VBtn color="error " @click="excluirUsuario">Excluir</VBtn>
            </VCardText>
          </VWindowItem>
        </VWindow>
      </VCard>
    </v-dialog>
  </div>
</template>
