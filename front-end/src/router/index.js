import authMiddleware from '@/middleware/authMiddleware'; // Importe o middleware
import { createRouter, createWebHashHistory } from 'vue-router';

const router = createRouter({
  history: createWebHashHistory(),
  routes: [
    { path: '/', redirect: '/dashboard' },
    {
      path: '/',
      component: () => import('../layouts/default.vue'),
      children: [
        {
          path: 'dashboard',
          component: () => import('../pages/dashboard.vue'),
          beforeEnter: authMiddleware,
        },
        {
          path: 'perfil',
          component: () => import('../pages/usuario/perfil.vue'),
          beforeEnter: authMiddleware,
        },
        {
          path: 'account-settings',
          component: () => import('../pages/account-settings.vue'),
        },
        {
          path: 'empresa',
          component: () => import('../pages/empresa/editarEmpresa.vue'),
          beforeEnter: authMiddleware,
        },
        {
          path: 'typography',
          component: () => import('../pages/typography.vue'),
        },
        {
          path: 'icons',
          component: () => import('../pages/icons.vue'),
        },
        {
          path: 'cards',
          component: () => import('../pages/cards.vue'),
        },

        {
          path: 'automoveis/listar',
          component: () => import('../pages/automoveis/listar.vue'),
          beforeEnter: authMiddleware,
        },
        {
          path: 'automoveis/cadastro',
          component: () => import('../pages/automoveis/cadastro.vue'),
          beforeEnter: authMiddleware,
        },
        {
          path: 'automoveis/edicao/:id',
          component: () => import('../pages/automoveis/edicao/_id.vue'),
          beforeEnter: authMiddleware,
        },
        // {
        //   path: 'usuarios/listar',
        //   component: () => import('../pages/usuarios/listar.vue'),
        // },
        {
          path: 'usuarios/cadastro',
          component: () => import('../pages/usuarios/cadastro.vue'),
        },
        {
          path: 'form-layouts',
          component: () => import('../pages/form-layouts.vue'),
        },
        {
          path: 'register',
          component: () => import('../pages/register.vue'),
          beforeEnter: authMiddleware,
        },
      ],
    },
    {
      path: '/',
      component: () => import('../layouts/blank.vue'),
      children: [
        {
          path: 'login',
          component: () => import('../pages/login.vue'),
        },
        
        {
          path: '/:pathMatch(.*)*',
          component: () => import('../pages/[...all].vue'),
        },
      ],
    },
  ],
})

export default router
