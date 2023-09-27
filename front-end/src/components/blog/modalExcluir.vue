<script setup>
import { useBlogStore } from "@/stores/BlogStore";

const props = defineProps({
  blogId: {
    type: Number,
    required: true,
  },
});

const blog = useBlogStore();

const excluirBlog = () => {
  blog.BlogDeletar(props.blogId);

  // Feche o modal
  blog.modalExcluir = false;
};
</script>

<template>
  <div class="text-center">
    <v-dialog v-model="blog.modalExcluir" width="500">
      <VCard>
        <VWindow>
          <VWindowItem class="text-center">
            <VCardItem>
              <VCardTitle>Você tem certeza disso?</VCardTitle>
              <VDivider />
            </VCardItem>
            <VCardText
              >Você ira excluir permanentemente o Blog
              {{ props.blogId }}</VCardText
            >

            <VCardText>
              <VBtn color="error " @click="excluirBlog">Excluir</VBtn>
            </VCardText>
          </VWindowItem>
        </VWindow>
      </VCard>
    </v-dialog>
  </div>
</template>
