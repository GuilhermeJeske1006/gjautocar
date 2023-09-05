<script>
export default {
  name: "Table",
  props: {
    items: {
      type: Array,
      required: true,
    },
    columns: {
      type: Array,
      required: true,
    },
    actions: {
      type: Array,
      required: true,
    },
  },
  methods: {
    handleActionClick(action, item) {
      this.$emit("action-click", action, item);
    },
  },

  methods: {
    formatVal(val) {
      return val.toLocaleString("pt-BR", {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
      });
    },
  },
};
</script>

<template>
  <VRow>
    <VCol sm="6" cols="12" v-for="item in items" :key="item.dessert">
      <VCard>
        <div
          class="d-flex justify-space-between flex-wrap flex-md-nowrap flex-column flex-md-row"
        >
          <div class="ma-auto pa-5">
            <VImg :src="item.foto" />
          </div>

          <VDivider :vertical="$vuetify.display.mdAndUp" />

          <div>
            <VCardItem>
              <VCardTitle>{{ item.Id }} - {{ item.nome }}</VCardTitle>
            </VCardItem>

            <VCardText>
              <VDivider />
            </VCardText>

            <VCardText class="d-flex justify-center">
              <div class="me-auto pe-4">
                <p class="d-flex align-center mb-6">
                  <VIcon color="primary" icon="bx-lock-open" />
                  <span class="ms-3">{{ item.cambio }}</span>
                </p>

                <p class="d-flex align-center mb-0">
                  <VIcon color="primary" icon="mdi-clock-time-five-outline" />
                  <span class="ms-3">{{ item.ano }}</span>
                </p>
              </div>

              <VDivider v-if="$vuetify.display.smAndUp" vertical inset />

              <div class="ms-auto ps-4">
                <p class="d-flex align-center mb-6">
                  <VIcon color="primary" icon="bx-star" />
                  <span class="ms-3">{{ item.quilometragem }}</span>
                </p>

                <p class="d-flex align-center mb-0">
                  <VIcon color="primary" icon="mdi-gas-station" />
                  <span class="ms-3">{{ item.tipo_combustivel }}</span>
                </p>
              </div>
            </VCardText>

            <VCardText class="text-subtitle-1">
              <span>Valor :</span>
              <span class="font-weight-medium">
                R$ {{ formatVal(item.valor) }}</span
              >
            </VCardText>

            <VCardActions class="justify-space-between">
              <VBtn @click="handleActionClick('Editar', item)">
                <VIcon icon="mdi-eye-arrow-left" />
                <span class="ms-2">Ver mais</span>
              </VBtn>

              <IconBtn>
                <VIcon icon="bx-dots-vertical" />

                <VMenu activator="parent">
                  <v-list>
                    <v-list-item
                      v-for="(action, index) in actions"
                      :key="index"
                      link
                      @click="handleActionClick(action, item)"
                    >
                      <v-list-item-title>{{ action }}</v-list-item-title>
                    </v-list-item>
                  </v-list>
                </VMenu>
              </IconBtn>
            </VCardActions>
          </div>
        </div>
      </VCard>
    </VCol>
  </VRow>
</template>
