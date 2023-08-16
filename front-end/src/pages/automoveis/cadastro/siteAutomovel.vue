<template>
  <div>
    <VRow>
      <VCol cols="12">
        <VCard title="Informações para o site">
          <VCardText>
            <!-- 👉 Form -->
            <VForm class="mt-6">
              <VRow>
                <!-- 👉 First Name -->
                <VCol md="6" cols="12">
                  <v-switch
                    v-model="props.item.ir_para_site"
                    label="Ir para o site"
                  ></v-switch>
                </VCol>
                <VCol md="6" cols="12">
                  <v-switch
                    v-model="props.item.automovel_destaque"
                    label="Automovel em destaque"
                  ></v-switch>
                </VCol>

                <VCol cols="12" class="d-flex flex-wrap gap-4">
                  <VBtn color="success" @click="submit">Salvar</VBtn>

                  <VBtn color="secondary" variant="tonal" @click="pass()">
                    Anterior
                  </VBtn>
                </VCol>
              </VRow>
            </VForm>
          </VCardText>
        </VCard>
      </VCol>
    </VRow>
  </div>
</template>

<script setup>
const props = defineProps({
  item: {
    type: Object,
    required: true,
  },
});

const emit = defineEmits(["pass", "submit"]);

const pass = () => {
  emit("pass", "item");
};

const submit = () => {
  emit("submit");
};
</script>
