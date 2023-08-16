<template>
  <div>
    <VRow>
      <VCol cols="12">
        <VCard title="Informações basicas">
          <VCardText class="d-flex">
            <!-- 👉 Avatar -->
            <VAvatar
              rounded="lg"
              size="100"
              class="me-6"
              :image="props.item.foto_capa"
            />

            <!-- 👉 Upload Photo -->
            <form
              enctype="multipart/form-data"
              class="d-flex flex-column justify-center gap-5"
            >
              <div class="d-flex flex-wrap gap-2">
                <VBtn color="primary" @click="refInputEl?.click()">
                  <VIcon icon="bx-cloud-upload" class="d-sm-none" />
                  <span class="d-none d-sm-block">Carregar nova foto</span>
                </VBtn>

                <input
                  ref="refInputEl"
                  type="file"
                  name="file"
                  accept=".jpeg,.png,.jpg,GIF"
                  hidden
                  @input="changeAvatar"
                />

                <VBtn
                  type="reset"
                  color="error"
                  variant="tonal"
                  @click="resetAvatar"
                >
                  <span class="d-none d-sm-block">Remover</span>
                  <VIcon icon="bx-refresh" class="d-sm-none" />
                </VBtn>
              </div>

              <p class="text-body-1 mb-0">
                JPG, GIF ou PNG permitidos. Tamanho máximo de 800K
              </p>
            </form>
          </VCardText>

          <VDivider />

          <VCardText>
            <!-- 👉 Form -->
            <VForm class="mt-6">
              <VRow>
                <!-- 👉 First Name -->
                <VCol md="4" cols="12">
                  <p style="color: red">
                    {{ error.erroNome ? error.erroNome : "" }}
                  </p>
                  <VTextField
                    v-model="item.nome"
                    placeholder="ex: uno, palio"
                    label="Nome automovel"
                  />
                </VCol>

                <!-- 👉 Last Name -->
                <VCol md="4" cols="12">
                  <p style="color: red">
                    {{ error.erroValor ? error.erroValor : "" }}
                  </p>
                  <VTextField
                    v-model="item.valor"
                    placeholder="R$ "
                    label="Valor do automovel"
                  />
                </VCol>

                <!-- 👉 Email -->
                <VCol cols="12" md="4">
                  <p style="color: red">
                    {{ error.erroTipoAutovel ? error.erroTipoAutovel : "" }}
                  </p>
                  <VSelect
                    v-model="item.tipo_automovel[0].id"
                    label="Tipo do Automóvel"
                    :items="props.tipo"
                    item-title="tipo_automovel"
                    item-value="id"
                    placeholder="Selecione o tipo"
                  />
                </VCol>

                <!-- 👉 Organization -->
                <VCol cols="12" md="6">
                  <p style="color: red">
                    {{ error.erroCategoria ? error.erroCategoria : "" }}
                  </p>
                  <VSelect
                    v-model="item.nome_categoria[0].id"
                    label="Categoria do Automóvel"
                    :items="props.categoria"
                    item-title="nome_categoria"
                    item-value="id"
                    placeholder="Selecione a Categoria"
                  />
                </VCol>

                <VCol cols="12" md="6">
                  <p style="color: red">
                    {{ error.erroAno ? error.erroAno : "" }}
                  </p>
                  <VTextField
                    v-model="item.ano"
                    label="Ano/modelo"
                    placeholder="ex 2022/2023"
                  />
                </VCol>

                <!-- 👉 Phone -->
                <VCol cols="12" md="4">
                  <p style="color: red">
                    {{ error.erroMarca ? error.erroMarca : "" }}
                  </p>
                  <VSelect
                    v-model="item.marca_automovel[0].id"
                    label="Marca do Automóvel"
                    :items="props.marca"
                    item-title="nome_modelo"
                    item-value="id"
                    placeholder="Selecione a Marca"
                  />
                </VCol>

                <!-- 👉 Address -->
                <VCol cols="12" md="4">
                  <p style="color: red">
                    {{ error.erroModelo ? error.erroModelo : "" }}
                  </p>
                  <VSelect
                    v-model="item.nome_modelo[0].id"
                    label="Modelo do Automóvel"
                    :items="props.modelo"
                    item-title="nome_modelo"
                    item-value="id"
                    placeholder="Selecione a Modelo"
                  />
                </VCol>
                <VCol md="4" cols="12">
                  <p style="color: red">
                    {{ "" }}
                  </p>
                  <VTextField
                    v-model="item.especificacao_modelo"
                    placeholder="ex: EX 267CV 4X4 AUT. 3.8 "
                    label="Especificação do modelo"
                  />
                </VCol>

                <!-- 👉 State -->
                <VCol cols="12" md="4">
                  <VTextField
                    v-model="item.motor"
                    label="Modelo do motor"
                    placeholder="ex: 1.0"
                  />
                </VCol>

                <!-- 👉 Zip Code -->
                <VCol cols="12" md="4">
                  <VTextField
                    v-model="item.quilometragem"
                    label="Quilometragem"
                    placeholder="ex: 1000"
                  />
                </VCol>
                <VCol cols="12" md="4">
                  <VSelect
                    v-model="item.cambio"
                    label="Cambio"
                    :items="['Automatico', 'Manual']"
                    placeholder="Selecione o Cambio"
                  />
                </VCol>

                <!-- 👉 Country -->
                <VCol cols="12" md="3">
                  <VSelect
                    v-model="item.tipo_combustivel"
                    label="Tipo de combustivel"
                    :items="['Gasolina', 'Alcool', 'Diesel', 'Flex']"
                    placeholder="Selecione o Tipo de combustivel"
                  />
                </VCol>

                <!-- 👉 Language -->
                <VCol cols="12" md="3">
                  <VTextField
                    v-model="item.qtd_portas"
                    label="Quantidade de portas"
                    placeholder="ex: 4"
                  />
                </VCol>
                <VCol cols="12" md="3">
                  <VTextField
                    v-model="item.cor"
                    label="Cor"
                    placeholder="ex: Preto"
                  />
                </VCol>
                <VCol cols="12" md="3">
                  <VTextField
                    v-model="item.final_placa"
                    label="Final da placa"
                    placeholder="ex: 1"
                  />
                </VCol>

                <!-- 👉 Timezone -->
                <VCol cols="12" md="12">
                  <v-textarea
                    v-model="item.observacao"
                    label="Observação sobre"
                    placeholder="ex: 1"
                  />
                </VCol>
                <!-- 👉 Form Actions -->
                <VCol cols="12" class="d-flex flex-wrap gap-4">
                  <VBtn @click="next()">Proximo</VBtn>
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
import { computed, defineEmits, defineProps, reactive, ref, watch } from "vue";

const auto = useAutomovelStore();
const props = defineProps({
  item: {
    type: Object,
    required: true,
  },
  tipo: {
    type: Object,
    required: true,
  },
  categoria: {
    type: Object,
    required: true,
  },
  marca: {
    type: Object,
    required: true,
  },
  modelo: {
    type: Object,
    required: true,
  },
});
watch(
  () => props.item.marca_automovel[0].id,
  (newValue, oldValue) => {
    if (newValue !== oldValue) {
      auto.ModeloListar(newValue);
    }
  }
);
onMounted(() => {});

const refInputEl = ref();
const accountDataLocal = ref(
  structuredClone(JSON.parse(JSON.stringify(props.item)))
);
const isAccountDeactivated = ref(false);

const resetForm = () => {
  accountDataLocal.value = structuredClone(
    JSON.parse(JSON.stringify(props.item))
  );
};

const changeAvatar = (event) => {
  const fileReader = new FileReader();
  const files = event.target.files;
  if (files && files.length) {
    fileReader.readAsDataURL(files[0]);
    fileReader.onload = () => {
      if (typeof fileReader.result === "string") {
        accountDataLocal.value.foto_capa = fileReader.result;
        props.item.foto_capa = fileReader.result;
      }
    };
  }
};
// reset avatar image
const resetAvatar = () => {
  props.item.foto_capa = "";
};

const error = reactive({
  erroNome: "",
  erroValor: "",
  erroTipoAutovel: "",
  erroCategoria: "",
  erroAno: "",
  erroMarca: "",
  erroModelo: "",
});

const validate = computed(() => {
  if (
    props.item.nome == "" ||
    props.item.valor == null ||
    props.item.tipo_automovel[0].id == 0 ||
    props.item.nome_categoria[0].id == 0 ||
    props.item.ano == null ||
    props.item.marca_automovel[0].id == 0 ||
    props.item.nome_modelo[0].id == 0
  ) {
    if (props.item.nome == "") {
      error.erroNome = "Preencha o campo nome";
    }
    if (props.item.valor == null) {
      error.erroValor = "Preencha o campo valor";
    }
    if (props.item.tipo_automovel[0].id == 0) {
      error.erroTipoAutovel = "Selecione o tipo de automovel";
    }
    if (props.item.nome_categoria[0].id == 0) {
      error.erroCategoria = "Selecione a categoria de automovel ";
    }
    if (props.item.ano == null) {
      error.erroAno = "Preencha o campo ano/modelo";
    }
    if (props.item.marca_automovel[0].id == 0) {
      error.erroMarca = "Selecione a Marca de automovel ";
    }
    if (props.item.nome_modelo[0].id == 0) {
      error.erroModelo = "Selecione o modelo do automovel ";
    }
    return false;
  } else {
    return true;
  }
});

const emit = defineEmits(["next"]);

const next = () => {
  if (validate.value == true) {
    emit("next", "security");
  }
};
</script>
