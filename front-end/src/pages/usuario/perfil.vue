<script setup>
import loading from "@/components/geral/LoadingOverlay.vue";
import { useRoute } from "vue-router";

const route = useRoute();
const activeTab = ref(route.params.tab);

import { useUsuarioStore } from "@/stores/UsuarioStore";

import { onMounted, reactive, ref } from "vue";
const usuario = useUsuarioStore();

onMounted(() => {
  usuario.UsuarioPerfil();
});

const isCurrentPasswordVisible = ref(false);
const isNewPasswordVisible = ref(false);
const isConfirmPasswordVisible = ref(false);
const currentPassword = ref("12345678");
const newPassword = ref("87654321");
const confirmPassword = ref("87654321");
const erroNewPassword = reactive({
  erroMinimo: "A senha deve ter pelo menos 8 caracteres",
  erroMinusculo: "A senha deve conter pelo menos um caractere Maiusculo",
  erroSimbolo:
    "A senha deve conter pelo menos um número, símbolo ou caractere de espaço",
  erro: "",
});

const refInputEl = ref();
const accountDataLocal = ref(
  structuredClone(JSON.parse(JSON.stringify(usuario.perfil)))
);
const isAccountDeactivated = ref(false);

const resetForm = () => {
  accountDataLocal.value = structuredClone(
    JSON.parse(JSON.stringify(usuario.perfil))
  );
};

const validateNewPassword = () => {
  if (usuario.password.newPassword != usuario.password.confirmPassword) {
    erroNewPassword.erro = "A confirmação não esta igual a nova senha!";
  } else {
    erroNewPassword.erro = "";
  }
};

const validatePassword = () => {
  const { newPassword } = usuario.password;
  // Verifica se a senha tem pelo menos 8 caracteres
  if (newPassword.length >= 8) {
    erroNewPassword.erroMinimo = "";
  } else {
    erroNewPassword.erroMinimo = "A senha deve ter pelo menos 8 caracteres";
  }

  // Verifica se a senha tem pelo menos uma letra minúscula
  if (/[A-Z]/.test(newPassword)) {
    erroNewPassword.erroMinusculo = "";
  } else {
    erroNewPassword.erroMinusculo =
      "A senha deve conter pelo menos um caractere Maiusculo";
  }

  // Verifica se a senha tem pelo menos um número, símbolo ou caractere de espaço em branco
  if (/[0-9!@#$%^&*()\s]/.test(newPassword)) {
    erroNewPassword.erroSimbolo = "";
  } else {
    erroNewPassword.erroSimbolo =
      "A senha deve conter pelo menos um número, símbolo ou caractere de espaço.";
  }
};

const submitPassword = () => {
  usuario.UsuarioEdicaoSenha();
};

const changeAvatar = (event) => {
  const fileReader = new FileReader();
  const files = event.target.files;
  if (files && files.length) {
    fileReader.readAsDataURL(files[0]);
    fileReader.onload = () => {
      if (typeof fileReader.result === "string") {
        accountDataLocal.value.foto = fileReader.result;
        usuario.perfil.foto = fileReader.result;
      }
    };
  }
};

// reset avatar image
const resetAvatar = () => {
  usuario.perfil.foto = "";
};
</script>

<template>
  <div>
    <loading :is-loading="usuario.isLoading" />

    <VDivider />

    <VWindow v-model="activeTab" class="mt-5 disable-tab-transition">
      <!-- Account -->
      <VWindowItem value="account">
        <VRow>
          <VCol cols="12">
            <VCard title="Detalhes do usuario">
              <VCardText class="d-flex">
                <!-- 👉 Avatar -->
                <VAvatar
                  rounded="lg"
                  size="100"
                  class="me-6"
                  :image="usuario.perfil.foto"
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
                      <VTextField
                        v-model="usuario.perfil.name"
                        placeholder="Ex: Joao da silva"
                        label="Seu nome"
                      />
                    </VCol>

                    <!-- 👉 Last Name -->
                    <VCol md="6" cols="12">
                      <VTextField
                        v-model="usuario.perfil.email"
                        placeholder="email@gmail.com"
                        type="email"
                        label="Seu email"
                      />
                    </VCol>

                    <VCol cols="12" class="d-flex flex-wrap gap-4">
                      <VBtn @click="usuario.UsuarioEdicao()">Salvar</VBtn>
                    </VCol>

                    <VCol cols="12" md="12">
                      <h4>Alterar senha</h4>
                    </VCol>

                    <VCol cols="12" md="6">
                      <!-- 👉 current password -->
                      <VTextField
                        v-model="usuario.password.currentPassword"
                        :type="isCurrentPasswordVisible ? 'text' : 'password'"
                        :append-inner-icon="
                          isCurrentPasswordVisible ? 'bx-hide' : 'bx-show'
                        "
                        label="Senha Atual"
                        placeholder="············"
                        @click:append-inner="
                          isCurrentPasswordVisible = !isCurrentPasswordVisible
                        "
                      />
                    </VCol>
                    <VCol cols="12" md="6"> </VCol>
                    <VCol cols="12" md="6">
                      <!-- 👉 new password -->
                      <p style="color: red" v-if="erroNewPassword.erro != ''">
                        {{ erroNewPassword.erro }}
                      </p>
                      <VTextField
                        v-model="usuario.password.newPassword"
                        :type="isNewPasswordVisible ? 'text' : 'password'"
                        :append-inner-icon="
                          isNewPasswordVisible ? 'bx-hide' : 'bx-show'
                        "
                        label="Nova senha"
                        placeholder="············"
                        @click:append-inner="
                          isNewPasswordVisible = !isNewPasswordVisible
                        "
                        @input="validatePassword"
                      />
                    </VCol>

                    <VCol cols="12" md="6">
                      <!-- 👉 confirm password -->
                      <p style="color: red" v-if="erroNewPassword.erro != ''">
                        {{ erroNewPassword.erro }}
                      </p>
                      <VTextField
                        v-model="usuario.password.confirmPassword"
                        :type="isConfirmPasswordVisible ? 'text' : 'password'"
                        :append-inner-icon="
                          isConfirmPasswordVisible ? 'bx-hide' : 'bx-show'
                        "
                        label="Confirme a nova senha"
                        placeholder="············"
                        @click:append-inner="
                          isConfirmPasswordVisible = !isConfirmPasswordVisible
                        "
                        @input="validateNewPassword"
                      />
                    </VCol>

                    <VCardText
                      v-if="
                        erroNewPassword.erroSimbolo != '' ||
                        erroNewPassword.erroMinusculo != '' ||
                        erroNewPassword.erroMinimo != ''
                      "
                    >
                      <p class="text-base font-weight-medium mt-2">
                        Requisitos de senha:
                      </p>

                      <ul class="d-flex flex-column gap-y-3">
                        <li
                          v-if="erroNewPassword.erroMinimo != ''"
                          class="d-flex"
                        >
                          <div>
                            <VIcon size="7" icon="bxs-circle" class="me-3" />
                          </div>
                          <span class="font-weight-medium">{{
                            erroNewPassword.erroMinimo
                          }}</span>
                        </li>
                        <li
                          v-if="erroNewPassword.erroMinusculo != ''"
                          class="d-flex"
                        >
                          <div>
                            <VIcon size="7" icon="bxs-circle" class="me-3" />
                          </div>
                          <span class="font-weight-medium">{{
                            erroNewPassword.erroMinusculo
                          }}</span>
                        </li>
                        <li
                          v-if="erroNewPassword.erroSimbolo != ''"
                          class="d-flex"
                        >
                          <div>
                            <VIcon size="7" icon="bxs-circle" class="me-3" />
                          </div>
                          <span class="font-weight-medium">{{
                            erroNewPassword.erroSimbolo
                          }}</span>
                        </li>
                      </ul>
                    </VCardText>

                    <!-- 👉 Form Actions -->
                    <VCol cols="12" class="d-flex flex-wrap gap-4">
                      <VBtn
                        v-if="
                          erroNewPassword.erroSimbolo != '' ||
                          erroNewPassword.erroMinusculo != '' ||
                          erroNewPassword.erroMinimo != '' ||
                          erroNewPassword.erro != '' ||
                          usuario.password.confirmPassword == '' ||
                          usuario.password.currentPassword == ''
                        "
                        disabled="disabled"
                        >Salvar nova senha</VBtn
                      >
                      <VBtn v-else @click="submitPassword()"
                        >Salvar nova senha</VBtn
                      >
                    </VCol>
                  </VRow>
                </VForm>
              </VCardText>
            </VCard>
          </VCol>
        </VRow>
      </VWindowItem>
    </VWindow>
  </div>
</template>
