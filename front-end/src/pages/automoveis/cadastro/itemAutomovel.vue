<template>
  <div>
    <VRow>
      <VCol cols="12">
        <VCard title="Itens do automovel">
          <VCardText>
            <!-- 👉 Form -->
            <div class="mt-6">
              <VRow v-if="showInput == false">
                <!-- 👉 First Name -->
                <VCol md="12" cols="12">
                  <VBtn
                    style="text-align: center"
                    color="secondary"
                    append-icon="bxs-plus-circle"
                    @click="showInput = true"
                  >
                    Adcionar Item
                  </VBtn>
                </VCol>
              </VRow>
              <VRow v-if="showInput">
                <VCol md="8" cols="12">
                  <VTextField
                    v-model="textInput"
                    placeholder="ex: Air Bag, Ar Quente"
                    label="Item do automovel"
                  />
                </VCol>
                <VCol md="2" cols="12">
                  <VBtn @click="addItem()">+</VBtn>
                </VCol>
              </VRow>
              <VRow v-if="item.length > 0">
                <VCol md="12" cols="12">
                  <v-table>
                    <tbody>
                      <tr v-for="(i, index) in item" :key="i">
                        <td>{{ i }}</td>
                        <td>
                          <IconBtn @click="removeItem(index)">
                            <VIcon icon="bxs-trash" />
                          </IconBtn>
                        </td>
                      </tr>
                    </tbody>
                  </v-table>
                </VCol>
              </VRow>
              <VRow>
                <VCol cols="12" class="d-flex flex-wrap gap-4">
                  <VBtn @click="next()">Proximo</VBtn>

                  <VBtn color="secondary" variant="tonal" @click="pass()">
                    Anterior
                  </VBtn>
                </VCol>
              </VRow>
            </div>
          </VCardText>
        </VCard>
      </VCol>
    </VRow>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showInput: false,
      textInput: "",
    };
  },
  props: {
    item: {
      type: Array,
      required: true,
    },
  },

  methods: {
    addItem() {
      this.$emit("item-added", this.textInput);
      this.textInput = "";
    },
    pass() {
      this.$emit("pass", "security");
    },
    next() {
      this.$emit("next", "site");
    },

    removeItem(index) {
      this.item.splice(index, 1);
    },
  },
};
</script>
