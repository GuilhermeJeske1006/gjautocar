<script setup>
import loading from "@/components/geral/LoadingOverlay.vue";
import { useSobreStore } from "@/stores/SobreStore";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { onMounted } from "vue";
import { useRoute } from "vue-router";

const route = useRoute();
const activeTab = ref(route.params.tab);
const refInputEl = ref();
const sobre = useSobreStore();
const editor = ref(ClassicEditor);
const editorData = ref("<p>Content of the editor.</p>");
const accountDataLocal = ref(
  structuredClone(JSON.parse(JSON.stringify(sobre.edicao)))
);
const resetForm = () => {
  accountDataLocal.value = structuredClone(
    JSON.parse(JSON.stringify(sobre.edicao))
  );
};

const error = reactive({
  erroTitulo: "",
  erroSubtitulo: "",
});

const validate = () => {
  if (sobre.edicao.titulo == "" || sobre.edicao.subtitulo == "") {
    if (sobre.edicao.titulo == "") {
      error.erroTitulo = "Preencha o campo titulo do sobre";
    }

    return false;
  } else {
    return true;
  }
};

onMounted(() => {
  sobre.SobreMostrar();
});

const submit = () => {
  if (validate()) {
    sobre.SobreEditar();
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
        sobre.edicao.foto = fileReader.result;
      }
    };
  }
};

// reset avatar image
const resetAvatar = () => {
  sobre.edicao.foto = "";
};
</script>

<template>
  <div>
    <loading :is-loading="sobre.isLoading" />

    <VDivider />

    <VWindow v-model="activeTab" class="mt-5 disable-tab-transition">
      <!-- Account -->
      <VWindow value="account">
        <VRow>
          <VCol cols="12">
            <VCard title="edicao de sobres">
              <VCardText class="d-flex">
                <!-- 👉 Avatar -->
                <VAvatar
                  rounded="lg"
                  size="100"
                  class="me-6"
                  :image="sobre.edicao.foto"
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
                        v-model="sobre.edicao.titulo"
                        placeholder="Ex: sobre teste"
                        label="Titulo do sobre"
                      />
                    </VCol>

                    <!-- 👉 Last Name -->
                    <VCol md="12" cols="12">
                      <ckeditor
                        :editor="editor"
                        v-model="sobre.edicao.texto"
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
