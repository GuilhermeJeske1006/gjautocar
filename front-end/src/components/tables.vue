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
};
</script>

<template>
  <VTable>
    <thead>
      <tr>
        <th v-for="column in columns" :key="column">{{ column }}</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="item in items" :key="item.dessert">
        <td class="text-center" v-for="column in columns" :key="column">
          {{ item[column] }}
        </td>
        <td class="text-center">
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
        </td>
      </tr>
    </tbody>
  </VTable>
</template>
