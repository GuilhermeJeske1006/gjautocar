<script setup>
import modalTrocar from "@/components/usuario/modalTrocar.vue";
import { useUsuarioStore } from "@/stores/UsuarioStore";

const usuario = useUsuarioStore();

onMounted(() => {
  usuario.UsuarioPerfil();
});

const abrirModal = () => {
  usuario.modalTrocar = true;
  usuario.UsuarioEmpresas();
};
</script>

<template>
  <modalTrocar :usuarioId="usuario.usuario_id" />

  <VBadge
    dot
    location="bottom right"
    offset-x="3"
    offset-y="3"
    color="success"
    bordered
  >
    <VAvatar class="cursor-pointer" color="primary" variant="tonal">
      <VImg :src="usuario.perfil.foto" />

      <!-- SECTION Menu -->
      <VMenu activator="parent" width="230" location="bottom end" offset="14px">
        <VList>
          <!-- 👉 User Avatar & Name -->
          <VListItem>
            <template #prepend>
              <VListItemAction start>
                <VBadge
                  dot
                  location="bottom right"
                  offset-x="3"
                  offset-y="3"
                  color="success"
                >
                  <VAvatar color="primary" variant="tonal">
                    <VImg :src="usuario.perfil.foto" />
                  </VAvatar>
                </VBadge>
              </VListItemAction>
            </template>

            <VListItemTitle class="font-weight-semibold">
              {{ usuario.perfil.name }}
            </VListItemTitle>
            <!-- <VListItemSubtitle>Admin</VListItemSubtitle> -->
          </VListItem>
          <VDivider class="my-2" />

          <!-- 👉 Profile -->
          <VListItem to="/perfil">
            <template #prepend>
              <VIcon class="me-2" icon="bx-user" size="22" />
            </template>

            <VListItemTitle>Perfil</VListItemTitle>
          </VListItem>

          <VListItem v-if="usuario.perfil.is_master" @click="abrirModal">
            <template #prepend>
              <VIcon class="me-2" icon="mdi-file-replace-outline" size="22" />
            </template>

            <VListItemTitle>Trocar empresa</VListItemTitle>
          </VListItem>

          <!-- 👉 Settings -->
          <!-- <VListItem link>
            <template #prepend>
              <VIcon class="me-2" icon="bx-cog" size="22" />
            </template>

            <VListItemTitle>Configuração</VListItemTitle>
          </VListItem> -->

          <!-- Divider -->
          <VDivider class="my-2" />

          <!-- 👉 Logout -->
          <VListItem @click="useUsuarioStore().UsuarioLogout()">
            <template #prepend>
              <VIcon class="me-2" icon="bx-log-out" size="22" />
            </template>

            <VListItemTitle>Logout</VListItemTitle>
          </VListItem>
        </VList>
      </VMenu>
      <!-- !SECTION -->
    </VAvatar>
  </VBadge>
</template>
