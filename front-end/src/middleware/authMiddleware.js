
export default function authMiddleware(to, from, next) {
    const isAuthenticated = 
    localStorage.getItem("token") != null &&
    localStorage.getItem("empresa_id") != null &&
    localStorage.getItem("usuario_id") != null;
    
    if (isAuthenticated) {
      next();
    } else {
      
      next('/login');
    }
  }
  