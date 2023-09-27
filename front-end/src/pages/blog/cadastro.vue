<script setup>
import loading from "@/components/geral/LoadingOverlay.vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { useRoute } from "vue-router";

const route = useRoute();
const activeTab = ref(route.params.tab);

import { useBlogStore } from "@/stores/BlogStore";

const blog = useBlogStore();

const editor = ref(ClassicEditor);
const editorData = ref("<p>Content of the editor.</p>");

const refInputEl = ref();
const accountDataLocal = ref(
  structuredClone(JSON.parse(JSON.stringify(blog.cadastro)))
);
const isAccountDeactivated = ref(false);

const resetForm = () => {
  accountDataLocal.value = structuredClone(
    JSON.parse(JSON.stringify(blog.cadastro))
  );
};

const error = reactive({
  erroTitulo: "",
  erroSubtitulo: "",
});

const validate = () => {
  if (blog.cadastro.titulo == "" || blog.cadastro.subtitulo == "") {
    if (blog.cadastro.titulo == "") {
      error.erroTitulo = "Preencha o campo titulo do blog";
    }
    if (blog.cadastro.subtitulo == "") {
      error.erroSubtitulo = "Preencha o campo subtitulo do blog";
    }

    return false;
  } else {
    return true;
  }
};

const submit = () => {
  if (validate()) {
    blog.BlogCadastro();
  }
};

const changeAvatar = (event) => {
  const fileReader = new FileReader();
  const files = event.target.files;
  if (files && files.length) {
    fileReader.readAsDataURL(files[0]);
    fileReader.onload = () => {
      if (typeof fileReader.result === "string") {
        accountDataLocal.value.foto = fileReader.result;
        blog.cadastro.foto = fileReader.result;
      }
    };
  }
};

// reset avatar image
const resetAvatar = () => {
  blog.cadastro.foto = "";
};
</script>

<template>
  <div>
    <loading :is-loading="blog.isLoading" />

    <VDivider />

    <VWindow v-model="activeTab" class="mt-5 disable-tab-transition">
      <!-- Account -->
      <VWindow value="account">
        <VRow>
          <VCol cols="12">
            <VCard title="Cadastro de blogs">
              <VCardText class="d-flex">
                <!-- 👉 Avatar -->
                <VAvatar
                  rounded="lg"
                  size="100"
                  class="me-6"
                  :image="blog.cadastro.foto"
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
                    <!-- 👉 First Name -->
                    <VCol md="12" cols="12">
                      <p style="color: red" v-if="error.erroTitulo">
                        {{ error.erroTitulo }}
                      </p>
                      <VTextField
                        v-model="blog.cadastro.titulo"
                        placeholder="Ex: blog teste"
                        label="Titulo do blog"
                      />
                    </VCol>
                    <VCol md="12" cols="12">
                      <p style="color: red" v-if="error.erroSubtitulo">
                        {{ error.erroSubtitulo }}
                      </p>
                      <V-textarea
                        v-model="blog.cadastro.subtitulo"
                        placeholder="Ex: blog teste"
                        label="Subtitulo do blog"
                      />
                    </VCol>

                    <!-- 👉 Last Name -->
                    <VCol md="12" cols="12">
                      <ckeditor
                        :editor="editor"
                        v-model="blog.cadastro.texto"
                      ></ckeditor>
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
      </VWindow>
    </VWindow>
  </div>
</template>
