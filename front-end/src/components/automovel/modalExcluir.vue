<script setup>
import { useAutomovelStore } from "@/stores/AutomovelStore";

const props = defineProps({
  automovelId: {
    type: Number,
    required: true,
  },
});

const auto = useAutomovelStore();

const excluirAutomovel = () => {
  auto.AutomovelDeletar(props.automovelId);

  // Feche o modal
  auto.modalExcluir = false;
};
</script>

<template>
  <div class="text-center">
    <v-dialog v-model="auto.modalExcluir" width="500">
      <VCard>
        <VWindow>
          <VWindowItem class="text-center">
            <VCardItem>
              <VCardTitle>Você tem certeza disso?</VCardTitle>
              <VDivider />
            </VCardItem>
            <VCardText
              >Você ira excluir permanentemente o automóvel
              {{ props.automovelId }}</VCardText
            >

            <VCardText>
              <VBtn color="error " @click="excluirAutomovel">Excluir</VBtn>
            </VCardText>
          </VWindowItem>
        </VWindow>
      </VCard>
    </v-dialog>
  </div>
</template>
