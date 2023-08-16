<template>
  <div>
    <VRow>
      <VCol cols="12">
        <VCard title="Arquivos do automovel">
          <VCardText class="d-flex">
            <!-- 👉 Avatar -->

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
          <VCardText>
            <VRow>
              <VCol
                md="3"
                cols="12"
                v-for="(item, index) in props.item"
                :key="item.id"
              >
                <v-avatar
                  color="error"
                  style="position: absolute; z-index: 9999; margin: -1%"
                >
                  <IconBtn @click="removeImage(index)">
                    <VIcon icon="bxs-trash" />
                  </IconBtn>
                </v-avatar>
                <VAvatar
                  rounded="lg"
                  size="100"
                  class="me-6"
                  :image="item.foto"
                />
              </VCol>
            </VRow>
          </VCardText>

          <VDivider />

          <VCardText>
            <!-- 👉 Form -->
            <VForm class="mt-6">
              <VRow>
                <!-- 👉 Form Actions -->
                <VCol cols="12" class="d-flex flex-wrap gap-4">
                  <VBtn @click="next">Proximo</VBtn>

                  <VBtn
                    color="secondary"
                    variant="tonal"
                    type="reset"
                    @click="pass"
                  >
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
  const { files } = event.target;

  if (files && files.length) {
    for (let i = 0; i < files.length; i++) {
      const file = files[i];
      const fileReader = new FileReader();

      fileReader.onload = (event) => {
        if (typeof event.target.result === "string") {
          const dataURL = event.target.result;

          const newImage = {
            id: props.item.length + 1,
            foto: dataURL,
            automovel_id: 1, //
            created_at: new Date().toISOString(),
            updated_at: new Date().toISOString(),
          };

          props.item.push(newImage);
        }
      };

      fileReader.readAsDataURL(file);
    }
  }
};

const removeImage = (index) => {
  props.item.splice(index, 1);
};

// reset avatar image
const resetAvatar = () => {
  props.item = [];
};

const emit = defineEmits(["next", "pass"]);

const next = () => {
  emit("next", "item");
};

const pass = () => {
  emit("pass", "account");
};
</script>
