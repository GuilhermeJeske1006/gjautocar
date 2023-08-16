<template>
  <div>
    <VRow>
      <VCol cols="12">
        <VCard title="Resumo do automovel">
          <VCardText class="d-flex">
            <!-- 👉 Avatar -->
            <VCol md="2" cols="12">
              <VAvatar
                :image="props.item.foto_capa"
                rounded="lg"
                size="100"
                class="me-6"
              />
            </VCol>
            <VCol cols="12" md="4">
              <VCardText>
                <h2>{{ props.item.nome }}</h2>
                <b>R$ {{ props.item.valor }}</b>
              </VCardText>
              <VCardText>
                <p class="mb-0">
                  {{ "Uno" }}
                </p>
              </VCardText>
            </VCol>
          </VCardText>

          <VDivider />

          <VCardText>
            <!-- 👉 Form -->
            <VForm class="mt-6">
              <VRow>
                <!-- 👉 First Name -->
                <VCol md="8" cols="12">
                  <VCardText>
                    <b>Nome do automovel</b>

                    <p class="mb-0">
                      {{ "Uno" }}
                    </p>
                  </VCardText>
                </VCol>

                <!-- 👉 Last Name -->
                <VCol md="4" cols="12">
                  <VTextField
                    disabled="disabled"
                    placeholder="R$ "
                    label="Valor do automovel"
                  />
                </VCol>

                <!-- 👉 Email -->
                <VCol cols="12" md="4">
                  <VSelect
                    disabled="disabled"
                    label="Tipo do Automóvel"
                    placeholder="Selecione o tipo"
                  />
                </VCol>

                <!-- 👉 Organization -->
                <VCol cols="12" md="4">
                  <VSelect
                    disabled="disabled"
                    label="Categoria do Automóvel"
                    placeholder="Selecione a Categoria"
                  />
                </VCol>

                <VCol cols="12" md="4">
                  <VTextField label="Ano/modelo" placeholder="ex 2022/2023" />
                </VCol>

                <!-- 👉 Phone -->
                <VCol cols="12" md="6">
                  <VSelect
                    label="Marca do Automóvel"
                    placeholder="Selecione a Marca"
                  />
                </VCol>

                <!-- 👉 Address -->
                <VCol cols="12" md="6">
                  <VSelect
                    label="Modelo do Automóvel"
                    placeholder="Selecione a Modelo"
                  />
                </VCol>

                <!-- 👉 State -->
                <VCol cols="12" md="4">
                  <VTextField label="Modelo do motor" placeholder="ex: 1.0" />
                </VCol>

                <!-- 👉 Zip Code -->
                <VCol cols="12" md="4">
                  <VTextField label="Quilometragem" placeholder="ex: 1000" />
                </VCol>
                <VCol cols="12" md="4">
                  <VSelect
                    label="Cambio"
                    :items="['Automatico', 'Manual']"
                    placeholder="Selecione o Cambio"
                  />
                </VCol>

                <!-- 👉 Country -->
                <VCol cols="12" md="3">
                  <VSelect
                    label="Tipo de combustivel"
                    :items="['Gasolina', 'Alcool', 'Diesel', 'Flex']"
                    placeholder="Selecione o Tipo de combustivel"
                  />
                </VCol>

                <!-- 👉 Language -->
                <VCol cols="12" md="3">
                  <VTextField
                    label="Quantidade de portas"
                    placeholder="ex: 4"
                  />
                </VCol>
                <VCol cols="12" md="3">
                  <VTextField label="Cor" placeholder="ex: Preto" />
                </VCol>
                <VCol cols="12" md="3">
                  <VTextField label="Final da placa" placeholder="ex: 1" />
                </VCol>

                <!-- 👉 Timezone -->
                <VCol cols="12" md="12">
                  <v-textarea label="Observação sobre" placeholder="ex: 1" />
                </VCol>
                <!-- 👉 Form Actions -->
                <VCol cols="12" class="d-flex flex-wrap gap-4">
                  <VBtn color="success" @click="submit">Salvar</VBtn>

                  <VBtn color="secondary" variant="tonal" @click="pass">
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
import { useAutomovelStore } from "@/stores/AutomovelStore";

const auto = useAutomovelStore();
const props = defineProps({
  item: {
    type: Array,
    required: true,
  },
});

const emit = defineEmits(["pass", "submit"]);

const pass = () => {
  emit("pass", "site");
};

const submit = () => {
  emit("submit");
};
</script>
