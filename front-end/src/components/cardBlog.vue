<script>
export default {
  name: "CardBlog",
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
    <VCol sm="4" cols="12" v-for="item in items" :key="item.id">
      <VCard style="margin: 20px">
        <VImg :src="item.foto" />

        <VCardItem>
          <VCardTitle>{{ item.titulo }}</VCardTitle>
        </VCardItem>

        <VCardText> {{ item.subtitulo }} </VCardText>

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
      </VCard>
    </VCol>
  </VRow>
</template>
