<script setup>
import loading from "@/components/geral/LoadingOverlay.vue";
import { useRoute } from "vue-router";

const route = useRoute();
const activeTab = ref(route.params.tab);

import { useEmpresaStore } from "@/stores/EmpresaStore";

const empresa = useEmpresaStore();

const refInputEl = ref();
const accountDataLocal = ref(
  structuredClone(JSON.parse(JSON.stringify(empresa.cadastro)))
);
const isAccountDeactivated = ref(false);

const resetForm = () => {
  accountDataLocal.value = structuredClone(
    JSON.parse(JSON.stringify(empresa.cadastro))
  );
};

const error = reactive({
  erroNome: "",
  erroEmail: "",
  erroCor: "",
  erroRua: "",
  erroBairro: "",
  erroCidade: "",
  erroPais: "",
  erroCep: "",
  erroEstado: "",
});

const validate = () => {
  if (
    empresa.cadastro.nome == "" ||
    empresa.cadastro.email == "" ||
    empresa.cadastro.cor == "" ||
    empresa.cadastro.endereco.rua == "" ||
    empresa.cadastro.endereco.bairro == "" ||
    empresa.cadastro.endereco.cidade == "" ||
    empresa.cadastro.endereco.pais == "" ||
    empresa.cadastro.endereco.cep == ""
  ) {
    if (empresa.cadastro.nome == "") {
      error.erroNome = "Preencha o campo nome da empresa";
    }
    if (empresa.cadastro.email == "") {
      error.erroEmail = "Preencha o campo email da empresa";
    }
    if (empresa.cadastro.cor == "") {
      error.erroCor = "Preencha o campo cor";
    }
    if (empresa.cadastro.endereco.rua == "") {
      error.erroRua = "Preencha o campo Rua";
    }
    if (empresa.cadastro.endereco.bairro == "") {
      error.erroBairro = "Preencha o campo Bairro";
    }
    if (empresa.cadastro.endereco.cidade == "") {
      error.erroCidade = "Preencha o campo Cidade";
    }
    if (empresa.cadastro.endereco.pais == "") {
      error.erroPais = "Preencha o campo Pais";
    }
    if (empresa.cadastro.endereco.cep == "") {
      error.erroCep = "Preencha o campo Cep";
    }
    if (empresa.cadastro.endereco.estado == "") {
      error.erroEstado = "Preencha o campo Cep";
    }
    return false;
  } else {
    return true;
  }
};

const submit = () => {
  if (validate()) {
    empresa.EmpresaCadastro();
  }
};

const changeAvatar = (event) => {
  const fileReader = new FileReader();
  const files = event.target.files;
  if (files && files.length) {
    fileReader.readAsDataURL(files[0]);
    fileReader.onload = () => {
      if (typeof fileReader.result === "string") {
        accountDataLocal.value.foto_capa = fileReader.result;
        empresa.cadastro.logo = fileReader.result;
      }
    };
  }
};

// reset avatar image
const resetAvatar = () => {
  empresa.cadastro.logo = "";
};
</script>

<template>
  <div>
    <loading :is-loading="empresa.isLoading" />

    <VDivider />

    <VWindow v-model="activeTab" class="mt-5 disable-tab-transition">
      <!-- Account -->
      <VWindowcadastro value="account">
        <VRow>
          <VCol cols="12">
            <VCard title="Cadastro de empresas">
              <VCardText class="d-flex">
                <!-- 👉 Avatar -->
                <VAvatar
                  rounded="lg"
                  size="100"
                  class="me-6"
                  :image="empresa.cadastro.logo"
                />

                <!-- 👉 Upload Photo -->
                <form class="d-flex flex-column justify-center gap-5">
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
                    <VCol cols="12" md="12">
                      <h4>Informações de contato</h4>
                    </VCol>
                    <!-- 👉 First Name -->
                    <VCol md="6" cols="12">
                      <p style="color: red" v-if="error.erroNome">
                        {{ error.erroNome }}
                      </p>
                      <VTextField
                        v-model="empresa.cadastro.nome"
                        placeholder="Ex: empresa teste"
                        label="Nome empresa"
                      />
                    </VCol>

                    <!-- 👉 Last Name -->
                    <VCol md="6" cols="12">
                      <p style="color: red" v-if="error.erroNome">
                        {{ error.erroNome }}
                      </p>
                      <VTextField
                        v-model="empresa.cadastro.email"
                        placeholder="email@gmail.com"
                        type="email"
                        label="Email"
                      />
                    </VCol>

                    <!-- 👉 Email -->
                    <VCol cols="12" md="3">
                      <VTextField
                        v-model="empresa.cadastro.whatsapp"
                        label="Whatsapp"
                        placeholder="(99) 99999-9999"
                        type="tel"
                      />
                    </VCol>

                    <!-- 👉 Organization -->
                    <VCol cols="12" md="3">
                      <VTextField
                        v-model="empresa.cadastro.telefone"
                        label="Telefone"
                        placeholder="(99) 99999-9999"
                        type="tel"
                      />
                    </VCol>

                    <!-- 👉 Phone -->
                    <VCol cols="12" md="3">
                      <VTextField
                        v-model="empresa.cadastro.instagram"
                        label="Instagram"
                        placeholder="seu instagram"
                      />
                    </VCol>

                    <!-- 👉 Address -->
                    <VCol cols="12" md="3">
                      <VTextField
                        v-model="empresa.cadastro.facebook"
                        label="Facebook"
                        placeholder="seu facebook"
                      />
                    </VCol>
                    <VCol cols="12" md="12">
                      <h4>Informações sobre o site</h4>
                    </VCol>

                    <!-- 👉 State -->
                    <VCol cols="12" md="5">
                      <VTextField
                        v-model="empresa.cadastro.titulo"
                        label="Titulo"
                        placeholder="ex: Sua empresa - A melhor do Brasil"
                      />
                    </VCol>

                    <!-- 👉 Zip Code -->
                    <VCol cols="12" md="5">
                      <VTextField
                        v-model="empresa.cadastro.palavras_chaves"
                        label="Palavras Chaves"
                        placeholder="ex: seusite; automovel; carro"
                      />
                    </VCol>

                    <!-- 👉 Country -->
                    <VCol cols="12" md="2">
                      <p style="color: red" v-if="error.erroCor">
                        {{ error.erroCor }}
                      </p>

                      <VTextField
                        v-model="empresa.cadastro.cor"
                        label="Cor do site"
                        type="color"
                      />
                    </VCol>
                    <VCol cols="12" md="12">
                      <V-textarea
                        v-model="empresa.cadastro.descricao"
                        label="Descricao do site"
                        placeholder="ex: Seu site - o site especializado em oferecer o melhor para o seu cliente"
                      />
                    </VCol>
                    <VCol cols="12" md="12">
                      <h4>Informações sobre o endereco</h4>
                    </VCol>

                    <!-- 👉 Language -->
                    <VCol cols="12" md="8">
                      <p style="color: red" v-if="error.erroRua">
                        {{ error.erroRua }}
                      </p>
                      <VTextField
                        v-model="empresa.cadastro.endereco.rua"
                        label="Rua"
                        placeholder="Rua 25 de março"
                      />
                    </VCol>

                    <!-- 👉 Timezone -->
                    <VCol cols="12" md="4">
                      <p style="color: red" v-if="error.erroCep">
                        {{ error.erroCep }}
                      </p>
                      <VTextField
                        v-model="empresa.cadastro.endereco.cep"
                        label="Cep"
                        placeholder="ex: 88-888-888"
                      />
                    </VCol>

                    <!-- 👉 Currency -->
                    <VCol cols="12" md="4">
                      <p style="color: red" v-if="error.erroBairro">
                        {{ error.erroBairro }}
                      </p>
                      <VTextField
                        v-model="empresa.cadastro.endereco.bairro"
                        label="Bairro"
                        placeholder="ex: São pedro"
                      />
                    </VCol>
                    <VCol cols="12" md="4">
                      <p style="color: red" v-if="error.erroCidade">
                        {{ error.erroCidade }}
                      </p>
                      <VTextField
                        v-model="empresa.cadastro.endereco.cidade"
                        label="Cidade"
                        placeholder="ex: São paulo"
                      />
                    </VCol>
                    <VCol cols="12" md="4">
                      <p style="color: red" v-if="error.erroCor">
                        {{ error.erroCor }}
                      </p>
                      <VTextField
                        v-model="empresa.cadastro.endereco.pais"
                        label="Pais"
                        placeholder="ex: Brasil"
                      />
                    </VCol>
                    <VCol cols="12" md="6">
                      <VTextField
                        v-model="empresa.cadastro.endereco.complemento"
                        label="Complemento"
                        placeholder="ex: Casa verde"
                      />
                    </VCol>
                    <VCol cols="12" md="3">
                      <p style="color: red" v-if="error.erroEstado">
                        {{ error.erroestado }}
                      </p>
                      <VSelect
                        v-model="empresa.cadastro.endereco.estado"
                        label="Estado"
                        :items="[
                          'AC',
                          'AL',
                          'AP',
                          'AM',
                          'BA',
                          'CE',
                          'DF',
                          'ES',
                          'GO',
                          'MA',
                          'MT',
                          'MS',
                          'MG',
                          'PA',
                          'PB',
                          'PR',
                          'PE',
                          'PI',
                          'RJ',
                          'RN',
                          'RS',
                          'RO',
                          'RR',
                          'SC',
                          'SP',
                          'SE',
                          'TO',
                        ]"
                        placeholder="Selecione o seu estado"
                      />
                    </VCol>
                    <VCol cols="12" md="3">
                      <VTextField
                        v-model="empresa.cadastro.endereco.numero"
                        label="Numero"
                        placeholder="ex: 10"
                      />
                    </VCol>

                    <!-- 👉 Form Actions -->
                    <VCol cols="12" class="d-flex flex-wrap gap-4">
                      <VBtn @click="submit">Salvar</VBtn>
                    </VCol>
                  </VRow>
                </VForm>
              </VCardText>
            </VCard>
          </VCol>
        </VRow>
      </VWindowcadastro>
    </VWindow>
  </div>
</template>
